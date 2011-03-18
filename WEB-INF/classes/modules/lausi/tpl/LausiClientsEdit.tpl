<h2>Configuración del Sistema</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Cliente</h1>
<div id="div_client">
	<form name="form_edit_client" id="form_edit_client" action="Main.php" method="post">
		|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el cliente</span>|-/if-|
		<p>
			Ingrese los datos del cliente.
		</p>
		<fieldset title="Formulario de edición de datos de un cliente">
			<p>
				<label for="name">Nombre</label>
				<input name="name" type="text" id="name" title="name" value="|-$client->getname()-|" size="60" maxlength="100" />
			</p>
			<p>
				<label for="contact">Contacto</label>
				<input name="contact" type="text" id="contact" title="contact" value="|-$client->getcontact()-|" size="50" maxlength="100" />
			</p>
			<p>
				|-if $action eq "edit"-|
				<input type="hidden" name="id" id="id" value="|-$client->getid()-|" />
				|-/if-|
				<input type="hidden" name="action" id="action" value="|-$action-|" />
				<input type="hidden" name="do" id="do" value="lausiClientsDoEdit" />
				<input type="submit" id="button_edit_client" name="button_edit_client" title="Aceptar" value="Aceptar" />
			</p>
				</fieldset>
	</form>
</div>
