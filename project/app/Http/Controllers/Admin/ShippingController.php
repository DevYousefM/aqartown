<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Shipping;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        
        
         $datas = Shipping::all();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('price', function(Shipping $data) {
                                $sign = Currency::where('is_default','=',1)->first();
                                $price = $sign->sign . ($data->price * $sign->value);
                                return  $price;
                            })
                            ->addColumn('action', function(Shipping $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-shipping-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-shipping-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.shipping.index');
    }

    //*** GET Request
    public function create()
    {
        $sign = Currency::where('is_default','=',1)->first();
        return view('admin.shipping.create',compact('sign'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            
            'title'                                         => 'unique:shippings|required',
            'title_ar'                                      => 'unique:shippings|required',
            'subtitle'                                      => 'required',
            'price'                                         => 'required|numeric|min:0',
            
        ];
        
        $messages = [
             'title.unique'                                 => trans('Title') . '  '. trans('unique'),
             'title.required'                               => trans('Title') . '  '. trans('required'),   
             'title_ar.unique'                              => trans('Arabic Title') . '  '. trans('unique'),
             'title_ar.required'                            => trans('Arabic Title') . '  '. trans('required'), 
             'price.required'                                => trans('Price') .'    ' . trans('required'),
             'price.numeric'                                 => trans('Price') .'    ' . trans('numeric'),
             'price.min'                                     => trans('Price') .'    ' . trans('min'),
            
        ];
       
        $validator  = Validator::make($request->all(),$rules,$messages);
        
        
          if ($validator->fails()) {
            return response()->json([
                "status" =>  false,
                "errors" =>  $validator->messages(),
                ],200);
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Shipping();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $sign = Currency::where('is_default','=',1)->first();
        $data = Shipping::findOrFail($id);
        return view('admin.shipping.edit',compact('data','sign'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = ['title' => 'unique:shippings,title,'.$id];
        $rules = [
            
            'title'                                         => 'unique:shippings,title,'.$id. '|required',
            'title_ar'                                      => 'unique:shippings,title_ar,'.$id. '|required',
            'subtitle'                                      => 'required',
            'price'                                         => 'required|numeric|min:0',
            
        ];
        
        $customs = [
             'title.unique'                                 => trans('Title') . '  '. trans('unique'),
             'title.required'                               => trans('Title') . '  '. trans('required'),   
             'title_ar.unique'                              => trans('Arabic Title') . '  '. trans('unique'),
             'title_ar.required'                            => trans('Arabic Title') . '  '. trans('required'), 
             'price.required'                                => trans('Price') .'    ' . trans('required'),
             'price.numeric'                                 => trans('Price') .'    ' . trans('numeric'),
             'price.min'                                     => trans('Price') .'    ' . trans('min'),
            
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }       
        //--- Validation Section Ends

        //--- Logic Section
        $data = Shipping::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Shipping::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
