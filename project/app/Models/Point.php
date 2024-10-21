<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['code', 'type', 'price', 'times', 'days', 'limited', 'user_id', 'photo', 'points'];
    public $timestamps = false;



    public function upload($name, $file, $oldname)
    {
        $file->move('public/assets/images/coupon/', $name);
        if ($oldname != null) {
            if (file_exists(public_path() . '/public/assets/images/coupon/' . $oldname)) {
                unlink(public_path() . '/public/assets/images/coupon/' . $oldname);
            }
        }
    }
}
