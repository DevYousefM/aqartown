<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Product;

class InfoController extends Controller
{

    public function products()
    {
        $products = Product::where('status', 1)->latest()->limit(6)->get();
        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'image' => url('assets/images/products/' . $product->photo),
                'url' => route('front.product', ['slug' => $product->slug_ar, 'lang' => 'ar']),
                'price' => $product->price
            ];
        });
        return response()->json($products);
    }
}
