@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Activate your account') }}</div>

                <div class="card-body">

                @if (session('status'))
                <div class="bg-danger text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
                    <form method="POST" action="{{ route('activate') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone-No :') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="07XX XXX XXX" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="token" class="col-md-4 col-form-label text-md-right">{{ __('Activation key :') }}</label>

                            <div class="col-md-6">
                                <input id="token" type="password" class="form-control @error('token') is-invalid @enderror" name="token" required autocomplete="current-token">

                                @error('token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Activate') }}
                                </button>
                            </div>
                        </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
