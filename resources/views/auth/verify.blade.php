@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="container mx-auto">
    <div class="content-container container">
        <div class="card" style="">
            <div class="card-header"><h4>Verify account</h4></div>

            <div class="card-body p-5" style="text-align: center;">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{-- <br>{{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action=""> 
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- {{ route('verification.resend') }} --}}