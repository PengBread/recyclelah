@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="{{ asset('js/mapJS.js') }}"></script> --}}
<!-- Google Map Script -->
<script>
function initMap() {
    const input = document.getElementById("placeAddress");
    const searchBox = new google.maps.places.SearchBox(input);
    var latitude = parseFloat(document.getElementById("lat").value);
    var longitude = parseFloat(document.getElementById("lng").value);
    const contentString =
    // '<meta name="csrf-token" content="{{ csrf_token() }}">' +
    // "@method('put')" +
    '<div id="content">' +
        "<p><b>You placed your location here!</b></p>" +
        '<div id="bodyContent">' +
        "</div>" +
    "</div>";

    var map = new google.maps.Map(document.getElementById('googleMap'), {
        center: {
            lat: latitude,
            lng: longitude
        },
        zoom: 12
    });

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 400,
    });

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitude, longitude),
        map: map,
        title: "Click to zoom",
    });

    
    //Onclick Listener, click once will move ur screen to the middle of the marker
    marker.addListener("click", () => {
        infowindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
        })
        map.setCenter(marker.getPosition());
    });

    //Onclick Add Marker
    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
    });

    function placeMarker(location) {
        marker.setPosition(location);
    }

    //SearchBox Add Marker
    google.maps.event.addListener(searchBox, 'places_changed', function(){
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        for(i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }

        map.fitBounds(bounds);
        map.setZoom(15);
    });

    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);
    })
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&&callback=initMap&libraries=places&v=weekly" async defer></script>
<!-- -->

    <div>
        <div id="pageTitle" class="pt-5 pb-5">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>MAP</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center">
                    <p>Pin-point household location</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="mapPage-Bottom">
        <div class="container mx-auto">
        <!-- Google Map -->
            <div>
                <div id="googleMap" style="width:100%; height:700px;"></div>
                    {{-- <div style="text-align: center">
                        <input type="radio" id="householdRadio" name="category" checked>
                        <label for="householdRadio">HouseHold</label>
                        <input type="radio" id="workerRadio" name="category">
                        <label for="householdRadio">Worker</label>
                    </div> --}}
                    <form id="householdForm" method="POST" action="{{ route('map.addLocation') }}">
                        @csrf
                        @method('put')

                        @if(!auth()->user()->pointer)
                            <div class="d-flex justify-content-center pt-3">
                                <label for="placeAddress" class="px-2">Search Location:</label>
                                <input type="text" name="placeInfo" id="placeAddress" class="w-50" value="">
                            </div>
                            <div class="d-flex justify-content-center row py-3">
                                <div class="col-3">
                                    <label for="lng" class="">Latitude: </label>
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lng" id="lng" class="w-50" value="" readonly>
                                </div>
                                <div class="col-3">
                                    <label for="lat" class="">Longitude: </label>
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lat" id="lat" class="w-50" value="" readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" id="confirmBtn" class="btn btn-primary">SAVE LOCATION</button>
                            </div>
                        @else
                            <div class="d-flex justify-content-center pt-3">
                                <label for="placeAddress" class="px-2">Search Location:</label>
                                <input type="text" name="placeInfo" id="placeAddress" class="w-50" value="{{ $userInfo->pointerAddress }}">
                            </div>
                            <div class="d-flex justify-content-center row py-3">
                                <div class="col-3">
                                    <label for="lng" class="">Latitude: </label>
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lng" id="lng" class="w-50" value="{{ $userInfo->longitude }}" readonly>
                                </div>
                                <div class="col-3">
                                    <label for="lat" class="">Longitude: </label>
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lat" id="lat" class="w-50" value="{{ $userInfo->latitude }}" readonly>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" id="confirmBtn" class="btn btn-primary">SAVE LOCATION</button>
                            </div>
                        @endif
                    </form>

                    {{-- <form id="workerForm" method="POST" action="{{ route('map.listLocation') }}" style="display: none;">
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
                    </form> --}}
                </div>
            </div>

            <div id="mapSearch" class="p-5">
                <div class="container mx-auto">
                    <div id="mapSearch-Inside" class="p-5">
                        <div class="row">
                            <h2 class="d-flex justify-content-center">Guide</h2>
                            <p class="d-flex justify-content-center" style="text-align: center;">
                                Find your house location and Click on the map/type inside the input boxes to pinpoint the pointer on the map.
                                <br>Once you are done with pointing your house location, click the "SAVE LOCATION" button.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection