@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/supportFaqProfile.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div style="height: 100%; background-color: #f8f8f8">
    <div class="container mx-auto">
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
                        <div class="profile-sidebar-items pb-4">
                            <a class="profilesideBtn btn" href="{{ route('organization') }}">Organization Information</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-content col col-sm pt-5 pb-5">
                <!--SchedulesContainer -->
                <div class="profile-content-container border">
                    <div class="pt-3 px-3">

                        <h4>Organization Schedules</h4>
                        <hr>
                        <div>
                            <p>Check your organization schedules here</p>
                        </div>

                        @include('components.errors')
                        
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                    </div>
                    <div class="p-3">
                        <div class="border">
                            <div class="table-responsive-sm">
                                <table class="table" id="scheduleTable">
                                    @csrf
                                    
                                    <thead>
                                        <tr style="text-align: center;">
                                        <th scope="col" style="width: 5%;">#</th>
                                        <th scope="col" style="width: 25%;">Date Start</th>
                                        <th scope="col" style="width: 25%;">Date End</th>
                                        <th scope="col" style="width: 15%;">State</th>
                                        <th scope="col" style="width: 15%;">Status</th>
                                        <th scope="col" style="width: 15%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedules as $data)
                                            <tr style="text-align: center;">
                                                <th scope="row">
                                                    @if(auth()->user()->userID == $owner->userID)
                                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteScheduleModal{{ $data->scheduleID }}"><i class="mdi mdi-trash-can-outline"></i></button>
                                                        @include('components.deleteScheduleModal', ['data' => $data])
                                                    @endIf
                                                </th>
                                                <td>{{ $data->scheduleDateStart }}</td>
                                                <td>{{ $data->scheduleDateEnd }}</td>
                                                <td>{{ $data->stateName }}</td>
                                                @if($data->scheduleStatus)
                                                    <td>Ongoing</td>
                                                @else
                                                    <td>Completed</td> 
                                                @endif
                                                <td>
                                                    @if(auth()->user()->userID == $owner->userID)
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editScheduleModal{{ $data->scheduleID }}">EDIT</button>
                                                        @include('components.editScheduleModal', ['$data' => $data])
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row px-2">
                                    <div class="col">
                                        @if(auth()->user()->userID == $owner->userID)
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createScheduleModal">Create Schedule</button>
                                            @include('components.createScheduleModal')
                                        @endIf
                                    </div>
                                    <div class="d-flex justify-content-end col">
                                        <nav aria-label="Page navigation">
                                            <div class="d-flex">
                                                <p id="pageInfo">Page:</p>
                                            </div>
                                            <ul class="pagination">

                                                @if($page > 1)
                                                    <li class="page-item"><a class="page-link" href="{{ route('orgSchedule.schedules', ['page' => $page-1]) }}">Previous</a></li>
                                                @endIf
                                                @for($i = 0; $i < $total/8; $i++)
                                                    <li class="page-item"><a class="page-link" href="{{ route('orgSchedule.schedules', ['page' => $i+1]) }}">{{ $i+1 }}</a></li>
                                                @endfor
                                                @if($page < $total/8)
                                                    <li class="page-item"><a class="page-link" href="{{ route('orgSchedule.schedules', ['page' => $page+1]) }}">Next</a></li>
                                                @endif
                                                
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
