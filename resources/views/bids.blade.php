
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
<div class="row mb-0">
  <p class="btn btn-info col-6 active" id="bid">Bids History</p>
  <p class="btn btn-info col-6" id="transaction">Trasactions History</p>
</div>

@if ($bids-> count())
<table class="table table-striped bid">
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
      <td class="color-orange-light">{{$bid-> auction -> expiring_date}}</td>
      @if(strtotime($bid->auction->expiring_date) < time())
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
<table class="table table-striped transaction" style="display:none;">
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
@endsection
