<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class InfoController extends Controller
{
    public function index()
    {
        return view('admin.info.areas.index');
    }
    public function create()
    {
        return view('admin.info.areas.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'area_name' => 'required|unique:info_areas,name',
            'area_name_ar' => 'required|unique:info_areas,name_ar',
        ];
        $messages = [
            'area_name.unique' => trans('nameUnique'),
            'area_name.required' => trans('Area Name') . '    ' . trans('required'),
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
        $info_area = new InfoArea();
        $info_area->name = $request->area_name;
        $info_area->name_ar = $request->area_name_ar;
        $info_area->save();
        //--- Redirect Section        
        $msg = trans('Add Success');


        return response()->json([
            'status' => true,
            'msg'   => $msg

        ], 200);
        //--- Redirect Section Ends   
    }
    public function datatables()
    {
        $datas = InfoArea::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)

            ->addColumn('status', function (InfoArea $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-info-areas-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . __('Activated') . '</option><<option data-val="0" value="' . route('admin-info-areas-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . __('Deactivated') . '</option>/select></div>';
            })->addColumn('default', function (InfoArea $data) {

                $default = $data->is_default == 1 ? '<a><i class="fa fa-check"></i> Default</a>' : '<a class="status" data-href="' . route('admin-country-default', ['id1' => $data->id, 'id2' => 1]) . '">SetDefault</a>';
                return '<div class="action-list">' . $default . '</div>';
            })
            ->addColumn('checkbox', function (InfoArea $data) {
                return '<div class="">
                                <label class="container">
                                <input type="checkbox" name="id[' . $data->id . '][]" value="' . $data->id . '" class="all row-select">
                                 <span class="checkmark" style="top: -27px;"></span>
                               </label>
                                </div>';
            })
            ->addColumn('action', function (InfoArea $data) {
                return '<div class="action-list"><a data-href="' . route('admin-info-areas-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>' . __('Edit') . '</a><a href="javascript:;" data-href="' . route('admin-info-areas-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['status', 'default', 'checkbox', 'action'])
            ->toJson();
    }
    public function destroy($id)
    {
        $data = InfoArea::findOrFail($id);
        $data->delete();
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
    }
    public function edit($id)
    {
        $data = InfoArea::findOrFail($id);
        return view('admin.info.areas.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'area_name'                           => 'unique:info_areas,name,' . $id . '|required',
            'area_name_ar'                        => 'unique:info_areas,name_ar,' . $id . '|required',
        ];
        $messages = [
            'area_name.unique'                    => trans('nameUnique'),
            'area_name.required'                  => trans('Area Name') . '    ' . trans('required'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),
            ], 200);
        }

        $data = InfoArea::findOrFail($id);

        $data->update([
            'name' => $request->area_name,
            'name_ar' => $request->area_name_ar,
        ]);

        $msg = trans('Update Success');

        return response()->json([
            'status'  => true,
            'msg'   =>   $msg
        ], 200);
    }
    public function status($id1, $id2)
    {
        $data = InfoArea::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
}
