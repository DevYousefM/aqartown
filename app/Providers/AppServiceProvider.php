<?php

namespace App\Providers;

use App;
use App\Classes\GeniusMailer;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $admin_lang = DB::table('admin_languages')->where('is_default', '=', 1)->first();
        App::setlocale($admin_lang->name);


        view()->composer('*', function ($settings) {
            $settings->with('gs', DB::table('generalsettings')->find(1));
            $settings->with('seo', DB::table('seotools')->find(1));
            $settings->with('categories', Category::where('status', '=', 1)->get());
            $settings->with('subcategories', Subcategory::where('status', '=', 1)->get());
            if (Session::has('language')) {
                $data = DB::table('languages')->find(Session::get('language'));
                $data_results = file_get_contents(access_public() . 'assets/languages/' . $data->file);
                $lang = json_decode($data_results);
                $settings->with('langg', $lang);
                if ($data->id == 1) {
                    $locale = "en";
                } else {
                    $locale = "ar";
                }
                $settings->with('locale', $data->sign);
            } else {
                $data = DB::table('languages')->where('is_default', '=', 1)->first();
                $data_results = file_get_contents(access_public() . 'assets/languages/' . $data->file);
                $lang = json_decode($data_results);
                $settings->with('langg', $lang);
                if ($data->id == 1) {
                    $locale = "en";
                } else {
                    $locale = "ar";
                }
                $settings->with('locale', $data->sign);
            }

            if (!Session::has('popup')) {
                $settings->with('visited', 1);
            }
            Session::put('popup', 1);

            $settings->with('sign', $data->sign);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
