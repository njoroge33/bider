<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Models\Deposit;
use Illuminate\Support\Str;

class DepositController extends Controller
{
    public function index() {
        return view('deposit');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'amount'=>'required',
        ]);
        $user = auth()->user();

        // dd($request->amount);

        $mpesa=[
            'MPESA_STK_URL' =>"https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest",
            'MPESA_CREDENTIALS_URL' =>"https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials",
        'PASS_KEY'  =>"bb6e5fae3d046a6b9efdeefc94baf7b05475f768543d01fd527e465a9d042d12",
        'CONSUMER_KEY' =>"KxRADqUVyJky41GmHGq8mALgdJ9lCdwp",
         'CONSUMER_SECRET' =>"xaOYS6Ll5DY9Twku",
        'MPESA_PAYBILL' => "633381",
         'MPESA_CALLBACK_URL' => "https://api.dandiadoh.com:8085/services/payments/stkresults",
            ];

            $timestamp=Carbon::rawParse('now')->format('YmdHms');
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $mpesa['MPESA_STK_URL']);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken($mpesa)));
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $mpesa['MPESA_PAYBILL'],
            'Password' => base64_encode($mpesa['MPESA_PAYBILL'].$mpesa['PASS_KEY'].$timestamp),
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->amount,
            'PartyA' => $user->msisdn, // replace this with your phone number
            'PartyB' => $mpesa['MPESA_PAYBILL'],
            'PhoneNumber' => $user->msisdn, // replace this with your phone number
            'CallBackURL' => 'https://a120cc1789e0.ngrok.io/api/mpesa',
            'AccountReference' => "njoroge",
            'TransactionDesc' => "Testing stk push on sandbox"
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        // $this -> mpesaConfirmation(Request);
        $results = json_decode($curl_response,true);
        if(isset($results['ResponseCode'])){
            $message = 'Please check your phone and Enter your M-Pesa PIN to Confirm Payment' ;
            return redirect()->back()->withSuccess($message);
        }
        else{
            $message = 'Failed, Go to Lipa na M-PESA option from the MPESA menu and send at least KSh 10 to PayBill Business Number 633381, with account number '.$user->msisdn.'.' ;
            return redirect()->back()->withError($message);
        }
    }

    public function generateAccessToken($params)
    {
        $credentials = base64_encode($params['CONSUMER_KEY'] . ":" . $params['CONSUMER_SECRET']);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $params['MPESA_CREDENTIALS_URL']);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

    public function MpesaRes(Request $request)
    {
        $response = json_decode($request -> getContent());

        if($response->Body->stkCallback->ResultCode == 0){
            $trn = new Deposit;

            $trn -> profile_id = auth()->user()->profile_id;
            $trn -> uuid = Str::uuid();
            $trn-> result_desc = $response->Body->stkCallback->ResultDesc;
            $trn-> merchant_request_id = $response->Body->stkCallback->MerchantRequestID;
            $trn-> checkout_request_id = $response->Body->stkCallback->CheckoutRequestID;
            $trn-> amount = $response->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $trn-> mpesa_receipt_number = $response->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $trn-> transaction_date = $response->Body->stkCallback->CallbackMetadata->Item[2]->Value;
            $trn-> phone_number = $response->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            
            if($trn->save()){
                $profile =auth()->user();
                $balance= (int)$profile->accountBalance;
                $profile-> accountBalance = ($balance + (int)$trn-> amount);
                $profile->save();

                return redirect() -> route('bids')->withSuccess("You sucessfully deposited Kshs '.$trn-> amount' ");
            }
        }
    }
          
}
