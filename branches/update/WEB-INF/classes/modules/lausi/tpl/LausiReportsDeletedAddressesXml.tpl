<xls>
	<headers>
		<header>Reporte de Direcciones Eliminadas</header>
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
			<header>F.Baja</header>
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
			<fechaBaja>|-$address->getDeletionDate()|date_format-|</fechaBaja>
		|-/if-|
		</row>|-/foreach-|					
	</tableValues>
</xls>
