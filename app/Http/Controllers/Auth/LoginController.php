<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:profile')->except('logout');
    }
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
            'password'=> 'required',
        ]);

        // dd($request);

        // $phone = $request->phone;
        $user = Profile::where('msisdn', Str::replaceFirst('0', '+254', $request -> phone))->first();

        // dd($user);
        
      

        if (!Auth::guard('profile')->attempt(['msisdn' => Str::replaceFirst('0', '254', $request -> phone), 'password' => $request->password])){
            return redirect()->back()->with('status', 'Invalid credentials!!');
        }else{
            return redirect() -> route('home');
        }

        // if (!Auth::check()){
        //     dd('jkk');
        // }
        
        
        

        // dd($request);

    }
    protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('profile');
    }

}
