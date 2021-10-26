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
                            <a href="{{ route('authProfile') }}">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a href="{{ route('organization') }}">Organization Information</a>
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
                        @include('components.errors')
                        <div class="border">

                            {{-- <!-- FOR USER WITHOUT ORGANIZATION -->
                            @if(auth()->user()->organizationID == null)
                            <form class="form" method="POST" action="{{ route('profile.joinOrganization') }}">
                                @csrf
                                @method('put')

                                <div class="align-items-center" style="padding: 20px;">
                                    <div style="text-align: center;">
                                        <h5>You are not involved in any organization</h5>
                                        <p style="font-size: 14px;">Join one through using the organization code<p>
                                    </div>
                                    <div id="input-Code-Container" class="" style="text-align: center;">
                                        <input type="text" id="inputCode" name="code" class="form-control" placeholder="Enter Organization Code" pattern="^[a-zA-Z0-9]{7}$" title="7 digit/alphabet only in an Organization Code">
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center col-auto py-3">
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </form>
                            <!-- -->

                            <!-- IF USER JOINED AN ORGANIZATION -->
                            @else
                            <form class="form" method="POST" action="{{ route('organization')}}">
                                @csrf

                                <div class="container mx-auto align-items-center" style="padding: 20px;">
                                    <div style="text-align: center;">
                                        <h5>{{ $userInfo->organizationName }}</h5>
                                        <p class="pb-3" style="font-size: 14px;">You are working under this organization as a worker<p>
                                        <div class="py-3">
                                            <button type="button" class="btn btn-dark" onclick="">Organization Schedule</button>
                                        </div>
                                        <div class="py-2">
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#leaveOrgModal">Leave Organization</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- -->
                            @endif --}}

                            <!-- ORGANIZATION OWNER VIEW -->
                            <form class="form" method="POST" action="{{ route('organization')}}">
                                @csrf

                                <div class="container mx-auto align-items-center" style="padding: 20px;">
                                    <div style="text-align: center;">
                                        <h5>{{ $userInfo->organizationName }}</h5>
                                        <p class="pb-3" style="font-size: 14px;">You are the owner of this organization<p>
                                        <div class="py-3">
                                            <button type="button" class="btn btn-dark" onclick="">Organization Schedule</button>
                                        </div>
                                        <div class="py-2">
                                            <a type="button" class="btn btn-dark" href="{{ route('memberList') }}">List Workers</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 19vh;">
    </div>
    @include('components.organizationModal')
</div>

@endsection