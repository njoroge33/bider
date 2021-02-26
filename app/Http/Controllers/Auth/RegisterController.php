<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Str;
use App\Helpers\Utils;


class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'years'=>'required',
            'terms'=>'required',
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
            'password'=> 'required|confirmed',
        ]);

        // dd($request);

        $profile = Profile::create([
            'profile_uuid'=> Str::uuid(),
            'account_pin'=> $request -> password,
            'phone_imei'=> 1234,
            'msisdn'=> Utils::internationalizeNumber($request -> phone),
            'profile_name'=> substr($request -> email,0,strpos($request -> email, '@')),
        ]);

        // dd($user);

        // auth()->attempt($request->only('email', 'password'));

        return redirect() -> route('login')->withSuccess('Account succesfully created please login');

    }
}