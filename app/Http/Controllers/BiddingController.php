<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AuctionBid;
use Illuminate\Support\Str;

class BiddingController extends Controller
{
    public function index(Request $request) {
        $id = $request->query('id');
        $auction = DB::table('auctions')->find($id);
        // $id = auth()->user()->id;


        return view('bidding', ['auction' => $auction]);
        // dd($user);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'profile_id'=> 'required',
            'auction_id'=> 'required',
            'amount'=> 'required|integer',
        ]);


        $bid = AuctionBid::create([
            'auction_id'=> $request -> auction_id,
            'amount'=> $request -> amount,
            'uuid'=>Str::uuid(),
        ]);

        return redirect() -> route('bids');

    }
}
