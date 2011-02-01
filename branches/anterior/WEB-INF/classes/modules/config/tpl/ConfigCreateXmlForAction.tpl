<h2>Creación de Xml's para modulos</h2>
<h1>Crear Xml</h1>
<p>A continuación podrá elegir un módulo para posteriormente ver y editar su xml.<p>
|-if $message eq "ok"-|<div class="successMessage">Configuración Guardada!</div>|-/if-|
|-if $selectedModule ne ""-|
	Módulo: |-$selectedModule-|
|-/if-|&nbsp;
	<form action="Main.php" method="get">
		<select name="module" onchange="this.parentNode.submit();">
			<option value="">Seleccionar Modulo</option>
		|-foreach from=$modules item=module name=for_modules key=module_name-|
			<option value="|-$module-|">|-$module-|</option>
		|-/foreach-|
		</select>
		<input type="hidden" name="do" value="configCreateXmlForAction" />
</form>
|-if $selectedModule ne ""-|
<form method="post" action="Main.php">
	<ul id="config_ul">
		<li id="config[|-$selectedModule-|]"><span class='titulo2'>|-$selectedModule-|</span>
			<ul id="config[|-$selectedModule-|]_ul">
				<p>|-include file=ConfigSetInclude.tpl elements=$config name=[$selectedModule]-|</p>
				<p>&nbsp;</p>
			</ul>
			|- if $flag != 1 -|
			<ul id="configb">
				<p><strong>Nuevos Actions Encontrados:</strong> |-include file=ConfigCreateXmlForActionInclude.tpl elements=$actionXmls name=[$selectedModule]-| </p>
			</ul>
			|-/if-|
		</li>
	</ul>
	<input type="hidden" name="do" value="configDoCreateXmlForAction" />
	<input type="hidden" name="module" value="|-$selectedModule-|" />
	<input type="submit" value="Guardar" class="button" />
</form>
|-/if-|
