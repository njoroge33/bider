@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-bottom:8%;">

@if ($auctions-> count())
<div class="row">
    @foreach ($auctions as $auction)
    <div class="col-4 card" style="padding-top:1%;margin-top:1%;width:100%;">
            <h2 class="card-header" style="font-size:10vw;color:orange;">{{$auction->name}}</h2>
            <img src="{{ url('uploads/'.$auction->image) }}" class="img-fluid" alt="image not found"/>
            <div class="card-footer">
                <p><strong> RRP: Kshs {{number_format($auction-> actual_price, 2, '.', ',')}}</strong></p>
                <p> Bidding amount: <strong>Kshs {{$auction-> bidding_price}}</strong></p>
                
                <form action="{{ route('home') }}" method="POST">
                    @csrf
                    <input name="auction_id" value="{{$auction->id}}" type="hidden">
                    <button type="submit"  class="btn btn-sm" style="margin-top:2%;background-color:orange;color:white;">Place a bid</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@else
<div class="card text-center" style="margin-top:2%;">
    No available Auctions yet.
</div>
@endif

</div>


@endsection()
