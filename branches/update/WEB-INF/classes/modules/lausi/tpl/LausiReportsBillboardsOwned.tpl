<h2>Reportes</h2>
<h1>Carteleras por Circuito.</h1>
<div id="billboardsCount">
|-foreach from=$circuits item=circuit-|
<table width="600" class="tableTdBorders">
	<tbody>
		<thead>
	<tr>
		<td colspan="3"><h4>|-$circuit->getName()-|</h4></td>
	<tr>	
	<tr>
		<th width="80%" nowrap="nowrap">
			Dirección
		</th>
		<th width="10%" nowrap="nowrap">Dobles</th>				
		<th width="10%" nowrap="nowrap">Séxtuples</th>
	</tr>
		</thead>
	|-assign var=addresses value=$circuit->getAddresss()-|
	|-foreach from=$addresses item=address-|		
	<tr>
		<td>
			|-$address->getName()-|
		</td>
		<td>
			|-$address->getBillboardCountByType($typeDoble)-|
		</td>				
		<td>
			|-$address->getBillboardCountByType($typeSextuple)-|
		</td>
	</tr>
	|-/foreach-|
	<tr>
		<td colspan="3">
		</td>
	</tr>	
	<tr>
		<td>
			Totales
		</td>
		<td>
			|-$circuit->getBillboardsCount($typeDoble)-|
		</td>				
		<td>
			|-$circuit->getBillboardsCount($typeSextuple)-|
		</td>
	</tr>
	</tbody>
</table>
<br />
|-/foreach-|

|-include file="LausiReportsPrintLinkInclude.tpl"-|

</div>