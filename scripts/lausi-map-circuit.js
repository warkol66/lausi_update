var map;
var polyLine;
//Guardamos posicion => divId
var points = new Hash();
var markerBeingDragIndex;
var idx = $$('#points_container > div').size();
var polygon;
var polygonClosed = false;

function initializeMap() {
    var latlng = new google.maps.LatLng('-34.609', '-58.445');
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	map.enableKeyDragZoom({
		boxStyle: {
			border: "thick blue",
			backgroundColor: "blue",
			opacity: 0.3
		},
		paneStyle: {
			backgroundColor: "grey",
			opacity: 0.1
		}
	});
	
	google.maps.event.addListener(map, 'click', function(ev) {
    	mapOnClick(this, ev);
  	});
    
    var polyOptions = {
	    strokeColor: '#0000ff',
	    strokeOpacity: 1.0,
	    strokeWeight: 3
  	}
    polyLine = new google.maps.Polyline(polyOptions);
  	polyLine.setMap(map);
  	
  	google.maps.event.addListener(polyLine, 'click', function(ev) {
    	polyOnClick(this, ev);
  	});
  	
  	polygon = new google.maps.Polygon({
		fillOpacity: 0.2,
		fillColor: '#0000ff'
	});
	google.maps.event.addListener(polygon, 'click', function(ev) {
    	polyOnClick(this, ev);
  	});
}
	
function displayMarker(position) {
	var marker;
	
	marker = new google.maps.Marker({
       	map: map, 
       	position: position,
       	draggable: true,
       	icon: 'images/pin_blue.png'
    });
        
    google.maps.event.addListener(marker, 'click', function() {
    	markerOnClick(this);
  	});
  	
  	google.maps.event.addListener(marker, 'dragstart', function() {
    	markerOnDragstart(this);
  	});
  	
  	google.maps.event.addListener(marker, 'drag', function() {
    	markerOnDrag(this);
  	});
  	
  	google.maps.event.addListener(marker, 'dragend', function() {
    	markerOnDragend(this);
  	});
  	
  	return marker;
}

function markerOnClick(marker) {
	var path = polyLine.getPath();
	var i = 0;
	var found = false;
	
	while (i < path.getLength() && !found) {
		if (path.getAt(i).equals(marker.getPosition())) {
			found = true;
			if (i == 0 && !polygonClosed) {
				closePolygon();
			} else {
				path.removeAt(i);
				if (polygonClosed)
					openPolygon();
				marker.setMap(null);
			}
		}
		i++;
	}
	
	var id = points[marker.position.toString()];
	//Se supone que si existe el marker, va a existir en points, pero por si acaso...
	if (id != undefined && i != 1) {
		var div = $(id);
		div.remove();
		points.unset(marker.position.toString());
	}
}

function markerOnDragend(marker) {
	var path = polyLine.getPath();
	
	var oldPosition = path.getAt(markerBeingDragIndex);
	
	path.setAt(markerBeingDragIndex, marker.getPosition());
	
	var id = points[oldPosition.toString()];
	//Se supone que si existe el marker, va a existir en points, pero por si acaso...
	if (id != undefined) {
		var latitudeHidden = $(id + '_latitude');
		var longitudeHidden = $(id + '_longitude');
		
		latitudeHidden.value = marker.position.lat();
		longitudeHidden.value = marker.position.lng();
		
		points.unset(oldPosition.toString());
		points[marker.position.toString()] = id;
	}
}

function markerOnDrag(marker) {
	var path = polyLine.getPath();
	
	var oldPosition = path.getAt(markerBeingDragIndex);
	
	path.setAt(markerBeingDragIndex, marker.getPosition());
	
	var id = points[oldPosition.toString()];
	//Se supone que si existe el marker, va a existir en points, pero por si acaso...
	if (id != undefined) {
		points.unset(oldPosition.toString());
		points[marker.position.toString()] = id;
	}
}

function markerOnDragstart(marker) {
	var path = polyLine.getPath();
	var i = 0;
	var found = false;
	
	while (i < path.getLength() && !found) {
		if (path.getAt(i).equals(marker.getPosition())) {
			found = true;
			markerBeingDragIndex = i;
		}
		i++;
	}
}

function mapOnClick(map, mouseEvent) {
	if (!polygonClosed) {
		var newId = 'point_' + idx;
		var marker = displayMarker(mouseEvent.latLng);
		polyLine.getPath().push(mouseEvent.latLng);
		points[mouseEvent.latLng.toString()] = newId;
		
		addDiv(mouseEvent.latLng);
	}
}

/**
 * Agrega un punto de quiebre en la polilinea
 */
function polyOnClick(poly, mouseEvent) {
	var i = 0;
	var path = polyLine.getPath();
	var found = false;
	//Buscamos un par de puntos entre los cuales pueda estar el que queremos agregar
	while ( (i < (path.getLength() - 1)) && !found ) {
		found = pointIsBetween(mouseEvent.latLng, path.getAt(i), path.getAt(i + 1));
		if (found)
			addPointAfter(i,mouseEvent.latLng);
		i++;
	}
}

function addPointAfter(i, position) {
	var path = polyLine.getPath();
	var length = path.getLength();
	var j;
	
	path.push(path.getAt(length - 1));
	
	//Primero desplazamos el resto de los puntos
	for ( j = length - 2; j > i; j-- ) {
		path.setAt(j + 1, path.getAt(j));
	}
	
	//Finalmente insertamos
	path.setAt(i + 1, position);
	
	var newId = 'point_' + idx;
	var marker = displayMarker(position);
	points[position.toString()] = newId;
	addDiv(position, points[path.getAt(i)]);
}

function pointIsBetween(posBetween, pos1, pos2) {
	//Primero que nada tiene que estar en el MBR que contiene al segmento entre pos1 y pos2.
	if (!(Math.max(pos1.lat(), pos2.lat()) > posBetween.lat() 
			&& Math.max(pos1.lng(), pos2.lng()) > posBetween.lng()
			&& Math.min(pos1.lat(), pos2.lat()) < posBetween.lat() 
			&& Math.min(pos1.lng(), pos2.lng()) < posBetween.lng()))
		return false;
	
	//Luego vemos analizamos los deltas para ver si hay proporcionalidad, con eso sabemos si
	//pertenece a la recta que contiene a pos1 y pos2.
	var deltaLat = pos2.lat() - pos1.lat();
	var deltaLng = pos2.lng() - pos1.lng();
	
	if (deltaLat == 0)
		return posBetween.lat() == pos1.lat();
		
	if (deltaLng == 0)
		return posBetween.lng() == pos1.lng();
		
	deltaLatBetween = posBetween.lat() - pos1.lat();
	deltaLngBetween = posBetween.lng() - pos1.lng();
	
	return Math.round(deltaLatBetween / deltaLat) == Math.round(deltaLngBetween / deltaLng);
}

function addDiv(position, divId) {
	var id = 'point_' + idx;
	var dummyDiv = $('point_dummy_container').innerHTML;
	dummyDiv = dummyDiv.gsub('dummy', idx);
	
	if (divId != undefined)
		$(divId).insert({after: dummyDiv});
	else
		$('points_container').insert({bottom: dummyDiv});
	
	var latitudeHidden = $(id + '_latitude');
	var longitudeHidden = $(id + '_longitude');
		
	latitudeHidden.value = position.lat();
	longitudeHidden.value = position.lng();
	
	idx++;
}

function closePolygon() {
	var path = polyLine.getPath();
	polygon.setPaths(path);
	polygonClosed = true;
	polygon.setMap(map);
}	

function openPolygon() {
	polygon.setMap(null);
	polygonClosed = false;
}				
