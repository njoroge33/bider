
@extends('layouts.app')

@section('content')
<div class="container">

@if ($bids-> count())
<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Item Name</th>
    <th scope="col">Bid No.</th>
    <th scope="col">Bidding Date</th>
    <th scope="col">End Date</th>
    <th scope="col">Bid Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($bids as $bid)
    <tr>
      <th>{{$bid-> auction ->name}}</th>
      <td class="color-orange-light">{{$bid-> auction -> bidding_price}}</td>
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

</div>
@endsection
