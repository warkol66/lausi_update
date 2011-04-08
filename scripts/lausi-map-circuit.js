CircuitMap = function() {
	this.map;
	this.polyLine;
	//Guardamos posicion => divId
	this.points = new Hash();
	this.markerBeingDragIndex;
	this.idx = $$('#points_container > div').size();
	this.polygon;
	this.polygonClosed = false;
	
	this.initializeMap = function(canvasId) {
		var _this = this;
	    var latlng = new google.maps.LatLng('-34.609', '-58.445');
	    var myOptions = {
	      zoom: 12,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    _this.map = new google.maps.Map(document.getElementById(canvasId), myOptions);
		_this.map.enableKeyDragZoom({
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
		
		google.maps.event.addListener(_this.map, 'click', function(ev) {
	    	_this.mapOnClick(this, ev);
	  	});
	    
	    var polyOptions = {
		    strokeColor: '#0000ff',
		    strokeOpacity: 1.0,
		    strokeWeight: 3
	  	}
	    _this.polyLine = new google.maps.Polyline(polyOptions);
	  	_this.polyLine.setMap(_this.map);
	  	
	  	google.maps.event.addListener(_this.polyLine, 'click', function(ev) {
	    	_this.polyOnClick(this, ev);
	  	});
	  	
	  	_this.polygon = new google.maps.Polygon({
			fillOpacity: 0.1,
			fillColor: '#0000ff'
		});
		
		google.maps.event.addListener(_this.polygon, 'click', function(ev) {
	    	_this.polyOnClick(this, ev);
	  	});
	}
		
	this.displayMarker = function(position) {
		var _this = this;
		var marker;
		
		marker = new google.maps.Marker({
	       	map: _this.map, 
	       	position: position,
	       	draggable: true,
	       	icon: 'images/pin_blue.png'
	    });
	        
	    google.maps.event.addListener(marker, 'click', function() {
	    	_this.markerOnClick(this);
	  	});
	  	
	  	google.maps.event.addListener(marker, 'dragstart', function() {
	    	_this.markerOnDragstart(this);
	  	});
	  	
	  	google.maps.event.addListener(marker, 'drag', function() {
	    	_this.markerOnDrag(this);
	  	});
	  	
	  	google.maps.event.addListener(marker, 'dragend', function() {
	    	_this.markerOnDragend(this);
	  	});
	  	
	  	return marker;
	}
	
	this.markerOnClick = function(marker) {
		var _this = this;
		var path = _this.polyLine.getPath();
		var i = 0;
		var found = false;
		
		while (i < path.getLength() && !found) {
			if (path.getAt(i).equals(marker.getPosition())) {
				found = true;
				if (i == 0 && !_this.polygonClosed) {
					_this.closePolygon();
				} else {
					path.removeAt(i);
					if (_this.polygonClosed)
						_this.openPolygon();
					marker.setMap(null);
				}
			}
			i++;
		}
		
		var id = _this.points[marker.position.toString()];
		//Se supone que si existe el marker, va a existir en points, pero por si acaso...
		if (id != undefined && i != 1) {
			var div = $(id);
			div.remove();
			_this.points.unset(marker.position.toString());
		}
	}
	
	this.markerOnDragend = function(marker) {
		var _this = this;
		var path = _this.polyLine.getPath();
		
		var oldPosition = path.getAt(_this.markerBeingDragIndex);
		
		path.setAt(_this.markerBeingDragIndex, marker.getPosition());
		
		var id = _this.points[oldPosition.toString()];
		//Se supone que si existe el marker, va a existir en points, pero por si acaso...
		if (id != undefined) {
			var latitudeHidden = $(id + '_latitude');
			var longitudeHidden = $(id + '_longitude');
			
			latitudeHidden.value = marker.position.lat();
			longitudeHidden.value = marker.position.lng();
			
			_this.points.unset(oldPosition.toString());
			_this.points[marker.position.toString()] = id;
		}
	}
	
	this.markerOnDrag = function(marker) {
		var _this = this;
		
		var path = _this.polyLine.getPath();
		
		var oldPosition = path.getAt(_this.markerBeingDragIndex);
		
		path.setAt(_this.markerBeingDragIndex, marker.getPosition());
		
		var id = _this.points[oldPosition.toString()];
		//Se supone que si existe el marker, va a existir en points, pero por si acaso...
		if (id != undefined) {
			_this.points.unset(oldPosition.toString());
			_this.points[marker.position.toString()] = id;
		}
	}
	
	this.markerOnDragstart = function(marker) {
		var _this = this;
		
		var path = _this.polyLine.getPath();
		var i = 0;
		var found = false;
		
		while (i < path.getLength() && !found) {
			if (path.getAt(i).equals(marker.getPosition())) {
				found = true;
				_this.markerBeingDragIndex = i;
			}
			i++;
		}
	}
	
	this.mapOnClick = function(map, mouseEvent) {
		var _this = this;
		
		if (!_this.polygonClosed) {
			var newId = 'point_' + _this.idx;
			var marker = _this.displayMarker(mouseEvent.latLng);
			_this.polyLine.getPath().push(mouseEvent.latLng);
			_this.points[mouseEvent.latLng.toString()] = newId;
			
			_this.addDiv(mouseEvent.latLng);
		}
	}
	
	/**
	 * Agrega un punto de quiebre en la polilinea
	 */
	this.polyOnClick = function(poly, mouseEvent) {
		var _this = this;
		
		var i = 0;
		var path = _this.polyLine.getPath();
		var found = false;
		//Buscamos un par de puntos entre los cuales pueda estar el que queremos agregar
		while ( (i < (path.getLength() - 1)) && !found ) {
			found = _this.pointIsBetween(mouseEvent.latLng, path.getAt(i), path.getAt(i + 1));
			if (found)
				_this.addPointAfter(i,mouseEvent.latLng);
			i++;
		}
	}
	
	this.addPointAfter = function(i, position) {
		var _this = this;
		
		var path = _this.polyLine.getPath();
		var length = path.getLength();
		var j;
		
		path.push(path.getAt(length - 1));
		
		//Primero desplazamos el resto de los puntos
		for ( j = length - 2; j > i; j-- ) {
			path.setAt(j + 1, path.getAt(j));
		}
		
		//Finalmente insertamos
		path.setAt(i + 1, position);
		
		var newId = 'point_' + _this.idx;
		var marker = _this.displayMarker(position);
		_this.points[position.toString()] = newId;
		_this.addDiv(position, points[path.getAt(i)]);
	}
	
	this.pointIsBetween = function(posBetween, pos1, pos2) {
		var _this = this;
		
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
	
	this.addDiv = function(position, divId) {
		var _this = this;
		
		var id = 'point_' + _this.idx;
		var dummyDiv = $('point_dummy_container').innerHTML;
		dummyDiv = dummyDiv.gsub('dummy', _this.idx);
		
		if (divId != undefined)
			$(divId).insert({after: dummyDiv});
		else
			$('points_container').insert({bottom: dummyDiv});
		
		var latitudeHidden = $(id + '_latitude');
		var longitudeHidden = $(id + '_longitude');
			
		latitudeHidden.value = position.lat();
		longitudeHidden.value = position.lng();
		
		_this.idx++;
	}
	
	this.closePolygon = function() {
		var _this = this;
		
		var path = _this.polyLine.getPath();
		_this.polygon.setPaths(path);
		_this.polygonClosed = true;
		_this.polygon.setMap(_this.map);
	}	
	
	this.openPolygon = function() {
		var _this = this;
		
		_this.polygon.setMap(null);
		_this.polygonClosed = false;
	}
};
