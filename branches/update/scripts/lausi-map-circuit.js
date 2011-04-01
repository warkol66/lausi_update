var map;
var polyLine;
var directionsDisplays = [];
var directionsService;
var firstPath = {};

//Lo usamos como indice invertido para buscar por marcador.
var pathByPosition = {};

function initializeMap() {
    var latlng = new google.maps.LatLng('-34.609', '-58.445');
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
    	markerOnClick(this);
  	});
  	
  	google.maps.event.addListener(marker, 'mouseover', function() {
    	markerMouseOver(this);
  	});
  	
  	google.maps.event.addListener(marker, 'mouseout', function() {
    	markerMouseOut(this);
  	});
  	return marker;
}

function markerMouseOver(marker) {
	marker.setIcon('images/marker_green.png');
	$(pathByPosition[marker.position.toString()].lid).setStyle({'background': '#00ff00', 'textDecoration': 'underline'});
}

function markerMouseOut(marker) {
	marker.setIcon('');
	$(pathByPosition[marker.position.toString()].lid).setStyle({'background': 'transparent', 'textDecoration': 'none'});
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
	
	var li = pathByPosition[marker.position.toString()];
	if (li != undefined) {
		li = $(li.lid);
		li.toggle();
		inFirstPath = true;
		redrawPolyline(li.parentNode);
	}
	
	if (!inFirstPath){
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
	clearDirections();
}

function clearDirections() {
	directionsDisplays.each(function(renderer) {
		renderer.setMap(null);
	});
}

function redrawPolyline(list) {
	var lis = list.childElements();
	clearPolyLine();
	var path = polyLine.getPath();
	
	lis.each(function(li) {
		if (li.visible())
			path.push(firstPath[li.id].position);
	});
}