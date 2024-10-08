<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
        use SoftDeletes;
        
    protected $fillable = ['category_id','name','name_ar','slug','photo','slug_ar','tags','tags_ar','meta_tag','meta_description_ar','meta_description','title','title_ar','details','details_ar','facebook_pixel'];
    public $timestamps = false;

    public function childs()
    {
    	return $this->hasMany('App\Models\Childcategory')->where('status','=',1);
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product')->where('status','=',1);
    }
 public function productss()
    {
        return $this->hasMany('App\Models\Product')->where('status','=',1)->orderby('id','desc')->take(6);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }

    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributable');
    }



}
