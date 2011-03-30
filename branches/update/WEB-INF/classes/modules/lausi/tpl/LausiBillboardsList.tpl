<h2>Administración de Carteleras</h2>
<h1>Listado de Carteleras</h1>
<p>
|-if isset($address) -|
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
	<input type="hidden" name="id" value="|-$address->getId()-|" id="addressId">
	<input type="hidden" name="do" value="lausiAddressesEdit">
	<p><input type="submit" value="Volver a Dirección |-$address->getName()-|"></p>
</form>
|-/if-|
</p>
<div id="div_billboards">
	|-if $message eq "ok"-|
		<div class="successMessage">Cartelera guardada correctamente</div>
	|-elseif $message eq "deleted_ok"-|
		<div class="successMessage">Cartelera eliminada correctamente</div>
	|-/if-|

|-if not isset($address) -|
	<p>
	<fieldset>
		<legend>Filtros de Cartelera</legend>
		<form action="Main.php" method="get">
			<p>
				<label for="filters[themeId]">Motivo</label>
				<select name="filters[themeId]">
					<option value="">Seleccione un Motivo</option>
					|-foreach from=$themes item=theme name=for_theme-|
						<option value="|-$theme->getId()-|" |-$theme->getId()|selected:$filters.themeId-|>|-$theme->getName()-|</option>
					|-/foreach-|
				</select>
			</p>	
			<p>
				<label for="filters[regionId]">Barrio</label>
				<select name="filters[regionId]">
					<option value="">Seleccione un Barrio</option>
					|-foreach from=$regions item=region name=for_regions-|
						<option value="|-$region->getId()-|" |-$region->getId()|selected:$filters.regionId-|>|-$region->getName()-|</option>
					|-/foreach-|
				</select>
			</p>	
			<p>
				<label for="filters[circuitId]">Circuito</label>
				<select name="filters[circuitId]">
					<option value="">Seleccione un Circuito</option>
					|-foreach from=$circuits item=circuit name=for_circuit-|
						<option value="|-$circuit->getId()-|" |-$circuit->getId()|selected:$filters.circuitId-|>|-$circuit->getName()-|</option>
					|-/foreach-|
				</select>				
			</p>
			<p>
				<label for="filters[type]">Tipo de Cartelera</label>
					<select name="filters[type]" id="filters[type]" >
						<option value="0" |-0|selected:$filters.type-|>Seleccione Tipo de Cartelera</option>
						<option value="1" |-1|selected:$filters.type-|>Doble</option>
						<option value="2" |-2|selected:$filters.type-|>Sextuple</option>
					</select>
			</p>
			<p>
				<label for="filters[rating]">Valoración</label>
					<select name="filters[rating]" id="filters[rating]" >
						<option value="0" |-0|selected:$filters.rating-|>Seleccione Valoración</option>
						<option value="1" |-1|selected:$filters.rating-|>Premium</option>
						<option value="2" |-2|selected:$filters.rating-|>Superior</option>
						<option value="3" |-3|selected:$filters.rating-|>Destacada</option>
						<option value="4" |-4|selected:$filters.rating-|>Standart</option>
					</select>
			</p>
			<p>
				<label for="filters[groupByAddress]">Ver detalle por dirección</label>
				<input type="checkbox" name="filters[groupByAddress]" |-$filters.groupByAddress|checked-|/>
			</p>
			<p style="margin-top: 20px;">
				<input type="hidden" name="do" value="lausiBillboardsList" />
				<input type="submit" value="Aplicar Filtro" />
			</p>
		</form>
	</fieldset>
	<p/>
|-/if-|

	<table border="0" cellpadding="4" cellspacing="0" id="tabla-billboards" class="tableTdBorders">
		<thead>
			|-if $all eq "1"-|			
			<tr>
				 <th colspan="9" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiBillboardsEdit" class="addLink">Agregar Cartelera</a></div></th>
			</tr>
			|-/if-|
			<tr>
				|-if isset($address) -|
				|-else-|
				<th width="25%">Dirección</th>
				|-/if-|
			|-if not isset($groupByAddress) and not isset($groupByType)-|
				<th>Número</th>
			|-/if-|
			|-if isset($groupByAddress) and not isset($groupByType)-|
				<th width="10%">Carteleras</th>
			|-/if-|
			|-if isset($groupByType)-|
				<th width="5%">Carteleras</th>
			|-/if-|
			|-if not isset($groupByAddress) and not isset($groupByType)-|
				<th>Tipo</th>
				<th width="5%">En Altura</th>
				<th width="5%">Fila</th>
				<th width="5%">Columna</th>
			|-/if-|
			|-if not isset($themeId)-|
				<th width="25%">Disponible (Motivo)</th>
			|-/if-|
			|-if not isset($groupByAddress) and not isset($groupByType)-|
				<th width="5%">&nbsp;</th>
			|-/if-|
			</tr>
		</thead>
		<tbody>
		|-foreach from=$billboards item=billboard name=for_billboards-|
			<tr>
			|-if isset($address)-|
			|-else-|
				|-assign var=currentAddress value=$billboard->getAddress()-|		
				<td>
					|-$currentAddress->getName()-|
				</td>
			|-/if-|
			|-if not isset($groupByAddress) and not isset($groupByType)-|
				<td>|-$billboard->getNumber()-|</td>
			|-/if-|
			|-if isset($groupByAddress) and not isset($groupByType)-|
				<td>
					Dobles:|-$currentAddress->getBillboardCountByType(1)-|<br/>
					Sextuples:|-$currentAddress->getBillboardCountByType(2)-|
				</td>
			|-/if-|
			|-if isset($groupByType)-|
				<td>
					|-assign var=currentAddress value=$billboard->getAddress()-|
					|-$billboard->getTypeName()-|: |-$currentAddress->getBillboardCountByType($billboard->getType())-|
				</td>
			|-/if-|
			|-if not isset($groupByAddress) and not isset($groupByType)-|
				<td>|-$billboard->getTypeName()-|</td>
				<td>|-$billboard->getHeight()|si_no-|</td>
				<td>|-$billboard->getRow()-|</td>
				<td>|-$billboard->getColumn()-|</td>
			|-/if-|
			|-if not isset($themeId)-|
				|-if not isset($groupByAddress) -|
					<!--caso carteleras -->
					<td>|-if ($billboard->isAvailableToday())-|No|-else-|Si (|-assign var=theme value=$billboard->getCurrentTheme()-||-if !empty($theme)-||-$theme->getName()-||-else-|-|-/if-|)|-/if-|</td>
				|-else-|
					<!--caso agrupado por direccion -->
					<td>|-assign var=aThemes value=$address->getCurrentThemes()-|
						|-if ($aThemes|@count eq 0)-| - |-else-|(|-foreach from=$aThemes item=aTheme name=aTheme-||-$aTheme->getName()-||-if $smarty.foreach.aTheme.last-|.|-else-|, |-/if-||-/foreach-|)|-/if-|
					</td>
				|-/if-|
			|-/if-|
			
			|-if not isset($groupByAddress) and not isset($groupByType)-|
				<td nowrap>
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
						<input type="hidden" name="do" value="lausiBillboardsEdit" />
						<input type="hidden" name="id" value="|-$billboard->getid()-|" />
						<input type="submit" name="submit_go_edit_billboard" value="Editar" class="iconEdit" />
					</form>
					<form action="Main.php" method="post">
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
						<input type="hidden" name="do" value="lausiBillboardsDoDelete" />
						<input type="hidden" name="id" value="|-$billboard->getid()-|" />
						<input type="submit" name="submit_go_delete_billboard" value="Borrar" onclick="return confirm('Seguro que desea eliminar el billboard?')" class="iconDelete" />
					</form>								
				</td>
			|-/if-|

			</tr>
		|-/foreach-|					
		|-if $all eq "1"-|	
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="8" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
			<tr>
				 <th colspan="8" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiBillboardsEdit" class="addLink">Agregar Cartelera</a></div></th>
			</tr>
		|-else-|
	<!--		<tr>
				 <th colspan="9" class="thFillTitle">
				 	<input type="button" name="selection" value="Seleccionar Todas" id="selection" onClick="javascript:setSelectionBillboards(true)">
					<input type="button" name="selection" value="Deseleccionar Todas" id="selection" onClick="javascript:setSelectionBillboards(false)">
					<form action="Main.php" method="post" id="selectedDeletionForm">

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
						
						<input type="hidden" name="do" value="lausiBillboardsDoDelete" />
						<input type="button" name="submit_go_delete_billboard" value="Eliminar Seleccionados" onclick="javascript:deleteSelectedBillboards()" />
					</form>
						
				 </th>
			</tr> -->
		|-/if-|
		</tbody>
	</table>
</div>
