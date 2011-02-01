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
		 <td class="tdSize2">Tercer Paso - Configuracion de Mensajes de Log.</td> 
	 </tr> 
	<tr> 
		 <td>&nbsp;</td> 
	 </tr> 
</table> 
<form method="post">
<input type="hidden" name="moduleName" value="|-$moduleName-|" />

<table width="100%" cellpadding="5" cellspacing="0" class="tableTdBorders"> 
	<tr> 
		<th width="20%" scope="col" class="thFillTitle">Action Mapping</th> 
		<th width="50%" scope="col" class="thFillTitle">Mensajes</th> 
	</tr> 
	
	|-foreach from=$actions item=action -|
	<tr> 
		<td class="tdSize1">|-$action-|</td>
		|-assign var="actionMessages" value=$messages[$action] -|
		
		<td class="tdSize1" nowrap>
		|-foreach from=$actionMessages item=message -|
			<p>
			<label><strong>Forward |-$message-|</strong></label><br /><br />
			<label>Mensaje en Castellano</label><br />
			<input type="input" name="message[|-$action-|][|-$message-|][esp]" value="|-if isset($actualMessages)-||-$actualMessages.$action.$message.esp-||-/if-|"><br/>
			<label>Mensaje en Ingles</label><br />
			<input type="input" name="message[|-$action-|][|-$message-|][eng]" value="|-if isset($actualMessages)-||-$actualMessages.$action.$message.esp-||-/if-|"><br/>
			</p>
		|-/foreach-|
		</td>
		
	</tr> 
	|-/foreach-|
	
</table>
 
	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoSetupMessages" />
	|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
	|-/if-|
	<p><input type="submit" value="Guardar Mensajes" /></p>
</form>

