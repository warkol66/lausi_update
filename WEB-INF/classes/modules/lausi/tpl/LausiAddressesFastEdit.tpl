<script src="scripts/egytca/ajax-utils.js"></script>

<style>
	tbody tr:hover {
		background-color: lightblue;
	}
</style>
<h2>Edicion de Direcciones</h2>
<h1>Edicion rápida</h1>
<p>Edicion rápida de direcciones para asignación o desasingnar reja en la dirección, marcar la casilla el dato queda almacenado automaticamente.<br>
Para editar carteleras haga click <a href="Main.php?do=lausiBillboardsFastEdit">aqui</a>.</p>
<table class="tableTdBorders">
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
<p>Carteleras en altura <input name="filters[searchHeight]" type="checkbox" value="1" |-$filters.searchHeight|checked:1-|> &nbsp; &nbsp;
Tiene reja <input name="filters[searchHasGrille]" type="checkbox" value="1" |-$filters.searchHasGrille|checked:1-|></p>

			<p>
				<input type="hidden" name="do" value="lausiAddressesFastEdit" />
				<input type="submit" value="Aplicar Filtro" />
				<input type="button" id="cancel" name="cancel" title="Quitar Filtro" value="Quitar Filtro" onClick="location.href='Main.php?do=lausiAddressesFastEdit'"/>
			</p>
		</form>
</div></th>
		  </tr>
		<tr>
			<th>Calle</th>
			<th>Número</th>
			<th nowrap="nowrap">Tiene reja</th>
		</tr>
	</thead>
	<tbody>
		|-foreach from=$addresses item="address"-|
			<tr>
				<td>|-$address->getStreet()-|</td>
				<td>|-$address->getNumber()-|</td>
				<td align="center">
					<input type="checkbox" onchange="editField('hasGrille', |-$address->getId()-|, this)" |-$address->getHasGrille()|checked:true-|>
					<span name="status"></span>				</td>
			</tr>
		|-/foreach-|
		|-if $pager->getTotalPages() gt 1-|
			<tr>
				<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td>
			</tr>
		|-/if-|
	</tbody>
</table>

|-include file="LausiFastEditInclude.tpl" class="Address"-|
