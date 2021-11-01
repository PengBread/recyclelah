@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

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
                                        <button type="submit" class="btn btn-primary">Confirm</button>
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
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#makeSchedule">Organization Schedule</button>
                                        </div>
                                        <div class="py-2">
                                            <a type="button" class="btn btn-dark" href="{{ route('memberList') }}">List Workers</a>
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
                                            <button type="button" class="btn btn-dark" onclick="">Organization Schedule</button>
                                        </div>
                                        <div class="py-2">
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#leaveOrgModal">Leave Organization</button>
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
    <div style="height: 19vh;">
    </div>
    @include('components.organizationModal')


    <!-- ModalBox To PopOut Create Make Schedule Form-->
    <div class="modal fade bd-example-modal-lg" id="makeSchedule" tabindex="-1">     

        <div class="modal-dialog modal-lg">
    
            <div class="modal-content">     
    
                <div class="modal-header">                                      
                    <h5 class="modal-title" id="scheduleModel">Create Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
            <form method="POST" action="{{('/profile/organization')}}">
                            
                <div class="modal-body">
                  
                    <div class="form-group row p-2">
                        <label for="scheduleName" class="col-md-3 col-form-label text-md-right">{{ __('Schedule Title') }}</label>

                        <div class="col-md-9">
                            <input id="scheduleName" type="text" class="form-control" name="scheduleName">
                        </div>
                    </div>
    
                    <div class="form-group row p-2">
                        <label for="stateName" class="col-md-3 col-form-label text-md-right">{{ __('State') }}</label>
                        <div class="col-md-9">
                            {{-- <input id="state" type="email" class="form-control @error('State') is-invalid @enderror" name="email" value="{{ old('State') }}" required autocomplete="email"> --}}
                            {{-- <input id="state" type="email" name="email" value="{{ old('State') }}"> --}}
                            {{-- @error('State')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}

                            <select class="form-select" id="stateName" name="stateName">
                                <option value="Select a State">Select a State</option>
                                <option value="Johor">Johor</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Malacca">Malacca</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Penang">Penang</option>
                                <option value="Perak">Perak</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Terengganu">Terengganu</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group row p-2">
                        <label for="recyclingCatagory" class="col-md-3 col-form-label text-md-right">{{ __('Catagory') }}</label>
                        <div class="col-md-9">
                            {{-- <input id="catagory" type="text" class="form-control @error('catagory') is-invalid @enderror" name="Catagory" value="{{ old('Catagory') }}" required autocomplete="name"> --}}
                            
                            {{-- @error('Catagory')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            
                            @enderror --}}

                            <select class="form-select" id="recyclingCatagory" name="recyclingCatagory">
                                <option value="Select a Catagory">Select a Catagory</option>
                                <option value="Plastic">Plastic</option>
                                <option value="Metal">Metal</option>
                                <option value="Paper">Paper</option>
                            </select>

                        </div>
                    </div>
                                
                    <div class="form-group row p-2">
                        <label for="scheduleDate" class="col-md-3 col-form-label text-md-right">{{ __('Date') }}</label>

                        <div class="col-md-9">
                            {{-- <input id="date" type="phoneNumber" class="form-control @error('Date') is-invalid @enderror" name="Date" value="{{ old('Date') }}" required autocomplete="phoneNumber"> --}}
                            
                            {{-- @error('Date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            
                            @enderror --}}

                            <div class="form-group col-sm d-flex justify-content-center align-items-center">
                                <input class="date form-control" type="text" placeholder="Select a date" name="scheduleDate" data-bs-target=".date">
                            </div>

                            <script type="text/javascript">
                                $('.date').datepicker({  
                                    format: 'yyyy-mm-dd'
                                });  
                            </script>

                        </div>
                    </div>
    
                    <div class="form-group row p-2">
                        <label for="scheduleTimeStart" class="col-md-3 col-form-label text-md-right">{{ __('Time Start') }}</label>

                        <div class="col-md-9">

                            <div class="md-form">
                                <input placeholder="Set Time" type="text" id="scheduletimeStart" class="form-control timepicker">
                            </div>

                            <script>
                            $('.scheduleTimeStart').datetimepicker({
                                format= 'hh-mm'
                            });
                            </script>

                        </div>
                    </div>

                    <div class="form-group row p-2">
                        <label for="scheduleContent" class="col-md-3 col-form-label text-md-right">{{ __('Content') }}</label>

                        <div class="col-md-9">
                            <input id="scheduleContent" type="text" class="form-control" name="scheduleContent">
                        </div>
                    </div>
                
                </div>
                                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </div>

            </form>
    
            </div>
    
        </div>
    </div>   
    
</div>

@endsection