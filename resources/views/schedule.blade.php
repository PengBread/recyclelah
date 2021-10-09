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
                        <div class="form-group col-sm d-flex justify-content-center align-items-center">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <span class="mdi mdi-recycle-variant"></span>
                                </span>
                                <select class="form-select" id="catScheduleSelection">
                                    <option selected>Select a Category</option>
                                    <option>Insert all category through sql</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm d-flex justify-content-center align-items-center">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <span class="mdi mdi-compass-outline"></span>
                                </span>
                                <select class="form-select" id="stateScheduleSelection">
                                    <option>Select a State</option>
                                    <option>Insert states into here</option>
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
                            </select>
                        </div>
                        <div class="d-flex justify-content-center align-items-center pt-2">
                            <button id="searchBtn" type="button" class="btn btn-success" style="width: 200px;">SEARCH</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedules Boxes -->
        <div id="schedule-BottomSection">
            <div class="container mx-auto mt-5" style="min-height: 60vh">
                <div class="container h-100">
                    <div class="row">
                    <!-- foreach -->
                        <div class="schedule-Cards col-3 d-flex justify-content-center align-items-center">
                            <div class="card">
                                <div class="card-body">
                                    <h5 id="cardTitle" class="card-title">Organization Name</h5>
                                    <p id="cardState" class="card-text">State</p>
                                    <p id="cardDate" class="card-text">Date</p>
                                    <p id="cardTime" class="card-text">Time</p>
                                    <a href="#" class="btn btn-primary stretched-link">Click Me</a>
                                </div>
                            </div>
                        </div>
                    <!-- endforeach -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection