<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Product;

class InfoController extends Controller
{

    public function products()
    {
        $products = Product::where('status', 1)->latest()->limit(6)->get();

        return response()->json($products);
    }
}
