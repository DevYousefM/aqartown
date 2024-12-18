<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Models\UserCart;
use App\Traits\GetLang;
use DB;

class LoginController extends Controller
{
  use GetLang;
  public function __construct()
  {
    $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
  }

  public function showLoginForm($lang)
  {
    $id = DB::table('languages')->where('sign', '=', $lang)->first();
    if ($id) {
      Session::put('language', $id->id);
    } else {
      $data = DB::table('languages')->where('is_default', '=', 1)->first();
      Session::put('language', $data->id);
    }
    $this->code_image();
    return view('front.login');
  }

  public function login(Request $request)
  {

    // return $request;
    $rules = [
      'email'   => 'required|email|exists:users',
      'password' => 'required'
    ];
    $request->validate($rules);
    //--- Validation Section Ends
    // Attempt to log the user in
    if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
      // if successful, then redirect to their intended location
      if (Auth::guard('web')->user()->email_verified == 'No') {
        Auth::guard('web')->logout();
        return redirect()->route('user.login', $this->lang())->with('error', 'Your Email is not Verified!');
      }
      // Check If Email is verified or not
      if (Auth::guard('web')->user()->ban == 1) {
        Auth::guard('web')->logout();
        return redirect()->route('user.login', $this->lang())->with('error', 'Your Account Has Been Banned.');
      }
      $usrid = Auth::guard('web')->user()->id;
      /* $this->storeCart($usrid);*/
      // Login Via Modal
      if (!empty($request->modal)) {
        // Login as Vendor
        if (!empty($request->vendor)) {
          if (Auth::guard('web')->user()->is_vendor == 2) {
            return redirect()->route('vendor-dashboard');
          } else {
            return redirect()->route('user-package');
          }
        }
        // Login as User
        return redirect()->route('user-dashboard');
      }
      // Login as User
      return redirect()->route('user-dashboard');
    }
    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->route('user.login', $this->lang())->with('error', 'Credentials Doesn\'t Match !');
  }



  public function login_34(Request $request)
  {
    //--- Validation Section
    $rules = [
      'email'   => 'required|email',
      'password' => 'required'
    ];


    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
    }
    //--- Validation Section Ends

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0])) {
      // if successful, then redirect to their intended location


      if (Auth::guard('web')->user()->email_verified == 'No') {
        Auth::guard('web')->logout();
        return response()->json(array('errors' => [0 => 'Your Email is not Verified!']));
      }


      // Check If Email is verified or not


      if (Auth::guard('web')->user()->ban == 1) {
        Auth::guard('web')->logout();
        return response()->json(array('errors' => [0 => 'Your Account Has Been Banned.']));
      }



      $usrid = Auth::guard('web')->user()->id;
      $this->storeCart($usrid);

      // Login Via Modal
      if (!empty($request->modal)) {
        // Login as Vendor
        if (!empty($request->vendor)) {
          if (Auth::guard('web')->user()->is_vendor == 2) {


            return response()->json(route('vendor-dashboard'));
          } else {


            return response()->json(route('user-package'));
          }
        }
        // Login as User
        return response()->json(1);
      }











      // Login as User
      return response()->json(route('user-dashboard-34'));
    }

    // if unsuccessful, then redirect back to the login with the form data
    return response()->json(array('errors' => [0 => 'Credentials Doesn\'t Match !']));
  }

  public function logout()
  {
    Auth::guard('web')->logout();
    return redirect('/');
  }

  // Capcha Code Image
  private function  code_image()
  {
    $image = imagecreatetruecolor(200, 50);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

    $pixel = imagecolorallocate($image, 0, 0, 255);
    for ($i = 0; $i < 500; $i++) {
      imagesetpixel($image, rand() % 200, rand() % 50, $pixel);
    }

    $font = 'public/assets/front/fonts/NotoSans-Bold.ttf';
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
    imagepng($image, "public/assets/images/capcha_code.png");
  }






  public function storeCart($usrid)
  {


    $Cartdta = Session::has('cart') ? Session::get('cart') : null;
    //  dd($Cartdta);



    $info = UserCart::where('user_id', $usrid)->first();

    if (!empty($info)) {
      $info->delete();
    }


    $data = [
      'cart'              =>  utf8_encode(bzcompress(serialize($Cartdta), 9)),
      'user_id'           =>  $usrid

    ];


    if ($Cartdta != null) {
      UserCart::create($data);
    }
  }
}
