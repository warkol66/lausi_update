<h2>Configuración del Sistema</h2>
<h1>Instalacion de Módulos del Sistema: Instalacion de modulo <strong>|-$moduleName-|</strong>.</h1>

<form  method="post">

	<fieldset>
		<legend>Primer Paso - Configuracion de Informacion del Modulo.</legend>
			<p>
				<label>Nombre del Modulo:</label>
				<input type="text" name="name" value="|-$moduleName-|"/>
			</p>
			|-if ($englishLabel)-|
				|-assign var=labelEnglish value=$englishLabel->getLabel() -|
				|-assign var=descriptionEnglish value=$englishLabel->getDescription() -|
			|-/if-|
			|-if ($spanishLabel)-|
				|-assign var=labelSpanish value=$spanishLabel->getLabel() -|
				|-assign var=descriptionSpanish value=$spanishLabel->getDescription() -|				
			|-/if-|
			<p>	
				Etiquetas:
			</p>	
			<p>
				<label>Castellano:</label>
				<input type="text" name="labelsSpanish" value="|-$labelSpanish-|"/>
			</p>
			<p>
				<label>Ingles:</label>
				<input type="text" name="labelsEnglish" value="|-$labelEnglish-|"/>
				
			</p>
			<p>
				Descripcion:
			</p>
			<p>	
				<label>Castellano:</label>
				<input type="input" name="descriptionSpanish" value="|-$descriptionSpanish-|"/>
			</p>
			<p>
				<label>Ingles:</label>
				<input type="input" name="descriptionEnglish" value="|-$descriptionEnglish-|"/>
			</p>	
			<p>
				Es un modulo Always Active:
			</p>
			<p>
					<label>No</label>
					<input type="radio" name="alwaysActive" value="0" |-if isset($module) and ($module->getAlwaysActive() eq 0)-|checked="checked"|-else-|checked="checked"|-/if-|/>
			</p>
			<p>
					<label>Si</label>
					<input type="radio" name="alwaysActive" value="1" |-if isset($module) and ($module->getAlwaysActive() eq 1)-|checked="checked"|-/if-|/>			
			</p>
			<p>
				Dependencias: Indique aquellos modulos de los cuales depende el que esta siendo instalado.
				
				|-foreach from=$assignedDependencyModules item="dependency"-|
					<p>
						<label>|-$dependency->getName()-|</label> 
						<input type="checkbox" name="dependencies[]" value="|-$dependency->getName()-|" checked="checked"/>
					</p>
				|-/foreach-|
				|-foreach from=$dependencyModules item="dependency"-|
					<p>
						<label>|-$dependency->getName()-|</label> 
						<input type="checkbox" name="dependencies[]" value="|-$dependency->getName()-|"/>
					</p>
				|-/foreach-|
				
			</p>

	</fieldset>	
	<input type="hidden" name="moduleName" value="|-$moduleName-|" />
	<input type="hidden" name="do" value="installDoSetupModuleInformation" />
	|-if isset($mode)-|
		<input type="hidden" name="mode" value="|-$mode-|" id="mode">
	|-/if-|	
	<input type="submit" value="Guardar Cambios" />
</form>

