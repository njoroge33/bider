<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email'=> 'email|max:255',
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
            'password'=> 'required|confirmed',
        ]);

        // dd($request);

        $profile = Profile::create([
            'email'=> $request -> email,
            'profile_uuid'=> Str::uuid(),
            'password'=> Hash::make($request -> password),
            'phone_imei'=> 1234,
            'msisdn'=> Str::replaceFirst('0', '+254', $request -> phone)
        ]);

        // dd($user);

        // auth()->attempt($request->only('email', 'password'));

        return redirect() -> route('login');

    }
}