<xls>
	<headers>
		<header>Reportes</header>
		<header>Hoja de Ruta para Contratista</header>
	</headers>
	<row>
		<empty></empty>
	</row>
	<row>
		<addresses>Dirección</addresses>
	</row>
	<row>
		<empty></empty>
	</row>
|-foreach from=$results item=result-|	
	|-assign var=advertisements value=$result.adverts-|
	|-assign var=currentTheme value=$result.theme-|
	|-if not empty($advertisements)-|
	<tableValues>
			<row>
				<title>Motivo: |-$currentTheme->getShortName()-|</title>
			</row>
			<row>
				<circuit>Circuito</circuit>
				<address>Dirección</address>
				<count>Cantidad</count>
				<previous>Se Tapa</previous>
				<workforce>Contratista</workforce>
			</row>
				|-foreach from=$advertisements item=advertisement name=for_advertisements-|
					|-assign var=theme value=$advertisement->getTheme()-|
					|-assign var=billboard value=$advertisement->getBillboard()-|
					|-assign var=address value=$billboard->getAddress()-|
					|-assign var=circuit value=$address->getCircuit()-|
					
					|-if count($address->getPreviousThemes($date,$theme->getId())) gt 0-|
						|-assign var=previous value=$address->getPreviousThemes($date,$theme->getId())-|
						|-assign var="toDistributeCounter" value=$address->getToBePublishedCount($date,$theme->getId())-|
						|-foreach from=$previous item=aPreviousHolder name=for_previous-|
						<row>
							<circuit>|-$circuit->getName()-|</circuit>
							<address>|-$address-|</address>
							<counter>|-$aPreviousHolder.counter-|</counter>|-assign var="toDistributeCounter" value=$toDistributeCounter-$aPreviousHolder.counter-|
							<previous>|-assign var=aPrevious value=$aPreviousHolder.theme-||-$aPrevious->getName()-||-if $aPreviousHolder.counter gt 1-| (|-$aPreviousHolder.counter-|)|-/if-|</previous>
							<workforce>|-assign var=workforce value=$advertisement->getWorkforce()-||-if $workforce neq ''-||-$workforce->getName()-||-/if-|</workforce>
						</row>
						|-/foreach-|
						|-if $toDistributeCounter gt 0-|
						<row>
							<circuit>|-$circuit->getName()-|</circuit>
							<address>|-$address->getName()-|</address>
							<counter>|-$toDistributeCounter-|</counter>
							<empty></empty>
							<workforce>|-assign var=workforce value=$advertisement->getWorkforce()-||-if $workforce neq ''-||-$workforce->getName()-||-/if-|</workforce>
						</row>						
						|-/if-|
					|-else-|
					<row>
						<circuit>|-$circuit->getName()-|</circuit>
						<address>|-$address->getName()-|</address>
						<count>|-$address->getToBePublishedCount($date,$theme->getId())-|</count>					
						<previous>|-assign var=previous value=$address->getPreviousThemes($date,$theme->getId())-|
							|-foreach from=$previous item=aPreviousHolder name=for_previous-|
								|-assign var=aPrevious value=$aPreviousHolder.theme-|
								|-$aPrevious->getName()-||-if $aPreviousHolder.counter gt 1-| (|-$aPreviousHolder.counter-|)|-/if-||-if $smarty.foreach.for_previous.last-|.|-else-|, |-/if-|
							|-/foreach-|
						</previous>
						<workforce>
							|-assign var=workforce value=$advertisement->getWorkforce()-|
							|-if $workforce neq ''-||-$workforce->getName()-||-/if-|
						</workforce>
					</row>
					|-/if-|
				|-/foreach-|						
	</tableValues>
	|-/if-|
|-/foreach-|

|-if $reportMode eq 'print'-|
	<tableValues>		
			<row>
				<title>Direcciones Ordenadas</title>
			</row>
			<row>
				<circuit>Circuito</circuit>
				<address>Dirección</address>
			</row>
		|-foreach from=$results item=result-|
			|-foreach from=$result.addresses item=address-|
				<row>
					|-assign var=address value=$address.address-|
					|-assign var=circuit value=$address->getCircuit()-|
					<circuit>|-$circuit->getName()-|</circuit>
					<address>|-$address-|</address>
				</row>
			|-/foreach-|
		|-/foreach-|
	</tableValues>
|-/if-|
</xls>

