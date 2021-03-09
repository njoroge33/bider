@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-20 text-center color-green-dark font-weight-bold ">
                    {{ __('Deposit') }}
                    <p class="font-12 m-0">Enter amount below, use your MPESA PIN to authorize the transaction</p>
                </div>
                
                <div class="card-body">
                @include('partials.messages')
                        <form method="POST" action="{{ route('deposit') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Amount(Ksh) :') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" min='1' name="amount" value="{{ old('phone') }}" required placeholder="10" autocomplete="phone" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn bg-green-dark">
                                        {{ __('Top Up Now') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
