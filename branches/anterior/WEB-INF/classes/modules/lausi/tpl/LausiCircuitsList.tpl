<h2>Configuración del Sistema</h2>
<h1>Administrar Circuitos</h1>
<div id="div_circuits">
	|-if $message eq "ok"-|<div class="successMessage">Circuito guardado correctamente</div>|-/if-|
	|-if $message eq "deleted_ok"-|<div class="successMessage">Circuito eliminado correctamente</div>|-/if-|
	<table id="tabla-circuits" border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
		<thead>
			<tr>
				 <th colspan="5" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiCircuitsEdit" class="agregarNueva">Agregar Circuito</a></div></th>
			</tr>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Límites</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$circuits item=circuit name=for_circuits-|
			<tr>
				<td>|-$circuit->getid()-|</td>
				<td>|-$circuit->getname()-|</td>
				<td>|-$circuit->getdescription()-|</td>
				<td>|-$circuit->getlimitsDescription()-|</td>
				<td nowrap>
					<form action="Main.php" method="get">
						<input type="hidden" name="do" value="lausiCircuitsEdit" />
						<input type="hidden" name="id" value="|-$circuit->getid()-|" />
						<input type="submit" name="submit_go_edit_circuit" value="Editar" class="buttonImageEdit" />
					</form>
					<form action="Main.php" method="post">
						<input type="hidden" name="do" value="lausiCircuitsDoDelete" />
						<input type="hidden" name="id" value="|-$circuit->getid()-|" />
						<input type="submit" name="submit_go_delete_circuit" value="Borrar" onclick="return confirm('Seguro que desea eliminar el circuit?')" class="buttonImageDelete" />
					</form>
				</td>
			</tr>
		|-/foreach-|						
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="5" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
			<tr>
				 <th colspan="5" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=lausiCircuitsEdit" class="agregarNueva">Agregar Circuito</a></div></th>
			</tr>
		</tbody>
	</table>
</div>