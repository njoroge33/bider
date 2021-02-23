<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        $auctions= Auction::get();
        // dd(Auth::guard('profile')->check());
        // dd($items);
        return view('home', ['auctions' => $auctions]);
    }

    public function store(Request $request) {
        // dd($request-> item_id);
        return redirect()->route('bidding', ['id' => $request-> auction_id]);
    }
}
