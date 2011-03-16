<h2>Configuración del Sistema</h2>
<h1>Dirección Importantes de Clientes</h1>
<div id="div_clientaddresses">
	|-if $message eq "ok"-|<div class="successMessage">Dirección de Cliente guardada correctamente</div>|-/if-|
	|-if $message eq "deleted_ok"-|<div class="successMessage">Dirección de Cliente eliminada correctamente</div>|-/if-|
	<table id="tabla-clientaddresses" width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<thead>
			<tr>
				 <th colspan="7" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiClientAddressesEdit" class="agregarNueva">Agregar Dirección de Cliente</a></div></th>
			</tr>
			<tr>
				<th>Calle</th>
				<th>Número</th>
				<th>Intersección</th>
				<th>Circuito</th>
				<th>Cliente</th>
				<th>Barrio</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$clientaddresses item=clientaddress name=for_clientaddresses-|
			<tr>
				<td>|-$clientaddress->getstreet()-|</td>
				<td>|-$clientaddress->getnumber()-|</td>
				<td>|-$clientaddress->getintersection()-|</td>
				<td>
					|-assign var=circuit value=$clientaddress->getCircuit()-|
					|-if $circuit ne ''-||-$circuit->getName()-||-/if-|
				</td>
				<td>
					|-assign var=client value=$clientaddress->getClient()-|
					|-$client->getName()-|
				</td>		
				<td>
					|-assign var=region value=$clientaddress->getRegion()-|
					|-if $region ne ''-||-$region->getName()-||-/if-|
				</td>														
				<td>
					<form action="Main.php" method="get">
						<input type="hidden" name="do" value="lausiClientAddressesEdit" />
						<input type="hidden" name="id" value="|-$clientaddress->getid()-|" />
						<input type="submit" name="submit_go_edit_clientaddress" value="Editar" class="buttonImageEdit" />
					</form>
					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="lausiClientAddressesDoDelete" />
						<input type="hidden" name="id" value="|-$clientaddress->getid()-|" />
						<input type="submit" name="submit_go_delete_clientaddress" value="Borrar" onclick="return confirm('Seguro que desea eliminar el clientaddress?')" class="buttonImageDelete" />
					</form>
				</td>
			</tr>
		|-/foreach-|						
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="7" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>													
		|-/if-|						
			<tr>
				 <th colspan="7" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiClientAddressesEdit" class="agregarNueva">Agregar Dirección de Cliente</a></div></th>
			</tr>
		</tbody>
	</table>
</div>