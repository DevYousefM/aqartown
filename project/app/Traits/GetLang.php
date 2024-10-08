<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait GetLang
{
  public function lang()
  {
    if (Session::has('language')) {
      $data = DB::table('languages')->find(Session::get('language'));
    } else {
      $data = DB::table('languages')->where('is_default', '=', 1)->first();
    }
    return $data->sign;
  }
}
