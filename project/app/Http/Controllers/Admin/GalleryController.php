<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Product;
use Image;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        if (count($prod->galleries)) {
            $data[0] = 1;
            $data[1] = $prod->galleries;
        }
        return response()->json($data);
    }
    public function mobileshow()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $prod = Category::findOrFail($id);
        if (count($prod->mobilegalleries)) {
            $data[0] = 1;
            $data[1] = $prod->mobilegalleries;
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = null;
        $lastid = $request->category_id;
        $proid = $request->product_id;
        if ($files = $request->file('gallery')) {
            foreach ($files as  $key => $file) {
                $val = $file->getClientOriginalExtension();
                if ($val == 'jpeg' || $val == 'jpg' || $val == 'png' || $val == 'svg') {
                    $gallery = new Gallery;


                    $img = Image::make($file->getRealPath())->resize(800, 800);
                    $thumbnail = time() . str_random(8) . '.jpg';
                    $img->save(public_path() . '/assets/images/galleries/' . $thumbnail);

                    $gallery['photo'] = $thumbnail;
                    $gallery['category_id'] = $lastid;
                    $gallery['product_id'] = $proid;
                    $gallery->save();
                    $data[] = $gallery;
                }
            }
        }
        return response()->json($data);
    }

    public function storemobile(Request $request)
    {
        $data = null;
        $lastid = $request->category_id;
        $proid = $request->product_id;
        if ($files = $request->file('gallery')) {
            foreach ($files as  $key => $file) {
                $val = $file->getClientOriginalExtension();
                if ($val == 'jpeg' || $val == 'jpg' || $val == 'png' || $val == 'svg') {
                    $gallery = new Gallery;


                    $img = Image::make($file->getRealPath())->resize(800, 800);
                    $thumbnail = time() . str_random(8) . '.jpg';
                    $img->save(public_path() . '/assets/images/galleries/' . $thumbnail);

                    $gallery['photo'] = $thumbnail;
                    $gallery['category_id'] = $lastid;
                    $gallery['product_id'] = $proid;
                    $gallery['web'] = 0;
                    $gallery->save();
                    $data[] = $gallery;
                }
            }
        }
        return response()->json($data);
    }

    public function destroy()
    {

        $id = $_GET['id'];
        $gal = Gallery::findOrFail($id);
        if (file_exists(public_path() . '/assets/images/galleries/' . $gal->photo)) {
            unlink(public_path() . '/assets/images/galleries/' . $gal->photo);
        }
        $gal->delete();
    }
}
