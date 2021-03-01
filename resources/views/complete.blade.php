@extends('layouts.app')

@section('content')
<h2 class="text-center color-orange-light">Completed Auctions</h2>
@if ($bids-> count())
<table class="table table-striped bid">
  <thead>
    <tr>
    <th scope="col">Auctions</th>
    <th scope="col">Bidder</th>
    <th scope="col">RRP</th>
    <th scope="col">Successful Bid</th>
    <th scope="col">End Date</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($bids as $bid)
    <tr>
      <th><img src="{{ url('uploads/'.$bid->auction->image) }}" class="img-fluid">{{$bid-> auction ->name}}</th>
      <td class="color-orange-light">{{$bid->profile->profile_id}}</td>
      <td class="color-orange-light">{{$bid->auction->actual_price}}</td>
      <td class="color-orange-light">{{$bid->amount}}</td>
      <td class="color-orange-light">{{$bid-> auction -> end_date}}</td>
    </tr>
@endforeach
  </tbody>
</table>
@else
<div class="card text-center">
    No completed bids yet.
</div>
@endif
@endsection
