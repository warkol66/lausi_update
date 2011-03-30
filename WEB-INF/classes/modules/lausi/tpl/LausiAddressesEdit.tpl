<h2>Administración de Direcciones</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Dirección</h1>
|-if $message eq "created"-|
	<div class="successMessage">Direccion creada correctamente, puede editar sus carteleras en la seccion inferior</div>
|-elseif $message eq "error"-|
	<div class="failureMessage">Ha ocurrido un error al intentar guardar la dirección</div>
|-/if-|
<div id="div_address">
	<fieldset title="Formulario de edición de datos de una dirección">
	<legend>Dirección</legend>
	<form name="form_edit_address" id="form_edit_address" action="Main.php" method="post">
		<p>
			Ingrese los datos de la dirección
		</p>
			<p>
				<label for="street">Calle</label>
				<input name="street" type="text" id="street" title="street" value="|-$address->getstreet()-|" size="45" maxlength="100" onChange="$('button_edit_address').disable()" />
			</p>
			<p>
				<label for="number">Número</label>
				<input name="number" type="text" id="number" title="number" value="|-$address->getnumber()-|" size="12" onChange="$('button_edit_address').disable()" />
			</p>
			<p>
				<label for="intersection">Intersección</label>
				<input name="intersection" type="text" id="intersection" title="intersection" value="|-$address->getintersection()-|" size="45" maxlength="100" onChange="$('button_edit_address').disable()" />
			</p>
			<p><input type="button" id="button_locate" value="Buscar en Mapa" title="Buscar en Mapa" onClick="locate(this.form); $('button_edit_address').enable()"/></p>
			<p>
				<label for="nickname">Nombre De Fantasía</label>
				<input name="nickname" type="text" id="number" title="number" value="|-$address->getNickname()-|" size="45" />
			</p>			
			<p>
				<input name="latitude" type="hidden" id="latitude" title="latitude" value="|-$address->getlatitude()|system_numeric_format:8-|" size="20" />
			</p>
			<p>
				<input name="longitude" type="hidden" id="longitude" title="longitude" value="|-$address->getlongitude()|system_numeric_format:8-|" size="20" />
			</p>
		<p>
				<label for="rating">Valoración</label>
					<select name="rating" id="rating" >
						<option value="0" |-if $address->getrating() lt 1-|selected="selected"|-/if-|>Seleccione Valoración&nbsp;&nbsp;</option>
						<option value="1" |-if $address->getrating() eq 1-|selected="selected"|-/if-|>Premium&nbsp;&nbsp;</option>
						<option value="2" |-if $address->getrating() eq 2-|selected="selected"|-/if-|>Superior&nbsp;&nbsp;</option>
						<option value="3" |-if $address->getrating() eq 3-|selected="selected"|-/if-|>Destacada&nbsp;&nbsp;</option>
						<option value="4" |-if $address->getrating() eq 4-|selected="selected"|-/if-|>Standart&nbsp;&nbsp;</option>
					</select>
		</p>
			<p>
				<label for="regionId">Barrio</label>
				<select id="regionId" name="regionId" title="regionId" onChange="$('button_edit_address').disable()">
					<option value="">Seleccione un Barrio</option>
									|-foreach from=$regionIdValues item=object-|
									<option value="|-$object->getid()-|" |-if $address->getregionId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
									|-/foreach-|
								</select>
		</p>
			<p>
				<label for="owner">Dueño</label>
				<input name="owner" type="text" id="owner" title="owner" value="|-$address->getowner()-|" size="45" maxlength="100" />
			</p>
			<p>
				<label for="ownerPhone">Tel. Dueño</label>
				<input name="ownerPhone" type="text" id="ownerPhone" title="ownerPhone" value="|-$address->getownerPhone()-|" size="30" maxlength="100" />
			</p>
			<p>
				<label for="circuitId">Circuito</label>
				<select id="circuitId" name="circuitId" title="circuitId">
					<option value="">Seleccione un Circuito</option>
									|-foreach from=$circuitIdValues item=object-|
									<option value="|-$object->getid()-|" |-if $address->getcircuitId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
									|-/foreach-|
								</select>
		</p>
			<p>
				|-if $action eq "edit"-|
				<input type="hidden" name="id" id="id" value="|-$address->getid()-|" />
				|-/if-|
				<input type="hidden" name="action" id="action" value="|-$action-|" />
				<input type="hidden" name="do" id="do" value="lausiAddressesDoEdit" />

				|-if isset($filters)-|
					|-if isset($filters.circuitId)-|
						<input type="hidden" name="filters[circuitId]" value="|-$filters.circuitId-|"></input>
					|-/if-|
					|-if isset($filters.regionId)-|
						<input type="hidden" name="filters[regionId]" value="|-$filters.regionId-|"></input>
					|-/if-|
					|-if isset($filters.rating)-|
						<input type="hidden" name="filters[rating]" value="|-$filters.rating-|"></input>
					|-/if-|
					|-if isset($filters.streetName)-|
						<input type="hidden" name="filters[streetName]" value="|-$filters.streetName-|"></input>
					|-/if-|
					|-if isset($filters.page)-|
						<input type="hidden" name="filters[page]" value="|-$filters.page-|"></input>
					|-/if-|
				|-/if-|
				
				<input type="submit" id="button_edit_address" name="button_edit_address" title="Aceptar" value="Aceptar" |-if $address->getId() eq ''-|disabled|-/if-|/>
				<input type='button' onClick='location.href="Main.php?do=lausiAddressesList|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($page)-|&page=|-$page-||-/if-|"' value='Cancelar' title="Regresar al listado de carteleras"/>
				</p>
	</form>
	</fieldset>	
	
	<!-- mapa google -->
	<div id="map_container" style="display:none">
		<div id="map_canvas" style="height: 480px;"></div>
		<div><ul id="directions_results"></ul></div>
		<p><input id="hide_map" type="button" value="Ocultar mapa" title="Ocultar mapa" onClick="$('map_container').hide();$('show_map').show()"/></p>
	</div>
	<p><input id="show_map" type="button" value="Mostrar mapa" title="Mostrar mapa" onClick="$('map_container').show(); this.hide()" style="display:none;"/></p>
	<!-- fin mapa google -->
	
|-if isset($listRedirect) || $address->getId() ne ''-|

	<p>&nbsp;</p>
	<h2>|-$address->getName()-|</h2>
	<h1>Carteleras y Motivos en la Dirección</h1>
	<form action="Main.php" method="get">
			|-if isset($filters)-|
				|-if isset($filters.circuitId)-|
					<input type="hidden" name="filters[circuitId]" value="|-$filters.circuitId-|"></input>
				|-/if-|
				|-if isset($filters.regionId)-|
					<input type="hidden" name="filters[regionId]" value="|-$filters.regionId-|"></input>
				|-/if-|
				|-if isset($filters.rating)-|
					<input type="hidden" name="filters[rating]" value="|-$filters.rating-|"></input>
				|-/if-|
				|-if isset($filters.streetName)-|
					<input type="hidden" name="filters[streetName]" value="|-$filters.streetName-|"></input>
				|-/if-|
				|-if isset($filters.page)-|
					<input type="hidden" name="filters[page]" value="|-$filters.page-|"></input>
				|-/if-|
			|-/if-|
			<input type="hidden" name="addressId" value="|-$address->getId()-|" id="addressId" />
			<input type="hidden" name="do" value="lausiAdvertisementsEdit" />
			<input type="submit" value="Crear Aviso en Dirección" />
	</form>

|-/if-|

|-if isset($billboards)-|
	<form action="Main.php" method="get">
		|-if isset($filters)-|
			|-if isset($filters.circuitId)-|
				<input type="hidden" name="filters[circuitId]" value="|-$filters.circuitId-|"></input>
			|-/if-|
			|-if isset($filters.regionId)-|
				<input type="hidden" name="filters[regionId]" value="|-$filters.regionId-|"></input>
			|-/if-|
			|-if isset($filters.rating)-|
				<input type="hidden" name="filters[rating]" value="|-$filters.rating-|"></input>
			|-/if-|
			|-if isset($filters.streetName)-|
				<input type="hidden" name="filters[streetName]" value="|-$filters.streetName-|"></input>
			|-/if-|
			|-if isset($filters.page)-|
				<input type="hidden" name="filters[page]" value="|-$filters.page-|"></input>
			|-/if-|
		|-/if-|
		<input type="hidden" name="addressId" value="|-$address->getId()-|" id="addressId">
		<input type="hidden" name="do" value="lausiBillboardsList">
	<input type="submit" value="Editar Carteleras de la Dirección">
	</form>
	<h3>Motivos en la Dirección</h3>
	<fieldset>
		<ul>
			|-if $groupByTheme|@count gt 0-|
			|-foreach from=$groupByTheme item=item-|
			<li>|-assign var=theme value=$item.theme-|<strong>|-$theme->getName()-|</strong> - Cantidad de |-if $theme->getType() eq 1-|Módulos Dobles|-/if-||-if $theme->getType() eq 2-|Séxtuples|-/if-|: |-$item.adverts|@count-|<br />&nbsp;&nbsp;&nbsp;Desde: |-$theme->getStartDate()|date_format:"%d-%m-%Y"-| - Hasta: |-$theme->getEndDate()|date_format:"%d-%m-%Y"-| </li>
			|-/foreach-|
		|-else-|
		<li>No hay motivos asignados</li>
		|-/if-|
		</ul>
	</fieldset>
	<h3>Disponibilidad de Carteleras</h3>
	<p>
		|-include file="LausiBillboardsAvailableTodayInclude.tpl"-|
	</p>
	<h3>Agregar Avisos en la Dirección</h3>
	<p>
		|-include file="LausiAddAdvertOnAddressInclude.tpl"-|
	</p>	
	<h3>Agregar Carteleras a la Dirección</h3>
	<p>
		|-include file="LausiBillboardManager.tpl"-|
	</p>
|-/if-|

</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
	var map;
	var geocoder;
	var infowindow = new google.maps.InfoWindow();
	var marker;
	var suggestions = [];
	
	function initializeMap() {
	    directionsDisplay = new google.maps.DirectionsRenderer();
	    geocoder = new google.maps.Geocoder();
	    var latlng = new google.maps.LatLng(|-if $address->getLatitude() ne '' && $address->getLongitude() ne ''-|'|-$address->getLatitude()-|', '|-$address->getLongitude()-|'|-else-|'-34.649', '-58.456'|-/if-|);
	    var myOptions = {
	      zoom: |-if $address->getId() ne ''-|16|-else-|12|-/if-|,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	    
	    |-if $address->getId() ne ''-|
			displayMarker(latlng);
		|-/if-|
		
	  	google.maps.event.addListener(map, 'click', function(evnt) {
	  		clearResultsList();
	    	displayMarker(evnt.latLng);
	    	updateAddressInfoByPosition(evnt.latLng);
	  	});
	}
	
	function displayMarker(position) {
		if (!marker) {
			marker = new google.maps.Marker({
	        	map: map, 
	        	position: position,
	        	draggable: true
	        });
	        google.maps.event.addListener(marker, 'click', function() {
	    		infowindow.open(map, marker);
	  		});
	  		
		  	google.maps.event.addListener(marker, 'dragend', function() {
		  		clearResultsList;
		  		updateAddressInfoByPosition(marker.getPosition());
		  	});
	    } else {
	    	marker.setPosition(position);
	    }
	}
	
	function updateAddressInfoByPosition(position) {
		if (geocoder) {
	      geocoder.geocode({'latLng': position}, function(results, status) {
	        if (status == google.maps.GeocoderStatus.OK) {
	          if (results[0]) {
				updateAddressInfoByResult(results[0]);
	          }
	        } else {
	          alert("Geocoder failed due to: " + status);
	        }
	      });
	    }
	    $('button_edit_address').enable();
	}
	
	function updateAddressInfoByResult(result) {
		//Cuidado, esta funcion puede estar trabajando con una versión serializada en JSON de un result.
		
		infowindow.setContent(result.formatted_address);
	    infowindow.open(map, marker);
	    
	    var addressComponents = result.address_components;
		$('street').value = getComponent(addressComponents, 'route').long_name;
		
		//La altura devuelta por el geocoding es del tipo 2500-2600
		//Como necesitamos un único número y no un intervalo, tomamos el primer límite.
		var number = getComponent(addressComponents, 'street_number').long_name;
		if (number) {
			number = number.split('-');
			number = parseInt(number[0]);
		} else {
			number = '';
		}
		$('number').value = number;
		var loc = result.geometry.location;
		
		//Si estamos con la versión serializada del result, hemos tomado el recaudo anteriormente de
		//convertir el location en su representacion de cadena. Ahora lo reconstruimos con el constructor.
		//La idea es permitir el uso de los métodos y no acceder a las propiedades, para que no se rompa el dia
		//de mañana si sale una api donde internamente el objeto LatLng sea distinto.
		if (Object.isString(loc)) {
			loc = loc.split(',');
			loc = new google.maps.LatLng(loc[0], loc[1]);
		}
		
		$('latitude').value = loc.lat();
		$('longitude').value = loc.lng();
		
		var region = getComponent(addressComponents, 'neighborhood').long_name;
		selectRegion(region);
		
		$('button_edit_address').enable();
	}
	
	function getComponent(addressComponents, componentName) {
		var i = 0;
		var addressComponent;
		do {
			addressComponent = addressComponents[i];
			i++;
		} while (i < addressComponents.size() && addressComponent.types[0] != componentName);
		if (addressComponent.types[0] != componentName)
			return false;
		return addressComponent;
	}
	
	function selectRegion(region) {
		var corrections = {
			'Monserrat': 'Montserrat',
			'Núñez': 'Nuñez',
			'San Nicolas': 'San Nicolás',
			'Villa Ortuzar': 'Villa Ortúzar',
			'Villa Pueyrredón': 'Villa Pueyrredon',
			'Villa Gral.mitre': 'Villa Gral Mitre',
		};
		
		if (corrections[region])
			region = corrections[region];
	
		$$('select#regionId > option').each(function(option) {
			if (option.innerHTML == region) {
				option.selected = true;
				$('regionId').selectedIndex = option.index;
			} else {
				option.selected = false;
			}
		});
	}
	
	function locate(form) {
		$('map_container').show();
		if (!map) {
			initializeMap();
		}
		
		clearResultsList();
	
		//Convertimos el form en un objeto js para facilitar el análisis
		var locationData = form.serialize(true);
		
		//Componemos la dirección para la busqueda de la siguiente manera:
		//<calle> <numero>[, <barrio>], Buenos Aires, Argentina
		var address = locationData.street;
		
		if (locationData.number != '')
			address += ' ' + locationData.number;
			
		if (locationData.regionId != '')
			address += ', ' + locationData.regionId;
		
		address += ', Ciudad Autonoma de Buenos Aires, Capital Federal, Argentina';
		
		if (geocoder) {
    		geocoder.geocode( { 'address': address}, function(results, status) {
	     		if (status == google.maps.GeocoderStatus.OK) {
	     			suggestions.clear();
	    			var result = results[0];
	    			displayMarker(result.geometry.location);
	    			updateAddressInfoByResult(result);
	    			if (results.size() > 1)
	    				displayResultsList(results);
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}
	}
	
	function displayResultsList(results) {
		var resultsList = $('directions_results');
		resultsList.innerHTML = '';
		results.each(function(result) {
			//Esto se hace para reconstruir el objeto usando el constructor y no el simple evalJSON
			//esto nos permite poder usar sus métodos
			result.geometry.location = result.geometry.location.lat() + ', ' + result.geometry.location.lng();
			
			var locationString = 'new google.maps.LatLng(' + result.geometry.location + ')';
			resultString = Object.toJSON(result);
			var onClickString = 'displayMarker('+locationString+');updateAddressInfoByResult('+resultString+');';
			resultsList.insert({bottom:"<li onClick='"+onClickString+"'>"+result.formatted_address+'</li>'});
		});
	}
	
	function clearResultsList() {
		$('directions_results').innerHTML = '';
	}
	
</script>
