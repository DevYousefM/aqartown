<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class OurTeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = OurTeam::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('photo', function (OurTeam $data) {
                $photo = $data->photo ? url('public/assets/images/services/' . $data->photo) : url('public/assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            ->editColumn('title', function (OurTeam $data) {
                $title = strlen(strip_tags($data->title)) > 250 ? substr(strip_tags($data->title), 0, 250) . '...' : strip_tags($data->title);
                return  $title;
            })->editColumn('name', function (OurTeam $data) {
                $title = strlen(strip_tags($data->name)) > 250 ? substr(strip_tags($data->name), 0, 250) . '...' : strip_tags($data->name);
                return  $title;
            })
            ->editColumn('details', function (OurTeam $data) {
                $details = strlen(strip_tags($data->details)) > 250 ? substr(strip_tags($data->details), 0, 250) . '...' : strip_tags($data->details);
                return  $details;
            })
            ->addColumn('action', function (OurTeam $data) {
                return '<div class="action-list"><a data-href="' . route('admin-service-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-service-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['photo', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.service.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.service.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'required|mimes:jpeg,webp,jpg,png,svg',
        ];

        $messages  = [
            'photo.required' => trans('imgRequired'),
            'photo.mimes' => trans('ImgMimes'),

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new OurTeam();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/assets/images/services', $name);
            $input['photo'] = $name;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = trans('Add Success');


        return response()->json([

            'status'  => true,
            'msg'   =>   $msg

        ], 200);
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = OurTeam::findOrFail($id);
        return view('admin.service.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'mimes:jpeg,webp,jpg,png,svg',
        ];

        $messages  = [

            'photo.mimes' => trans('ImgMimes'),

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = OurTeam::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/assets/images/services', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/public/assets/images/services/' . $data->photo)) {
                    unlink(public_path() . '/public/assets/images/services/' . $data->photo);
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
        $data = OurTeam::findOrFail($id);
        //If Photo Doesn't Exist
        if ($data->photo == null) {
            $data->delete();
            //--- Redirect Section     
            $msg = trans('Delete Msg');
            return response()->json([
                'status' => true,
                'msg'   =>  $msg
            ], 200);
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path() . '/public/assets/images/services/' . $data->photo)) {
            unlink(public_path() . '/public/assets/images/services/' . $data->photo);
        }
        $data->delete();
        //--- Redirect Section     
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
        //--- Redirect Section Ends     
    }
}
