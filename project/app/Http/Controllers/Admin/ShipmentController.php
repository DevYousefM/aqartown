<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Shipment;
use App\Models\Product;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ShipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Shipment::all();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('shipping_tax', function (Shipment $data) {

                $price = $data->shipping_tax . "%";
                return  $price;
            })
            ->addColumn('action', function (Shipment $data) {
                return '<div class="action-list"><a data-href="' . route('admin-shipment-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-shipment-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.shipment.index');
    }

    //*** GET Request
    public function create()
    {
        $sign = Currency::where('is_default', '=', 1)->first();
        $pro = Product::get();
        return view('admin.shipment.create', compact('sign', 'pro'));
    }

    //*** POST Request
    public function store(Request $request)
    {


        $rules = [


            'photo'                                    => 'mimes:jpeg,webp,jpg,png,svg',




        ];
        $messages = [




            'photo.mimes'                               => trans('ImgMimes'),




        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }


        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $data = new Shipment();
        $input = $request->all();


        /* if(!empty($request->desc)){
            if(in_array(null, $request->desc) )
            {
                $input['desc'] = null;
                $input['desc_ar'] = null;



            }
            else
            {
                $input['desc'] = implode(',', str_replace(',',' ',$request->desc));
                $input['desc_ar'] = implode(',', str_replace(',',' ',$request->desc_ar));



            }
        }*/
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
        $sign = Currency::where('is_default', '=', 1)->first();
        $data = Shipment::findOrFail($id);
        $pro = Product::get();
        return view('admin.shipment.edit', compact('data', 'sign', 'pro'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section


        $rules = [


            'photo'                                    => 'mimes:jpeg,webp,jpg,png,svg',




        ];
        $messages = [


            'photo.mimes'                               => trans('ImgMimes'),




        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Shipment::findOrFail($id);
        $input = $request->all();


        /*        if(!empty($request->desc)){
            if(in_array(null, $request->desc) )
            {
                $input['desc'] = null;
                $input['desc_ar'] = null;



            }
            else
            {
                $input['desc'] = implode(',', str_replace(',',' ',$request->desc));
                $input['desc_ar'] = implode(',', str_replace(',',' ',$request->desc_ar));



            }
        }*/
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
        $data = Shipment::findOrFail($id);
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
