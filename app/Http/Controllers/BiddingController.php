<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AuctionBid;
use App\Models\Transaction;
use App\Models\Auction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; 

class BiddingController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {
            $id = $request->query('id');
            $auction = DB::table('auctions')->find($id);
            

            return view('bidding', ['auction' => $auction]);
            // The user is logged in...
        }else{
            return redirect()->route('login')->withWarning('Please login first');
        }
    }

    public function store(Request $request) {
        $this->validate($request, [
            'profile_id'=> 'required',
            'auction_id'=> 'required',
            'amount'=> 'required|integer',
        ]);

        $profile =auth()->user();
        $balance= (int)$profile->accountBalance;
        $biddingPrice= (int)auction::find($request->auction_id)->bidding_price;

        // dd($profile);
        
        if ($balance >= $biddingPrice){
            $profile-> accountBalance = ($balance - $biddingPrice);
            $profile->save();

            $bid = AuctionBid::create([
                'profile_id'=> $request -> profile_id,
                'auction_id'=> $request -> auction_id,
                'amount'=> $request -> amount,
                'uuid'=>Str::uuid(),
            ]);

            $transaction = Transaction::create([
                'profile_id'=> $request -> profile_id,
                'type_id'=> "1",
                'amount'=> $biddingPrice,
                'destination'=> "bidding",
                'status'=>"COMPLETE",
                'uuid'=>Str::uuid(),
                'previous_balance'=> $balance,
                'new_balance'=> $balance - $biddingPrice,
            ]);

            return redirect() -> route('bids')->withSuccess('Bid successfuly placed');
    
        }else{
            return redirect()->back()->withError('You do not have enough balance to make this bid!');
        }


    }
}
