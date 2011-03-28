var map;
var markers = [];
var icons = {available: 'images/available.gif', assigned: 'images/assigned.gif'};

function initializeMap() {
    var latlng = new google.maps.LatLng('-34.649', '-58.456');
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}
	
function displayMarker(id, position, type, onClickCallback) {
	var marker;
	marker = new google.maps.Marker({
       	map: map, 
       	position: position,
       	icon: icons[type]
    });
        
    google.maps.event.addListener(marker, 'click', function() {
    	onClickCallback(marker);
  	});
  	
  	markers[id] = marker;
}

function markAssigned(markerId) {
	markers[markerId].setIcon(icons['assigned']);
}

function markAvailable(markerId) {
	markers[markerId].setIcon(icons['available']);
}