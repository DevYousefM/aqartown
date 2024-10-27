<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';
    protected $fillable = array('name', 'name_ar', 'country_id', 'zone_id', 'auther', 'workshop', 'time', 'details', 'details_ar', 'photo');
    public $timestamps = false;

    public function date()
    {
        return $this->belongsTo('App\Models\Country');
    }


    public function images()
    {
        return $this->hasMany('App\Models\City');
    }

    public function upload($name, $file, $oldname)
    {
        $file->move('public/assets/images/gallery/', $name);
        if ($oldname != null) {
            if (file_exists(public_path() . '/assets/images/gallery/' . $oldname)) {
                unlink(public_path() . '/assets/images/gallery/' . $oldname);
            }
        }
    }
}
