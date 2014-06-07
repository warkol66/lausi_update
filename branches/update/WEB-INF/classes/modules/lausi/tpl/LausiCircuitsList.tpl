<h2>Configuración del Sistema</h2>
<h1>Administrar Circuitos</h1>
<p>A continuación se muestra el listado de circuitos disponibles en el sistema. Para agregar un nuevo circuito, haga click en "Agregar circuito". Para modificar o eliminar un circuito, utilice los controles disponibles en la fila correspondiente al mismo.</p>
<div id="div_circuits">
	|-if $message eq "ok"-|
		<div class="successMessage">Circuito guardado correctamente</div>
	|-elseif $message eq "deleted_ok"-|
		<div class="successMessage">Circuito eliminado correctamente</div>
	|-/if-|
	<table id="tabla-circuits" border="0" cellpadding="5" cellspacing="0" class='tableTdBorders' width="100%">
		<thead>
			<tr>
				 <th colspan="6" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiCircuitsEdit" class="addLink">Agregar Circuito</a></div></th>
			</tr>
			<tr>
				<th width="1%">Id</th>
				<th width="10%">Nombre</th>
				<th width="4%">Abreviatura</th>
				<th width="30%">Descripción</th>
				<th width="50%">Límites</th>
				<th width="5%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$circuits item=circuit name=for_circuits-|
			<tr>
				<td>|-$circuit->getid()-|</td>
				<td>|-$circuit->getname()-|</td>
				<td>|-$circuit->getabbreviation()-|</td>
				<td>|-$circuit->getdescription()-|</td>
				<td>|-$circuit->getlimitsDescription()-|</td>
				<td nowrap>
					<form action="Main.php" method="get">
						<input type="hidden" name="do" value="lausiCircuitsEdit" />
						<input type="hidden" name="id" value="|-$circuit->getid()-|" />
						<input type="submit" name="submit_go_edit_circuit" value="Editar" class="iconEdit" />
					</form>
					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="lausiCircuitsDoDelete" />
						<input type="hidden" name="id" value="|-$circuit->getid()-|" />
						<input type="submit" name="submit_go_delete_circuit" value="Borrar" onclick="return confirm('Seguro que desea eliminar el circuit?')" class="iconDelete" />
					</form>
				</td>
			</tr>
		|-/foreach-|						
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="6" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
			<tr>
				 <th colspan="6" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiCircuitsEdit" class="addLink">Agregar Circuito</a></div></th>
			</tr>
		</tbody>
	</table>
</div>