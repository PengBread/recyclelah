@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="container">
    <div class="content-container container">
        <div class="card">
            <div class="card-header"><h4>Account Log In</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ url('login') }}"> 
                    @csrf

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    
                    @if ($message = Session::get('error'))
                        <div class="text-danger">
                            <p>
                                {{ $message }}
                            </p>
                        </div>
                    @endif

                    <div class="form-group row py-3 px-lg-5">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                        <div class="col-md">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row py-3 px-lg-5">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                        <div class="col-md">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <div class="d-flex col justify-content-center">
                            <button type="submit" class="btn btn-primary" style="width: 130px;">Log In</button>
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <div class="col">
                            <a href="{{ route('forgotpasswordpage') }}">Forgot password?</a>
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