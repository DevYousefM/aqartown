<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\GenerateRandomName;
use Illuminate\Support\Facades\Input;
use Validator;

class BlogController extends Controller
{
    use GenerateRandomName;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Blog::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('photo', function (Blog $data) {
                $photo = $data->photo ? url('public/assets/images/blogs/' . $data->photo) : url('public/assets/images/noimage.png');
                return '<img src="' . $photo . '" alt="Image">';
            })
            ->addColumn('action', function (Blog $data) {
                return '<div class="action-list"><a  href="' . route('admin-blog-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-blog-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['photo', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.blog.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = BlogCategory::all();
        return view('admin.blog.create', compact('cats'));
    }

    public function store(Request $request)
    {
        $rules = [
            'photo' => 'required|mimes:jpeg,webp,jpg,png,svg',
            'title' => 'required',
            'title_ar' => 'required',
        ];

        $messages = [
            'photo.mimes' => trans('ImgMimes'),
            'title.required' => trans('Title') . '  ' . trans('required'),
            'title_ar.required' => trans('Arabic Title') . '  ' . trans('required'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }

        $data = new Blog();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = $this->generateRandomName($file);
            $file->move('public/assets/images/blogs', $name);
            $input['photo'] = $name;
        }
        if ($file2 = $request->file('image')) {
            $name2 = $name = $this->generateRandomName($file2);
            $file2->move('public/assets/images/blogs', $name2);
            $input['image'] = $name2;
        }
        if (!empty($request->meta_tag)) {
            $input['meta_tag'] = implode(',', $request->meta_tag);
        }
        if (!empty($request->tags)) {
            $input['tags'] = implode(',', $request->tags);
        }
        if (!empty($request->facebook_pixel)) {
            $input['facebook_pixel'] = $request->facebook_pixel;
        }
        if ($request->secheck == "") {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }

        $input['slug'] = str_replace(' ', '-', $input['slug']);
        $data->fill($input)->save();

        $msg = trans('Add Success');
        return response()->json([
            'status' => true,
            'msg' => $msg
        ], 200);
    }

    public function edit($id)
    {
        $cats = BlogCategory::all();
        $data = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('data', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'photo' => 'mimes:jpeg,webp,jpg,png,svg',
            'title' => 'required',
            'title_ar' => 'required',
        ];

        $messages = [
            'photo.mimes' => trans('ImgMimes'),
            'title.required' => trans('Title') . '  ' . trans('required'),
            'title_ar.required' => trans('Arabic Title') . '  ' . trans('required'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),

            ], 200);
        }

        $data = Blog::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = $this->generateRandomName($file);
            $file->move('public/assets/images/blogs', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/public/assets/images/blogs/' . $data->photo)) {
                    unlink(public_path() . '/public/assets/images/blogs/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        if ($file2 = $request->file('image')) {
            $name2 = $this->generateRandomName($file2);
            $file2->move('public/assets/images/blogs', $name2);
            if ($data->image != null) {
                if (file_exists(public_path() . '/public/assets/images/blogs/' . $data->image)) {
                    unlink(public_path() . '/public/assets/images/blogs/' . $data->image);
                }
            }
            $input['image'] = $name2;
        }
        if (!empty($request->meta_tag)) {
            $input['meta_tag'] = implode(',', $request->meta_tag);
        } else {
            $input['meta_tag'] = null;
        }
        if (!empty($request->tags)) {
            $input['tags'] = implode(',', $request->tags);
        } else {
            $input['tags'] = null;
        }
        if (!empty($request->facebook_pixel)) {
            $input['facebook_pixel'] = $request->facebook_pixel;
        }
        if ($request->secheck == "") {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }
        $input['slug'] = str_replace(' ', '-', $input['slug']);
        $data->update($input);

        $msg = trans('Update Success');


        return response()->json([
            'status' => true,
            'msg' => $msg
        ], 200);
    }

    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        //If Photo Doesn't Exist
        if ($data->photo == null) {
            $data->delete();
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);
        }
        //If Photo Exist
        if (file_exists(public_path() . '/public/assets/images/blogs/' . $data->photo)) {
            unlink(public_path() . '/public/assets/images/blogs/' . $data->photo);
        }
        $data->delete();
        $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
        ], 200);
    }
}
