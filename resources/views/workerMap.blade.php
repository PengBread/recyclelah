@extends('layouts.navfoot2')

@section('navfoot2')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="{{ asset('js/orgMapJS.js') }}"></script> --}}
<!-- Google Map Script -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&&callback=initMap&libraries=places&v=weekly"></script>
<script>
    function initMap() {
        var pointers = @json($pointers->toArray());

        var map = new google.maps.Map(document.getElementById("googleMap"), {
            center: {lat: 5.285153, lng: 100.456238},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 12,
        });

        pointers.forEach(pointerList => {
            console.log(pointerList)
            const contentString =
            '<form method="" action="">' +
                // '<meta name="csrf-token" content="{{ csrf_token() }}">' +
                // "@method('put')" +
                '<div id="content">' +
                    "<p><b>Latitude: " + pointerList.latitude + ", Longitude:" + pointerList.longitude + "</b></p>" +
                    '<div id="bodyContent">' +
                        "Name:" + " <br>" +
                        "Phone No: 0124669989 <br>" +
                        "Address: Penang, Malaysia" +
                    "</div>" +
                    '<div style="text-align: end; padding-top: 8px;">' +
                        '<button type="submit" id="collectedBtn" class="btn-primary">COLLECTED</button>' +
                    "</div>" +
                "</div>" +
            "</form>";

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 400,
            });

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(pointerList.latitude, pointerList.longitude),
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
        })
    }
</script>
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

                    <form id="workerForm" method="GET" action="{{ route('workerPage') }}">
                        @csrf

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