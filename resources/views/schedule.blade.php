@extends('layouts.navfoot')

@section('navfoot')

<link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <div id="all">
        <div id="schedule-TopSection" style="height: 100%; background: #f3fdf5d7;">
            <div id="pageTitle" class="d-flex justify-content-center p-5">
                <div id="pageTitle-Container">
                    <h3>SCHEDULES</h3>
                    <p>Check on schedules and select the schedule you would like a specific organization to collect your materials</p>
                </div>
            </div>

            <!-- Search -->
            <div id="searchSchedule-Main" class="container mx-auto" style="height: 100%;">
                <div id="searchSchedule-Container" class="container h-100">
                    @include('components.errors')

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <form class="form" method="POST" action="{{ route('schedules') }}">
                        @csrf

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
        </div>

        <!-- Schedules Boxes -->
        <div id="schedule-BottomSection" style="background-image: url({{asset('/images/recyclebg1.jpg')}})">
            <div style="min-height: 60vh; background: #f3fdf5b7;">
                <div class="container mx-auto">
                    <div class="container pt-4">
                        <div class="row">

                            @foreach($schedules as $data)
                                @if($data->scheduleStatus != false)
                                <div class="schedule-Cards col-3 d-flex justify-content-center align-items-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 id="cardTitle" class="card-title">{{$data->scheduleName}}</h5>
                                            <p id="cardState" class="card-text">{{$data->stateName}}</p>
                                            <p id="cardDate" class="card-text">{{$data->scheduleDateStart}}</p>
                                            {{-- <p id="cardTime" class="card-text">{{$data->scheduleDateStart}}</p> --}}
                                            <button type="button" class="btn btn-primary stretched-link" data-bs-toggle="modal" data-bs-target="#modal{{$data->scheduleID}}">Click Me</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- SCHEDULE MODAL -->
                                <div class="modal fade" id="modal{{$data->scheduleID}}" tabindex="-1">                   
                                    <div class="modal-dialog">
                                        <div class="modal-content">                                 
                                            <div class="modal-header">                                      
                                            <h5 class="modal-title" id="scheduleModel">{{$data->scheduleName}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>    
                                            <div class="modal-body">
                                                <form class="form" method="POST" action="{{ route('schedule.joinSchedule', ['sch'=>$data->scheduleID]) }}">
                                                    @csrf
                                                    @method('put') 

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