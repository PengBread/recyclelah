@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<!-- Note
    After successful checking email, the otp will be sent to email and using javascript to change the display of this page into typing new password, cfm password and otp.
-->

<div class="container mx-auto">
    <div class="content-container container">
        <div class="card">
            <div class="card-header"><h4>Reset password</h4></div>

            <div class="card-body">
                <form method="POST" action=""> <!-- route password here -->
                    @csrf

                    <input type="hidden" name="token" value=""> <!-- token here -->

                    <div class="form-group row p-3">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-center pt-3 px-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                    <div class=" pt-3">
                        <a href="" class="">Return to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- {{ route('password.update') }}
{{ $token }} --}}