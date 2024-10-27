<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Generalsetting;
use App\Models\Currency;
use App\Models\Color;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'product_type',
        'free_ship', 'affiliate_link',
        'sku', 'slug_ar',
        'scale',
        'mobile_price',
        'brand_id',
        'subscription_type',
        'feature',
        'trial_period',
        'subscription_period',
        'subcategory_id',
        'childcategory_id',
        'id',
        'attributes',
        'name_ar',
        'name',
        'photo',
        'size',
        'size_qty',
        'size_price',
        'color',
        'mobile_photo',
        'mobile_details_ar',
        'mobile_details',
        'details_ar',
        'details',
        'price',
        'previous_price',
        'stock',
        'mobile_policy_ar',
        'mobile_policy',
        'policy_ar',
        'policy',
        'status',
        'views',
        'tags',
        'tags_ar',
        'featured',
        'best',
        'top',
        'hot',
        'latest',
        'big',
        'trending',
        'sale',
        'features',
        'colors',
        'product_condition',
        'ship',
        'meta_tag',
        'meta_tag_ar',
        'meta_description_ar',
        'meta_description',
        'youtube',
        'type',
        'file',
        'license',
        'license_qty',
        'link',
        'platform',
        'region',
        'licence_type',
        'measure',
        'discount_date',
        'is_discount',
        'whole_sell_qty',
        'whole_sell_discount',
        'catalog_id',
        'slug_ar',
        'slug',
        'hover_photo',
        'alt',
        'alt_ar',
        'title',
        'facebook_pixel',
        'title_ar',
        'time',
        'price_from',
        'date',
        'location',
        'open_time',
        'parking',
        'touch',
        'reg_link',
        'map',
        'location_id',
        'type_id',
        'range_id',
        'is_available',
    ];



    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function locations()
    {
        return $this->belongsTo('App\Models\Country', 'location_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\City', 'type_id');
    }

    public function range()
    {
        return $this->belongsTo('App\Models\Zone', 'range_id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }

    public function childcategory()
    {
        return $this->belongsTo('App\Models\Childcategory');
    }


    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }
    public function size()
    {
        return $this->hasMany('App\Models\Color');
    }
    public function speakers()
    {
        return $this->hasMany('App\Models\Shipment');
    }
    public function sizes()
    {
        return $this->hasMany('App\Models\Color');
    }
    public function mobilegalleries()
    {
        return $this->hasMany('App\Models\Gallery')->where('web', 0);
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function clicks()
    {
        return $this->hasMany('App\Models\ProductClick');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function piece()
    {
        return $this->belongsToMany('Piece');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report', 'user_id');
    }
    public function related()
    {
        return $this->hasMany('App\Models\Related', 'product_id');
    }

    public function showName()
    {
        $name = strlen($this->name) > 55 ? substr($this->name, 0, 55) . '...' : $this->name;
        return $name;
    }
    public function showName_ar()
    {
        $name_ar = strlen($this->name_ar) > 55 ? substr($this->name_ar, 0, 55) . '...' : $this->name_ar;
        return $name_ar;
    }

    public static function showTags()
    {
        $tags = null;
        $tagz = '';
        $name = Product::where('status', '=', 1)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            if (!empty($nm)) {
                foreach ($nm as $n) {
                    $tagz .= $n . ',';
                }
            }
        }
        $tags = array_unique(explode(',', $tagz));
        return $tags;
    }


    public function getTagsAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getMetaTagAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getFeaturesAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }

    public function getColorsAttribute($value)
    {
        if ($value == null) {
            return '';
        }
        return explode(',', $value);
    }
}
