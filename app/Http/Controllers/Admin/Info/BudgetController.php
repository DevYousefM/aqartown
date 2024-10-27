<?php

namespace App\Http\Controllers\Admin\Info;

use App\Http\Controllers\Controller;
use App\Models\InfoBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class BudgetController extends Controller
{
    public function index()
    {
        return view('admin.info.budgets.index');
    }
    public function create()
    {
        return view('admin.info.budgets.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'budget_name' => 'required|unique:info_budgets,name',
            'budget_name_ar' => 'required|unique:info_budgets,name_ar',
        ];
        $messages = [
            'budget_name.unique' => trans('nameUnique'),
            'budget_name.required' => trans('Budget Name') . '    ' . trans('required'),
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
        $info_area = new InfoBudget();
        $info_area->name = $request->budget_name;
        $info_area->name_ar = $request->budget_name_ar;
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
        $datas = InfoBudget::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)

            ->addColumn('status', function (InfoBudget $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-info-budgets-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . __('Activated') . '</option><<option data-val="0" value="' . route('admin-info-budgets-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . __('Deactivated') . '</option>/select></div>';
            })->addColumn('default', function (InfoBudget $data) {

                $default = $data->is_default == 1 ? '<a><i class="fa fa-check"></i> Default</a>' : '<a class="status" data-href="' . route('admin-country-default', ['id1' => $data->id, 'id2' => 1]) . '">SetDefault</a>';
                return '<div class="action-list">' . $default . '</div>';
            })
            ->addColumn('checkbox', function (InfoBudget $data) {
                return '<div class="">
                                <label class="container">
                                <input type="checkbox" name="id[' . $data->id . '][]" value="' . $data->id . '" class="all row-select">
                                 <span class="checkmark" style="top: -27px;"></span>
                               </label>
                                </div>';
            })
            ->addColumn('action', function (InfoBudget $data) {
                return '<div class="action-list"><a data-href="' . route('admin-info-budgets-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>' . __('Edit') . '</a><a href="javascript:;" data-href="' . route('admin-info-budgets-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['status', 'default', 'checkbox', 'action'])
            ->toJson();
    }
    public function destroy($id)
    {
        $data = InfoBudget::findOrFail($id);
        $data->delete();
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
    }
    public function edit($id)
    {
        $data = InfoBudget::findOrFail($id);
        return view('admin.info.budgets.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'budget_name'                           => 'unique:info_budgets,name,' . $id . '|required',
            'budget_name_ar'                        => 'unique:info_budgets,name_ar,' . $id . '|required',
        ];
        $messages = [
            'budget_name.unique'                    => trans('nameUnique'),
            'budget_name.required'                  => trans('Budget Name') . '    ' . trans('required'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),
            ], 200);
        }

        $data = InfoBudget::findOrFail($id);

        $data->update([
            'name' => $request->budget_name,
            'name_ar' => $request->budget_name_ar,
        ]);

        $msg = trans('Update Success');

        return response()->json([
            'status'  => true,
            'msg'   =>   $msg
        ], 200);
    }
    public function status($id1, $id2)
    {
        $data = InfoBudget::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
}
