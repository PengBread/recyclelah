@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="container mx-auto">
    <div class="content-container container">
        <div class="card">
            <div class="card-header"><h4>Account Log In</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}"> 
                    @csrf

                    <div class="form-group row p-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row p-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        <p>
                            {{ $message }}
                        </p>
                        </div>
                    @endif

                    <div class="form-group row p-2">
                        <div class="d-flex col justify-content-center">
                            <button type="submit" class="btn btn-primary" style="width: 130px;">
                                Log In
                            </button>

                            {{-- @if (Route::has('password.request')) <!--Route::has('password.request') here -->
                                <a class="btn btn-link" href="{{ route('password.request') }}"> <!-- Route password.request here -->
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <div class="col">
                            <a href="/forgotPassword">Forgot password?</a>
                        </div>
                        <div class="col" style="text-align: right;">
                            <a href="/register">Register Now</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- {{ route('login') }}
Route::has('password.request')
{{ route('password.request') }} --}}