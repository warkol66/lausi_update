<h2>Configuración del Sistema</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Dirección de Cliente</h1>				<div id="div_clientaddress">
<form name="form_edit_clientaddress" id="form_edit_clientaddress" action="Main.php" method="post">
	|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar la dirección de cliente</span>|-/if-|
	<p>
		Ingrese los datos de la dirección de cliente.
	</p>
	<fieldset title="Formulario de edición de datos de una dirección de cliente">
	<p>
			<label for="clientId">Cliente</label>
			<select id="clientId" name="clientId" title="clientId">
				<option value="">Seleccione un Cliente</option>
								|-foreach from=$clientIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getclientId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
		</p>
		<p>
			<label for="street">Calle</label>
			<input name="street" type="text" id="street" title="street" value="|-$clientaddress->getstreet()-|" size="45" maxlength="100" />
		</p>
		<p>
			<label for="number">Número</label>
			<input name="number" type="text" id="number" title="number" value="|-$clientaddress->getnumber()-|" size="12" />
		</p>
		<p>
			<label for="intersection">Intersección</label>
			<input name="intersection" type="text" id="intersection" title="intersection" value="|-$clientaddress->getintersection()-|" size="45" maxlength="100" />
		</p>
		<p>
			<label for="latitude">Latitud</label>
			<input name="latitude" type="text" id="latitude" title="latitude" value="|-$clientaddress->getlatitude()|system_numeric_format:8-|" size="12" />
		</p>
		<p>
			<label for="longitude">Longitud</label>
			<input name="longitude" type="text" id="longitude" title="longitude" value="|-$clientaddress->getlongitude()|system_numeric_format:8-|" size="12" />
		</p>
		<p>
			<label for="type">Tipo</label>
			<input type="text" id="type" name="type" value="|-$clientaddress->gettype()-|" title="type" maxlength="100" />
		</p>
		<p>
			<label for="circuitId">Circuito</label>
			<select id="circuitId" name="circuitId" title="circuitId">
				<option value="">Seleccione un Circuito</option>
								|-foreach from=$circuitIdValues item=object-|
								<option value="|-$object->getid()-|" |-if $clientaddress->getcircuitId() eq $object->getid()-|selected="selected" |-/if-|>|-$object->getname()-|</option>
								|-/foreach-|
							</select>
						</p>
		
		<p>
			<label for="regionId">Barrio</label>
			<select id="regionId" name="regionId" title="regionId">
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
			<input type="submit" id="button_edit_clientaddress" name="button_edit_clientaddress" title="Aceptar" value="Aceptar" class="boton" />
		</p>
			</fieldset>
</form>
</div>
