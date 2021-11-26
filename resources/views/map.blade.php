@extends('layouts.navfoot')

@section('navfoot')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="{{ asset('js/mapJS.js') }}"></script> --}}
<!-- Google Map Script -->
<script>
let infowindow;
let map;
var userLoc;

function initMap() {
    const input = document.getElementById("placeAddress");
    const searchBox = new google.maps.places.SearchBox(input);
    var latitude = parseFloat(document.getElementById("lat").value);
    var longitude = parseFloat(document.getElementById("lng").value);
    const contentString =
    '<div id="content">' +
        "<p><b>You placed your location here!</b></p>" +
        '<div id="bodyContent">' +
        "</div>" +
    "</div>";
    console.log(longitude);
    if(!longitude || !latitude) {
        longitude = 100.3530;
        latitude = 5.3528;
        userLoc = "Penang, Malaysia";
    } else {
        userLoc = @json($userInfo->pointerAddress);
    }

    console.log(longitude);
    console.log(latitude);

    infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 400,
    });
    
    map = new google.maps.Map(document.getElementById('googleMap'), {
        // center: {lat: longitude, lng: latitude},
        zoom: 11
    });

    //Load Map And Set Map Center, solving gray screen problem
    const request = {
        query: userLoc,
        fields: ["name", "geometry"],
    };
    service = new google.maps.places.PlacesService(map);
    service.findPlaceFromQuery(request, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK && results) {
            map.setCenter(results[0].geometry.location);
        }
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

    marker.setAnimation(google.maps.Animation.BOUNCE);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&&callback=initMap&libraries=places&v=weekly" async defer></script>
<!-- -->

    <div>
        <div id="pageTitle" class="p-5">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>MAP</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center" style="text-align: center">
                    <p>Select your household location to start joining schedules to recycle!</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="mapPage-Bottom" class="p-md-4" style="background-image: url({{asset('/images/map1.jpg')}});">
        <div class="container mx-auto">
        <!-- Google Map -->
            <div>
                @if (Session::has('success'))
                    <div class="alert alert-success" style="text-align: center;">{{ Session::get('success') }}</div>
                @endif
                <div id="googleMap" style="width:100%; height:700px;"></div>
            </div>
        </div>
    </div>

    <div style="background: #aee8e2"> 
        <div class="p-4">
            <div class="container mx-auto">
                <div>
                    @if(auth()->user()->pointer != null)
                        @if(auth()->user()->pointer->pointerStatus == 'Alert')
                            <form method="POST" action="{{ route('map.alertOk') }}">
                                @csrf
                                @method('put') 

                                <div class="d-flex row p-5">
                                    <div id="cfmDiv" class="p-3" style="text-align: center">
                                        <h5>ALERT</h5>
                                        <div>
                                        <p>A recycling truck is on the way to your household.</p>
                                        <button type="submit" id="markerBtn" class="btn btn-primary">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                        @if(auth()->user()->pointer->pointerStatus == 'Done')
                            <form method="POST" action="{{ route('map.userConfirm') }}">
                                @csrf
                                @method('put') 

                                <div class="d-flex row p-5">
                                    <div id="cfmDiv" class="p-3" style="text-align: center">
                                        <h5>Confirmation</h5>
                                        <div>
                                        <p>The recycling truck has marked your pointer as completed. Please confirm by clicking the button below.</p>
                                        <button type="submit" id="markerBtn" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endif

                    <form id="householdForm" method="POST" action="{{ route('map.addLocation') }}">
                        @csrf
                        @method('put')

                        @if(!auth()->user()->pointer)
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="category" class="d-none d-md-block px-lg-2">Category:</label>
                                <select class="form-select w-50" name="category">
                                    <option value="Plastic">Plastic</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Paper">Paper</option>
                                </select>
                            </div>
                            <div class="d-flex row-sm justify-content-center pt-3">
                                <label for="placeAddress" class="d-none d-md-block px-lg-2">Search Location:</label>
                                <input type="text" name="placeInfo" id="placeAddress" class="w-100 w-sm-100" value="" placeholder="Enter your location" required>
                            </div>
                            <div class="row py-3 d-flex justify-content-center">
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center">
                                    <label for="lng" class="">Latitude: </label>
                                    </div> 
                                    <div class="d-flex justify-content-center">
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lat" id="lat" class="w-50" value="" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center">
                                    <label for="lat" class="">Longitude: </label>
                                    </div> 
                                    <div class="d-flex justify-content-center">
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lng" id="lng" class="w-50" value="" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" id="confirmBtn" class="btn btn-primary">SAVE LOCATION</button>
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="category" class="d-none d-md-block px-lg-2">Category:</label>
                                <select class="form-select w-50" name="category">
                                    <option value="Plastic">Plastic</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Paper">Paper</option>
                                </select>
                            </div>
                            <div class="d-flex row-sm justify-content-center pt-3">
                                <label for="placeAddress" class="d-none d-md-block px-lg-2">Search Location:</label>
                                <input type="text" name="placeInfo" id="placeAddress" class="w-100 w-sm-100" value="{{ $userInfo->pointerAddress }}" placeholder="Enter your location" required>
                            </div>
                            <div class="row py-3 d-flex justify-content-center">
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center">
                                    <label for="lng" class="">Latitude: </label>
                                    </div> 
                                    <div class="d-flex justify-content-center">
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lat" id="lat" class="w-50" value="{{ $userInfo->longitude }}" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center">
                                    <label for="lat" class="">Longitude: </label>
                                    </div> 
                                    <div class="d-flex justify-content-center">
                                    <input type="text" style="background-color: rgb(221, 221, 221);" name="lng" id="lng" class="w-50" value="{{ $userInfo->latitude }}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" id="confirmBtn" class="btn btn-primary">SAVE LOCATION</button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div id="mapSearch" class="pb-2 p-md-3">
            <div class="container mx-auto" style="">
                <div id="mapSearch-Inside" class="p-2 p-md-5">
                    <div class="row">
                        <h2 class="d-flex justify-content-center">Guide</h2>
                        <p class="d-flex justify-content-center" style="text-align: center;">
                            Select your house location and typing inside the input box to pinpoint your location as a pointer in the map.
                            <br>Once you are done with pointing your house location, click the "SAVE LOCATION" button.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection