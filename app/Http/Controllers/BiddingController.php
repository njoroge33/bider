<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AuctionBid;
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

        $bid = AuctionBid::create([
            'profile_id'=> $request -> profile_id,
            'auction_id'=> $request -> auction_id,
            'amount'=> $request -> amount,
            'uuid'=>Str::uuid(),
        ]);

        return redirect() -> route('bids');

    }
}
