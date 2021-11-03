$(document).ready(function () {
    initMap();

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
});

function initMap() {
    var latitude;
    var longitude;
    const contentString =
    '<form method="" action="">' +
        '<meta name="csrf-token" content="{{ csrf_token() }}">' +
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
            lat: 100.3287506,
            lng: 5.414130699999999
        },
        zoom: 15
    });

    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 400,
    });
        
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(100.3287506, 5.414130699999999),
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
}
