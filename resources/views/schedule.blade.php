@extends('layouts.navfoot')

@section('navfoot')

<link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <div id="all">
        <div id="schedule-TopSection" style="height: 100%; background: #f3fdf5d7;">
            <div id="pageTitle" class="d-flex row justify-content-center p-5">
                <div id="pageTitle-Container">
                    <h3>SCHEDULES</h3>
                    <p>Check on schedules and select the schedule you would like a specific organization to collect your materials</p>
                </div>
                @if(!auth()->user())
                <div id="accountCheckDiv" class="d-flex justify-content-center">
                    <div style="color: red; align-items: center;">
                    <h5>You do not have an account. Create one here to start joining schedule! <a href="/register">CLICK HERE</a></h5>
                    </div>
                </div>
                @elseif(!auth()->user()->pointer)
                    <div id="pointerCheckDiv" class="d-flex justify-content-center">
                        <div style="color: red; align-items: center;">
                        <h5>You do not have a pointer selected. Click the button below to register a pointer under your location. <a href="{{ route('mapPage') }}">CLICK HERE</a></h5>
                        </div>
                    </div>
                @endIf
            </div>

            <!-- Search -->
            <div id="searchSchedule-Main" class="container mx-auto" style="height: 100%;">
                <div id="searchSchedule-Container" class="container h-100">
                    <div class="pt-3">
                        @include('components.errors')

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                    </div>
                    
                    <form class="form" method="GET" action="{{ route('schedules') }}">

                        <div class="row">
                            <div class="form-group col-sm d-flex justify-content-center align-items-center">
                                
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-recycle-variant"></span>
                                    </span>
                                    <select class="form-select" id="catScheduleSelection" name="catScheduleSelection">
                                        <option value="">Select a Category</option>
                                        @foreach ($category as $item)
                                            @if($item->recyclingCategory != "")
                                                <option value="{{ $item->recyclingCategory }}">{{ $item->recyclingCategory }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-sm d-flex justify-content-center align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-compass-outline"></span>
                                    </span>
                                    <select class="form-select" id="stateScheduleSelection" name="stateScheduleSelection">
                                        <option value="">Select a State</option>
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
                            
                            <div class="form-group col-sm d-flex justify-content-center align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-home-city-outline"></span>
                                    </span>
                                    <select class="form-select" id="orgScheduleSelection" name="orgScheduleSelection" placeholder="Select an Organization">
                                        <option value="">Select an Organization</option>
                                        @foreach ($organization as $item)
                                            
                                            <option value='{{ $item->organizationID }}'>{{ $item->organizationName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-sm d-flex justify-content-center align-items-center">
                                <input class="date form-control" type="text" placeholder="Select a date" name="dateScheduleSelection">
                            </div>
                            
                            <script type="text/javascript">
                                $('.date').datepicker({  
                                    format: 'yyyy-mm-dd'
                                });  
                            </script>

                            <div class="d-flex justify-content-center align-items-center pt-2">
                                <button id="searchBtn" type="submit" class="btn btn-success" style="width: 200px;">SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(auth()->user())
                @if(auth()->user()->pointer)
                    @if(auth()->user()->pointer->pointerSchedule)
                    <form class="form pt-5" method="POST" action="{{ route('schedule.leaveSchedule') }}">
                        @csrf
                        @method('put')
                        <div id="pointerJoinedDiv" class="d-flex justify-content-center">
                            <div class="p-3" style="color: rgb(44, 44, 44); align-items: center; background-color: rgb(255, 189, 189); border-radius: 10px; text-align:center">
                                <h5>You are currently in a schedule. The schedule info is:</h5>
                                <h6>Organization: {{auth()->user()->pointer->pointerSchedule->ownedBy->organizationName}}</h6>
                                <h6>Date Start: {{auth()->user()->pointer->pointerSchedule->scheduleDateStart}}</h6>
                                <h6>Date End: {{auth()->user()->pointer->pointerSchedule->scheduleDateEnd}}</h6>
                                <div class="d-flex justify-content-center p-3">
                                    <button id="leaveBtn" type="submit" class="btn btn-danger" style="width: 200px;">LEAVE SCHEDULE</button>
                                </div>
                                <p>NOTE: YOU WILL NOT BE ABLE TO LEAVE THE SCHEDULE YOU JOINED DURING THE SCHEDULE DATE</p>
                            </div>
                        </div>
                    </form>
                    @endif
                @endif
            @endif
        </div>

        <!-- Schedules Boxes -->
        <div id="schedule-BottomSection" style="background-image: url({{asset('/images/recyclebg1.jpg')}})">
            <div style="min-height: 60vh; background: #f3fdf5b7;">
                <div class="container mx-auto">
                    <div class="container pt-4">
                        <div class="row">

                            @foreach($schedules as $data)
                                @if($data->scheduleStatus != false)
                                <div class="schedule-Cards col-lg-3 d-flex justify-content-center align-items-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <h5 id="cardTitle" class="card-title">{{$data->ownedBy->organizationName}}</h5>
                                                <h6 id="cardState" class="card-subtitle text-muted p-1">{{$data->stateName}}</h6>
                                            </div>
                                            <div class="pt-5"> 
                                                @if($data->scheduleStatus == true)
                                                    <p id="cardStatus" class="card-text"><b>Status:</b> On-Going</p>
                                                @else
                                                    <p id="cardStatus" class="card-text"><b>Status:</b> Completed</p>
                                                @endif
                                            </div>
                                            <div class="pt-3">
                                                <p id="cardDate" class="card-text"><b>Date:</b> {{ Carbon\Carbon::parse($data->scheduleDateStart)->toDateString() }}</p>
                                                <p id="cardTime" class="card-text"><b>Time:</b> {{ Carbon\Carbon::parse($data->scheduleDateStart)->toTimeString() }}</p>
                                            </div>
                                            {{-- <p id="cardTime" class="card-text">{{$data->scheduleDateStart}}</p> --}}
                                        </div>
                                        <div class="card-footer" style="text-align: center;">
                                            @if(auth()->user())
                                                @if(!auth()->user()->pointer)
                                                {{-- <p style="color: red; align-items: center;"></p> --}}
                                                <button type="button" class="btn btn-light stretched-link" data-bs-toggle="modal" data-bs-target="#modal{{$data->scheduleID}}" disabled>Click Me</a>   
                                                @else 
                                                    <button type="button" class="btn btn-primary stretched-link" data-bs-toggle="modal" data-bs-target="#modal{{$data->scheduleID}}">Click Me</a>   
                                                @endif 
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- SCHEDULE MODAL -->
                                <div class="modal fade" id="modal{{$data->scheduleID}}" tabindex="-1">                   
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                 
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="scheduleModel">{{$data->ownedBy->organizationName}}</h5>                                     
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>    
                                            <div class="modal-body">
                                                <form class="form" method="POST" action="{{ route('schedule.joinSchedule', ['sch'=>$data->scheduleID]) }}">
                                                    @csrf
                                                    @method('put')
                                                    <h6 class="modal-title" id="scheduleModel">Title: {{$data->scheduleName}}</h6>
                                                    <br> 
                                                    <p>
                                                        Date Start: {{ Carbon\Carbon::parse($data->scheduleDateStart)->toDateString() }}
                                                        <br>
                                                        Time Start: {{ Carbon\Carbon::parse($data->scheduleDateStart)->toTimeString() }}
                                                    </p>
                                                    <p>
                                                        Date End: {{ Carbon\Carbon::parse($data->scheduleDateEnd)->toDateString() }}
                                                        <br>
                                                        Time End: {{ Carbon\Carbon::parse($data->scheduleDateEnd)->toTimeString() }}
                                                    </p>
                                                    <textarea class="form-control" style="resize: none" rows='10' readonly>{{$data->scheduleContent}}</textarea>
                            
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                                        <button type="submit" class="btn btn-primary">JOIN SCHEDULE</button>
                                                    </div>
                                                </form>
                                            </div>                                
                                        </div>                           
                                    </div> 
                                </div>
                                @endif
                            <!-- -------------------- -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection