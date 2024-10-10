<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\InfoArea;
use App\Models\InfoBudget;
use Illuminate\Http\Request;

class InfoRequestController extends Controller
{
    public function store(Request $request)
    {
        // type
        // name
        // area
        // budget
        // time to call
        // phone
        // notes
        // $request->validate([
        //     'type' => 'required|in:search,show',
        //     'name' => 'required|max:255',
        //     'area_id' => 'required|exists:info_areas,id',
        //     'budget_id' => 'required|exists:info_budgets,id',
        // ]);
        return $request;
    }
    public function info_areas(Request $request)
    {
        $info_areas = InfoArea::all();
        return response()->json($info_areas);
    }
    public function info_budgets(Request $request)
    {
        $info_budgets = InfoBudget::all();
        return response()->json($info_budgets);
    }
}
