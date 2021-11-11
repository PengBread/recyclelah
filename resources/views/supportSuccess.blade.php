@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="container my-5">
    <div class="content-container container">
        <div class="card">
            <div class="card-header"><h4>Your feedback has been sent to our team.</h4></div>

            <div class="card-body">
                <div class="form-group">
                    <p>We will take some time to review through and respond to your feedback ASAP.</p>
                </div>
                <div class="form-group d-flex justify-content-center pt-3 px-3 ">
                    <a class="btn btn-primary " href="/" style="width: 130px;">Return homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection