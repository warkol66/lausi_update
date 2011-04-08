<h2>Configuración del Sistema</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Dirección de Cliente</h1>				<div id="div_clientaddress">
	|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la dirección de cliente</span>|-/if-|
	<p>
		Ingrese los datos de la dirección de cliente.
	</p>
	<fieldset title="Formulario de edición de datos de una dirección de cliente">
	<legend>Direcciones de Clientes</legend>
<form name="form_edit_clientaddress" id="form_edit_clientaddress" action="Main.php" method="post">
	<p>
			<label for="address[clientId]">Cliente</label>
			<select id="clientId" name="address[clientId]" title="clientId">
				<option value="">Seleccione un Cliente</option>
								|-foreach from=$clientIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getclientId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
		</p>
		<p>
			<label for="address[street]">Calle</label>
			<input name="address[street]" type="text" id="street" title="street" value="|-$clientaddress->getstreet()-|" size="45" maxlength="100" onChange="$('button_edit_address').disable()" />
		</p>
		<p>
			<label for="address[number]">Número</label>
			<input name="address[number]" type="text" id="number" title="number" value="|-$clientaddress->getnumber()-|" size="12" onChange="$('button_edit_address').disable()" />
		</p>
		<p>
			<label for="address[intersection]">Intersección</label>
			<input name="address[intersection]" type="text" id="intersection" title="intersection" value="|-$clientaddress->getintersection()-|" size="45" maxlength="100" onChange="$('button_edit_address').disable()" />
		</p>
		<p><input type="button" id="button_locate" value="Buscar en Mapa" title="Buscar en Mapa" onClick="addressMap.locate(this.form); $('button_edit_address').enable()"/></p>
		<p>
			<input name="address[latitude]" type="hidden" id="latitude" title="latitude" value="|-$clientaddress->getlatitude()|system_numeric_format:8-|" size="12" />
		</p>
		<p>
			<input name="address[longitude]" type="hidden" id="longitude" title="longitude" value="|-$clientaddress->getlongitude()|system_numeric_format:8-|" size="12" />
		</p>
		<p>
			<label for="address[type]">Tipo</label>
			<input type="text" id="type" name="address[type]" value="|-$clientaddress->gettype()-|" title="type" maxlength="100" />
		</p>
		<p>
			<label for="address[circuitId]">Circuito</label>
			<select id="circuitId" name="address[circuitId]" title="circuitId">
				<option value="">Seleccione un Circuito</option>
								|-foreach from=$circuitIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getcircuitId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
						</p>
		
		<p>
			<label for="address[regionId]">Barrio</label>
			<select id="regionId" name="address[regionId]" title="regionId" onChange="$('button_edit_address').disable()">
				<option value="">Seleccione un Barrio</option>
								|-foreach from=$regionIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getregionId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
						</p>
		<p>
			|-if $action eq "edit"-|
			<input type="hidden" name="id" id="id" value="|-$clientaddress->getid()-|" />
			|-/if-|
			<input type="hidden" name="action" id="action" value="|-$action-|" />
			<input type="hidden" name="do" id="do" value="lausiClientAddressesDoEdit" />
			<input type="submit" id="button_edit_address" name="button_edit_clientaddress" title="Aceptar" value="Aceptar" />
			<input type='button' onClick='location.href="Main.php?do=lausiClientAddressesList|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($page)-|&page=|-$page-||-/if-|"' value='Cancelar' title="Regresar al listado de direcciones de clientes"/>
		</p>
</form>
|-include file="LausiAddressesMapInclude.tpl" address=$clientaddress-|
			</fieldset>
</div>
