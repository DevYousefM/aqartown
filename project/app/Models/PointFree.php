<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointFree extends Model
{
    protected $fillable = ['code', 'type', 'price', 'times', 'days','limited','user_id','photo','points','product_id'];
    protected $table  = 'point_free';
    public $timestamps = false;
    
    
    
     public function upload($name,$file,$oldname)
    {
                $file->move('public/assets/images/coupon/',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/coupon/'.$oldname)) {
                        unlink(public_path().'/assets/images/coupon/'.$oldname);
                    }
                }  
    }
}
