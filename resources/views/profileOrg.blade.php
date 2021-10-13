@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">

<div style="height: 100%">
    <div id="" class="container mx-auto">
        <div class="row">
            <div class="profile-sidebar p-5">
                <div class="border justify-content-center align-items-center">
                    <div class="profile-sidebar-container">
                        <div class="pt-3 px-3">
                            Account Management
                            <hr>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="/profile">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="/profileOrg">Organization Information</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-content col col-sm pt-5 pb-5">
                <!-- Organization -->
                <div class="profile-content-container border" style="height: 100%">
                    <div class="pt-3 px-3">
                        <h4>Organization Information</h4>
                        <hr>
                        <div>
                            <p>View your organization information</p>
                        </div>
                    </div>
                    <div class="pt-5 pb-5 px-5">
                        <div class="border">
                            <div class="align-items-center" style="padding: 20px;">
                                <div style="text-align: center;">
                                    <h5>You are not involved in any organization</h5>
                                    <p style="font-size: 14px;">Join one through using the organization code<p>
                                </div>
                                <div id="input-Code-Container" class="" style="text-align: center;">
                                    <input type="text" id="inputCode" class="form-control" placeholder="Enter Organization Code" aria-describedby="">
                                </div>
                                <div class="d-flex justify-content-center align-items-center col-auto py-3">
                                    <button type="button" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 19vh;">
    </div>
</div>

@endsection