<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AuctionBid;
use App\Models\Auction;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth; 


class BidController extends Controller
{
    public function index(){
        $user_id = auth()->user()->profile_id;
        $bids = AuctionBid::with('auction')->where('profile_id', $user_id)->get();
        $transactions = Transaction::get();
        $transactions = $transactions->sortByDesc('created_at');
        // $items= Item::get();
        // dd($bids);
        return view('bids', ['bids' => $bids, 'transactions' => $transactions]);
    }
}
