<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Product;

class InfoController extends Controller
{

    use GetLang;

    public function products()
    {
        $products = Product::limit(6)->get();

        return response()->json($products);
    }
}
