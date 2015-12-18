<script src="scripts/egytca/ajax-utils.js"></script>

<style>
	tbody tr:hover {
		background-color: lightblue;
	}
</style>
<h2>Edicion de Carteleras </h2>
<h1>Edicion rápida</h1>
<p>Edicion rápida de carteleras para asignación o desasingnar si es en altura, marcar la casilla el dato queda almacenado automaticamente.<br>
Para editar direcciones haga click <a href="Main.php?do=lausiAddressesFastEdit">aqui</a>.</p>

<table class="tableTdBorders">
	<thead>
	<tr>
	<th colspan="4"  class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch">Buscar carteleras</a><div id="divSearch" style="display:|-if $filters|@count gt 0-|block|-else-|none;|-/if-|"><form action="Main.php" method="get">
			<p>
				<label for="filters[searchThemeId]">Motivo</label>
				<select name="filters[searchThemeId]">
					<option value="">Seleccione un Motivo</option>
					|-foreach from=$themes item=theme name=for_theme-|
						<option value="|-$theme->getId()-|" |-$theme->getId()|selected:$filters.searchThemeId-|>|-$theme->getName()-|</option>
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
				</select>
			</p>	
			<p>
				<label for="filters[searchCircuitId]">Circuito</label>
				<select name="filters[searchCircuitId]">
					<option value="">Seleccione un Circuito</option>
					|-foreach from=$circuits item=circuit name=for_circuit-|
						<option value="|-$circuit->getId()-|" |-$circuit->getId()|selected:$filters.searchCircuitId-|>|-$circuit->getName()-|</option>
					|-/foreach-|
				</select>				
			</p>
			<p>
				<label for="filters[searchType]">Tipo de Cartelera</label>
					<select name="filters[searchType]" id="filters[searchType]" >
						<option value="0" |-0|selected:$filters.searchType-|>Seleccione Tipo de Cartelera</option>
						<option value="1" |-1|selected:$filters.searchType-|>Doble</option>
						<option value="2" |-2|selected:$filters.searchType-|>Sextuple</option>
					</select>
			</p>
			<p>
				<label for="filters[searchRating]">Valoración</label>
					<select name="filters[searchRating]" id="filters[searchRating]" >
						<option value="0" |-0|selected:$filters.searchRating-|>Seleccione Valoración</option>
						<option value="1" |-1|selected:$filters.searchRating-|>Premium</option>
						<option value="2" |-2|selected:$filters.searchRating-|>Superior</option>
						<option value="3" |-3|selected:$filters.searchRating-|>Destacada</option>
						<option value="4" |-4|selected:$filters.searchRating-|>Standart</option>
					</select>
			</p>
			<p>
				<label for="filters[searchGroupByAddress]">Ver detalle por dirección</label>
				<input type="checkbox" name="filters[searchGroupByAddress]" |-$filters.searchGroupByAddress|checked:1-| value="1"/>
			</p>
			<p>
				<label for="filters[searchGroupByType]">Ver detalle por tipo</label>
				<input type="checkbox" name="filters[searchGroupByType]" |-$filters.searchGroupByType|checked:1-| value="1"/>
			</p>
			<p>
				<label for="filters[searchHeight]">Carteleras en altura </label>
				<input type="checkbox" name="filters[searchHeight]" |-$filters.searchHeight|checked:1-| value="1"/>
			</p>
			<p style="margin-top: 20px;">
				<input type="hidden" name="do" value="lausiBillboardsFastEdit" />
				<input type="submit" value="Aplicar Filtro" />
				<input type="button" id="cancel" name="cancel" title="Quitar Filtro" value="Quitar Filtro" onClick="location.href='Main.php?do=lausiBillboardsFastEdit'"/>
			</p>
		</form></div></th>
	</tr>
		<tr>
			<th>Calle</th>
			<th>Número</th>
			<th>En Altura</th>
			<th>Motivo</th>
		</tr>
	</thead>
	<tbody>
		|-foreach from=$billboards item="billboard"-|
			<tr>
				<td>|-$billboard->getAddress()-|</td>
				<td>|-$billboard->getNumber()-|</td>
				<td>|-assign var=theme value=$billboard->getCurrentTheme()-||-if !empty($theme)-||-$theme->getName()-||-else-|-|-/if-|</td>
				<td align="center">
					<input type="checkbox" onchange="editField('height', |-$billboard->getId()-|, this)" |-$billboard->getHeight()|checked:true-|>
				<span name="status"></span>				</td>
			</tr>
		|-/foreach-|
		|-if $all eq "1"-|
			|-if $pager neq '' and $pager->haveToPaginate()-|
				<tr>
					<td colspan="4" class="pages">|-include file="ModelPagerInclude.tpl"-|</td>
				</tr>
			|-/if-|
		|-/if-|
	</tbody>
</table>

|-include file="LausiFastEditInclude.tpl" class="Billboard"-|
