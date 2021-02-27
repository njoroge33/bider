@extends('layouts.app')

@section('content')
<div class="page-content">

  <div class="card card-style  ml-0 mr-0 rounded-0">
            <div class="content">
                <h1 class="font-30">Register</h1>
                    <form method="POST" action="{{ route('register') }}">
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

                        <div class="input-style has-icon input-style-1 input-required">
                        <i class="input-icon fa fa-lock"></i>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" pattern="\d+" required title="4 numbers" maxlength='4' minlength='4' placeholder="Confirm your Pin" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="years" id="years" value="1">

                                    <label class="form-check-label @error('years') is-invalid @enderror" for="years">
                                        {{ __('I am over 18 years') }}
                                    </label>
                                    @error('years')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" value="1">

                                    <label class="form-check-label @error('terms') is-invalid @enderror" for="terms">
                                        {{ __('I agree to Terms and Conditions') }}
                                    </label>
                                    @error('terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Signup Account') }}
                                </button>
                            </div>
                        </div>

                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
