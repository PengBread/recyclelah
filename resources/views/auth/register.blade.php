@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<script>
    function handleClick(flexRadioDefault) {
        if(document.getElementById('radioBtn1').checked) {
            document.getElementById('companyDiv').style.display = 'none';
        } else if(document.getElementById('radioBtn2').checked) {
            document.getElementById("companyDiv").style.display = "";
        } else {
            alert("nope");
        }
    }
</script>

<div class="container mx-auto">
    <div class="content-container container">
        <div class="card">
            <div class="card-header"><h4>Registration</h4></div>

            <div class="card-body">
                <form method="POST" action=""> <!-- Route Register here -->
                    @csrf
                    <div class="radioButtonDiv row p-2">
                        <div class="form-check d-flex col justify-content-center"">
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioBtn1" onclick="handleClick(this);" checked>
                            </div>
                            <div>
                                <label class="form-check-label" for="radioBtn1">House-Hold</label>
                            </div>
                        </div>
                        <div class="form-check d-flex col justify-content-center">
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioBtn2" onclick="handleClick(this);">
                            </div>
                            <div>
                                <label class="form-check-label" for="radioBtn2">Company</label>
                            </div>
                        </div>
                    </div>

                    <div id="companyDiv" class="form-group row p-2" style="display: none;">
                        <label for="company" class="col-md-3 col-form-label text-md-right">Company Name</label>

                        <div class="col-md-9">
                            <input id="company" type="text" class="form-control" name="company" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>

                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-9">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-9">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row px-5 py-1">
                        <div class="col-md-1 align-content-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        </div>
                        <div class=" col-md-11">
                            <label class="form-check-label" for="flexCheckDefault">
                                I have read and agree to the <a href="">Terms of Service</a> & <a href="">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <div class="d-flex col justify-content-center p-3">
                        <button type="submit" class="btn btn-primary" style="width: 130px;">
                            Register
                        </button>
                    </div>
                    <div class=" pt-3">
                        <a href="/login" class="">Return to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- {{ route('register') }} --}}