<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use InvalidArgumentException;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Generalsetting;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
use App\Models\Counter;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {

        $days = "";
        $sales = "";

        $users = User::all();
        $products = Product::all();
        $blogs = Blog::all();
        $coments = Comment::all();
        $pproducts = Product::orderBy('id', 'desc')->take(5)->get();

        $poproducts = Product::orderBy('views', 'desc')->take(5)->get();
        $rusers = User::orderBy('id', 'desc')->take(5)->get();
        $referrals = Counter::where('type', 'referral')->orderBy('total_count', 'desc')->take(5)->get();
        $browsers = Counter::where('type', 'browser')->orderBy('total_count', 'desc')->get();

        $windowsBrowsers = ['Windows 10', 'Windows 7', 'Windows 8.1', 'Windows 8', 'Windows XP', 'Windows Vista', 'Windows 2000', 'Windows ME', 'Windows Server 2003/XP x64'];
        $iosBrowsers = ['iPhone', 'iPad', 'iPod'];
        $macBrowsers = ['Mac OS X'];
        $androidBrowsers = ['Android'];

        $windowsTotal = 0;
        $iosTotal = 0;
        $macTotal = 0;
        $androidTotal = 0;
        $unknownTotal = 0;

        foreach ($browsers as $browser) {
            if (in_array($browser->referral, $windowsBrowsers)) {
                $windowsTotal += $browser->total_count;
            } elseif (in_array($browser->referral, $iosBrowsers)) {
                $iosTotal += $browser->total_count;
            } elseif (in_array($browser->referral, $macBrowsers)) {
                $macTotal += $browser->total_count;
            } elseif (in_array($browser->referral, $androidBrowsers)) {
                $androidTotal += $browser->total_count;
            } else {
                $unknownTotal += $browser->total_count;
            }
        }

        $aggregatedBrowsers = [
            [
                'referral' => 'Windows',
                'total_count' => $windowsTotal
            ],
            [
                'referral' => 'iOS',
                'total_count' => $iosTotal
            ],
            [
                'referral' => 'Mac',
                'total_count' => $macTotal
            ],
            [
                'referral' => 'Android',
                'total_count' => $androidTotal
            ],
            [
                'referral' => 'Unknown OS Platform',
                'total_count' => $unknownTotal
            ]
        ];

        $activation_notify = "";
        if (file_exists(public_path() . '/rooted.txt')) {
            $rooted = file_get_contents(public_path() . '/rooted.txt');
            if ($rooted < date('Y-m-d', strtotime("+10 days"))) {
                $activation_notify = "<i class='icofont-warning-alt icofont-4x'></i><br>Please activate your system.<br> If you do not activate your system now, it will be inactive on " . $rooted . "!!<br><a href='" . url('/admin/activation') . "' class='btn btn-success'>Activate Now</a>";
            }
        }
        // return $browsers;
        return view('admin.dashboard', compact('activation_notify', 'coments', 'products', 'users', 'blogs', 'days', 'sales', 'pproducts', 'poproducts', 'rusers', 'referrals', 'aggregatedBrowsers'));
    }
    public function mode($id)
    {
        $data = Generalsetting::find(1);
        $data->light_dark = $id;
        $data->save();
        return redirect()->back();
    }
    public function profile()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.profile', compact('data'));
    }

    public function profileupdate(Request $request)
    {
        //--- Validation Section

        $rules =
            [
                'photo' => 'mimes:jpeg,webp,jpg,png,svg',
                'email' => 'unique:admins,email,' . Auth::guard('admin')->user()->id
            ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::guard('admin')->user();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/assets/images/admins/', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/admins/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/admins/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        $data->update($input);
        $msg = 'Successfully updated your profile';
        return response()->json($msg);
    }

    public function passwordreset()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.password', compact('data'));
    }

    public function changepass(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if ($request->cpass) {
            if (Hash::check($request->cpass, $admin->password)) {
                if ($request->newpass == $request->renewpass) {
                    $input['password'] = Hash::make($request->newpass);
                } else {
                    return response()->json(array('errors' => [0 => 'Confirm password does not match.']));
                }
            } else {
                return response()->json(array('errors' => [0 => 'Current password Does not match.']));
            }
        }
        $admin->update($input);
        $msg = 'Successfully change your passwprd';
        return response()->json($msg);
    }



    public function generate_bkup()
    {
        $bkuplink = "";
        $chk = file_get_contents('backup.txt');
        if ($chk != "") {
            $bkuplink = url($chk);
        }
        return view('admin.movetoserver', compact('bkuplink', 'chk'));
    }


    public function clear_bkup()
    {
        $destination  = public_path() . '/install';
        $bkuplink = "";
        $chk = file_get_contents('backup.txt');
        if ($chk != "") {
            unlink(public_path($chk));
        }

        if (is_dir($destination)) {
            $this->deleteDir($destination);
        }
        $handle = fopen('backup.txt', 'w+');
        fwrite($handle, "");
        fclose($handle);
        //return "No Backup File Generated.";
        return redirect()->back()->with('success', 'Backup file Deleted Successfully!');
    }


    public function activation()
    {
        $activation_data = "";
        if (file_exists(public_path() . '/license.txt')) {
            $license = file_get_contents(public_path() . '/license.txt');
            if ($license != "") {
                $activation_data = "<i style='color:darkgreen;' class='icofont-check-circled icofont-4x'></i><br><h3 style='color:darkgreen;'>Your System is Activated!</h3><br> Your License Key:  <b>" . $license . "</b>";
            }
        }
        return view('admin.activation', compact('activation_data'));
    }


    public function activation_submit(Request $request)
    {
        //return config('services.genius.ocean');
        $purchase_code =  $request->pcode;
        $my_script =  'GeniusCart';
        $my_domain = url('/');

        $varUrl = str_replace(' ', '%20', config('services.genius.ocean') . 'purchase112662activate.php?code=' . $purchase_code . '&domain=' . $my_domain . '&script=' . $my_script);

        if (ini_get('allow_url_fopen')) {
            $contents = file_get_contents($varUrl);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $varUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $contents = curl_exec($ch);
            curl_close($ch);
        }

        $chk = json_decode($contents, true);

        if ($chk['status'] != "success") {

            $msg = $chk['message'];
            return response()->json($msg);
            //return redirect()->back()->with('unsuccess',$chk['message']);

        } else {
            $this->setUp($chk['p2'], $chk['lData']);

            if (file_exists(public_path() . '/rooted.txt')) {
                unlink(public_path() . '/rooted.txt');
            }

            $fpbt = fopen(public_path() . '/license.txt', 'w');
            fwrite($fpbt, $purchase_code);
            fclose($fpbt);

            $msg = 'Congratulation!! Your System is successfully Activated.';
            return response()->json($msg);
            //return redirect('admin/dashboard')->with('success','Congratulation!! Your System is successfully Activated.');
        }
        //return config('services.genius.ocean');
    }

    function setUp($mtFile, $goFileData)
    {
        $fpa = fopen(public_path() . $mtFile, 'w');
        fwrite($fpa, $goFileData);
        fclose($fpa);
    }



    public function movescript()
    {
        ini_set('max_execution_time', 3000);

        $destination  = public_path() . '/install';
        $chk = file_get_contents('backup.txt');
        if ($chk != "") {
            unlink(public_path($chk));
        }

        if (is_dir($destination)) {
            $this->deleteDir($destination);
        }

        $src = base_path() . '/vendor/update';
        $this->recurse_copy($src, $destination);
        $files = public_path();
        $bkupname = 'GeniusCart-By-GeniusOcean-' . date('Y-m-d') . '.zip';

        $zipper = new \Chumper\Zipper\Zipper;

        $zipper->make($bkupname)->add($files);

        $zipper->remove($bkupname);

        $zipper->close();

        $handle = fopen('backup.txt', 'w+');
        fwrite($handle, $bkupname);
        fclose($handle);

        if (is_dir($destination)) {
            $this->deleteDir($destination);
        }
        return response()->json(['status' => 'success', 'backupfile' => url($bkupname), 'filename' => $bkupname], 200);
    }

    public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
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
}
