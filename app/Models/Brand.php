<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','name_ar','slug','slug_ar','photo','is_featured','image','meta_keys','meta_keys_ar','meta_description','meta_description_ar','title','title_ar','video'];
    public $timestamps = false;

     public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
