@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}


<div style="height: 100%">
    <div id="" class="container mx-auto">
        <div class="row">
            <div class="profile-sidebar pt-5">
                <div class="border justify-content-center align-items-center">
                    <div class="profile-sidebar-container">
                        <div class="pt-3 px-3">
                            Account Management
                            <hr>
                        </div>
                        <div class="profile-sidebar-items">
                            <a class="profilesideBtn btn" href="{{ route('authProfile') }}">Account Information</a>
                        </div>
                        <div class="profile-sidebar-items">
                            <a class="profilesideBtn btn" href="{{ route('organization') }}">Organization Information</a>
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
                            
                            {{-- {{ auth()->user()->affiliate }} --}}

                            @if(!$organizationInfo)
                            <!-- FOR USER WITHOUT ORGANIZATION -->
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
                                        <button type="submit" class="btnOrg btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </form>
                            <!-- -->

                            @elseif($organizationInfo->userID == auth()->user()->userID)
                            <!-- ORGANIZATION OWNER VIEW -->
                            <form class="form" method="POST" action="{{ route('organization')}}">
                                @csrf

                                <div class="container mx-auto align-items-center" style="padding: 20px;">
                                    <div style="text-align: center;">
                                        <h5>{{ $organizationInfo->organizationName }}</h5>
                                        <p class="pb-3" style="font-size: 14px;">You are the owner of this organization<p>
                                        <div class="py-3">
                                            <a type="button" class="btnOrg btn btn-dark" href="{{ route('orgSchedule.schedules') }}">Organization Schedules</a>
                                            {{-- <button type="button" id="btnMakeSchedule" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#makeSchedule">Organization Schedule</button> --}}
                                        </div>
                                        <div class="py-2">
                                            <a type="button" class="btnOrg btn btn-dark" href="{{ route('memberList') }}">List Workers</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- -->

                            <!-- IF USER JOINED AN ORGANIZATION -->
                            @elseif($organizationInfo)
                            <form class="form" method="POST" action="{{ route('organization')}}">
                                @csrf

                                <div class="container mx-auto align-items-center" style="padding: 20px;">
                                    <div style="text-align: center;">
                                        <h5>{{ $organizationInfo->organizationName }}</h5>
                                        <p class="pb-3" style="font-size: 14px;">You are working under this organization as a worker<p>
                                        <div class="py-3">
                                            <a type="button" class="btnOrg btn btn-dark" href="{{ route('orgSchedule.schedules') }}">Organization Schedules</a>
                                        </div>
                                        <div class="py-2">
                                            <button type="button" class="btnOrg btn btn-light" data-bs-toggle="modal" data-bs-target="#leaveOrgModal">Leave Organization</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- -->
                            @else
                                Error Occured
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.organizationModal')
</div>

@endsection