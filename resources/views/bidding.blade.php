@extends('layouts.app')

@section('content')
<div class="card">
            <h2 class="card-header" style="font-size:10vw;color:orange;">{{$auction->name}}</h2>
            <div class="row container">
                <div class="col-3"></div>
                <div class="col-8 text-center">
                    <img src="{{ url('uploads/'.$auction->image) }}" class="img-fluid" alt="image not found"/>
            
                </div>
                <div class="col-2"></div>
            </div>
            <div class="card-footer">
                <p> {{ $auction->description }} </p>
                <p> Actual Price: Kshs {{number_format($auction-> actual_price, 2, '.', ',')}}</p>
                <p> Bidding amount: <strong>Kshs {{$auction-> bidding_price}}</strong></p>
                
                <form action="{{ route('bidding') }}" method="post">
                    @csrf
                    <label for="amount" class="text-md-right"><strong>Your Bid:</strong></label>
                    <input id="amount" type="number" placeholder="Your lowest unique bid amount e.g 112" class="form-control @error('amount') is-invalid @enderror" name="amount" required autocomplete="amount" autofocus>
                    <input name="auction_id" id="auction_id" value="{{$auction->id}}" type="hidden">
                    <input name="profile_id" id="profile_id" value="{{ Auth::user()->id}}" type="hidden">
                    <button type="submit"  class="btn btn-sm" style="margin-top:2%;background-color:orange;color:white;">Place Your Bid</button>
                </form>

                @if(round((strtotime($auction->expiring_date) - time()) / 3600) >24)
                   <p><strong>Ends in:</strong> <span style="color:orange;">{{floor((strtotime($auction->expiring_date) - time()) / 86400)}} days  {{ floor(((strtotime($auction->expiring_date) - time()) % 86400)/3600)}} hours {{ floor((((strtotime($auction->expiring_date) - time()) % 86400)%3600)/60)}} minutes</span></p>
                @else
                    <p><strong>Ends in:</strong>{{ floor((strtotime($auction->expiring_date) - time()) /3600) }} hours {{ floor(((strtotime($auction->expiring_date) - time()) %3600)/60) }} minutes</p>
                @endif

            </div>
        </div>

@endsection()