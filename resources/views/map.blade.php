@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Google Map Script -->
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
        center: {
            lat: 5.359051472864475,
            lng: 100.31409357972954
        },
        zoom: 15
        });

        var marker = new google.maps.Marker({
            // position: {
            //     lat: 5.359051472864475,
            //     lng: 100.31409357972954
            // },
            map: map,
            draggable: true,
            title: "Click to zoom",
        });
        
        //Onclick Listener, click once will move ur screen to the middle of the marker
        marker.addListener("click", () => {
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
        const input = document.getElementById("searchMap-Input");
        const searchBox = new google.maps.places.SearchBox(input);

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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&&callback=initMap&libraries=places&v=weekly"></script>
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
            <div class="form-group">
                <div id="googleMap" style="width:100%; height:700px;"></div>
                <form method="POST" action="{{ route('map.addLocation') }}">
                    @csrf
                    @method('put')

                    <div class="d-flex justify-content-center pt-3">
                        <label for="searchMap-Input" class="px-2">Search Location:</label>
                        <input type="text" name="placeInfo" id="searchMap-Input" class="w-50">
                    </div>
                    <div class="d-flex justify-content-center row py-3">
                        <div class="col-3">
                            <label for="lng" class="">Latitude: </label>
                            <input type="text" name="lng" id="lng" class="w-50" value="{{ $userInfo }}">
                        </div>
                        <div class="col-3">
                            <label for="lat" class="">Longitude: </label>
                            <input type="text" name="lat" id="lat" class="w-50">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button type="submit" id="confirmBtn" class="btn btn-primary">SAVE LOCATION</button>
                    </div>

                    REMEMBER CREATE WORKER VIEW TO SEARCH POINTER BASED ON SCHEDULE
                </form>
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
                {{-- <div class="d-flex justify-content-center p-3">
                    <form method="" action="">
                        <button id="confirmBtn" type="button" class="btn btn-success">Save Location</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection