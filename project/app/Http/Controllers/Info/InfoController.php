<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public function products(Request $request)
    {
        $products = Product::where('status', 1)->latest()->limit(6)->get();
        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $request->lang == 'ar' ? $product->name_ar : $product->name,
                'image' => url('assets/images/products/' . $product->photo),
                'url' => route('front.product', ['slug' => $request->lang == 'ar' ? $product->slug_ar : $product->slug, 'lang' => $request->lang]),
                'price' => $product->price
            ];
        });
        return response()->json($products);
    }
}
