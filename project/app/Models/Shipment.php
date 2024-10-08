<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model {

    /**
     * The dataFbase table used by the model.
     *
     * @var string
     */
    protected $table = 'shipment';
    protected $fillable = array('name', 'desc','name_ar','title','title_ar','desc_ar','active','facebook','photo','product_id');





     public function  speaker(){
        return $this->belongsTo('App\Models\Product');
    }


    
    public function setPhotoAttribute($image)
    {
        if ($image) {
            $dest = 'assets/images/speakers/';
            $name = str_random(6) . '_' . $image->getClientOriginalName();
            $image->move($dest, $name);
            $this->attributes['photo'] = $name;
        }
    }  
}
