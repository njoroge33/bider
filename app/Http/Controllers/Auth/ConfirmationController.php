<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ConfirmationController extends Controller
{
    public function index() {
        return view('auth.confirm');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
            'token'=> 'required|max:6',
        ]);

        $user = User::where('phone', $request->phone)->first();

        // dd($user);
        
        if ($user){
            if ($user->confirmation_token == $request->token){
                $user->status = 'active';
                $user->save();
                return redirect() -> route('login');
            }  
            else{
                
                return redirect()->back()->with('status', 'incorrect activation key');
                
            }
        }
        else{
            return redirect()->back()->with('status', 'incorrect phone number');
        }

    }
}
