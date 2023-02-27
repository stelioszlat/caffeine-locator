var position;
var map;
var service;
var infowindow;
var slider = document.getElementById("myRange");

var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
};

function getLocation() {
    if(navigator.geolocation){
	navigator.geolocation.getCurrentPosition(success, fail);
    }else{
	position = {lat: 37.983810, lng: 23.727539 };
	initMap(position);

    }
}

function success(position) {
    position = {lat: position.coords.latitude, lng:position.coords.longitude};
    initMap(position);
}

function fail() {
    position = {lat: 37.983810 , lng: 23.727539 };
    initMap(position);
}

function initMap(position) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: position,
        zoom: 15,
	mapTypeId: 'hybrid'
    });
    var marker = new google.maps.Marker({
	map: map,
	title: "You are here",
	position: position,
	icon: {
		url: "GMapsApi/yellow-point.svg",
		scaledSize: new google.maps.Size(32, 32)
	}
    });
    infowindow = new google.maps.InfoWindow();
    var request = {
	location: position,
	radius: slider.value,
	type: ['cafe']
    };
    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
}

function callback(results, status) {
    var bounds = new google.maps.LatLngBounds();
    if (status == google.maps.places.PlacesServiceStatus.OK) {
	for (var i = 0; i < results.length; i++) {
	    var place = results[i];
	    createMarker(results[i]);
	    bounds.extend(place.geometry.location);

	}
    }
    map.fitBounds(bounds);
}

function createMarker(place) {

    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
	map: map,
	title: place.name,
	position: place.geometry.location,
	icon: {
		url: "GMapsApi/red-point.svg",
		scaledSize: new google.maps.Size(32, 32)
	}
    });
    var request = { reference: place.reference };
    service.getDetails(request, function(details, status){
	google.maps.event.addListener(marker, 'click', function() {
	    infowindow.setContent('<div><strong>' + place.name + '</strong><br>'+ place.vicinity +'<br><form action="save_favorite.php" method="post"><input type="submit" name="Add" value="AddToFavorites"><input type="hidden" name="name" value='+place.place_id+'><input type="hidden" name="lat" value='+place.geometry.location.lat()+'><input type="hidden" name="lng" value='+place.geometry.location.lng()+'></form></div>');
	    infowindow.open(map, this);
	});
    });
}
