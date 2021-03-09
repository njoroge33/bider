<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\SmsTemplate;
use App\Helpers\Utils;

class PinController extends Controller
{
    public function index() {
        return view('auth.pin');
    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
        ]);

        $mobilenumber = Utils::internationalizeNumber($request -> phone);

        $user = Profile::where(['msisdn'=> $mobilenumber])->first();
        $template = SmsTemplate::where(['code'=> 'PIN_RESET'])->first();

        if($user){
            $new_pin = mt_rand(1000, 9999);
            $message = str_replace('<PIN>', $new_pin, $template->template_text);

            $response = Utils::SendMessage($mobilenumber, $message);
            
            if ($response -> success){
                $user -> account_pin = $new_pin;
                $user -> save();

                return redirect() -> route('login')->withSuccess("Pin sucessfully changed.Please Login");
            }   
        }else{
            return redirect() -> back()->withError("Invalid number");
        }
        }
}
