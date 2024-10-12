<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\InfoArea;
use App\Models\InfoBudget;
use App\Models\InfoRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InfoRequestController extends Controller
{
    public function store(Request $request)
    {
        $lang = $request->lang ?? 'ar';
        App::setLocale($lang);
        $rules_ar = [
            'area.required' => 'يجب تحديد المنطقة',
            'budget.required' => 'يجب تحديد الميزانية',
            'area.exists' => 'المنطقة غير موجودة',
            'budget.exists' => 'الميزانية غير موجودة',
            'time_to_call.in' => 'يجب تحديد وقت التواصل',
            'phone.required' => 'يجب تحديد رقم الهاتف',
            'type.required' => 'يجب تحديد نوع الطلب',
            'type.in' => 'يجب تحديد نوع الطلب',
            'name.required' => 'يجب تحديد الاسم',
            'name.max' => 'يجب الا يزيد الاسم عن 255 حرف',
        ];
        $rules_en = [
            'area.required' => 'the area is required',
            'budget.required' => 'the budget is required',
            'area.exists' => 'the area not found',
            'budget.exists' => 'the budget not found',
        ];
        $data = Validator::make($request->all(), [
            'type' => 'required|in:search,show',
            'name' => 'required|max:255',
            'area' => 'required|exists:info_areas,id',
            'budget' => 'required|exists:info_budgets,id',
            'time_to_call' => ['required', Rule::in(['من 1 الي 3', 'من 5 الي 8'])],
            'phone' => 'required',
            'notes' => 'nullable|max:1000',
        ], $lang == 'ar' ? $rules_ar : $rules_en);

        if ($data->fails()) {
            return response()->json(['status' => false, 'msg' => $data->errors()->first()], 200);
        }

        $area = InfoArea::find($request->area);
        $budget = InfoBudget::find($request->budget);
        InfoRequests::create([
            'type' => $request->type,
            'name' => $request->name,
            'area'  => $area->name_ar,
            'budget'  => $budget->name_ar,
            'time_to_call' => $request->time_to_call,
            'phone' => $request->phone,
            'notes' => $request->notes,
        ]);
        return response()->json(['status' => true, 'msg' => $lang == 'ar' ? 'تم ارسال طلبك بنجاح' : 'Your request has been sent'], 200);
    }
    public function info_areas(Request $request)
    {
        $lang = $request->lang ?? 'ar';
        $info_areas = InfoArea::all()->map(function ($area) use ($lang) {
            return [
                'id' => $area->id,
                'name' => $lang === 'ar' ? $area->name_ar : $area->name,
            ];
        });
        return response()->json($info_areas);
    }
    public function info_budgets(Request $request)
    {
        $lang = $request->lang ?? 'ar';
        $info_budgets = InfoBudget::all()->map(function ($budget) use ($lang) {
            return [
                'id' => $budget->id,
                'name' => $lang === 'ar' ? $budget->name_ar : $budget->name,
            ];
        });
        return response()->json($info_budgets);
    }
}
