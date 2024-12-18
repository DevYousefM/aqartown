<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{

    public function products(Request $request)
    {
        $products = Product::where('status', 1)->latest()->limit(6)->get();
        $products = $products->map(function ($product) use ($request) {
            return [
                'id' => $product->id,
                'name' => $request->lang == 'ar' ? $product->name_ar : $product->name,
                'image' => url('public/assets/images/products/' . $product->photo),
                'url' => route('front.product', ['slug' => $request->lang == 'ar' ? $product->slug_ar : $product->slug, 'lang' => $request->lang]),
                'price' => $product->price
            ];
        });
        return response()->json($products);
    }

    public function subcategories(Request $request)
    {
        $subcategories = Subcategory::where('status', 1)->limit(4)->get();
        $subcategories = $subcategories->map(function ($subcategory) use ($request) {
            return [
                'id' => $subcategory->id,
                'name' => $request->lang == 'ar' ? $subcategory->name_ar : $subcategory->name,
                'image' => url('public/assets/images/subcategories/' . $subcategory->photo),
                'url' => route('front.category', ['category' => $request->lang == 'en' ? $subcategory->category->slug : $subcategory->category->slug_ar, 'subcategory' => $request->lang == 'en' ? $subcategory->slug : $subcategory->slug_ar, 'lang' => $request->lang]),
            ];
        });
        return response()->json($subcategories);
    }
    public function latestworks(Request $request)
    {
        $images = DB::table('ads')->orderby('id', 'desc')->get();
        $images = $images->map(function ($image) use ($request) {
            return [
                'id' => $image->id,
                'title' => $request->lang == 'ar' ? $image->title_ar : $image->title,
                'image' => url('public/assets/images/ads/' . $image->photo),
            ];
        });
        return response()->json($images);
    }
}
