|-foreach from=$elements item=element key=element_name-|
|-if $element|is_array and $element.element_type ne "Text" and $element.element_type ne "Options" and $element.element_type ne "YES/NO" 
and $element.element_type ne "TIMEZONE" and $element.element_type ne "LONGTEXT"-|
<li id="config|-$name-|[|-$element_name-|]">|-$element_name-|
	<ul id="config|-$name-|[|-$element_name-|]_ul">|-include file=ConfigSetInclude.tpl elements=$element name="$name[$element_name]"-|</ul>
</li>
|-else-|
<li>
	<span |-if $element|count_characters:true gt 50-|class="configLabel"|-/if-|>|-$element_name-|</span>
	|-if $element.element_type eq "Options"-|
		<select name="config|-$name-|[|-$element_name-|][value]">
		|-foreach from=$element.element_options item=option name=for_options-|
			<option value="|-$option-|"|-if $option eq $element.value-| selected="selected"|-/if-|>|-$option-|</option>
		|-/foreach-|
		</select>
		<input type="hidden" name="config|-$name-|[|-$element_name-|][element_type]" value="|-$element.element_type-|" />
	  |-foreach from=$element.element_options item=option name=for_options-|
		<input type="hidden" name="config|-$name-|[|-$element_name-|][element_options][option_|-$smarty.foreach.for_options.iteration-|]" value="|-$option-|" />
		|-/foreach-|
	|-elseif $element.element_type eq "YES/NO"-|
		<select name="config|-$name-|[|-$element_name-|][value]">
			<option value="YES"|-if "YES" eq $element.value-| selected="selected"|-/if-|>YES</option>
			<option value="NO"|-if "NO" eq $element.value-| selected="selected"|-/if-|>NO</option>
		</select>
		<input type="hidden" name="config|-$name-|[|-$element_name-|][element_type]" value="|-$element.element_type-|" />
	|-elseif $element.element_type eq "TIMEZONE"-|
		<select name="config|-$name-|[|-$element_name-|][value]">
			|-foreach from=$timezones item=timezone name=for_timezones-|
				<option value="|-$timezone->getCode()-|" |-if $element.value eq $timezone->getCode()-|selected="selected"|-/if-|>|-$timezone->getDescription()-|</option>
			|-/foreach-|
		</select>
		<input type="hidden" name="config|-$name-|[|-$element_name-|][element_type]" value="|-$element.element_type-|" />
	|-elseif $element|count_characters:true gt 120-|
		<textarea name="config|-$name-|[|-$element_name-|]" cols="50" rows="5" wrap="VIRTUAL">|-$element-|</textarea>
	|-elseif $element|count_characters:true gt 50-|
		<textarea name="config|-$name-|[|-$element_name-|]" cols="50" rows="3" wrap="VIRTUAL">|-$element-|</textarea>
	|-elseif $element|count_characters:true gt 30-|
		<input name="config|-$name-|[|-$element_name-|]" type="text" value="|-$element-|" size="55" />
	|-elseif $element|count_characters:true lt 5-|
		<input name="config|-$name-|[|-$element_name-|]" type="text" value="|-$element-|" size="5" />
	|-else-|
		<input name="config|-$name-|[|-$element_name-|]" type="text" value="|-$element-|" size="35" />
	|-/if-|
</li>
|-/if-|
|-/foreach-|
