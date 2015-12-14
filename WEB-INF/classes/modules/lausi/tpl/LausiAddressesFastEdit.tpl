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
