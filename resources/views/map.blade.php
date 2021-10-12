@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
    <!-- Google Map Script -->
    <script>
        function initMap() {
        var mapProp= {
          center:new google.maps.LatLng(5.359051472864475, 100.31409357972954),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&callback=initMap"></script> --}}
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
            <div class="pt-3">
                <div id="googleMap" style="width:100%;height:700px;"></div>
            </div>

            <div id="mapSearch" class="p-5">
                <div class="container mx-auto">
                    <div id="mapSearch-Inside" class="p-5">
                        <div class="row">
                            <h2 class="d-flex justify-content-center">Info</h2>
                            <p class="d-flex justify-content-center" style="text-align: center;">
                                Find your house location and Click on the map to point the pointer on the map.
                                <br>Once you are done with pointing your house location, click the CONFIRM button.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3">
                    <button id="confirmBtn" type="button" class="btn btn-success">CONFIRM</button>
                </div>
            </div>
        </div>
    </div>
@endsection