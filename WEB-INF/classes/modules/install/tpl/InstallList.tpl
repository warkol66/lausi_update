 |- if $message eq "success" -|
 	<div align='center' class='errorMessage'>El Modulo Ha sido instalado Correctamente</div>
 |-/if-|

<h2>Configuracion</h2>
<h1>Instalacion de modulos</h1>
<p>A continuacion podra instalar nuevos modulos o reinstalar aquellos que se encuentran en el sistema actualmente.
</p>
<p>
	<h1>Modulos a instalar</h1>
</p>
<p>
	<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th width="20%" scope="col" class="thFillTitle">Nuevo Módulo</th> 
			<th width="10%" scope="col" class="thFillTitle">Accion</th> 
		</tr> 
		|-foreach from=$modulesToInstall item=module name=modulef-|
		<tr> 
			<td class="tdSize1">|-$module-|</td> 
			<td class="tdSize1" nowrap>
		
				<form method="post">
					<input type="hidden" name="do" value="installSetupModuleInformation" />
					<input type="hidden" name="moduleName" value="|-$module-|" />
					<input type="submit" value="Instalar" />
				</form>		
			</td> 
		</tr> 
		|-/foreach-|
	</table>
</p>
<p>
	<h1>Modulos Instalados</h1> 
</p>
<p>
	<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
		<tr> 
			<th width="20%" scope="col" class="thFillTitle">Módulo</th> 
			<th width="10%" scope="col" class="thFillTitle">Accion</th> 
		</tr> 
		|-foreach from=$modulesInstalled item=module name=modulef-|
		<tr> 
			<td class="tdSize1">|-$module->getName()-|</td> 
			<td class="tdSize1" nowrap>
		
				<form method="post">
					<input type="hidden" name="do" value="installSetupModuleInformation" />
					<input type="hidden" name="moduleName" value="|-$module->getName()-|" />
					<input type="hidden" name="mode" value="reinstall">
					<input type="submit" value="Reinstalar" />
				</form>		
			</td> 
		</tr> 
		|-/foreach-|
	</table>
</p>