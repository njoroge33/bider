
@extends('layouts.app')

@section('content')
<div class="container">

<h3 class="color-orange-light text-center mb-2" style="width:100%;">My Account</h3>

<div class="text-center">
  <p class="m-0">Phone:  <strong> +{{Auth::user()->msisdn}}</strong></p>
  <p class="mt-0">Account Balance:  <strong>Kshs {{Auth::user()->accountBalance}}</strong></p>

  <div class="row mt-0">
    <a class="col-6 font-weight-bold text-dark" href="{{route('deposit')}}">Deposit</a>
    <form action="{{ route('logout') }}" method="post" class="col-6" >
        @csrf
            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
        </form>
  </div>
  
</div>

@include('partials.messages')
<div class="content">
                <div class="tab-controls tabs-round tab-animated tabs-medium tabs-rounded shadow-xl" 
                     data-tab-items="2" 
                     data-tab-active="bg-info color-white">
                    <a href="#" data-tab-active data-tab="tab-8">Bids history</a>
                    <a href="#" data-tab="tab-9">Trasactions History</a>
                </div>

@if ($bids-> count())
<table class="table table-striped tab-content" id="tab-8">
  <thead>
    <tr>
    <th scope="col">Item Name</th>
    <th scope="col">Amount</th>
    <th scope="col">Bidding Date</th>
    <th scope="col">End Date</th>
    <th scope="col">Bid Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($bids as $bid)
    <tr>
      <th>{{$bid-> auction ->name}}</th>
      <td class="color-orange-light">{{$bid->amount}}</td>
      <td class="color-orange-light">{{$bid-> created_at->format('Y-m-d')}}</td>
      <td class="color-orange-light">{{$bid-> auction -> end_date}}</td>
      @if(strtotime($bid->auction->end_date) < time())
        <td class="text-success">Done</td>
        @else
        <td class="text-info">In progress..</td>
        @endif
    </tr>
@endforeach
  </tbody>
</table>
@else
<div class="card text-center">
    You have bids yet.
</div>
@endif

@if ($transactions-> count())
<table class="table table-striped tab-content" id="tab-9">
  <thead>
    <tr>
    <th scope="col">Amount</th>
    <th scope="col">Type</th>
    <th scope="col">Date</th>
    <th scope="col">Previous Balance</th>
    <th scope="col">New Balance</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($transactions as $transaction)
    <tr>
      <th>{{$transaction ->amount}}</th>
      <td class="color-orange-light">{{$transaction->type_id}}</td>
      <td class="color-orange-light">{{$transaction-> created_at->format('Y-m-d')}}</td>
      <td class="color-orange-light">{{$transaction-> previous_balance}}</td>
      <td class="color-orange-light">{{$transaction-> new_balance}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>
@else
<div class="card text-center">
    You have bids yet.
</div>
@endif


</div>
</div>
@endsection
