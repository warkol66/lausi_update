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
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		|-foreach from=$addresses item="address"-|
			<tr>
				<td>|-$address->getStreet()-|</td>
				<td>|-$address->getNumber()-|</td>
				<td>
					<input type="checkbox" onchange="editField('hasGrille', |-$address->getId()-|, this)" |-$address->getHasGrille()|checked:true-|>
					<span name="status"></span>
				</td>
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
