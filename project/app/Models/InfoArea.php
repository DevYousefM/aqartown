<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoArea extends Model
{
    use HasFactory;
    protected $table = 'info_areas';
    protected $guarded = [];
    public $timestamps = false;

}
