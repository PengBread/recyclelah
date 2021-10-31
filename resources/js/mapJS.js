<<<<<<< HEAD
$(document).ready(function () {

    if(document.getElementById('householdRadio').checked) {
        document.getElementById('householdForm').style.display = 'block';
        document.getElementById('workerForm').style.display = 'none';
    } else if(document.getElementById('workerRadio').checked) {
        document.getElementById('householdForm').style.display = 'none';
        document.getElementById('workerForm').style.display = 'block';
    }
});
=======
function initMap() {
    var map = new google.maps.Map(document.getElementById('googleMap'), {
    center: {
        lat: 5.359051472864475,
        lng: 100.31409357972954
    },
    zoom: 15
    });

    var marker = new google.maps.Marker({
        position: {
            lat: 5.359051472864475,
            lng: 100.31409357972954
        },
        map: map,
        draggable: true,
        title: "Click to zoom",
    });
    
    //Onclick Listener, click once will move ur screen to the middle of the marker
    marker.addListener("click", () => {
        map.setCenter(marker.getPosition());
    });

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
}

    // const myLatlng = { lat: 5.359051472864475, lng: 100.31409357972954 };
    // const map = new google.maps.Map(document.getElementById("googleMap"), {
    //     zoom: 4,
    //     center: myLatlng,
    // });
    // const marker = new google.maps.Marker({
    //     position: myLatlng,
    //     map,
    //     title: "Click to zoom",
    // });

    // map.addListener("center_changed", () => {
    //     // 3 seconds after the center of the map has changed, pan back to the
    //     // marker.
    //     window.setTimeout(() => {
    //     map.panTo(marker.getPosition());
    //     }, 3000);
    // });
    // marker.addListener("click", () => {
    //     map.setZoom(8);
    //     map.setCenter(marker.getPosition());
    // });
>>>>>>> a0d6cf85c11201d2128d06067cd1a218fac1b326
