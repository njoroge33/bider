<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;

class HomeController extends Controller
{
    public function index(){
        $auctions= Auction::get();
        // dd($items);
        return view('home', ['auctions' => $auctions]);
    }

    public function store(Request $request) {
        // dd($request-> item_id);
        return redirect()->route('bidding', ['id' => $request-> auction_id]);
    }
}
