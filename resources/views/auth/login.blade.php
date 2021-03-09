@extends('layouts.app')

@section('content')
<div class="page-content">

        <div class="card card-style  ml-0 mr-0 rounded-0">
            <div class="content">
              <h2 class="font-30">login</h2>

                @include('partials.messages')
                    <form method="POST" action="{{ route('login') }}" class ="contactForm">
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

                                                <div class="input-style has-icon input-style-1 input-required">
                                                <i class="input-icon fa fa-lock"></i>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength='4' maxlength='4' pattern="\d+" required title="4 numbers" placeholder="Enter a 4 digits Pin" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                  <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-red-light">
                                                      {{ __('Login') }}
                                                  </button>

                                                </div>

                                                  <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                                                  <a href="{{ route('pin') }}" class="m-0 p-0">Forgot Pin?</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
