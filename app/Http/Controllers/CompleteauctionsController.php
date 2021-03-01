<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuctionBid;

class CompleteauctionsController extends Controller
{
    public function index(){
        $bids = AuctionBid::with('auction', 'profile')->get();

        return view('complete', ['bids' => $bids]);
    }
}
