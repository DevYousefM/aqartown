<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use App\Models\Referral;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use DB;
use App\Models\UserCart;
use App\Traits\GetLang;

class RegisterController extends Controller
{
	use GetLang;
	public function showRegisterForm($lang)
	{

		$id = DB::table('languages')->where('sign', '=', $lang)->first();
		if ($id) {
			Session::put('language', $id->id);
		} else {
			$data = DB::table('languages')->where('is_default', '=', 1)->first();
			Session::put('language', $data->id);
		}
		return view('front.register');
	}


	public function register(Request $request)
	{

		$gs = Generalsetting::findOrFail(1);
		if ($gs->is_capcha == 1) {
			$value = session('captcha_string');
			if ($request->codes != $value) {
				return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
			}
		}
		//--- Validation Section
		$rules = [
			'email'   => 'required|email|unique:users',
			'password' => 'required|confirmed'
		];
		$validator = Validator::make($request->all(), $rules);
		$request->validate($rules);
		//--- Validation Section Ends
		$user = new User;
		$input = $request->all();
		$input['password'] = bcrypt($request['password']);
		$input['name'] = $request['email'];
		$token = md5(time() . $request->name . $request->email);
		$input['verification_link'] = $token;
		$input['affilate_code'] = md5($request->name . $request->email);
		if (!empty($request->vendor)) {
			$input['is_vendor'] = $request->vendor;
		}
		$user->fill($input)->save();
		/*     if($gs->is_verification_email == 1)
	        {
	        $to = $request->email;
	        $subject = 'Verify your email address.';
	        $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('user/register/verify/'.$token).">Simply click here to verify. </a>";
	        //Sending Email To Customer
	        if($gs->is_smtp == 1)
	        {
	        $data = [
	            'to' => $to,
	            'subject' => $subject,
	            'body' => $msg,
	        ];

	        $mailer = new GeniusMailer();
	        $mailer->sendCustomMail($data);
	        }
	        else
	        {
	        $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
	        mail($to,$subject,$msg,$headers);
	        }
          	return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
	        }
	        else {   }*/

		$user->email_verified = 'Yes';
		$user->update();
		$notification = new Notification;
		$notification->user_id = $user->id;
		$notification->save();
		Auth::guard('web')->login($user);
		$usrid = Auth::guard('web')->user()->id;
		return redirect()->route('front.index', $this->lang());
	}

	public function token($token)
	{
		$gs = Generalsetting::findOrFail(1);

		if ($gs->is_verification_email == 1) {
			$user = User::where('verification_link', '=', $token)->first();
			if (isset($user)) {
				$user->email_verified = 'Yes';
				$user->update();
				$notification = new Notification;
				$notification->user_id = $user->id;
				$notification->save();
				Auth::guard('web')->login($user);
				return redirect()->route('user-dashboard')->with('success', 'Email Verified Successfully');
			}
		} else {
			return redirect()->back();
		}
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
