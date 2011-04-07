RouteSheetsMap = function() {
	this.map;
	this.polyLine;
	this.directionsDisplays = [];
	this.directionsService;
	this.firstPath = {};
	
	//Lo usamos como indice invertido para buscar por marcador.
	this.pathByPosition = {};
	
	/**
	 * Inicia y muestra el mapa.
	 * 
	 * @param string canvasId, id del div donde renderizar el mapa
	 */
	this.initializeMap = function(canvasId) {
	    var latlng = new google.maps.LatLng('-34.609', '-58.445');
	    var myOptions = {
	      zoom: 12,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    this.map = new google.maps.Map(document.getElementById(canvasId), myOptions);
		this.map.enableKeyDragZoom({
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
	    
	    var polyOptions = {
		    strokeColor: '#0000ff',
		    strokeOpacity: 1.0,
		    strokeWeight: 3
	  	}
	  	
	    this.polyLine = new google.maps.Polyline(polyOptions);
	  	this.polyLine.setMap(this.map);
	  	
	  	this.directionsService = new google.maps.DirectionsService();
	}
		
	/**
	 * Muestra un marker en el mapa, con las opciones especificadas.
	 * 
	 * @param string id, un identificador para acceder posteriormente al marker
	 * @param LatLng position, ubicación en coordenadas.
	 * @param string type, tipo de marker (afecta al icono a mostrar)
	 * @param function onClickCallback, una función para ejecutar al clickear el marker.
	 */	
	this.displayMarker = function(position) {
		var marker;
		marker = new google.maps.Marker({
	       	map: this.map, 
	       	position: position,
	    });
	    
	    var routeSheetsMap = this;
	        
	    google.maps.event.addListener(marker, 'click', function() {
	    	routeSheetsMap.markerOnClick(this)
	    });
	    
	  	google.maps.event.addListener(marker, 'mouseover', function() {
	  		routeSheetsMap.markerMouseOver(this)
	  	});
	  	
	  	google.maps.event.addListener(marker, 'mouseout', function() {
	  		routeSheetsMap.markerMouseOut(this)
	  	});
	  	
	  	return marker;
	}
	
	this.markerMouseOver = function(marker) {
		marker.setIcon('images/marker_green.png');
		$(this.pathByPosition[marker.position.toString()].lid).setStyle({'background': '#00ff00', 'textDecoration': 'underline'});
	}
	
	this.markerMouseOut = function(marker) {
		marker.setIcon('');
		$(this.pathByPosition[marker.position.toString()].lid).setStyle({'background': 'transparent', 'textDecoration': 'none'});
	}
	
	this.markerOnClick = function(marker) {
		var path = this.polyLine.getPath();
		var i = 0;
		var found = false;
		var inFirstPath = false;
		
		while (i < path.getLength() && !found) {
			if (path.getAt(i).equals(marker.getPosition()))
				found = true;
			i++;
		}
		
		var li = this.pathByPosition[marker.position.toString()];
		if (li != undefined) {
			li = $(li.lid);
			li.toggle();
			inFirstPath = true;
			this.redrawPolyline(li.parentNode);
		}
		
		if (!inFirstPath){
			// Because path is an MVCArray, we can simply append a new coordinate
	  		// and it will automatically appear
	  		path.push(marker.getPosition());
	  	}
	}
	
	this.generateDirections = function() {
		var routeSheetsMap = this;
		var path = this.polyLine.getPath();
		var subPath = [];
	
		path.forEach(function(position, idx) {
			subPath.push(position);
			//Enviamos los puntos en paquetes de a 10 para no exceder las limitaciones del geocoder
			if (subPath.size() == 10) {
				routeSheetsMap.requestDirections(subPath);
				subPath.clear();
				subPath.push(position);
			}
		});
		
		//Si quedó algún resto sin enviar lo enviamos ahora.
		if (subPath.size() > 1) {
			requestDirections(subPath);
		}
		
		this.clearPolyLine();
	}
	
	this.requestDirections = function(waypoints) {
		var routeSheetsMap = this;
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
	    
	    this.directionsService.route(request, function(result, status) { routeSheetsMap.displayDirections(result, status); });
	}
	
	this.displayDirections = function(result, status) {
	    if (status == google.maps.DirectionsStatus.OK) {
	    	var renderer = new google.maps.DirectionsRenderer({
		   		suppressMarkers: true,
		   		directions: result,
		   		map: this.map,
		   	});
		   	this.directionsDisplays.push(renderer);
	    }
	}
	
	this.clearPolyLine = function() {
		var path = this.polyLine.getPath();
		var lenght = path.getLength();
		var i;
		for (i=0; i<lenght; i++) {
			path.pop();
		}
	}
	
	this.clearAll = function() {
		this.clearPolyLine();
		this.clearDirections();
	}
	
	this.clearDirections = function() {
		this.directionsDisplays.each(function(renderer) {
			renderer.setMap(null);
		});
	}
	
	this.redrawPolyline = function(list) {
		var routeSheetsMap = this;
		var lis = list.childElements();
		this.clearPolyLine();
		var path = this.polyLine.getPath();
		
		lis.each(function(li) {
			if (li.visible())
				path.push(routeSheetsMap.firstPath[li.id].position);
		});
	}
};
