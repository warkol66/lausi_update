<h2>Administración de Direcciones</h2>
<h1>Direcciones del Sistema</h1>
<div id="div_addresses">
	|-if $message eq "ok"-|
		<div class="successMessage">Dirección guardada correctamente</div>
	|-elseif $message eq "deleted_ok"-|
		<div class="successMessage">Dirección eliminada correctamente</div>
	|-/if-|
	<fieldset>
		<legend>Filtros de Dirección</legend>
		<form action="Main.php" method="get">
			<p>
				<label for="region">Barrio</label>
				<select name="regionId">
					<option value="">Seleccione un Barrio</option>
					|-foreach from=$regions item=region name=for_regions-|
						<option value="|-$region->getId()-|" |-if isset($regionId) and $regionId eq $region->getId()-|selected="selected"|-/if-|>|-$region->getName()-|</option>
					|-/foreach-|
				</select>
			</p>	
			<p>
				<label for="circuit">Circuito</label>
				<select name="circuitId">
					<option value="">Seleccione un circuito</option>
					|-foreach from=$circuits item=circuit name=for_circuit-|
						<option value="|-$circuit->getId()-|" |-if isset($circuitId) and $circuitId eq $circuit->getId()-|selected="selected"|-/if-|>|-$circuit->getName()-|</option>
					|-/foreach-|
				</select>				
			</p>
			<p>
				<label for="rating">Valoración</label>
					<select name="rating" id="rating" >
						<option value="0" |-if isset($rating) and $rating eq 0-|selected="selected"|-/if-|>Seleccione Valoración&nbsp;&nbsp;</option>
						<option value="1" |-if isset($rating) and $rating eq 1-|selected="selected"|-/if-|>Premium&nbsp;&nbsp;</option>
						<option value="2" |-if isset($rating) and $rating eq 2-|selected="selected"|-/if-|>Superior&nbsp;&nbsp;</option>
						<option value="3" |-if isset($rating) and $rating eq 3-|selected="selected"|-/if-|>Destacada&nbsp;&nbsp;</option>
						<option value="4" |-if isset($rating) and $rating eq 4-|selected="selected"|-/if-|>Standart&nbsp;&nbsp;</option>
					</select>
			</p>
			<p>
				<label>Nombre de Calle</label>
				<input type="text" name="streetName" value="|-if isset($streetName)-||-$streetName-||-/if-|" />
			</p>
				
			<p>
				<input type="hidden" name="do" value="lausiAddressesList" />
				<input type="submit" value="Aplicar Filtro" />
				<input type="button" id="cancel" name="cancel" title="Quitar Filtro" value="Quitar Filtro" onClick="location.href='Main.php?do=lausiAddressesList|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($page) -|&page=|-$page-||-/if-|'"/>
			</p>
		</form>
	</fieldset>
	<br />

	<table id="tabla-addresses" border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<thead>
			<tr>
				 <th colspan="7" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiAddressesEdit" class="addLink">Agregar Dirección</a></div></th>
			</tr>
			<tr>
				<th width="20%">Calle</th>
				<th width="20%">Nombre de Fantasia</th>
				<th width="5%">Número</th>
				<th width="20%">Intersección</th>
				<th width="15%">Valoración</th>
				<th width="10%">Circuito</th>
				<th width="5%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		|-if empty($addresses)-|
			<tr>No hay resultados disponibles</tr>
		|-/if-|
		
		|-foreach from=$addresses item=address name=for_addresses-|
			<tr>
				<td>|-$address->getstreet()-|</td>
				<td>|-$address->getNickname()-|</td>
				<td align="right">|-if $address->getnumber() gt 0-||-$address->getnumber()-||-/if-|</td>
				<td>|-$address->getintersection()-|</td>
				<td nowrap>|-if $address->getrating() lt 1-|Sin Valoración
						|-elseif $address->getrating() eq 1-|Premium
						|-elseif $address->getrating() eq 2-|Superior
						|-elseif $address->getrating() eq 3-|Destacada
						|-elseif $address->getrating() eq 4-|Standart
						|-/if-|
				</td>
				<td>
					|-assign var=circuit value=$address->getCircuit()-|
					|-if $circuit-||-$circuit->getName()-||-/if-|
				</td>
				<td nowrap>
					<form action="Main.php" method="get">
						<input type="hidden" name="do" value="lausiAddressesEdit" />
						<input type="hidden" name="id" value="|-$address->getid()-|" />
						|-if isset($circuitId)-|
							<input type="hidden" name="listRedirect[circuitId]" value="|-$circuitId-|"></input>
						|-/if-|
						|-if isset($regionId)-|
							<input type="hidden" name="listRedirect[regionId]" value="|-$regionId-|"></input>
						|-/if-|
						|-if isset($rating)-|
							<input type="hidden" name="listRedirect[rating]" value="|-$rating-|"></input>
						|-/if-|
						|-if isset($streetName)-|
							<input type="hidden" name="listRedirect[streetName]" value="|-$streetName-|"></input>
						|-/if-|
						|-if isset($page)-|
							<input type="hidden" name="listRedirect[page]" value="|-$page-|"></input>
						|-/if-|
						<input type="submit" name="submit_go_edit_address" value="Editar" class="iconEdit" />
					</form>
					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="lausiAddressesDoDelete" />
						<input type="hidden" name="id" value="|-$address->getid()-|" />
						|-if isset($circuitId)-|
							<input type="hidden" name="listRedirect[circuitId]" value="|-$circuitId-|"></input>
						|-/if-|
						|-if isset($regionId)-|
							<input type="hidden" name="listRedirect[regionId]" value="|-$regionId-|"></input>
						|-/if-|
						|-if isset($rating)-|
							<input type="hidden" name="listRedirect[rating]" value="|-$rating-|"></input>
						|-/if-|
						|-if isset($rating)-|
							<input type="hidden" name="listRedirect[streetName]" value="|-$streetName-|"></input>
						|-/if-|
						|-if isset($page)-|
							<input type="hidden" name="listRedirect[page]" value="|-$page-|"></input>
						|-/if-|
            <input type="submit" name="submit_go_delete_address" value="Borrar" onClick="return confirm('Seguro que desea eliminar el address?')" class="iconDelete" />
          </form>				</td>
			</tr>
		|-/foreach-|						
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
			<tr>
				 <th colspan="7" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiAddressesEdit" class="addLink">Agregar Dirección</a></div></th>
			</tr>
		</tbody>
	</table>
</div>
