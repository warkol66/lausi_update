|-foreach from=$elements item=element key=element_name-|
|-if $element|is_array and $element.element_type ne "Text" and $element.element_type ne "Options" and $element.element_type ne "YES/NO"-|
<li id="configb|-$name-|[|-$element_name-|]">|-$element_name-|
	<ul id="configb|-$name-|[|-$element_name-|]_ul">|-include file=ConfigCreateXmlForActionInclude.tpl elements=$element name="$name[$element_name]"-|</ul>
</li>
|-else-|
<li>
	|-$element_name-|:
	|-if $element.element_type eq "Options"-|
	<select name="configb|-$name-|[|-$element_name-|][value]">
  	|-foreach from=$element.element_options item=option name=for_options-|
		<option value="|-$option-|"|-if $option eq $element.value-| selected="selected"|-/if-|>|-$option-|</option>
		|-/foreach-|
	</select>
	<input type="hidden" name="configb|-$name-|[|-$element_name-|][element_type]" value="|-$element.element_type-|" />
	|-else-|
		|-if $element.element_type eq "YES/NO"-|
	<select name="configb|-$name-|[|-$element_name-|][value]">
		<option value="YES"|-if "YES" eq $element.value-| selected="selected"|-/if-|>YES</option>
		<option value="NO"|-if "NO" eq $element.value-| selected="selected"|-/if-|>NO</option>
	</select>
	<input type="hidden" name="configb|-$name-|[|-$element_name-|][element_type]" value="|-$element.element_type-|" />
		|-else-|
	<input type="text" name="configb|-$name-|[|-$element_name-|]" value="|-$element-|" />
		|-/if-|
	|-/if-|
	|-if $element.element_type eq "Options"-|
  	|-foreach from=$element.element_options item=option name=for_options-|
		<input type="hidden" name="configb|-$name-|[|-$element_name-|][element_options][option_|-$smarty.foreach.for_options.iteration-|]" value="|-$option-|" />
		|-/foreach-|
	|-/if-|
</li>
|-/if-|
|-/foreach-|
