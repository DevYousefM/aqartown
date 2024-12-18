<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Review::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('photo', function (Review $data) {
                $photo = $data->photo ? url('public/assets/images/reviews/' . $data->photo) : url('public/assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            ->addColumn('action', function (Review $data) {
                return '<div class="action-list"><a data-href="' . route('admin-review-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-review-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['photo', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.review.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.review.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        /*     $rules = [
               'photo'      => 'required|mimes:jpeg,webp,jpg,png,svg',
                ];

         $messages = [
             
               'photo.required' => trans('imgRequired'),
               'photo.mimes' => trans('ImgMimes'),
          
                   ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
          return response()->json([
              'status' =>false,
              'errors' => $validator->messages(),
              
              ],200);
        }*/
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Review();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/assets/images/reviews', $name);
            $input['photo'] = $name;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = trans('Add Success');


        return response()->json([
            'status' => true,
            'msg'   => $msg

        ], 200);
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Review::findOrFail($id);
        return view('admin.review.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        /*      $rules = [
               'photo'      => 'mimes:jpeg,webp,jpg,png,svg',
                ];

        $messages = [
             
               'photo.required' => trans('imgRequired'),
               'photo.mimes' => trans('ImgMimes'),
          
                   ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
          return response()->json([
              'status' =>false,
              'errors' => $validator->messages(),
              
              ],200);
        }*/
        //--- Validation Section Ends

        //--- Logic Section
        $data = Review::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/assets/images/reviews', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/reviews/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/reviews/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = trans('Update Success');


        return response()->json([

            'status'  => true,
            'msg'   =>   $msg

        ], 200);
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Review::findOrFail($id);
        //If Photo Doesn't Exist
        if ($data->photo == null) {
            $data->delete();
            //--- Redirect Section     
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path() . '/assets/images/reviews/' . $data->photo)) {
            unlink(public_path() . '/assets/images/reviews/' . $data->photo);
        }
        $data->delete();
        //--- Redirect Section     
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
        //--- Redirect Section Ends

        //--- Redirect Section Ends     
    }
}
