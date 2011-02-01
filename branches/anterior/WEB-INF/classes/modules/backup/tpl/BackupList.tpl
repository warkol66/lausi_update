<script type="text/javascript" language="javascript">
// <![CDATA[
	function showBackupLoader() {
		
		$('backupLoader').show();
	}
	
	function hideBackupLoader() {
		
		$('backupLoader').hide();
		$('backupLoaderForm').reset();
	}
// ]]>
</script>

<h2>Backup del Sistema</h2>
<h1>Administrar Backups</h1>
<div id="div_addresses">
	|-if $message eq "created"-|<div class="successMessage">Backup creado correctamente.</div>|-/if-|
	|-if $message eq "create_error"-|<div class="successMessage">Se ha producido un error al crear el backup.</div>|-/if-|
	|-if $message eq "restored"-|<div class="successMessage">Se ha restaurado el backup seleccionado.</div>|-/if-|
	|-if $message eq "restore_error"-|<div class="successMessage">Se ha producido un error al restaurar el backup.</div>|-/if-|
	|-if $message eq "deleted"-|<div class="successMessage">Se ha eliminado el backup seleccionado.</div>|-/if-|
	|-if $message eq "delete_error"-|<div class="successMessage">Se ha producido un error al eliminar el backup.</div>|-/if-|
	|-if $message eq "not_exists"-|<div class="successMessage">El archivo de backup pedido no existe.</div>|-/if-|
	<p>Si desea crear un Backup almacenado en el servidor haga <a href='Main.php?do=backupCreate'>click aqui</a></p>
	<p>Si desea crear un Backup para descargar haga <a href='Main.php?do=backupCreateToFile'>click aqui</a></p>
	<p>Si desea restaurar un Backup desde una copia local <a href='javascript:showBackupLoader()'>click aqui</a></p>
	<p>
		<div id="backupLoader" style="display : none;">
			<fieldset>
			<legend>Restaurar Backup Local</legend>
			<form id="backupLoaderForm" action="Main.php" method="post" enctype="multipart/form-data">
				<p>A continuacion indique el archivo local a restaurar en el sistema:</p>
				<p><label>Archivo: </label><input type="file" name="backup" value=""  /></p>		
				<p><input type="hidden" name="do" value="backupRestoreFromFile" /></p>
				<p><input type="submit" value="Restaurar Backup Local" accept="txt/sql"/> <input type="button" value="Cancelar" onClick="hideBackupLoader()"/></p>

			</form>
			</fieldset>
		</div>
	</p>
	<p>
		<table id="tabla-backups" border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
			<thead>
				<tr>
					 <th colspan="2" class="thFillTitle"><div class="rightLink"></div></th>
				</tr>
				<tr>
					<th width="60%">Nombre de Archivo</th>
					<th width="40%">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			|-if empty($filenames)-|
				<tr>
					<th colspan="2" class="thFillTitle">No hay resultados disponibles</th>
				</tr>
			|-/if-|
		
			|-foreach from=$filenames item=filename name=for_filenames-|
				<tr>
					<td><a href="Main.php?do=backupDownload&filename=|-$filename-|">|-$filename-|</a></td>
					<td nowrap>
						<form action="Main.php" method="post">
							<input type="hidden" name="filename" value="|-$filename-|"  />
							<input type="hidden" name="do" value="backupRestore" />
							<input type="submit" value="Restaurar Backup" />
						</form>
						<form action="Main.php" method="post">
							<input type="hidden" name="filename" value="|-$filename-|"  />
							<input type="hidden" name="do" value="backupDelete" />
							<input type="submit" value="Eliminar Backup" />
						</form>				
					</td>
				</tr>
			|-/foreach-|						
				<tr>
					 <th colspan="2" class="thFillTitle"></th>
				</tr>
			</tbody>
		</table>
	</p>
</div>
