<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    protected $fillable = ['contact_success', 'contact_success_ar', 'contact_email', 'map', 'w_phone', 'page_id', 'contact_title', 'contact_title_ar', 'contact_text', 'street', 'contact_text_ar', 'street_ar', 'phone', 'fax', 'email', 'site', 'side_title', 'side_text', 'slider', 'service', 'featured', 'small_banner', 'best', 'top_rated', 'large_banner', 'big', 'hot_sale', 'review_blog', 'best_seller_banner', 'best_seller_banner_link', 'big_save_banner', 'big_save_banner_link', 'best_seller_banner1', 'best_seller_banner_link1', 'big_save_banner1', 'big_save_banner_link1', 'partners', 'bottom_small', 'flash_deal', 'featured_category'];

    public $timestamps = false;

    public function upload($name, $file, $oldname)
    {
        $file->move('public/assets/images', $name);
        if ($oldname != null) {
            if (file_exists(public_path() . '/assets/images/' . $oldname)) {
                unlink(public_path() . '/assets/images/' . $oldname);
            }
        }
    }
}
