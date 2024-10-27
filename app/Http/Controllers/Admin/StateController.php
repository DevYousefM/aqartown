<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Carbon\Carbon;
use App\Models\Zone;
use App\Models\Country;
use App\Models\City;
use App\Models\Feature;
use App\Models\Piece;
use App\Models\Product;
use App\Models\Propiece;
use App\Models\Free;
use App\Models\Profree;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = City::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)

            ->editColumn('state_id', function (City $data) {
                $country =  Country::where('id', $data->country_id)->pluck('country_name');

                return $country;
            })
            ->editColumn('photo', function (City $data) {

                $photo = '<div class=""><img style="width: 85px;" src="' . url('public/assets/images/gallery', $data->photo) . '"  ></div>';
                return  $photo;
            })->addColumn('status', function (City $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-state-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . __('Activated') . '</option><<option data-val="0" value="' . route('admin-state-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . __('Deactivated') . '</option>/select></div>';
            })
            ->addColumn('action', function (City $data) {
                return '<div class="action-list"><a data-href="' . route('admin-state-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>' . __('Edit') . '</a><a href="javascript:;" data-href="' . route('admin-state-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['status', 'action', 'photo'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {

        return view('admin.state.index');
    }

    //*** GET Request
    public function create()
    {

        return view('admin.state.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $data = new City();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $data->upload($name, $file, $data->photo);
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

        $data = City::findOrFail($id);
        return view('admin.state.edit', compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {



        //--- Validation Section Ends

        //--- Validation Section Ends

        //--- Logic Section
        $data = City::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $data->upload($name, $file, $data->photo);
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
    //*** GET Request Status
    public function status($id1, $id2)
    {
        $data = City::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }


    //*** GET Request Delete
    public function destroy($id)
    {
        $data = City::findOrFail($id);
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
