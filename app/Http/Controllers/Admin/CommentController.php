<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller
{
	public function __construct()
	    {
	        $this->middleware('auth:admin');
	    }

	    //*** JSON Request
	    public function datatables()
	    {
	         $datas = Comment::orderBy('id')->get();
	         //--- Integrating This Collection Into Datatables
	         return Datatables::of($datas)
	                            ->addColumn('blog', function(Comment $data) {
	                                if(!empty($data->blog->title)){
	                                    
	                                      $name = strlen(strip_tags($data->blog->title)) > 50 ? substr(strip_tags($data->blog->title),0,50).'...' : strip_tags($data->blog->title);
	                                $product = '<a href="'.route('front.blogshow',['lang'=> 'en','id'=> $data->blog->slug]).'" target="_blank">'.$name.'</a>';
	                                    
	                                }else{
	                                    
	                                   $product = "blog deleted" ;
	                                }
	                              
	                                return $product;
	                            })

	                            ->addColumn('text', function(Comment $data) {
	                                $text = strlen(strip_tags($data->text)) > 250 ? substr(strip_tags($data->text),0,250).'...' : strip_tags($data->text);
	                                return $text;
	                            })
	                            ->addColumn('action', function(Comment $data) {
	                                return '<div class="action-list"><a data-href="' . route('admin-comment-show',$data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i>Details</a><a href="javascript:;" data-href="' . route('admin-comment-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
	                            }) 
	                            ->rawColumns(['blog','action'])
	                            ->toJson(); //--- Returning Json Data To Client Side
	    }
	    //*** GET Request
	    public function index()
	    {
	        return view('admin.comment.index');
	    }

	    //*** GET Request
	    public function show($id)
	    {
	        $data = Comment::findOrFail($id);
	        return view('admin.comment.show',compact('data'));
	    }


	    //*** GET Request Delete
		public function destroy($id)
		{
		    $comment = Comment::findOrFail($id);
		    if($comment->replies->count() > 0)
		    {
		        foreach ($comment->replies as $reply) {
		            $reply->delete();
		        }
		    }
		    $comment->delete();
		    //--- Redirect Section     
		   $msg = trans('Delete Msg');
        return response()->json([
            'status' => true,
            'msg'   =>  $msg
            ],200);  
		    //--- Redirect Section Ends    
		}
}