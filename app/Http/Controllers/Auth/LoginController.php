<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
            'password'=> 'required',
        ]);

        dd($request);

        // $phone = $request->phone;
        $user = Profile::where('msisdn', Str::replaceFirst('0', '+254', $request -> phone))->first();

        // dd($user);
        
      

        if (!auth()->attempt(['msisdn' => Str::replaceFirst('0', '254', $request -> phone), 'password' => $request->password])){
            return redirect()->back()->with('status', 'Invalid credentials!!');
        }else{
            return redirect() -> route('home');
        }
        
        
        

        // dd($request);

    }

}
