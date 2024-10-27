<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('language')) {
            $data = DB::table('languages')->find(Session::get('language'));
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            app()->setLocale($data->sign);
        }

        return $next($request);
    }
}
