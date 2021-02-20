<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AuctionBid;
use App\Models\Auction;


class BidController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $bids = AuctionBid::with('auction')->where('profile_id', $user_id)->get();
        // $items= Item::get();
        // dd($bids);
        return view('bids', ['bids' => $bids]);
    }
}
