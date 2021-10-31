@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/schedule.css') }}">

    <div id="all">
        <div id="schedule-TopSection" style="height: 100%;">
            <div id="pageTitle" class="d-flex justify-content-center p-5">
                <div id="pageTitle-Container">
                    <h3>SCHEDULES</h3>
                    <p>Check on schedules and select the schedule you would like a specific organization to collect your materials</p>
                </div>
            </div>

          

            <!-- Search -->
            
            <div id="searchSchedule-Main" class="container mx-auto" style="height: 100%;">
                <div id="searchSchedule-Container" class="container h-100">
                    <div class="row">

                        {{-- {!! Form::open(['action'=>'ScheduleController@scheduleFilter','method'=>'GET'])!!} --}}

                        <div class="form-group col-sm d-flex justify-content-center align-items-center">
                            
                            <div class="input-group">
                                <span class="input-group-text">
                                    <span class="mdi mdi-recycle-variant"></span>
                                </span>
                                <select class="form-select" id="catScheduleSelection">
                                    <option selected>Select a Category</option>
                                    @foreach ($catagory as $catagories)
                                        <option>{{$catagories->recyclingCatagory}}</option>
                                    @endforeach
                                    {{-- <option>Insert all category through sql</option> --}}
                                </select>
                            </div>
                            {{-- {{Form::Submit('something', ['class'=>'btn btn-primary'])}} --}}
                        </div>

                        <div class="form-group col-sm d-flex justify-content-center align-items-center">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <span class="mdi mdi-compass-outline"></span>
                                </span>
                                <select class="form-select" id="stateScheduleSelection">
                                    <option>Select a State</option>
                                    @foreach ($state as $states)
                                    <option>{{$states->stateName}}</option>
                                    @endforeach
                                    {{-- <option>Insert states into here</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm d-flex justify-content-center align-items-center">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <span class="mdi mdi-home-city-outline"></span>
                                </span>
                                <select class="form-select" id="orgScheduleSelection">
                                    <option>Select an Organization</option>
                                    <option>Insert all organization through sql</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm d-flex justify-content-center align-items-center">
                            <select class="form-control" id="orgScheduleSelection">
                                <option>Select a date</option>
                                @foreach ($date as $dates)
                                <option>{{$dates->scheduleDate}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center align-items-center pt-2">
                            <button id="searchBtn" type="button" class="btn btn-success" style="width: 200px;">SEARCH</button>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>

        
        {{-- <div class="container mx-auto justify-content-centre">
        <table style="border:1px;">
            @foreach($schedules as $data)
            <tr>    
              <th>{{$data->scheduleID}}</th>
              <th>{{$data->scheduleName}}</th>   
              <th>{{$data->stateName}}</th>
              <th>{{$data->scheduleTimeStart}}</th>       
             </tr>
            @endforeach
        </table>
        </div> --}}

        <!-- Schedules Boxes -->
        <div id="schedule-BottomSection">
            <div class="container mx-auto mt-5" style="min-height: 60vh">
                <div class="container h-100">
                    <div class="row">

                        @foreach($schedules as $data)

                        {{-- @for ($i = 0; $i < $rows; $i++) --}}

                        <div class="schedule-Cards col-3 d-flex justify-content-center align-items-center">
                            <div class="card">
                                <div class="card-body">
                                    <h5 id="cardTitle" class="card-title">{{$data->scheduleName}}</h5>
                                    <p id="cardState" class="card-text">{{$data->stateName}}</p>
                                    <p id="cardDate" class="card-text">{{$data->scheduleDate}}</p>
                                    <p id="cardTime" class="card-text">{{$data->scheduleTimeStart}}</p>
                                    <button type="button" class="btn btn-primary stretched-link" data-bs-toggle="modal" data-bs-target="#{{$data->scheduleName}}">Click Me</a>
                                    {{-- <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#nchosen">Edit</button> --}}
                                </div>
                            </div> 
                            
                            <div class="modal fade" id="{{$data->scheduleName}}" tabindex="-1">                   
                                <div class="modal-dialog">
                                    <div class="modal-content">                                 
                                        <div class="modal-header">                                      
                                           <h5 class="modal-title" id="scheduleModel">{{$data->scheduleName}}</h5>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                        
                                        <div class="modal-body">                                          
                                                <p>{{$data->scheduleContent}}</p>
                        
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Join Schedule</button>
                                                </div>
                                            </div>                                
                                    </div>                           
                                </div>                          
                            </div>

                        </div>       
                        
                        {{-- @endfor --}}

                        @endforeach      
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @foreach($schedules as $data)
                   
    <div class="modal fade" id="chosen" tabindex="-1">                   
        <div class="modal-dialog">
            <div class="modal-content">                                 
                <div class="modal-header">                                      
                   <h5 class="modal-title" id="scheduleModel">{{$data->scheduleName}}</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">                                          
                        <p>{{$data->scheduleContent}}</p>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Join Schedule</button>
                        </div>
                    </div>                                
            </div>                           
        </div>                          
    </div>

    @endforeach --}}

    {{-- <!--Model boxes-->
    <div class="modal fade" id="chosen" tabindex="-1">
        @include('components.errors')
        <form class="form" method="POST" action="{{ route('schedule.chosen') }}">
            @csrf
            @method('GET') 

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="scheduleModel">nothing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  

                        {{-- <p>Enter a new name to change your personal info name.</p> --}}
                        {{-- <p>{{$schedules->scheduleName}}</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Join Schedule</button>
                        </div>
                  
                </div>
            </div>
        
        </div>
        </form>
    </div> --}} 
@endsection