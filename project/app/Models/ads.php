<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    protected $table = 'ads';
    protected $fillable = ['title','title_ar','photo','image','linked','linked_id'];
    public $timestamps = false;
}
