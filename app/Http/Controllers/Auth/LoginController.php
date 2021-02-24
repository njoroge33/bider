<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Helpers\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
		if (Auth::check()) {
    // The user is logged in...
return redirect()->route('home')->withSuccess('Welcome back');
}
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'phone'=> 'required|numeric|regex:/(07)[0-9]{8}/',
            'password'=> 'required|numeric',
        ]);

$mobilenumber = Utils::internationalizeNumber($request -> phone);
$account_pin =$request->password;

// $phone = $request->phone;
        $user = Profile::where(['msisdn'=> $mobilenumber,'account_pin'=>$account_pin])->first();
        // dd($user);

		if(!$user)
		{	
		return redirect()->back()->withError('Invalid login details provided!');
		}        

		if(!Auth::login($user))
			return redirect()->back()->withError('Invalid login details provided!');
		
		die("here");
	return redirect()->route('home')->withSuccess('Welcome back');
		
    }

}
