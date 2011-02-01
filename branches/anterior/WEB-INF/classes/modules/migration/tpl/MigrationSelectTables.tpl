<h2>Tablas del sistema en access a migrar:</h2>

<form action="Main.php" method="post">
<ul>
|-foreach from=$tables item=table-|
	<li>|-$table-| <input type="checkbox" name="tables[]" value="|-$table-|" /></li>
|-/foreach-|
</ul>
<input type="hidden" name="do" value="migrationDoMigrate" />
<input type="submit" name="migrar" value="Migrar" id="migrar" />
</form>


|-if $results.Direcciones ne ""-|
	<ul>
		<li>
			Direcciones Encontradas: 
			|-math equation="x+y+z" x=$results.Direcciones.addressesFound.lings|@count y=$results.Direcciones.addressesFound.intersections|@count z=$results.Direcciones.addressesFound.justTen|@count assign=addressesFoundCount-| 
			|-$addressesFoundCount-|
		</li>
		<li>Direcciones No Encontradas: |-$results.Direcciones.addressesNotFound|@count-|</li>
	</ul>					
	|-if $results.Direcciones.addressesFound.lings ne ""-|
	<a href="#" onclick="$('addressesFoundLings').toggle();">Mostrar direcciones encontradas solo con tratamiento de acentos</a>
	<div id="addressesFoundLings" style="display:none;">
		<h3>Direcciones encontradas solo con tratamiento de acentos</h3>
		<ul>
			|-foreach from=$results.Direcciones.addressesFound.lings item=address-|
			<li>|-$address.dinombre-| |-$address.dialtura-|</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />
	|-if $results.Direcciones.addressesFound.intersections ne ""-|
	<a href="#" onclick="$('addressesFoundIntersections').toggle();">Mostrar direcciones encontradas con tratamiento de intersecciones</a>
	<div id="addressesFoundIntersections" style="display:none;">
		<h3>Direcciones encontradas con tratamiento de intersecciones</h3>
		<ul>
			|-foreach from=$results.Direcciones.addressesFound.intersections item=address-|
			<li>|-$address.dinombre-| |-$address.dialtura-|</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />	
	|-if $results.Direcciones.addressesFound.justTen ne ""-|
	<a href="#" onclick="$('addressesFoundJustTen').toggle();">Mostrar direcciones encontradas utilizando solo los primeros 10 caracteres del nombre de calle</a>
	<div id="addressesFoundJustTen" style="display:none;">
		<h3>Direcciones encontradas utilizando solo los primeros 10 caracteres del nombre de calle</h3>
		<ul>
			|-foreach from=$results.Direcciones.addressesFound.justTen item=address-|
			<li>|-$address.dinombre-| |-$address.dialtura-|</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />	
	|-if $results.Direcciones.addressesFound.manual ne ""-|
	<a href="#" onclick="$('addressesFoundManual').toggle();">Mostrar direcciones encontradas con traducción manual</a>
	<div id="addressesFoundManual" style="display:none;">
		<h3>Direcciones encontradas con traducción manual</h3>
		<ul>
			|-foreach from=$results.Direcciones.addressesFound.manual item=address-|
			<li>|-$address.dinombre-| |-$address.dialtura-|</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />		
	|-if $results.Direcciones.addressesNotFound ne ""-|
	<a href="#" onclick="$('addressesNotFound').toggle();">Mostrar direcciones no encontradas</a>
	<div id="addressesNotFound" style="display:none;">
		<h3>Direcciones no encontradas</h3>
		<ul>
			|-foreach from=$results.Direcciones.addressesNotFound item=address-|
			<li>|-$address.dinombre-| |-$address.dialtura-|</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />	
	|-if $results.Direcciones.addressWithBillboardError ne ""-|
	<a href="#" onclick="$('addressWithBillboardError').toggle();">Mostrar direcciones con errores en cantidad de carteleras</a>
	<div id="addressWithBillboardError" style="display:none;">
		<h3>Direcciones</h3>
		<ul>
			|-foreach from=$results.Direcciones.addressWithBillboardError item=address-|
			<li>|-$address.name-| ( Dobles: |-$address.doblesAccess-| (Access) / |-$address.dobles-| (Cargadas) - Sextuples: |-$address.sextuplesAccess-| (Access) / |-$address.sextuples-| (Cargadas) )</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />				
						
|-/if-|


|-if $results.Clientes ne ""-|
	<ul>
		<li>
			Clientes creados: 
			|-$results.Clientes-|
		</li>
	</ul>					
	<br />			

|-/if-|


|-if $results.Avisos ne ""-|
	<ul>
		<li>
			Avisos creados: 
			|-$results.Avisos.createds-|
		</li>
		<li>
			Avisos no creados: 
			|-$results.Avisos.notCreateds-|
		</li>
		<li>
			Avisos no creados por direcciones no encontradas:
			<ul>
				<li>Dobles: |-$results.Avisos.advertisementsNotCreatedsForAddressesNotFounds.P-|</li>
				<li>Sextuples: |-$results.Avisos.advertisementsNotCreatedsForAddressesNotFounds.S-|</li>
			</ul>
		</li>
		<li>
			Direcciones con errores:
			|-$addressesWithErrorsCount-|
		</li>
	</ul>					
	|-if $results.Avisos.addressesNotFounds ne ""-|
	<a href="#" onclick="$('addressesNotFounds').toggle();">Mostrar direcciones no encontradas</a>
	<div id="addressesNotFounds" style="display:none;">
		<h3>Direcciones no encontradas</h3>
		<ul>
			|-foreach from=$results.Avisos.addressesNotFounds item=billboards key=address-|
			<li>|-$address-|: |-$billboards-| carteleras</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />
	|-if $results.Avisos.addressesWithErrors ne ""-|
	<a href="#" onclick="$('addressesWithErrors').toggle();">Mostrar direcciones con errores</a>
	<div id="addressesWithErrors" style="display:none;">
		<h3>Direcciones con errores</h3>
		<ul>
			|-foreach from=$results.Avisos.addressesWithErrors item=billboards key=address-|
			<li>|-$address-|: |-$billboards.billboards-| carteleras (|-$billboards.createds-| creadas / |-$billboards.advertisementsNotCreateds-| no creadas de |-$billboards.billboardsInAddress-| carteleras que posee la dirección)</li>
			|-/foreach-|		
		</ul>		
	</div>
	|-/if-|
	<br />	

|-/if-|