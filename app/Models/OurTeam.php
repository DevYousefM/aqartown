<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    protected $fillable = ['name_ar','title','details','title_ar','details_ar','photo','name','facebook','twiter','linkedin'];
    protected $table = 'our_teams';
    public $timestamps = false;
}
