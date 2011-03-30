var map;
var polyLine;
var directionsDisplays = [];
var directionsService;
var firstPath = {};

function initializeMap() {
    var latlng = new google.maps.LatLng('-34.649', '-58.456');
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var polyOptions = {
	    strokeColor: '#0000ff',
	    strokeOpacity: 1.0,
	    strokeWeight: 3
  	}
    polyLine = new google.maps.Polyline(polyOptions);
  	polyLine.setMap(map);
  	
  	directionsService = new google.maps.DirectionsService();
}
	
function displayMarker(position) {
	var marker;
	marker = new google.maps.Marker({
       	map: map, 
       	position: position,
    });
        
    google.maps.event.addListener(marker, 'click', function() {
    	markerOnClick(marker);
  	});
  	return marker;
}

function markerOnClick(marker) {
	var path = polyLine.getPath();
	var i = 0;
	var found = false;
	var inFirstPath = false;
	
	while (i < path.getLength() && !found) {
		if (path.getAt(i).equals(marker.getPosition()))
			found = true;
		i++;
	}
	
	for (key in firstPath) {
   		if (firstPath[key].position.equals(marker.getPosition())) {
			$(key).toggle();
			inFirstPath = true;
			redrawPolyline($(key).parentNode);
		}
  	}

	if (found) {
		path.removeAt(i - 1);
	} else if (!inFirstPath){
		// Because path is an MVCArray, we can simply append a new coordinate
  		// and it will automatically appear
  		path.push(marker.getPosition());
  	}
}

function generateDirections() {
	var path = polyLine.getPath();
	var subPath = [];

	path.forEach(function(position, idx) {
		subPath.push(position);
		//Enviamos los puntos en paquetes de a 10 para no exceder las limitaciones del geocoder
		if (subPath.size() == 10) {
			requestDirections(subPath);
			subPath.clear();
			subPath.push(position);
		}
	});
	
	//Si quedó algún resto sin enviar lo enviamos ahora.
	if (subPath.size() > 1) {
		requestDirections(subPath);
	}
	
	clearPolyLine();
}

function requestDirections(waypoints) {
	var origin = waypoints.first();
	var destination = waypoints.last();
	
	waypts = [];
	var i;
	
	for (i = 1; i < waypoints.size() - 1; i++) {
		waypts.push({
			location: waypoints[i],
			stopover: true
		});
	}
	
	var request = {
		origin: origin, 
		destination: destination,
		waypoints: waypts,
		travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    
    directionsService.route(request, displayDirections);
}

function displayDirections(result, status) {
	  	
    if (status == google.maps.DirectionsStatus.OK) {
    	var renderer = new google.maps.DirectionsRenderer({
	   		suppressMarkers: true,
	   		directions: result,
	   		map: map,
	   	});
	   	directionsDisplays.push(renderer);
    }
}

function clearPolyLine() {
	var path = polyLine.getPath();
	var lenght = path.getLength();
	var i;
	for (i=0; i<lenght; i++) {
		path.pop();
	}
}

function clearAll() {
	clearPolyLine();
	directionsDisplays.each(function(renderer) {
		renderer.setMap(null);
	});
}

function redrawPolyline(list) {
	var lis = list.childElements();
	clearPolyLine();
	var path = polyLine.getPath();
	
	lis.each(function(li) {
		path.push(firstPath[li.id].position);
	});
}
