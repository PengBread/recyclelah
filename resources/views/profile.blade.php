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
                            <a href="">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="">Organization Information</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-content col col-sm pt-5 pb-5">
                <!--Account Details -->
                <div class="profile-content-container border">
                    <div class="pt-3 px-3">
                        <h4>Account Information</h4>
                        <hr>
                        <div>
                            <p>Edit whichever information you need</p>
                        </div>
                    </div>
                    <div class="justify-content-center align-items-center pt-2 pb-2 px-4">
                        <div class="information-content">
                            <label for="inputName" class="form-label">Name: </label>
                            <input type="text" id="inputName" class="form-control" aria-describedby="">
                        </div>
                        <div class="information-content">
                            <label for="inputEmail" class="form-label">E-mail: </label>
                            <input type="text" id="inputEmail" class="form-control" aria-describedby="" readonly="true">
                        </div>
                        <div class="information-content">
                            <label for="inputPhone" class="form-label">Phone Number: </label>
                            <input type="text" id="inputPhone" class="form-control" aria-describedby="">
                        </div>
                        <div class="information-content">
                            <label for="inputPassword" class="form-label">Password: </label>
                            <input type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock">
                        </div>
                        <div class="information-content">
                            <label for="inputCfmPassword" class="form-label">Confirm Password: </label>
                            <input type="password" id="inputCfmPassword" class="form-control" aria-describedby="passwordHelpBlock">
                        </div>
                    </div>
                </div>

                <!-- Organization -->
                {{-- <div class="profile-content-container border" style="height: 100%">
                    <div class="pt-3 px-3">
                        <h4>Organization Information</h4>
                        <hr>
                        <div>
                            <p>View your organization information</p>
                        </div>
                    </div>
                    <div class="pt-5 pb-5 px-5">
                        <div class="border">
                            <div class="justify-content-center align-items-center" style="padding: 20px;">
                                <div style="text-align: center;">
                                    <h5>You are not involved in any organization</h5>
                                    <p style="font-size: 14px;">Join one through using the organization code<p>
                                </div>
                                <div id="input-Code-Container" class="" style="text-align: center;">
                                    <input type="text" id="inputCode" class="form-control" placeholder="Enter Organization Code" aria-describedby="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div style="height: 19vh;">
    </div>
</div>

@endsection