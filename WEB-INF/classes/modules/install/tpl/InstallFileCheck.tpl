<table border='0' cellpadding='0' cellspacing='0' width='100%'> 
	<tr> 
		 <td class='title'>Configuración del Sistema</td> 
	 </tr> 
	<tr> 
		 <td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class='backgroundTitle'>Instalacion de Módulos del Sistema</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Instalacion de modulo <strong>|-$moduleName-|</strong>.</td> 
	 </tr> 
	<tr> 
		 <td class="tdSize2">Cuarto Paso - Verificacion de archivos.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 

<div >
	<p>Archivo phpmvc-config-|-$moduleName-|.xml` |-if empty($phpConfigXMLContent)-| inexistente |-else-|existente|-/if-|</p>
	<p>
 	<p>Archivo Module Paths modulepaths-|-$moduleName-|.php |-if empty($modulePathsContent)-| inexistente |-else-|existente|-/if-|</p>
	<p>

	<p>Archivos generados durante la instalacion</p>
	<p>
		<label>Paso 1 - Informacion del Modulo</label><br />
		<pre>|-$information-|</pre>
	 </p>
	<p>
		<label>Paso 2 - Permisos del Modulo</label><br />
		<pre>|-$permissions-|</pre>
	 </p>
	<p>
		<label>Paso 3 - Mensajes de Log</label><br />
		<pre>|-$messages-|</pre>
	 </p>
	 

</div>

<form method="post">
<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoFileCheck" />
	<p><input type="submit" value="Aceptar Configuracion" /></p>
</form>

