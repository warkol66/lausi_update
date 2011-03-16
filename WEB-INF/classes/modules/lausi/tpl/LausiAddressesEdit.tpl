<h2>Administración de Direcciones</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Dirección</h1>
|-if $message eq "created"-|
	<div class="successMessage">Direccion creada correctamente, Puede Editar sus carteleras en la seccion inferior</div>
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
				<input name="street" type="text" id="street" title="street" value="|-$address->getstreet()-|" size="45" maxlength="100" />
			</p>
			<p>
				<label for="number">Número</label>
				<input name="number" type="text" id="number" title="number" value="|-$address->getnumber()-|" size="12" />
			</p>
			<p>
				<label for="intersection">Intersección</label>
				<input name="intersection" type="text" id="intersection" title="intersection" value="|-$address->getintersection()-|" size="45" maxlength="100" />
			</p>
			<p>
				<label for="nickname">Nombre De Fantasía</label>
				<input name="nickname" type="text" id="number" title="number" value="|-$address->getNickname()-|" size="45" />
			</p>			
			<p>
				<label for="latitude">Latitud</label>
				<input name="latitude" type="text" id="latitude" title="latitude" value="|-$address->getlatitude()|system_numeric_format:8-|" size="20" />
			</p>
			<p>
				<label for="longitude">Longitud</label>
				<input name="longitude" type="text" id="longitude" title="longitude" value="|-$address->getlongitude()|system_numeric_format:8-|" size="20" />
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
				<select id="regionId" name="regionId" title="regionId">
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

				|-if isset($listRedirect)-|
					|-if isset($listRedirect.circuitId)-|
						<input type="hidden" name="listRedirect[circuitId]" value="|-$listRedirect.circuitId-|"></input>
					|-/if-|
					|-if isset($listRedirect.regionId)-|
						<input type="hidden" name="listRedirect[regionId]" value="|-$listRedirect.regionId-|"></input>
					|-/if-|
					|-if isset($listRedirect.rating)-|
						<input type="hidden" name="listRedirect[rating]" value="|-$listRedirect.rating-|"></input>
					|-/if-|
					|-if isset($listRedirect.streetName)-|
						<input type="hidden" name="listRedirect[streetName]" value="|-$listRedirect.streetName-|"></input>
					|-/if-|
					|-if isset($listRedirect.page)-|
						<input type="hidden" name="listRedirect[page]" value="|-$listRedirect.page-|"></input>
					|-/if-|
				|-/if-|
				
				<input type="submit" id="button_edit_address" name="button_edit_address" title="Aceptar" value="Aceptar" />
			
	</form>
	<form action="Main.php" method="get">
		|-if isset($listRedirect)-|
			|-if isset($listRedirect.circuitId)-|
				<input type="hidden" name="circuitId" value="|-$listRedirect.circuitId-|"></input>
			|-/if-|
			|-if isset($listRedirect.regionId)-|
				<input type="hidden" name="regionId" value="|-$listRedirect.regionId-|"></input>
			|-/if-|
			|-if isset($listRedirect.rating)-|
				<input type="hidden" name="rating" value="|-$listRedirect.rating-|"></input>
			|-/if-|
			|-if isset($listRedirect.streetName)-|
				<input type="hidden" name="streetName" value="|-$listRedirect.streetName-|"></input>
			|-/if-|
			|-if isset($listRedirect.page)-|
				<input type="hidden" name="page" value="|-$listRedirect.page-|"></input>
			|-/if-|			
		|-/if-|
		<input type="hidden" name="do" value="lausiAddressesList">
		<input type="submit" value="Cancelar">
	</form>
	</p>
	</fieldset>	

	
	<p>
	<form action="Main.php" method="get">
			|-if isset($listRedirect)-|
				|-if isset($listRedirect.circuitId)-|
					<input type="hidden" name="listRedirect[circuitId]" value="|-$listRedirect.circuitId-|"></input>
				|-/if-|
				|-if isset($listRedirect.regionId)-|
					<input type="hidden" name="listRedirect[regionId]" value="|-$listRedirect.regionId-|"></input>
				|-/if-|
				|-if isset($listRedirect.rating)-|
					<input type="hidden" name="listRedirect[rating]" value="|-$listRedirect.rating-|"></input>
				|-/if-|
				|-if isset($listRedirect.streetName)-|
					<input type="hidden" name="listRedirect[streetName]" value="|-$listRedirect.streetName-|"></input>
				|-/if-|
				|-if isset($listRedirect.page)-|
					<input type="hidden" name="listRedirect[page]" value="|-$listRedirect.page-|"></input>
				|-/if-|
			|-/if-|
			<input type="hidden" name="addressId" value="|-$address->getId()-|" id="addressId" />
			<input type="hidden" name="do" value="lausiAdvertisementsEdit" />
			<p><input type="submit" value="Crear Aviso en Dirección" /></p>
	</form>
	</p>

|-if isset($billboards)-|
	<p>
	<form action="Main.php" method="get">
		|-if isset($listRedirect)-|
			|-if isset($listRedirect.circuitId)-|
				<input type="hidden" name="listRedirect[circuitId]" value="|-$listRedirect.circuitId-|"></input>
			|-/if-|
			|-if isset($listRedirect.regionId)-|
				<input type="hidden" name="listRedirect[regionId]" value="|-$listRedirect.regionId-|"></input>
			|-/if-|
			|-if isset($listRedirect.rating)-|
				<input type="hidden" name="listRedirect[rating]" value="|-$listRedirect.rating-|"></input>
			|-/if-|
			|-if isset($listRedirect.streetName)-|
				<input type="hidden" name="listRedirect[streetName]" value="|-$listRedirect.streetName-|"></input>
			|-/if-|
			|-if isset($listRedirect.page)-|
				<input type="hidden" name="listRedirect[page]" value="|-$listRedirect.page-|"></input>
			|-/if-|
		|-/if-|
		<input type="hidden" name="addressId" value="|-$address->getId()-|" id="addressId">
		<input type="hidden" name="do" value="lausiBillboardsList">
		<p><input type="submit" value="Editar Carteleras de la Dirección"></p>
	</form>
	</p>
	<h3>Motivos en la Dirección</h3>
	<fieldset>
		<ul>
			|-foreach from=$groupByTheme item=item-|
			<li>|-assign var=theme value=$item.theme-|<strong>|-$theme->getName()-|</strong> - Cantidad de |-if $theme->getType() eq 1-|Módulos Dobles|-/if-||-if $theme->getType() eq 2-|Séxtuples|-/if-|: |-$item.adverts|@count-|<br />&nbsp;&nbsp;&nbsp;Desde: |-$theme->getStartDate()|date_format:"%d-%m-%Y"-| - Hasta: |-$theme->getEndDate()|date_format:"%d-%m-%Y"-| </li>
			|-/foreach-|
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
