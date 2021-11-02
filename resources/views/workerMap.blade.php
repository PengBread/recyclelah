@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/mapJS.js') }}"></script>
<!-- Google Map Script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&&libraries=places&v=weekly" async defer></script>
<!-- -->

    <div>
        <div id="pageTitle" class="pt-5 pb-5">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>ORGANIZATION MAP</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center">
                    <p>Check user-pinpoints under specific schedules</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="mapPage-Bottom">
        <div class="container mx-auto">
        <!-- Google Map -->
            <div>
                <div id="googleMap" style="width:100%; height:700px;"></div>
                    <div style="text-align: center">
                        <input type="radio" id="householdRadio" name="category" checked>
                        <label for="householdRadio">HouseHold</label>
                        <input type="radio" id="workerRadio" name="category">
                        <label for="householdRadio">Worker</label>
                    </div>

                    <form id="workerForm" method="POST" action="{{ route('map.listLocation') }}" style="display: none;">
                        @csrf
                        @method('put') 

                        <div class="d-flex justify-content-center pt-3">
                            <label for="date-dropdown">Scheduled Date: </label>
                            <select name="dateSchedules" id="date-dropdown">
                                @foreach($schedules as $scheduleDate)
                                    <option value="{{ $scheduleDate->scheduleID}}">{{ $scheduleDate->scheduleDateStart }}</option>
                                @endforeach
                            </select>
                            <button type="submit" id="markerBtn" class="btn btn-primary">Show Markers</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="mapSearch" class="p-5">
                <div class="container mx-auto">
                    <div id="mapSearch-Inside" class="p-5">
                        <div class="row">
                            <h2 class="d-flex justify-content-center">Info</h2>
                            <p class="d-flex justify-content-center" style="text-align: center;">
                                Find your house location and Click on the map to point the pointer on the map.
                                <br>Once you are done with pointing your house location, click the "SAVE LOCATION" button.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection