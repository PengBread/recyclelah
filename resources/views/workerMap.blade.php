@extends('layouts.navfoot')

@section('navfoot')
<link rel="stylesheet" href="{{ asset('css/map.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- <script src="{{ asset('js/orgMapJS.js') }}"></script> --}}
<!-- Google Map Script -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6YZ24et8sJXFJHy2fAtKDI8CZ4A2BiJs&&callback=initMap&libraries=places&v=weekly"></script>
<script>
    function initMap() {
        var pointers = @json($pointers->toArray());
        console.log(pointers);

        var map = new google.maps.Map(document.getElementById("googleMap"), {
            center: {lat: 5.3528, lng: 100.3530},
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 11,
        });

        pointers.forEach(pointerList => {
            // console.log(pointerList)
            let pStatus = pointerList.pointerStatus;
            let collectCompare = (pStatus == "Done") ? '<button type="submit" id="collectedBtn" name="collectedBtn" class="btn btn-primary" value="unset">UNSET</button>' : '<button type="submit" id="collectedBtn" name="collectedBtn" class="btn btn-primary" value="collected">COLLECTED</button>';
            let alertCompare = (pStatus == "Done") ? '<button type="submit" id="alertBtn" class="btn btn-primary" disabled>ALERT</button>' : '<button type="submit" id="alertBtn" class="btn btn-primary">ALERT</button>';
            let contentString =
            '<div>' +
                '<form method="POST" action="{{ route("map.changeStatus") }}">' +
                    '@csrf' +
                    '@method("put")' +
                    '<div id="content">' +
                        '<input type="hidden" name="pointer_Input" value="' + pointerList.pointerID + '" readonly>' +
                        "<p><b>Latitude: " + pointerList.latitude + "</b><br>" +
                        "<b>Longitude: " + pointerList.longitude + "</b></p>" +
                        '<div id="bodyContent">' +
                            "<b>Name:</b> " + pointerList.name + " <br>" +
                            "<b>Phone No:</b> " + pointerList.phoneNumber + "<br>" +
                            "<b>Address:</b> " + pointerList.pointerAddress + "<br>" +
                            "<b>Recycling:</b> " + pointerList.recycleCategory + "<br><br>" +
                            "<b>Pick-up Date:</b> " + pointerList.scheduleDateStart + "<br>" +
                            "<b>Status:</b> " + pointerList.pointerStatus + "<br>" +
                        "</div>" +
                        '<div style="text-align: end; padding-top: 8px;">' +
                            collectCompare +
                        "</div>" +
                    "</div>" +
                "</form>" +
                '<form method="POST" action="{{ route("map.alertUser") }}">' +
                    '@csrf' +
                    '@method("put")' +
                    '<div style="text-align: end; padding-top: 8px;">' +
                        alertCompare +
                    "</div>"+
                    '<input type="hidden" name="pointer_Input" value="' + pointerList.pointerID + '" readonly>' +
                "</form>" +
            '</div>';

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 400,
            });

            if(pointerList.pointerStatus == 'Done') {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pointerList.latitude, pointerList.longitude),
                    map: map,
                    title: "Click to zoom",
                    opacity: 0.5,
                });
            } else {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pointerList.latitude, pointerList.longitude),
                    map: map,
                    title: "Click to zoom",
                });
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }

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
        <div id="pageTitle" class="p-5">
            <div id="pageTitle-Container" class="row">
                <div class="d-flex justify-content-center align-content-center">
                    <h3>ORGANIZATION MAP</h3>
                </div>
                <div class="d-flex justify-content-center align-content-center" style="text-align: center">
                    <p>Check users under specific schedules to collect their recycleables</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="mapPage-Bottom" class="p-md-4" style="background-image: url({{asset('/images/map1.jpg')}});">
        <div class="container mx-auto">
        <!-- Google Map -->
            <div>
                <div id="googleMap" style="width:100%; height:700px;"></div>
            </div> 
        </div> 
    </div>

    <div style="background: #aee8e2"> 
        <div class="py-4 p-md-4">
            <div class="container mx-auto">
                <form id="workerForm" method="GET" action="{{ route('workerPage') }}">
                    @csrf

                    <div class="d-flex justify-content-center align-items-center pt-3">
                        <div class="selectSection d-flex justify-content-center align-content-center row-sm p-3">
                            <div>
                                <label for="date-dropdown">Select a Schedule Date: </label>
                                <select name="dateSchedules" id="date-dropdown" class="align-content-center p-2">
                                    @if($filter->isEmpty())
                                        <option value="empty">No Schedule Available</option>
                                    @elseif(!$filter->isEmpty())
                                        <option value="showAll">Show all User Location</option>
                                        @foreach($filter as $scheduleDate)
                                            <option value="{{ $scheduleDate->scheduleID}}" {{ request()->get("dateSchedules") == $scheduleDate->scheduleID ? "selected" : " "}}>{{ $scheduleDate->scheduleDateStart }}</option>
                                        @endforeach
                                    @endIf
                                </select>
                            </div>
                            <div>
                                <button type="submit" id="markerBtn" class="btn btn-primary p-2 ms-3">Show Pointers</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="mapSearch" class="pb-2 p-md-3">
            <div class="container mx-auto">
                <div id="mapSearch-Inside" class="p-2 p-md-5">
                    <div class="row">
                        <h2 class="d-flex justify-content-center">Guide</h2>
                        <p class="d-flex justify-content-center" style="text-align: center;">
                            Locate households pointers that are under your organization's schedule.
                            <br>Select a specific date, click the "Show Pointers" button to filter out pointers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection