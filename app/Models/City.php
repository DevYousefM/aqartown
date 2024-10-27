<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = array('name', 'name_ar', 'status', 'zone_id', 'country_id', 'link', 'photo');
    public $timestamps = false;

    public function cat()
    {
        return $this->belongsTo('App\Models\Zone');
    }

    public function date()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function upload($name, $file, $oldname)
    {
        $file->move('assets/images/gallery/', $name);
        if ($oldname != null) {
            if (file_exists(public_path() . '/assets/images/gallery/' . $oldname)) {
                unlink(public_path() . '/assets/images/gallery/' . $oldname);
            }
        }
    }
}
