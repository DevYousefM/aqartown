<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['product_id','photo','category_id'];
    public $timestamps = false;
}
