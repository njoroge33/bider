@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-bottom:8%;">

@if ($auctions-> count())
<div class="row">
<div class="card card-style shadow-xl">        
            <div class="content">
                <p class="color-orange-dark font-600 mb-n1">Lowest unique bids</p>
                <h1 class="color-orange-light font-20 font-700 mb-2">Welcome to Deals poa<i class="fa fa-star mt-n2 font-30 color-orange-dark float-right mr-2 scale-box"></i></h1>
                <p class="mb-1">
                    Place your bid for as 1 Kshs and walk away with goods for discounts of upto 99%.
                </p>
            </div>
        </div>    
        
        <h3 class="color-orange-light text-center mb-2" style="width:100%;text-decoration: underline;">Categories</h3>
        <div class="double-slider owl-carousel owl-no-dots">
            
            <div class="item">
                <div data-card-height="100" class="card shadow-xl rounded-m bg-6">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Phones & accessories</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <!-- <div class="item">
                <div data-card-height="100" class="card shadow-xl rounded-m bg-16">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Real me earphones</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div> -->
            <div class="item">
                <div data-card-height="100" class="card shadow-xl rounded-m bg-19">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Electronics</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <!-- <div class="item">
                <div data-card-height="100" class="card shadow-xl rounded-m bg-31">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Punex double charger</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div> -->
            <div class="item">
                <div data-card-height="100" class="card shadow-xl rounded-m bg-33">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Laptops and accessories</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
        </div>

        <div class="row mr-0 ml-0">
        @foreach ($auctions as $auction)
            <div class="col-4 card">
                <img src="{{ url('uploads/'.$auction->image) }}" class="img-fluid rounded-sm mb-3">
                <p class="mb-n1 color-orange-light font-600 p-0">{{$auction->name}}</p>
                <!-- <h1>1 of 3</h1>
                <p>This is a third of a column.</p> -->
                <p class='p-0 m-0'><strong> RRP: Kshs {{number_format($auction-> actual_price, 2, '.', ',')}}</strong></p>
                <p class='p-0 m-0'> Bidding amount: <strong>Kshs {{$auction-> bidding_price}}</strong></p>
                
                <form class='p-0 m-0' action="{{ route('home') }}" method="POST">
                    @csrf
                    <input name="auction_id" value="{{$auction->id}}" type="hidden">
                    <button type="submit"  class="btn btn-xs p-0" style="background-color:orange;color:white;">Place a bid</button>
                </form>
            </div>
            
    @endforeach
</div>
</div>
@else
<div class="card text-center" style="margin-top:2">
    No available Auctions yet.
</div>
@endif

</div>


@endsection()
