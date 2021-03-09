@extends('layouts.app')

@section('content')
<div class="page-content">

        <div class="card card-style  ml-0 mr-0 rounded-0">
            <div class="content">
              <h2 class="font-30">Forgot Pin</h2>

              <p class="text-center font-weight-bold">Enter your Phone number and we'll send you an SMS with your new PIN.</p>

                @include('partials.messages')
                    <form method="POST" action="{{ route('pin') }}" class ="contactForm">
                        @csrf

                        <div class="input-style has-icon input-style-1 input-required">
                        <i class="input-icon fa fa-phone"></i>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="07XX XXX XXX">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                                <div class="form-group ">
                                                  <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-red-light">
                                                      {{ __('Send SMS') }}
                                                  </button>

                                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
