<h1>
	|-$alertSubscription->getName()-|
</h1>
|-assign var=entities value=$alertSubscription->getEntitiesFiltered()-|
|-if $entities ne '' && count($entities) > 0-|
	|-assign var=entityNameField value=$alertSubscription->getModuleEntityFieldRelatedByEntitynamefielduniquename()-|
	|-assign var=entityDateField value=$alertSubscription->getModuleEntityFieldRelatedByEntitydatefielduniquename()-|
	<table style="border-collapse: collapse;">
		<thead>
			<tr>
				<th style="border: solid;">|-$entityNameField->getName()-|</th>
				<th style="border: solid;">|-$entityDateField->getName()-|</th>
			</tr>
		</thead>
		<tbody>
		|-foreach from=$entities item=entity-|
			<tr>
				<td style="border: solid;">|-call_user_func object=$entity callback='get'|cat:$entityNameField->getName()-|</td>
				<td style="border: solid;">|-call_user_func object=$entity callback='get'|cat:$entityDateField->getName()-|</td>
			</tr>
		|-/foreach-|
		</tbody>
	</table>
|-else-|
	Ninguno
|-/if-|
