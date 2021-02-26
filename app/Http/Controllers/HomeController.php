<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use Carbon\Carbon;


use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        $now = new Carbon;
        $auctions= Auction::where('expiring_date','>', $now)->get();
        (Auth::guard('profile')->check());
		$user = auth()->user();


	


        // dd($items);
        return view('home', ['auctions' => $auctions]);
    }

    public function store(Request $request) {
        // dd($request-> item_id);
        return redirect()->route('bidding', ['id' => $request-> auction_id]);
    }
}
