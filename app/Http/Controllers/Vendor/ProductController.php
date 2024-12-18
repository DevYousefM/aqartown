<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Related;
use App\Models\Generalsetting;
use App\Models\Subcategory;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Zone;
use App\Models\Country;
use App\Models\Brand;
use App\Models\City;
use Auth;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;

use Image;
use Session;
use Validator;

class ProductController extends Controller
{
    public $global_language;

    public function __construct()
    {
        $this->middleware('auth');

        if (Session::has('language')) {
            $data = DB::table('languages')->find(Session::get('language'));
            $data_results = file_get_contents(public_path() . '/assets/languages/' . $data->file);
            $this->vendor_language = json_decode($data_results);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            $data_results = file_get_contents(public_path() . '/assets/languages/' . $data->file);
            $this->vendor_language = json_decode($data_results);
        }
    }

    //*** JSON Request
    public function datatables($lang)
    {




        $user = Auth::user();
        $datas = $user->products()->where('product_type', 'normal')->orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function (Product $data) use ($lang) {
                $name = mb_strlen(strip_tags($data->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->name), 0, 50, 'utf-8') . '...' : strip_tags($data->name);
                $id = '<small>Product ID: <a href="' . route('front.product', ['slug' => $data->slug, 'lang' => $lang]) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';
                return  $name . '<br>' . $id;
            })

            ->addColumn('status', function (Product $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('vendor-prod-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . $this->vendor_language->lang713 . '</option><<option data-val="0" value="' . route('vendor-prod-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . $this->vendor_language->lang714 . '</option>/select></div>';
            })
            ->addColumn('action', function (Product $data) use ($lang) {
                return '<div class="action-list"><a href="' . route('vendor-prod-edit', ['id' => $data->id]) . '"> <i class="fas fa-edit"></i>' . $this->vendor_language->lang715 . '</a><a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="' . $data->id . '"><i class="fas fa-eye"></i> ' . $this->vendor_language->lang716 . '</a><a href="javascript:;" data-href="' . route('vendor-prod-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }


    //*** JSON Request
    public function catalogdatatables()
    {
        $user = Auth::user();
        $datas =  Product::where('product_type', 'normal')->where('status', '=', 1)->where('is_catalog', '=', 1)->orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function (Product $data) {
                $name = strlen(strip_tags($data->name)) > 50 ? substr(strip_tags($data->name), 0, 50) . '...' : strip_tags($data->name);
                $id = '<small>Product ID: <a href="' . route('front.product', $data->slug) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';
                return  $name . '<br>' . $id;
            })
            ->editColumn('price', function (Product $data) {
                $sign = Currency::where('is_default', '=', 1)->first();
                $price = $sign->sign . $data->price;
                return  $price;
            })
            ->addColumn('action', function (Product $data) {
                $user = Auth::user();
                $ck = $user->products()->where('catalog_id', '=', $data->id)->count() > 0;
                $catalog = $ck ? '<a href="javascript:;"> Added To Catalog</a>' : '<a href="' . route('vendor-prod-catalog-edit', $data->id) . '"><i class="fas fa-plus"></i> Add To Catalog</a>';
                return '<div class="action-list">' . $catalog . '</div>';
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index($lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        return view('vendor.product.index');
    }


    //*** GET Request
    public function catalogs()
    {
        return view('vendor.product.catalogs');
    }

    //*** GET Request
    public function types()
    {
        return view('vendor.product.types');
    }

    //*** GET Request
    public function createPhysical($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $cats = Category::where('type', 'product')->get();
        $sign = Currency::where('is_default', '=', 1)->first();
        $works =  Zone::where('status', 1)->get();
        $types =  City::where('status', 1)->get();
        $locations =  Country::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('vendor.product.create.physical', compact('cats', 'sign', 'locations', 'types', 'works', 'brands'));
    }

    //*** GET Request
    public function createDigital()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        return view('vendor.product.create.digital', compact('cats', 'sign'));
    }

    //*** GET Request
    public function createLicense()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        return view('vendor.product.create.license', compact('cats', 'sign'));
    }

    //*** GET Request
    public function status($id1, $id2)
    {
        $data = Product::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    //*** POST Request
    public function uploadUpdate(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Product::findOrFail($id);

        //--- Validation Section Ends
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time() . str_random(8) . '.png';
        $path = 'public/assets/images/products/' . $image_name;
        file_put_contents($path, $image);
        if ($data->photo != null) {
            if (file_exists(public_path() . '/assets/images/products/' . $data->photo)) {
                unlink(public_path() . '/assets/images/products/' . $data->photo);
            }
        }
        $input['photo'] = $image_name;
        $data->update($input);
        if ($data->thumbnail != null) {
            if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumbnail)) {
                unlink(public_path() . '/assets/images/thumbnails/' . $data->thumbnail);
            }
        }

        $img = Image::make(public_path() . '/assets/images/products/' . $data->photo)->resize(285, 285);
        $thumbnail = time() . str_random(8) . '.jpg';
        $img->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
        $data->thumbnail  = $thumbnail;
        $data->update();
        return response()->json(['status' => true, 'file_name' => $image_name]);
    }


    //*** POST Request
    public function import()
    {

        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        return view('vendor.product.productcsv', compact('cats', 'sign'));
    }

    public function importSubmit(Request $request)
    {

        $user = Auth::user();
        $package = $user->subscribes()->orderBy('id', 'desc')->first();
        $prods = $user->products()->orderBy('id', 'desc')->get()->count();
        if (Generalsetting::find(1)->verify_product == 1) {
            if (!$user->checkStatus()) {
                return response()->json(array('errors' => [0 => 'You must complete your verfication first.']));
            }
        }

        if ($package) {
            if ($prods < $package->allowed_products || $package->allowed_products == 0) {
                $log = "";
                //--- Validation Section
                $rules = [
                    'csvfile'      => 'required|mimes:csv,txt',
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                }

                $filename = '';
                if ($file = $request->file('csvfile')) {
                    $filename = time() . '-' . $file->getClientOriginalName();
                    $file->move('public/assets/temp_files', $filename);
                }

                //$filename = $request->file('csvfile')->getClientOriginalName();
                //return response()->json($filename);
                $datas = "";

                $file = fopen(public_path('assets/temp_files/' . $filename), "r");
                $i = 1;
                while (($line = fgetcsv($file)) !== FALSE) {

                    if ($i != 1) {

                        if (!Product::where('sku', $line[0])->exists()) {

                            //--- Validation Section Ends

                            //--- Logic Section
                            $data = new Product;
                            $sign = Currency::where('is_default', '=', 1)->first();

                            $input['type'] = 'Physical';
                            $input['sku'] = $line[0];

                            $input['category_id'] = null;
                            $input['subcategory_id'] = null;
                            $input['childcategory_id'] = null;

                            $mcat = Category::where(DB::raw('lower(name)'), strtolower($line[1]));
                            //$mcat = Category::where("name", $line[1]);

                            if ($mcat->exists()) {
                                $input['category_id'] = $mcat->first()->id;

                                if ($line[2] != "") {
                                    $scat = Subcategory::where(DB::raw('lower(name)'), strtolower($line[2]));

                                    if ($scat->exists()) {
                                        $input['subcategory_id'] = $scat->first()->id;
                                    }
                                }
                                if ($line[3] != "") {
                                    $chcat = Childcategory::where(DB::raw('lower(name)'), strtolower($line[3]));

                                    if ($chcat->exists()) {
                                        $input['childcategory_id'] = $chcat->first()->id;
                                    }
                                }
                                $input['photo'] = $line[5];
                                $input['name'] = $line[4];
                                $input['details'] = !empty($line[6]) ? $line[6] : null;
                                //                $input['category_id'] = $request->category_id;
                                //                $input['subcategory_id'] = $request->subcategory_id;
                                //                $input['childcategory_id'] = $request->childcategory_id;
                                $input['color'] = !empty($line[13]) ? $line[13] : null;
                                $input['price'] = $line[7];
                                $input['previous_price'] = !empty($line[8]) ? $line[8] : null;
                                $input['stock'] = !empty($line[9]) ? $line[9] : null;
                                $input['size'] = !empty($line[10]) ? $line[10] : null;
                                $input['size_qty'] = !empty($line[11]) ? $line[11] : null;
                                $input['size_price'] = !empty($line[12]) ? $line[12] : null;
                                $input['youtube'] = !empty($line[15]) ? $line[15] : null;
                                $input['policy'] = !empty($line[16]) ? $line[16] : null;
                                $input['meta_tag'] = $line[17];
                                $input['meta_description'] = $line[18];
                                $input['tags'] = $line[14];
                                $input['product_type'] = !empty($line[20]) ? $line[20] : 'normal';
                                $input['affiliate_link'] = !empty($line[20]) ? $line[20] : null;
                                $input['details_ar'] = $line[21];
                                $input['name_ar'] = $line[22];
                                $input['policy_ar'] = !empty($line[23]) ? $line[23] : null;
                                $input['meta_description_ar'] = !empty($line[24]) ? $line[24] : null;

                                // Conert Price According to Currency
                                $input['price'] = ($input['price'] / $sign->value);
                                $input['previous_price'] = ($input['previous_price'] / $sign->value);
                                $input['user_id'] = Auth::user()->id;
                                // Save Data

                                $data->fill($input)->save();

                                // Set SLug
                                $prod = Product::find($data->id);
                                $prod->slug = str_slug($data->name, '-') . '-' . strtolower($data->sku);
                                $prod->slug_ar = preg_replace('/\s+/', '-', $data->name_ar) . '-' . strtolower($data->sku);
                                // Set Thumbnail
                                //    $img = Image::make($line[5])->resize(285, 285);
                                //  $thumbnail = time().str_random(8).'.jpg';
                                //   $img->save(public_path().'/public/assets/images/thumbnails/'.$thumbnail);
                                $prod->thumbnail  = $line[5];
                                $prod->update();
                            } else {
                                $log .= "<br>Row No: " . $i . " - No Category Found!<br>";
                            }
                        } else {
                            $log .= "<br>Row No: " . $i . " - Duplicate Product Code!<br>";
                        }
                    }

                    $i++;
                }
                fclose($file);


                //--- Redirect Section
                $msg = 'Bulk Product File Imported Successfully.<a href="' . route('vendor-prod-index') . '">View Product Lists.</a>' . $log;
                return response()->json($msg);
            } else {
                //--- Redirect Section
                return response()->json(array('errors' => [0 => 'You Can\'t Add More Products.']));

                //--- Redirect Section Ends
            }
        } else {
            //--- Redirect Section
            return response()->json(array('errors' => [0 => 'select package please']));

            //--- Redirect Section Ends
        }
    }



    //*** POST Request
    public function store(Request $request)
    {

        //--- Validation Section
        $rules = [

            'name'                     => 'required',
            'name_ar'                  => 'required',


            'hover_photo'                    => 'required',


        ];



        $messages = [

            'name.required'                       => trans('ProdName Required'),
            'name_ar.required'                    => trans('ProdArabicName Required'),


            'hover_photo.required'                      => trans('Photo Required'),



        ];






        $validator  = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return response()->json([
                "status" =>  false,
                "errors" =>  $validator->messages(),
            ], 200);
        }

        // //--- Validation Section Ends

        //--- Logic Section
        $data = new Product;

        $input = $request->all();
        $input['feature'] = $request->feature ? $request->feature : 0;
        if (empty($request->feature)) {
            $input['subscription_period'] = 0;
            $input['trial_period'] = 0;
        }


        if ($request->hasFile('hover_photo')) {

            $imagem2 = $request->file('hover_photo');
            $image_ext2 = $imagem2->getClientOriginalExtension();
            $new_image_name2 = rand(123456, 999999) . "." . $image_ext2;
            $destination_path2 = public_path('assets/images/products/');
            $imagem2->move($destination_path2, $new_image_name2);
            $input['hover_photo'] = $new_image_name2;
            $input['photo'] = $new_image_name2;
        }

        $input['user_id'] = Auth::user()->id;
        // $image = $request->hover_photo;
        // list($type, $image) = explode(';', $image);
        // list(, $image)      = explode(',', $image);
        // $image = base64_decode($image);
        // $image_name = time().str_random(8).'.png';
        // $path = 'public/assets/images/products/'.$image_name;
        // file_put_contents($path, $image);
        // $input['photo'] = $image_name;


        // Check Seo
        if (empty($request->seo_check)) {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
            $input['meta_description_ar'] = null;
        } else {
            if (!empty($request->meta_tag)) {
                $input['meta_tag'] = implode(',', $request->meta_tag);
            }
        }

        // Check License



        // Check Features
        // if(in_array(null, $request->features) || in_array(null, $request->colors))
        // {
        //     $input['features'] = null;
        //     $input['colors'] = null;
        // }
        // else
        // {
        //     $input['features'] = implode(',', str_replace(',',' ',$request->features));
        //     $input['colors'] = implode(',', str_replace(',',' ',$request->colors));
        // }

        //tags
        if (!empty($request->tags)) {
            $input['tags'] = implode(',', $request->tags);
        }

        if (!empty($request->tags_ar)) {
            $input['tags_ar'] = implode(',', $request->tags_ar);
        }




        $input['status'] = 0;
        $input['slug'] = str_replace(' ', '-', $input['name']);

        $input['slug_ar'] = preg_replace('/\s+/', '-', $input['name_ar']);

        $input['products'] = !empty($input['products']) ?  json_encode($input['products']) :  json_encode([]);
        $input['projects'] = !empty($input['projects']) ? json_encode($input['projects']) :  json_encode([]);

        // Save Data
        $data->fill($input)->save();



        // Add To Gallery If any
        $lastid = $data->id;
        if ($files = $request->file('gallery')) {
            foreach ($files as  $key => $file) {
                if (in_array($key, $request->galval)) {
                    $gallery = new Gallery;
                    $name = time() . $file->getClientOriginalName();
                    $file->move('public/assets/images/galleries', $name);
                    $gallery['photo'] = $name;
                    $gallery['product_id'] = $lastid;
                    $gallery->save();
                }
            }
        }

        if ($files = $request->file('gallerymobile')) {
            foreach ($files as  $key => $file) {
                if (in_array($key, $request->galvalm)) {
                    $gallery = new Gallery;
                    $name = time() . $file->getClientOriginalName();
                    $file->move('public/assets/images/galleries', $name);
                    $gallery['photo'] = $name;
                    $gallery['product_id'] = $lastid;
                    $gallery['web'] = 0;
                    $gallery->save();
                }
            }
        }
        //logic Section Ends

        //--- Redirect Section





        $msg = trans('Add Success');



        return response()->json([
            "status" =>  true,
            "msg" => $msg
        ], 200);
        //--- Redirect Section Ends

    }

    //*** GET Request
    public function edit($id)
    {

        $brands = Brand::where('status', 1)->get();
        $pro = Product::where('status', '=', 1)->orderBy('id', 'desc')->get();
        $Related = Related::where('product_id', '=', $id)->orderBy('id', 'desc')->get();
        $cats = Category::where('type', 'product')->get();
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default', '=', 1)->first();
        $works =  Zone::where('status', 1)->get();
        $types =  City::where('status', 1)->get();
        $locations =  Country::where('status', 1)->get();

        if ($data->type == 'Digital')
            return view('vendor.product.edit.digital', compact('cats', 'data'));
        elseif ($data->type == 'License')
            return view('vendor.product.edit.license', compact('cats', 'data'));
        else
            return view('vendor.product.edit.physical', compact('cats', 'locations', 'types', 'works', 'data', 'pro', 'Related', 'brands'));
    }


    //*** GET Request CATALOG
    public function catalogedit($id)
    {
        $cats = Category::all();
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default', '=', 1)->first();


        if ($data->type == 'Digital')
            return view('vendor.product.edit.catalog.digital', compact('cats', 'data', 'sign'));
        elseif ($data->type == 'License')
            return view('vendor.product.edit.catalog.license', compact('cats', 'data', 'sign'));
        else
            return view('vendor.product.edit.catalog.physical', compact('cats', 'data', 'sign'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        // return $request;
        //--- Validation Section
        $rules = [

            'name'                     => 'required',
            'name_ar'                  => 'required',



        ];



        $messages = [

            'name.required'                       => trans('ProdName Required'),
            'name_ar.required'                    => trans('ProdArabicName Required'),



        ];






        $validator  = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return response()->json([
                "status" =>  false,
                "errors" =>  $validator->messages(),
            ], 200);
        }


        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //   return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        // }
        //--- Validation Section Ends


        //-- Logic Section
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default', '=', 1)->first();
        $input = $request->all();
        $input['feature'] = $request->feature ? $request->feature : 0;
        if ($request->feature == 1) {
            $input['subscription_period'] = $request->subscription_period;
            $input['trial_period'] = $request->trial_period;
        } else {
            $input['subscription_period'] = 0;
            $input['trial_period'] = 0;
        }
        //Check Types
        if ($request->type_check == 1) {
            $input['link'] = null;
        } else {
            if ($data->file != null) {
                if (file_exists(public_path() . '/assets/files/' . $data->file)) {
                    unlink(public_path() . '/assets/files/' . $data->file);
                }
            }
            $input['file'] = null;
        }


        // Check Physical




        if ($request->hasFile('mobile_photo')) {

            $image = $request->file('mobile_photo');
            $image_ext = $image->getClientOriginalExtension();
            $new_image_name = rand(123456, 999999) . "." . $image_ext;
            $destination_path = public_path('assets/images/products/');
            $image->move($destination_path, $new_image_name);
            $input['mobile_photo'] = $new_image_name;
        }

        if ($request->hasFile('hover_photo')) {

            $imagem2 = $request->file('hover_photo');
            $image_ext2 = $imagem2->getClientOriginalExtension();
            $new_image_name2 = rand(123456, 999999) . "." . $image_ext2;
            $destination_path2 = public_path('assets/images/products/');
            $imagem2->move($destination_path2, $new_image_name2);
            $input['hover_photo'] = $new_image_name2;
            $input['photo'] = $new_image_name2;
        }



        // Check Seo
        if (empty($request->seo_check)) {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        } else {
            if (!empty($request->meta_tag)) {
                $input['meta_tag'] = implode(',', $request->meta_tag);
            }
        }




        // Check Features
        // if(!in_array(null, $request->features) && !in_array(null, $request->colors))
        // {
        //         $input['features'] = implode(',', str_replace(',',' ',$request->features));
        //         $input['colors'] = implode(',', str_replace(',',' ',$request->colors));
        // }
        // else
        // {
        //     if(in_array(null, $request->features) || in_array(null, $request->colors))
        //     {
        //         $input['features'] = null;
        //         $input['colors'] = null;
        //     }
        //     else
        //     {
        //         $features = explode(',', $data->features);
        //         $colors = explode(',', $data->colors);
        //         $input['features'] = implode(',', $features);
        //         $input['colors'] = implode(',', $colors);
        //     }
        // }

        //Product Tags
        if (!empty($request->tags)) {
            $input['tags'] = implode(',', $request->tags);
        }
        if (empty($request->tags)) {
            $input['tags'] = null;
        }


        if (!empty($request->tags_ar)) {
            $input['tags_ar'] = implode(',', $request->tags_ar);
        }

        if (empty($request->tags_ar)) {
            $input['tags_ar'] = null;
        }



        // store filtering attributes for physical product
        $attrArr = [];



        $data->products = !empty($input['products']) ? json_encode($input['products']) :  json_encode([]);
        $data->projects = !empty($input['projects']) ? json_encode($input['projects']) :  json_encode([]);
        $data->slug = str_replace(' ', '-', $data->name);

        $data->slug_ar = preg_replace('/\s+/', '-', $data->name_ar);

        $data->update($input);
        //-- Logic Section Ends

        if ($request->related) {

            $interest_array = $request->related;
            $array_len = count($interest_array);
            for ($i = 0; $i < $array_len; $i++) {
                $interest_ext = $interest_array[$i];
                $related = new Related();
                $related->related_id = $interest_ext;
                $related->product_id = $id;
                $related->save();
            }
        }



        //--- Redirect Section





        $msg = trans('Update Success');
        return response()->json([
            "status" =>  true,
            "msg" => $msg
        ], 200);






        /*  $msg = 'Product Updated Successfully.<a href="'.route('admin-prod-index').'">View Product Lists.</a>';
        return response()->json($msg);*/


        //--- Redirect Section Ends
    }

    //*** POST Request CATALOG
    public function catalogupdate(Request $request, $id)
    {

        $user = Auth::user();
        $package = $user->subscribes()->orderBy('id', 'desc')->first();
        $prods = $user->products()->orderBy('id', 'desc')->get()->count();
        if (Generalsetting::find(1)->verify_product == 1) {
            if (!$user->checkStatus()) {
                return response()->json(array('errors' => [0 => 'You must complete your verfication first.']));
            }
        }
        if ($prods < $package->allowed_products || $package->allowed_products == 0) {

            //--- Validation Section
            $rules = [
                'file'       => 'mimes:zip'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            //--- Logic Section
            $data = new Product;
            $sign = Currency::where('is_default', '=', 1)->first();
            $input = $request->all();
            // Check File
            if ($file = $request->file('file')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('public/assets/files', $name);
                $input['file'] = $name;
            }

            $image = $request->photo;
            if ($request->is_photo == '1') {
                list($type, $image) = explode(';', $image);
                list(, $image)      = explode(',', $image);
                $image = base64_decode($image);
                $image_name = time() . str_random(8) . '.png';
                $path = 'public/assets/images/products/' . $image_name;
                file_put_contents($path, $image);
            } else {
                $image_name = $request->photo;
            }

            $input['photo'] = $image_name;

            // Check Physical
            if ($request->type == "Physical") {

                //--- Validation Section
                $rules = ['sku'      => 'min:8|unique:products'];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                }
                //--- Validation Section Ends


                // Check Condition
                if ($request->product_condition_check == "") {
                    $input['product_condition'] = 0;
                }

                // Check Shipping Time
                if ($request->shipping_time_check == "") {
                    $input['ship'] = null;
                }

                // Check Size
                if (empty($request->size_check)) {
                    $input['size'] = null;
                    $input['size_qty'] = null;
                    $input['size_price'] = null;
                } else {
                    if (in_array(null, $request->size) || in_array(null, $request->size_qty)) {
                        $input['size'] = null;
                        $input['size_qty'] = null;
                        $input['size_price'] = null;
                    } else {
                        $input['size'] = implode(',', $request->size);
                        $input['size_qty'] = implode(',', $request->size_qty);
                        $input['size_price'] = implode(',', $request->size_price);
                    }
                }

                // Check Whole Sale
                if (empty($request->whole_check)) {
                    $input['whole_sell_qty'] = null;
                    $input['whole_sell_discount'] = null;
                } else {
                    if (in_array(null, $request->whole_sell_qty) || in_array(null, $request->whole_sell_discount)) {
                        $input['whole_sell_qty'] = null;
                        $input['whole_sell_discount'] = null;
                    } else {
                        $input['whole_sell_qty'] = implode(',', $request->whole_sell_qty);
                        $input['whole_sell_discount'] = implode(',', $request->whole_sell_discount);
                    }
                }


                // Check Color
                if (empty($request->color_check)) {
                    $input['color'] = null;
                } else {
                    $input['color'] = implode(',', $request->color);
                }

                // Check Measurement
                if ($request->mesasure_check == "") {
                    $input['measure'] = null;
                }
            }

            // Check Seo
            if (empty($request->seo_check)) {
                $input['meta_tag'] = null;
                $input['meta_description'] = null;
            } else {
                if (!empty($request->meta_tag)) {
                    $input['meta_tag'] = implode(',', $request->meta_tag);
                }
            }

            // Check License

            if ($request->type == "License") {

                if (in_array(null, $request->license) || in_array(null, $request->license_qty)) {
                    $input['license'] = null;
                    $input['license_qty'] = null;
                } else {
                    $input['license'] = implode(',,', $request->license);
                    $input['license_qty'] = implode(',', $request->license_qty);
                }
            }

            // Check Features
            if (in_array(null, $request->features) || in_array(null, $request->colors)) {
                $input['features'] = null;
                $input['colors'] = null;
            } else {
                $input['features'] = implode(',', str_replace(',', ' ', $request->features));
                $input['colors'] = implode(',', str_replace(',', ' ', $request->colors));
            }

            //tags
            if (!empty($request->tags)) {
                $input['tags'] = implode(',', $request->tags);
            }

            // Conert Price According to Currency
            $input['price'] = ($input['price'] / $sign->value);
            $input['previous_price'] = ($input['previous_price'] / $sign->value);
            $input['user_id'] = Auth::user()->id;

            // store filtering attributes for physical product
            $attrArr = [];
            if (!empty($request->category_id)) {
                $catAttrs = Attribute::where('attributable_id', $request->category_id)->where('attributable_type', 'App\Models\Category')->get();
                if (!empty($catAttrs)) {
                    foreach ($catAttrs as $key => $catAttr) {
                        $in_name = $catAttr->input_name;
                        if ($request->has("$in_name")) {
                            $attrArr["$in_name"]["values"] = $request["$in_name"];
                            $attrArr["$in_name"]["prices"] = $request["$in_name" . "_price"];
                            if ($catAttr->details_status) {
                                $attrArr["$in_name"]["details_status"] = 1;
                            } else {
                                $attrArr["$in_name"]["details_status"] = 0;
                            }
                        }
                    }
                }
            }

            if (!empty($request->subcategory_id)) {
                $subAttrs = Attribute::where('attributable_id', $request->subcategory_id)->where('attributable_type', 'App\Models\Subcategory')->get();
                if (!empty($subAttrs)) {
                    foreach ($subAttrs as $key => $subAttr) {
                        $in_name = $subAttr->input_name;
                        if ($request->has("$in_name")) {
                            $attrArr["$in_name"]["values"] = $request["$in_name"];
                            $attrArr["$in_name"]["prices"] = $request["$in_name" . "_price"];
                            if ($subAttr->details_status) {
                                $attrArr["$in_name"]["details_status"] = 1;
                            } else {
                                $attrArr["$in_name"]["details_status"] = 0;
                            }
                        }
                    }
                }
            }
            if (!empty($request->childcategory_id)) {
                $childAttrs = Attribute::where('attributable_id', $request->childcategory_id)->where('attributable_type', 'App\Models\Childcategory')->get();
                if (!empty($childAttrs)) {
                    foreach ($childAttrs as $key => $childAttr) {
                        $in_name = $childAttr->input_name;
                        if ($request->has("$in_name")) {
                            $attrArr["$in_name"]["values"] = $request["$in_name"];
                            $attrArr["$in_name"]["prices"] = $request["$in_name" . "_price"];
                            if ($childAttr->details_status) {
                                $attrArr["$in_name"]["details_status"] = 1;
                            } else {
                                $attrArr["$in_name"]["details_status"] = 0;
                            }
                        }
                    }
                }
            }



            if (empty($attrArr)) {
                $input['attributes'] = NULL;
            } else {
                $jsonAttr = json_encode($attrArr);
                $input['attributes'] = $jsonAttr;
            }

            // Save Data
            $data->fill($input)->save();

            // Set SLug

            $prod = Product::find($data->id);
            if ($prod->type != 'Physical') {
                $prod->slug = str_slug($data->name, '-') . '-' . strtolower(str_random(3) . $data->id . str_random(3));
                $prod->slug_ar = preg_replace('/\s+/', '-', $data->name_ar) . '-' . strtolower(str_random(3) . $data->id . str_random(3));
            } else {
                $prod->slug = str_slug($data->name, '-') . '-' . strtolower($data->sku);
                $prod->slug_ar = preg_replace('/\s+/', '-', $data->name_ar) . '-' . strtolower($data->sku);
            }
            $photo = $prod->photo;
            if ($request->is_photo == '0') {
                // Set Photo
                $newimg = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(800, 800);
                $photo = time() . str_random(8) . '.jpg';
                $newimg->save(public_path() . '/assets/images/products/' . $photo);
            }



            // Set Thumbnail
            $img = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(285, 285);
            $thumbnail = time() . str_random(8) . '.jpg';
            $img->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
            $prod->thumbnail  = $thumbnail;
            $prod->photo  = $photo;
            $prod->update();

            // Add To Gallery If any
            $lastid = $data->id;
            if ($files = $request->file('gallery')) {
                foreach ($files as  $key => $file) {
                    if (in_array($key, $request->galval)) {
                        $gallery = new Gallery;
                        $name = time() . $file->getClientOriginalName();
                        $img = Image::make($file->getRealPath())->resize(800, 800);
                        $thumbnail = time() . str_random(8) . '.jpg';
                        $img->save(public_path() . '/assets/images/galleries/' . $name);
                        $gallery['photo'] = $name;
                        $gallery['product_id'] = $lastid;
                        $gallery->save();
                    }
                }
            }
            //logic Section Ends

            //--- Redirect Section
            $msg = 'New Product Added Successfully.<a href="' . route('vendor-prod-index') . '">View Product Lists.</a>';
            return response()->json($msg);
            //--- Redirect Section Ends
        } else {
            //--- Redirect Section
            return response()->json(array('errors' => [0 => 'You Can\'t Add More Product.']));

            //--- Redirect Section Ends
        }
    }


    //*** GET Request
    public function destroy($id)
    {

        $data = Product::findOrFail($id);
        if ($data->galleries->count() > 0) {
            foreach ($data->galleries as $gal) {
                if (file_exists(public_path() . '/assets/images/galleries/' . $gal->photo)) {
                    unlink(public_path() . '/assets/images/galleries/' . $gal->photo);
                }
                $gal->delete();
            }
        }



        if (!filter_var($data->photo, FILTER_VALIDATE_URL)) {
            if (file_exists(public_path() . '/assets/images/products/' . $data->photo)) {
                unlink(public_path() . '/assets/images/products/' . $data->photo);
            }
        }

        if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumbnail) && $data->thumbnail != "") {
            unlink(public_path() . '/assets/images/thumbnails/' . $data->thumbnail);
        }
        if ($data->file != null) {
            if (file_exists(public_path() . '/assets/files/' . $data->file)) {
                unlink(public_path() . '/assets/files/' . $data->file);
            }
        }
        $data->delete();
        //--- Redirect Section
        $msg = 'Product Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

        // PRODUCT DELETE ENDS
    }

    public function getAttributes(Request $request)
    {
        $model = '';
        if ($request->type == 'category') {
            $model = 'App\Models\Category';
        } elseif ($request->type == 'subcategory') {
            $model = 'App\Models\Subcategory';
        } elseif ($request->type == 'childcategory') {
            $model = 'App\Models\Childcategory';
        }

        $attributes = Attribute::where('attributable_id', $request->id)->where('attributable_type', $model)->get();
        $attrOptions = [];
        foreach ($attributes as $key => $attribute) {
            $options = AttributeOption::where('attribute_id', $attribute->id)->get();
            $attrOptions[] = ['attribute' => $attribute, 'options' => $options];
        }
        return response()->json($attrOptions);
    }
}
