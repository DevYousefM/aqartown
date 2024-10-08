<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['blog_id', 'user_id','text','title','phone','name','email'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function blog()
    {
    	return $this->belongsTo('App\Models\Blog');
    }

	public function replies()
	{
	     return $this->hasMany('App\Models\Reply');
	}

}
