<h2>Reportes</h2>
<h1>Reporte de Direcciones Eliminadas</h1>

<div id="div_billboards">
|-if $reportMode neq 'print'-|
	<p>
	<fieldset>
		<legend>Reporte de Direcciones</legend>

		<form action="Main.php" method="get">
			<p style="margin-top: 20px;">
				<input type="hidden" name="reportMode" value="normal" id="reportMode"/>
				<input type="hidden" name="do" value="lausiReportsDeletedAddresses" />
				<input type="button" onclick="javascript:buildReport(this.form)" value="Generar reporte" name="submitForm"/>
				<input type="button" onclick="javascript:printReport(this.form)" value="Generar reporte para impresión" name="print"/>
				<input type="button" name="export" value="Exportar reporte a Excel" onClick="javascript:exportReport(this.form)"/>
			</p>
		</form>

	</fieldset>
	<p/>
|-/if-|
|-if (not empty($addresses))-|
	<table border="0" cellpadding="4" cellspacing="0" id="tabla-billboards" class="tableTdBorders">
		<thead>
			<tr>
				<th width="25%">Dirección</th>
				<th width="10%"># Padrón</th>
				<th width="10%">Fecha Alta</th>
				<th width="10%">Fecha Baja</th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$addresses item=address name=for_billboards-|
			<tr>
				<td>|-$address->getName()-|</td>
				<td>|-$address->getEnumeration()-|</td>
				<td align="center">|-$address->getCreationDate()|date_format-|</td>
				<td align="center">|-$address->getDeletionDate()|date_format-|</td>
			</tr>
		|-/foreach-|					
		|-if isset($pager) and $pager->haveToPaginate()-|
			<tr> 
				<td colspan="4" class="pages">|-include file="ModelPagerInclude.tpl"-|</td> 
			</tr>							
		|-/if-|
		</tbody>
	</table>
|-/if-|
</div>
