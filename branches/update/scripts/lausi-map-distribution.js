var map;
var markers = [];
var icons = {
	available: 'images/marker_green.png', 
	assigned: 'images/marker_blue.png',
	partiallyAssigned: 'images/partiallyAssigned.png',
	client: 'images/pin_green.png'
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

function drawRing(center, radius, colorIndex) {
	var strokeColors = ['#00ff00', '#0000ff', '#fffc00', '#ff0000'];
	
	if (colorIndex === undefined)
		colorIndex = 0;
	new google.maps.Circle({
		center: center,
		map: map,
		radius: radius,
		strokeColor: strokeColors[colorIndex],
		strokeOpacity: 0.6,
		fillColor: '#0000ff',
		fillOpacity: 0.0
	});
}
