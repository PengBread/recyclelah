@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("passwordModalInput").value;
        var confirmPassword = document.getElementById("cfmpasswordModalInput").value;
        if (password != confirmPassword) {
            document.getElementById("matching").innerHTML = "Passwords do not match.";
            return false;
        }
        return true;
    }
</script>

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
                            <a href="{{ route('authProfile') }}">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="{{ route('organization') }}">Organization Information</a>
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
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    E-mail:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="text" id="inputEmail" class="form-control" readonly="true" value="{{ $userInfo->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="information-content pt-3">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    Name:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="text" id="inputName" class="form-control" readonly="true" value="{{ $userInfo->name }}">
                                </div>
                                <div class="d-flex col-2 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#nameModal">Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="information-content pt-3">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    Phone Number:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="text" id="inputPhone" class="form-control" readonly="true" value="{{ $userInfo->phoneNumber }}">
                                </div>
                                <div class="d-flex col-2 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#phoneModal">Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="information-content py-3">
                            <div class="row">
                                <div class="d-flex col-2 align-items-center">
                                    Password:
                                </div>
                                <div class="d-flex col-md-8 align-items-center">
                                    <input type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" readonly="true" value="0123456789">
                                </div>
                                <div class="d-flex col-2 justify-content-center align-items-center">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#passwordModal">Edit</button>
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

    @include('components.profileModal')
    
</div>

@endsection