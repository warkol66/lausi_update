DistributionMap = function() {
	//Referencia al mapa
	this.map;
	
	//Referencias a los markers
	this.markers = [];
	
	//Mapeo de tipos de markers con sus respectivos iconos.
	this.icons = {
		available: 'images/marker_green.png', 
		assigned: 'images/marker_blue.png',
		partiallyAssigned: 'images/partiallyAssigned.png',
		client: 'images/pin_green.png'
	};
	
	//Colores para los trazos de los anillos
	this.strokeColors = ['#00ff00', '#0000ff', '#fffc00', '#ff0000'];
	
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
	}
	
	this.displayMarker = function(id, position, type, onClickCallback) {
		var marker;
		marker = new google.maps.Marker({
	       	map: this.map, 
	       	position: position,
	       	icon: this.icons[type]
	    });
	        
	    google.maps.event.addListener(marker, 'click', function() {
	    	onClickCallback(marker);
	  	});
	  	
	  	this.markers[id] = marker;
	}
	
	/**
	 * Cambia el estado del marker como assignado.
	 * 
	 * @param string id, identificador del marker
	 */
	this.markAssigned = function(markerId) {
		var marker = this.markers[markerId];
		if (marker != undefined)
			marker.setIcon(icons['assigned']);
	}
	
	/**
	 * Cambia el estado del marker como assignado.
	 * 
	 * @param string id, identificador del marker
	 */
	this.markAvailable = function(markerId) {
		var marker = this.markers[markerId];
		if (marker != undefined)
			marker.setIcon(icons['available']);
	}
	
	/**
	 * Cambia el estado del marker como assignado.
	 * 
	 * @param string id, identificador del marker
	 */
	this.markPartiallyAssigned = function(markerId) {
		var marker = this.markers[markerId];
		if (marker != undefined)
			marker.setIcon(icons['partiallyAssigned']);
	}
	
	/**
	 * Dibuja un circulo.
	 * 
	 * @param LatLng center, centro del circulo en coordenadas.
	 * @param int radius, radio del circulo en metros.
	 * @param int colorIndex, indice del color a utilizar según this.strokeColors, opcional.
	 */
	this.drawRing = function(center, radius, colorIndex) {
		if (colorIndex === undefined)
			colorIndex = 0;
		new google.maps.Circle({
			center: center,
			map: this.map,
			radius: radius,
			strokeColor: this.strokeColors[colorIndex],
			strokeOpacity: 0.6,
			fillColor: '#0000ff',
			fillOpacity: 0.0
		});
	}
};
