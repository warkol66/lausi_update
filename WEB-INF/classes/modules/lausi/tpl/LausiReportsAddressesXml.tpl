<xls>
	<headers>
		<header>Reporte de Direcciones</header>
		|-if $type eq 1-|
		<header>Direcciones con carteleras dobles</header>
		|-elseif $type eq 2-|
		<header>Direcciones con carteleras séxtuples</header>
		|-elseif $viewDetail neq ''-|
		<header>Direcciones con cantidad de carteleras dobles y séxtuples</header>
		|-else-|
		<header>Direcciones con carteleras</header>
		|-/if-|
		<header></header>
	</headers>
	<tableHeaders>
		<header>Dirección</header>
		<header>Padrón</header>
		|-if isset($viewDetail)-|
			|-if $type eq 1-|
			<header>Dobles</header>
			|-elseif $type eq 2-|
			<header>Séxtuples</header>
			|-else-|
			<header>Dobles</header>
			<header>Séxtuples</header>
			|-/if-|
		|-else-|
			<header>F.Alta</header>
		|-/if-|
	</tableHeaders>
	<tableValues>|-foreach from=$addresses item=address name=for_billboards-|
		<row>
			<address>|-$address->getName()-|</address>
			<enumeration>|-$address->getEnumeration()-|</enumeration>
			|-if isset($viewDetail)-||-if $type eq 1-|
			<dobles>|-$address->getBillboardCountByType(1)-|</dobles>
			|-elseif $type eq 2-|
			<sextuples>|-$address->getBillboardCountByType(2)-|</sextuples>
			|-else-|
			<dobles>|-if $address->getBillboardCountByType(1) ne 0-||-$address->getBillboardCountByType(1)-||-/if-|</dobles>
			<sextuples>|-if $address->getBillboardCountByType(2) ne 0-||-$address->getBillboardCountByType(2)-||-/if-|</sextuples>
			|-/if-|
		|-else-|
			<fechaAlta>|-$address->getCreationDate()|date_format-|</fechaAlta>
		|-/if-|
		</row>|-/foreach-|					
	</tableValues>
</xls>
