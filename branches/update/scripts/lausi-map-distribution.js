var map;
var markers = [];
var icons = {
	available: 'images/available.png', 
	assigned: 'images/assigned.png',
	partiallyAssigned: 'images/partiallyAssigned.png'
};

function initializeMap() {
    var latlng = new google.maps.LatLng('-34.609', '-58.445');
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

function markPartiallyAssigned(markerId) {
	markers[markerId].setIcon(icons['partiallyAssigned']);
}