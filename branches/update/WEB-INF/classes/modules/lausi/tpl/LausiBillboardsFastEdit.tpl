<script src="scripts/egytca/ajax-utils.js"></script>

<style>
	tbody tr:hover {
		background-color: lightblue;
	}
</style>

<table class="tableTdBorders" width="100%">
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
				<td>
					<input type="checkbox" onchange="editField('height', |-$billboard->getId()-|, this)" |-$billboard->getHeight()|checked:true-|>
					<span name="status"></span>
				</td>
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
