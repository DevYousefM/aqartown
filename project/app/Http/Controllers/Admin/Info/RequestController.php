<?php

namespace App\Http\Controllers\Admin\Info;

use App\Http\Controllers\Controller;
use App\Models\InfoRequests;
use Illuminate\Http\Request;
use DataTables;

class RequestController extends Controller
{
    public function index()
    {
        return view('admin.info.requests.index');
    }
    public function datatables()
    {
        $datas = InfoRequests::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('notes', function (InfoRequests $data) {
                $cleanNotes = strip_tags($data->notes);

                $cleanNotes = htmlspecialchars($cleanNotes, ENT_QUOTES);

                $cleanNotes = preg_replace('/[^\p{L}\p{N}\s]/u', '', $cleanNotes); // Allows letters, numbers, and spaces

                return "<div class='action-list'>
                <a href='javascript:;' onclick='fillNotes(\"$cleanNotes\")'>
                    <i class='fas fa-eye'></i>
                </a>
            </div>";
            })
            ->editColumn('type', function ($data) {
                return __('admin.' . $data->type);
            })
            ->addColumn('action', function (InfoRequests $data) {
                return '<div class="action-list"></a><a href="javascript:;" data-href="' . route('admin-info-requests-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['notes', 'action'])
            ->toJson();
    }
    public function destroy($id)
    {
        $data = InfoRequests::findOrFail($id);
        $data->delete();
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
    }
}
