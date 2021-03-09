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
        $sms=["OTP_URL" => 'https://pyris.socialcom.co.ke/api/PushSMS.php?', 
        "OTP_USERNAME" => 'sub_api_user', 
        "OTP_PASSWORD" => '73wjzRNPAzgT8EZ1JQv8hpD2BsQ9', 
        "OTP_SHORTCODE" => 'SOCIALCOM'];

        $this->validate($request, [
            'phone'=> 'required|regex:/(07)[0-9]{8}/',
        ]);

        $mobilenumber = Utils::internationalizeNumber($request -> phone);

        $user = Profile::where(['msisdn'=> $mobilenumber])->first();
        $template = SmsTemplate::where(['code'=> 'PIN_RESET'])->first();

        if($user){
            $new_pin = mt_rand(1000, 9999);
            $message = str_replace('<PIN>', $new_pin, $template->template_text);

            $curl = curl_init();
            
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json',));

            # send request to send otp via sms
            $params = [
                'username' => $sms['OTP_USERNAME'], 
                'password' => $sms['OTP_PASSWORD'], 
                'shortcode'=> $sms['OTP_SHORTCODE'], 
                'mobile'=> $mobilenumber, 
                'message'=> $message
            ];
            curl_setopt($curl, CURLOPT_URL, $sms['OTP_URL'].http_build_query($params));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $curl_response = curl_exec($curl);
            $response=json_decode($curl_response);

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
