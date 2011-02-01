<h2>##40,Configuración del Sistema##</h2>
<h1>Variables de Configuración del Sistema</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
<p>A continuación podrá ver las variables de configuración del sistema.</p>
|-if $message eq "ok"-|<div align='center' class='successMessage'>onfiguración Guardada!</div>|-/if-|
<!-- BOX VARIABLES ------------------------------->
<div id="boxVariables">
	<ul>
		|-foreach from=$config item=block name=for_blocks key=name-|
			<li><span class='titulo2'>|-$name-|</span></li>
		<ul>
			|-include file=ConfigViewInclude.tpl elements=$block-|
		</ul>
		|-/foreach-|
	</ul>
</div>
<br />
<a href="Main.php?do=configEdit">Editar Config</a>
