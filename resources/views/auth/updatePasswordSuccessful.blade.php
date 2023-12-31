@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="container my-5">
    <div class="content-container container">
        <div class="card">
            <div class="card-header"><h4>Password updated</h4></div>

            <div class="card-body">
                <div class="form-group" style="text-align: center">
                    <p>Your password has been updated.</p>
                </div>
                <div class="form-group d-flex justify-content-center pt-3 px-3 ">
                    <a class="btn btn-primary " href="/" style="width: 130px;">Click to return</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection