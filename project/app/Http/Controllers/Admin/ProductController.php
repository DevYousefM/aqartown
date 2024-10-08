<?php

namespace App\Http\Controllers\Admin;

use App\Models\Childcategory;
use App\Models\Subcategory;
use DataTables;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Related;
use App\Models\Category;
use App\Userdetails;
use App\Models\Brand;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Color;
use App\Models\ProductNotify;
use App\Models\Zone;
use App\Models\City;
use App\Models\Country;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Image;
use DB;
use App;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Product::where('product_type', '=', 'normal')->orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function (Product $data) {
                $name = mb_strlen(strip_tags($data->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->name), 0, 50, 'utf-8') . '...' : strip_tags($data->name);
                $id = '<small>ID: <a href="' . route('front.product', ['slug' => $data->slug, 'lang' => 'en']) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';
                $id2 = $data->user_id != 0 && !empty($data->user->products) ? (count($data->user->products) > 0 ? '<small class="ml-2"> VENDOR: <a href="' . route('admin-vendor-show', $data->user_id) . '" target="_blank">' . $data->user->shop_name . '</a></small>' : '') : '';

                $id3 = $data->type == 'Physical' ? '<small class="ml-2"> SKU: <a href="' . route('front.product', ['slug' => $data->slug, 'lang' => 'en']) . '" target="_blank">' . $data->sku . '</a>' : '';

                return  $name;
            })
            ->editColumn('thumbnail', function (Product $data) {

                $photo = '<div class=""><img style="width: 85px;" src="' . url('assets/images/products', $data->hover_photo) . '"  ></div>';
                return  $photo;
            })
            ->editColumn('stock', function (Product $data) {
                $stck = (string)$data->stock;
                if ($stck == "0")
                    return "Out Of Stock";
                elseif ($stck == null)
                    return "Unlimited";
                else
                    return $data->stock;
            })
            ->addColumn('status', function (Product $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Activated</option><<option data-val="0" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Deactivated</option>/select></div>';
            })->addColumn('checkbox', function (Product $data) {

                return '<div class="">
                                <label class="container">
                                <input type="checkbox" name="id[' . $data->id . '][]" value="' . $data->id . '" class="all row-select">
                                 <span class="checkmark" style="top: -27px;"></span>
                               </label>
                                </div>';
            })
            ->addColumn('action', function (Product $data) {
                $catalog = $data->type == 'Physical' ? ($data->is_catalog == 1 ? '<a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 0]) . '" data-toggle="modal" data-target="#catalog-modal" class="delete"><i class="fas fa-trash-alt"></i> Remove Catalog</a>' : '<a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 1]) . '" data-toggle="modal" data-target="#catalog-modal"> <i class="fas fa-plus"></i> Add To Catalog</a>') : '';
                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list">
<a href="' . route('admin-prod-edit', $data->id) . '"> <i class="fas fa-edit"></i> Edit</a>
<a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="' . $data->id . '"><i class="fas fa-eye"></i> View Gallery</a>

<a href="javascript:;" data-href="' . route('admin-prod-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Delete</a></div></div>';
            })
            ->rawColumns(['name', 'thumbnail', 'checkbox', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }


    //*** JSON Request
    public function catalogdatatables()
    {
        $datas = Product::where('is_catalog', '=', 1)->orderBy('id', 'desc')->get();

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function (Product $data) {
                $name = mb_strlen(strip_tags($data->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->name), 0, 50, 'utf-8') . '...' : strip_tags($data->name);
                $id = '<small>ID: <a href="' . route('front.product', $data->slug) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';

                $id3 = $data->type == 'Physical' ? '<small class="ml-2"> SKU: <a href="' . route('front.product', $data->slug) . '" target="_blank">' . $data->sku . '</a>' : '';

                return  $name . '<br>' . $id . $id3;
            })
            ->editColumn('price', function (Product $data) {
                $sign = Currency::where('is_default', '=', 1)->first();
                $price = round($data->price * $sign->value, 2);
                $price = $sign->sign . $price;
                return  $price;
            })
            ->editColumn('stock', function (Product $data) {
                $stck = (string)$data->stock;
                if ($stck == "0")
                    return "Out Of Stock";
                elseif ($stck == null)
                    return "Unlimited";
                else
                    return $data->stock;
            })
            ->addColumn('status', function (Product $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Activated</option><<option data-val="0" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Deactivated</option>/select></div>';
            })
            ->addColumn('action', function (Product $data) {
                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-prod-edit', $data->id) . '"> <i class="fas fa-edit"></i> Edit</a><a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="' . $data->id . '"><i class="fas fa-eye"></i> View Gallery</a><a data-href="' . route('admin-prod-feature', $data->id) . '" class="feature" data-toggle="modal" data-target="#modal2"> <i class="fas fa-star"></i> Highlight</a><a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 0]) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Remove Catalog</a></div></div>';
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.product.index');
    }


    //*** GET Request
    public function deactive()
    {
        return view('admin.product.deactive');
    }

    //*** GET Request
    public function catalogs()
    {
        return view('admin.product.catalog');
    }

    //*** GET Request
    public function types()
    {
        return view('admin.product.types');
    }

    //*** GET Request
    public function createPhysical()
    {
        $pro = Product::where('status', '=', 1)->orderBy('id', 'desc')->get();
        $brands = Brand::where('status', 1)->get();

        $cats = Category::where('type', 'product')->get();
        $sign = Currency::where('is_default', '=', 1)->first();
        $works =  Zone::where('status', 1)->get();
        $types =  City::where('status', 1)->get();
        $locations =  Country::where('status', 1)->get();

        return view('admin.product.create.physical', compact('cats', 'locations', 'types', 'works', 'sign', 'pro', 'brands'));
    }





    //*** GET Request
    public function status($id1, $id2)
    {
        $data = Product::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    //*** GET Request
    public function catalog($id1, $id2)
    {
        $data = Product::findOrFail($id1);
        $data->is_catalog = $id2;
        $data->update();
        if ($id2 == 1) {
            $msg = trans('Catalog Add Msg');
        } else {
            $msg =  trans('Catalog Remove Msg');
        }

        return response()->json([
            'status' =>  true,
            'msg' => $msg
        ], 200);
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
        $path = 'assets/images/products/' . $image_name;
        file_put_contents($path, $image);
        if ($data->photo != null) {
            if (file_exists(public_path() . '/assets/images/products/' . $data->photo)) {
                unlink(public_path() . '/assets/images/products/' . $data->photo);
            }
        }
        $input['photo'] = $image_name;
        $input['mobile_photo'] = $image_name;
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
    public function uploadUpdatemobile(Request $request, $id)
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
        $path = 'assets/images/products/' . $image_name;
        file_put_contents($path, $image);
        if ($data->mobile_photo != null) {
            if (file_exists(public_path() . '/assets/images/products/' . $data->mobile_photo)) {
                unlink(public_path() . '/assets/images/products/' . $data->mobile_photo);
            }
        }
        $input['mobile_photo'] = $image_name;
        $data->update($input);

        return response()->json(['status' => true, 'file_name' => $image_name]);
    }

    //*** POST Request
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


        // $image = $request->hover_photo;
        // list($type, $image) = explode(';', $image);
        // list(, $image)      = explode(',', $image);
        // $image = base64_decode($image);
        // $image_name = time().str_random(8).'.png';
        // $path = 'assets/images/products/'.$image_name;
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
        $input['slug'] = str_replace(' ', '-', $input['name']);
        $input['slug_ar'] = preg_replace('/\s+/', '-', $input['name_ar']);
        $input['products'] = !empty($input['products']) ?  json_encode($input['products']) :  json_encode([]);
        $input['projects'] = !empty($input['projects']) ? json_encode($input['projects']) :  json_encode([]);

        if (!empty($request->facebook_pixel)) {
            $input['facebook_pixel'] = $request->facebook_pixel;
        }

        // Save Data
        $data->fill($input)->save();



        // Add To Gallery If any
        $lastid = $data->id;
        if ($files = $request->file('gallery')) {
            foreach ($files as  $key => $file) {
                if (in_array($key, $request->galval)) {
                    $gallery = new Gallery;
                    $name = time() . $file->getClientOriginalName();
                    $file->move('assets/images/galleries', $name);
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
                    $file->move('assets/images/galleries', $name);
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


        return view('admin.product.edit.physical', compact('cats', 'locations', 'types', 'works', 'data', 'sign', 'pro', 'Related', 'brands'));
    }
    public function mobileedit($id)
    {

        $pro = Product::where('status', '=', 1)->orderBy('id', 'desc')->get();
        $Related = Related::where('product_id', '=', $id)->orderBy('id', 'desc')->get();
        $cats = Category::all();
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default', '=', 1)->first();



        return view('admin.mobilesetting.product.edit', compact('cats', 'data', 'sign', 'pro', 'Related', 'colors'));
    }

    //*** POST Request
    public function mobileupdate(Request $request, $id)
    {
        // return $request;


        //-- Logic Section
        $data = Product::findOrFail($id);

        $input = $request->all();


        /* $data->update($input);*/
        //-- Logic Section Ends




        //--- Redirect Section
        $msg = 'Product Updated Successfully.<a href="' . route('admin-prod-index') . '">View Product Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
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


    //*** GET Request
    public function feature($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.product.highlight', compact('data'));
    }

    //*** POST Request
    public function featuresubmit(Request $request, $id)
    {
        //-- Logic Section
        $data = Product::findOrFail($id);
        $input = $request->all();
        if ($request->featured == "") {
            $input['featured'] = 0;
        }
        if ($request->hot == "") {
            $input['hot'] = 0;
        }
        if ($request->best == "") {
            $input['best'] = 0;
        }
        if ($request->top == "") {
            $input['top'] = 0;
        }
        if ($request->latest == "") {
            $input['latest'] = 0;
        }
        if ($request->big == "") {
            $input['big'] = 0;
        }
        if ($request->trending == "") {
            $input['trending'] = 0;
        }
        if ($request->sale == "") {
            $input['sale'] = 0;
        }
        if ($request->is_discount == "") {
            $input['is_discount'] = 0;
            $input['discount_date'] = null;
        }

        $data->update($input);
        //-- Logic Section Ends

        //--- Redirect Section

        $msg = trans('highlight');

        return response()->json([
            "status" =>  true,
            "msg" => $msg
        ], 200);

        // return response()->json($msg);
        //--- Redirect Section Ends

    }

    //*** GET Request
    public function relateddelete($id)
    {
        $related = Related::find($id);
        $related->delete();

        return redirect()->back();
    }

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




        if (!empty($data->photo)) {
            if (!filter_var($data->photo, FILTER_VALIDATE_URL)) {
                if (file_exists(public_path() . '/assets/images/products/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/products/' . $data->photo);
                }
            }
        }


        if (!empty($data->thumbnail)) {
            if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumbnail) && $data->thumbnail != "") {
                unlink(public_path() . '/assets/images/thumbnails/' . $data->thumbnail);
            }
        }

        if ($data->file != null) {
            if (file_exists(public_path() . '/assets/files/' . $data->file)) {
                unlink(public_path() . '/assets/files/' . $data->file);
            }
        }
        $data->delete();
        //--- Redirect Section
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
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

    public function ckeckall(Request $request)
    {

        if (!empty($request->input('selected_products'))) {


            $selected_products = explode(',', $request->input('selected_products'));



            $products = Product::whereIn('id', $selected_products)
                ->update(['status' => 0]);

            $msg = 'Products Deactivate Successfully.';
            //  return redirect()->back()->with('success',$msg);


            return response()->json([
                "status" =>  true,
                "msg" => $msg
            ], 200);
        } else {
            return redirect()->back();
        }
    }
    public function ckeckactivate(Request $request)
    {

        if (!empty($request->input('selected_products_activate'))) {


            $selected_products = explode(',', $request->input('selected_products_activate'));



            $products = Product::whereIn('id', $selected_products)
                ->update(['status' => 1]);

            $msg = 'Products activate Successfully.';
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back();
        }
    }
    public function ckeckcatalog(Request $request)
    {

        if (!empty($request->input('selected_products_catalog'))) {


            $selected_products = explode(',', $request->input('selected_products_catalog'));



            $products = Product::whereIn('id', $selected_products)
                ->update(['is_catalog' => 1]);

            $msg = 'Products add to Catalog Successfully.';
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back();
        }
    }
    public function ckeckdelete(Request $request)
    {

        if (!empty($request->input('selected_products_delete'))) {


            $selected_products = explode(',', $request->input('selected_products_delete'));



            $products = Product::whereIn('id', $selected_products)
                ->get();

            foreach ($products as $data) {
                if ($data->galleries->count() > 0) {
                    foreach ($data->galleries as $gal) {
                        if (file_exists(public_path() . '/assets/images/galleries/' . $gal->photo)) {
                            unlink(public_path() . '/assets/images/galleries/' . $gal->photo);
                        }
                        $gal->delete();
                    }
                }

                if ($data->reports->count() > 0) {
                    foreach ($data->reports as $gal) {
                        $gal->delete();
                    }
                }

                if ($data->ratings->count() > 0) {
                    foreach ($data->ratings  as $gal) {
                        $gal->delete();
                    }
                }

                if ($data->clicks->count() > 0) {
                    foreach ($data->clicks as $gal) {
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
            }


            $msg = 'Products deleted Successfully.';
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back();
        }
    }


    //*** GET Request
    public function ckeckfeature()
    {

        return view('admin.product.highlight2');
    }


    public function ckeckfeatures(Request $request)
    {

        if (!empty($request->input('selected_products_feature'))) {


            $selected_products = explode(',', $request->input('selected_products_feature'));



            $products = Product::whereIn('id', $selected_products)
                ->get();

            foreach ($products as $data) {
                $input = $request->all();
                if ($request->featured == "") {
                    $input['featured'] = 0;
                }
                if ($request->hot == "") {
                    $input['hot'] = 0;
                }
                if ($request->best == "") {
                    $input['best'] = 0;
                }
                if ($request->top == "") {
                    $input['top'] = 0;
                }
                if ($request->latest == "") {
                    $input['latest'] = 0;
                }
                if ($request->big == "") {
                    $input['big'] = 0;
                }
                if ($request->trending == "") {
                    $input['trending'] = 0;
                }
                if ($request->sale == "") {
                    $input['sale'] = 0;
                }
                if ($request->is_discount == "") {
                    $input['is_discount'] = 0;
                    $input['discount_date'] = null;
                }

                $data->update($input);
            }


            $msg = 'Products HightLight Successfully.';
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function randsku()
    {
        $sku = str_random(3) . substr(time(), 6, 8) . str_random(3);
        return $sku;
    }



    public function AddNotifyTOUsers()
    {

        $pro      = Product::where('status', 1)->get();
        $cities   = Zone::orderBy('id', 'desc')->get();
        return view('admin.ProductNotify.create', compact('pro', 'cities'));
    }


    public function StoreNotifyTOUsers(Request $request)
    {

        if ($request->product_id  && $request->zone_id) {

            $interest_array1 = $request->product_id;

            $interest_array2 = $request->zone_id;

            $array_len1 = count($interest_array1);
            $array_len2 = count($interest_array2);


            if ($array_len1 == $array_len2) {

                $prodsnotify = ProductNotify::all();

                if (!empty($prodsnotify)) {

                    foreach ($prodsnotify  as $notfiy) {
                        $notfiy->delete();
                    }
                }

                for ($i = 0; $i < $array_len1; $i++) {

                    $related = new ProductNotify();
                    $related->product_id = $interest_array1[$i];
                    $related->zone_id = $interest_array2[$i];


                    $related->save();
                }


                $msg = trans('data Save Successfully');
                return response()->json([
                    'status' => true,
                    'msg'   =>  $msg
                ], 200);
            } else {


                $msg = trans('The num of products must be equal to num of citites');
                return response()->json([
                    'status' => false,
                    'msg'   =>  $msg
                ], 200);
            }
        } // endif



    }
}
