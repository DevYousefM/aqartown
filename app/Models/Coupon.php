<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'price', 'times', 'start_date', 'end_date', 'limited', 'user_id', 'photo', 'category_id', 'subcat_id', 'childcat_id', 'brand_id'];
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
