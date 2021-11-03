$(document).ready(function () {
    initMap();
});

function initMap() {
    const input = document.getElementById("placeAddress");
    const searchBox = new google.maps.places.SearchBox(input);
    var latitude = parseFloat(document.getElementById("lat").value);
    var longitude = parseFloat(document.getElementById("lng").value);
    const contentString =
    '<form method="" action="">' +
        // '<meta name="csrf-token" content="{{ csrf_token() }}">' +
        // "@method('put')" +
        '<div id="content">' +
            "<p><b>Latitude: 1000, Longitude: -1111</b></p>" +
            '<div id="bodyContent">' +
                "Name: John Doe <br>" +
                "Phone No: 0124669989 <br>" +
                "Address: Penang, Malaysia" +
            "</div>" +
            '<div style="text-align: end; padding-top: 8px;">' +
                '<button type="submit" id="collectedBtn" class="btn-primary">COLLECTED</button>' +
            "</div>" +
        "</div>" +
    "</form>";

    var map = new google.maps.Map(document.getElementById('googleMap'), {
        center: {
            lat: latitude,
            lng: longitude
        },
        zoom: 15
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

