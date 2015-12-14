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
			<th>Calle</th>
			<th>Número</th>
			<th>En Altura</th>
		</tr>
	</thead>
	<tbody>
		|-foreach from=$billboards item="billboard"-|
			<tr>
				<td>|-$billboard->getAddress()-|</td>
				<td>|-$billboard->getNumber()-|</td>
				<td align="center">
					<input type="checkbox" onchange="editField('height', |-$billboard->getId()-|, this)" |-$billboard->getHeight()|checked:true-|>
				<span name="status"></span>				</td>
			</tr>
		|-/foreach-|
		|-if $all eq "1"-|
			|-if $pager neq '' and $pager->haveToPaginate()-|
				<tr>
					<td colspan="8" class="pages">|-include file="ModelPagerInclude.tpl"-|</td>
				</tr>
			|-/if-|
		|-/if-|
	</tbody>
</table>

|-include file="LausiFastEditInclude.tpl" class="Billboard"-|
