
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>How it works</h1>
        </div>
        <div class="card-body">
            <p class="font-weight-bold">The lowest unique bid buys the product!</p>
            <p>Place the price that you want If your bid is unique and is the lowest among unique bids, take home the product!</p>

            <ol>
                <li>Signup to Deals poa <a class="font-italic" href="{{route('register')}}">signup</a>.</li>
                <li>Login to Deals poa <a class="font-italic" href="{{route('login')}}">login</a>.</li>
                <li>Deposit money to you Deals poa wallet <a class="font-italic" href="{{route('deposit')}}">deposit</a>.</li>
                <li>Bid any item with the any price you want <a class="font-italic" href="{{route('home')}}">see available auctions</a>.</li>
                <li>If your bid isunique and the lowest among unique bids.</li>
            </ol>
        </div>
    </div>

</div>
@endsection
