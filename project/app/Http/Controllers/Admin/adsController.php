<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\ads;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\GenerateRandomName;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class adsController extends Controller
{
    use GenerateRandomName;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = ads::all();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('photo', function (ads $data) {
                $photo = $data->photo ? url('public/assets/images/ads/' . $data->photo) : url('public/assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            ->editColumn('image', function (ads $data) {
                $photo = $data->image ? url('public/assets/images/ads/' . $data->image) : url('public/assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            ->editColumn('title', function (ads $data) {
                $title = strlen(strip_tags($data->title)) > 250 ? substr(strip_tags($data->title), 0, 250) . '...' : strip_tags($data->title);
                return  $title;
            })
            ->addColumn('action', function (ads $data) {
                return '<div class="action-list"><a href="' . route('admin-ads-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a>
                                <a href="javascript:;" data-href="' . route('admin-ads-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete" ><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['photo', 'action', 'image'])
            ->toJson(); //--- Returning Json Data To Client Side
        // dd($datas);
    }
    public function datatables2()
    {
        $datas = ads::skip(3)->take(5)->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('photo', function (ads $data) {
                $photo = $data->photo ? url('public/assets/images/ads/' . $data->photo) : url('public/assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            ->editColumn('title', function (ads $data) {
                $title = strlen(strip_tags($data->title)) > 250 ? substr(strip_tags($data->title), 0, 250) . '...' : strip_tags($data->title);
                return  $title;
            })
            ->addColumn('action', function (ads $data) {
                return '<div class="action-list"><a href="' . route('admin-ads-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-ads-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['photo', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
        // dd($datas);
    }

    public function index()
    {
        return view('admin.ads.index');
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'photo' => 'required|mimes:jpeg,webp,jpg,png,svg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new ads();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = $this->generateRandomName($file);

            $file->move('public/assets/images/ads', $name);
            $input['photo'] = $name;
        }
        if ($file = $request->file('image')) {
            $name = $this->generateRandomName($file);
            $file->move('public/assets/images/ads', $name);
            $input['image'] = $name;
        }
        $data->fill($input)->save();

        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = ads::findOrFail($id);
        return view('admin.ads.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ads::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = $this->generateRandomName($file);
            $file->move('public/assets/images/ads', $name);
            if ($data->photo != null) {
                if (file_exists(public_path('/public/assets/images/ads/' . $data->photo))) {
                    unlink(public_path('/public/assets/images/ads/' . $data->photo));
                }
            }
            $input['photo'] = $name;
        }

        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/assets/images/ads', $name);
            if ($data->image != null) {
                if (file_exists(public_path() . '/public/assets/images/ads/' . $data->image)) {
                    unlink(public_path() . '/public/assets/images/ads/' . $data->image);
                }
            }
            $input['image'] = $name;
        }
        $data->update($input);

        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function destroy($id)
    {
        $data = ads::findOrFail($id);
        //If Photo Doesn't Exist
        if ($data->photo == null) {
            $data->delete();
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);
        }
        //If Photo Exist
        if (File::exists(public_path('/public/assets/images/ads/' . $data->photo))) {
            unlink(public_path('/public/assets/images/ads/' . $data->photo));
        }
        /*     
        if (file_exists(public_path().'/public/assets/images/ads/'.$data->image)) {
            unlink(public_path().'/public/assets/images/ads/'.$data->image);
        }*/
        $data->delete();
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }



    //         // Page Settings All post requests will be done in this method
    //     public function updatePageSliders(Request $request)
    //     {

    //         //--- Validation Section
    //   /*      $validator = Validator::make($request->all(), $this->rules,$this->customs);

    //         if ($validator->fails()) {
    //           return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
    //         }*/
    //         //--- Validation Section Ends

    //         $data = Pagesetting::findOrFail(1);
    //         $input = $request->all();

    //             if ($file = $request->file('best_seller_banner')) 
    //             {              
    //                 $name = time().$file->getClientOriginalName();
    //                 $data->upload($name,$file,$data->best_seller_banner);
    //                 $input['best_seller_banner'] = $name;
    //             }    
    //             if ($file = $request->file('big_save_banner')) 
    //             {              
    //                 $name = time().$file->getClientOriginalName();
    //                 $data->upload($name,$file,$data->big_save_banner);           
    //                 $input['big_save_banner'] = $name;
    //             } 

    //             if ($file = $request->file('best_seller_banner1')) 
    //             {              
    //                 $name = time().$file->getClientOriginalName();
    //                 $data->upload($name,$file,$data->best_seller_banner1);
    //                 $input['best_seller_banner1'] = $name;
    //             }    
    //             if ($file = $request->file('big_save_banner1')) 
    //             {              
    //                 $name = time().$file->getClientOriginalName();
    //                 $data->upload($name,$file,$data->big_save_banner1);           
    //                 $input['big_save_banner1'] = $name;
    //             } 


    //         $data->update($input);
    //         $msg = 'Data Updated Successfully.';
    //         return response()->json($msg);      
    //     }


}
