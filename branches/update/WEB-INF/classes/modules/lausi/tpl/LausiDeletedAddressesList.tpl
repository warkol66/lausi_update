<h2>Administración de Direcciones</h2>
<h1>Direcciones Eliminadas del Sistema</h1>
<p>A continuación se muestra el listado de direcciones eliminadas en el sistema. Para buscar una dirección, puede ingresar los parámetros de filtro disponibles en la parte superior del listado.</p>
	<div id="div_addresses">
	<table id="tabla-addresses" border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<thead>
			<tr>
			  <th colspan="9" class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch">Buscar direcciones</a><div id="divSearch" style="display:|-if $filters|@count gt 0-|block|-else-|none;|-/if-|">		<form action="Main.php" method="get">
			<p>
				<label for="filters[searchStreetName]">Nombre de Calle</label>
				<input type="text" name="filters[searchStreetName]" value="|-$filters.searchStreetName-|" size="30" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="filters[searchCircuitId]">Circuito</label>
				<select name="filters[searchCircuitId]">
					<option value="">Seleccione un circuito</option>
					|-foreach from=$circuits item=circuit name=for_circuit-|
						<option value="|-$circuit->getId()-|" |-$circuit->getId()|selected:$filters.searchCircuitId-|>|-$circuit->getName()-|</option>
					|-/foreach-|
				</select>				
			</p>
			<p>
				<label for="filters[searchRegionId]">Barrio</label>
				<select name="filters[searchRegionId]">
					<option value="">Seleccione un Barrio</option>
					|-foreach from=$regions item=region name=for_regions-|
						<option value="|-$region->getId()-|" |-$region->getId()|selected:$filters.searchRegionId-|>|-$region->getName()-|</option>
					|-/foreach-|
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="filters[searchRating]">Valoración</label>
					<select name="filters[searchRating]" id="filters[searchRating]" >
						<option value="0" |-0|selected:$filters.searchRating-|>Seleccione Valoración</option>
						<option value="1" |-1|selected:$filters.searchRating-|>Premium</option>
						<option value="2" |-2|selected:$filters.searchRating-|>Superior</option>
						<option value="3" |-3|selected:$filters.searchRating-|>Destacada</option>
						<option value="4" |-4|selected:$filters.searchRating-|>Standart</option>
					</select>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="filters[searchEnumeration]"># Padrón</label>
				<input type="text" name="filters[searchEnumeration]" value="|-$filters.searchEnumeration-|" size="15" />
</p>
				
			<p>
				<input type="hidden" name="do" value="lausiDeletedAddressesList" />
				<input type="submit" value="Aplicar Filtro" />
				<input type="button" id="cancel" name="cancel" title="Quitar Filtro" value="Quitar Filtro" onClick="location.href='Main.php?do=lausiDeletedAddressesList'"/>
			</p>
		</form>
</div></th>
		  </tr>
			<tr>
				<th width="20%">Calle</th>
				<th width="20%">Nombre de Fantasia</th>
				<th width="5%">Número</th>
				<th width="20%">Intersección</th>
				<th width="5%">F.Alta</th>
				<th width="5%">F.Baja </th>
				<th width="5%"># Padrón </th>
				<th width="5%">Valoración</th>
				<th width="10%">Circuito</th>
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
				<td>|-$address->getCreationDate()|date_format-|</td>
				<td>|-$address->getDeletionDate()|date_format-|</td>
				<td>|-$address->getEnumeration()-|</td>
				<td nowrap>|-if $address->getrating() lt 1-| -
						|-elseif $address->getrating() eq 1-|Premium
						|-elseif $address->getrating() eq 2-|Superior
						|-elseif $address->getrating() eq 3-|Destacada
						|-elseif $address->getrating() eq 4-|Standart
						|-/if-|				</td>
				<td>
					|-assign var=circuit value=$address->getCircuit()-|
					|-if $circuit-||-$circuit->getName()-||-/if-|				</td>
			</tr>
		|-/foreach-|						
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
		</tbody>
	</table>
</div>
