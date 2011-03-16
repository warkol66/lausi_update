function cambiaclase(element,clase) {
	var NAME = document.getElementById(element);
	NAME.className=clase;
}
		function logout(){
			return window.confirm("Esta seguro que quiere salir del sistema?")
		}

<!-- Script usado para hacer un checkbox masivo -->

<!-- Begin
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "Deseleccionar Todos"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "Seleccionar Todos"; }
}
//  End -->


function switch_vis(element,display)
{
	var e_ref="";
	var ant="";
	e_ref=document.getElementById(element);
	if (display == undefined)
	{
		display='block';
	}
	ant=e_ref.style.display;
	if (e_ref.style.display !=  'none' && e_ref.style.display != "")
	{
		display='none';
	}
	else
	{
		display=display;
	}
	e_ref.style.display=display;
}
function switch_value(element,value)
{
	var e_ref="";
	var ant="";
	e_ref=document.getElementById(element);
	if (value == undefined)
	{
		value='Mostrar Sección';
	}
	ant=e_ref.value;
	if (e_ref.value !=  'Ocultar Sección' && e_ref.value != "")
	{
		value='Ocultar Sección';
	}
	else
	{
		value=value;
	}
	e_ref.value=value;
}
function switch_vis_mult(elements)
{
	var i=0;
	for(i=0; i<elements.length; i++)
	{
		switch_vis(elements[i],'none');
	}
}


function addConfigAttribute(li) {
	ul = document.getElementById(li.id+"_ul");
	newName=window.prompt("Nombre del nuevo atributo:",'');
	ul.innerHTML += "<li>"+newName+": <input type='text' name='"+li.id+"["+newName+"]' value='' />"+
		'<a class="a_image" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)">'+
		'<img src="images/delete-comment-blue.gif" alt="Eliminar" /></a></li>';
}

function addConfigSection(li) {
	ul = document.getElementById(li.id+"_ul");
	newName=window.prompt("Nombre de la nueva seccion:",'');
	ul.innerHTML += "<li id='"+li.id+"["+newName+"]'>"+newName+
		' <a class="a_image" href="#" onclick="javascript:addConfigAttribute(this.parentNode)"><img src="images/add-comment-blue.gif" alt="Agregar Atributo" title="Agregar Atributo" /></a>'+
		' <a class="a_image" href="#" onclick="javascript:addConfigSection(this.parentNode)"><img src="images/add-folder-green.gif" alt="Agregar Secci&oacute;n" title="Agregar Secci&oacute;n" /></a>'+
		' <a class="a_image" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)">'+
		'<img src="images/delete-folder-green.gif" alt="Eliminar" /></a>'+
		"<ul id='"+li.id+"["+newName+"]_ul'></ul></li>";
}

function deleteConfigAttribute(li) {
	ul = li.parentNode;
	ul.removeChild(li);
}



var myGlobalHandlers = {
	onCreate: function(){
		Element.show('systemWorking');
	},
	onFailure: function(){
		alert('Sorry. There was an error.');
	},
	onComplete: function() {
		if(Ajax.activeRequestCount == 0){
			Element.hide('systemWorking');
		}
	}
};

Ajax.Responders.register(myGlobalHandlers);

function categoriesDoEditX() {
	var pars = 'do=categoriesDoEditX';
	var fields = Form.serialize('form_category_add');

	var myAjax = new Ajax.Updater(
				{success: 'table_categories_list'},
				url,
				{
					method: 'post',
					parameters: pars,
					postBody: fields,
					insertion: Insertion.Bottom
				});
	$('name').value = "";
}


function modulesDoActivateX(form) {
	var pars = 'do=modulesDoActivateX';
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'message'},
				url,
				{
					method: 'post',
					parameters: pars,
					postBody: fields,
					evalScripts: true
				});
		$('messageMod').innerHTML = "Actualizando sistema...";
}


function ordersAddItemToCartX(form) {
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'messageCart'},
				url,
				{
					method: 'post',
					postBody: fields
				});
	$('messageCart').innerHTML = "Adding to cart...";
}

function ordersChangeItemCartX(form) {
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'messageCart'},
				url,
				{
					method: 'post',
					postBody: fields
				});
	$('messageCart').innerHTML = "Modifing cart...";
}

function ordersRemoveItemCartX(form) {
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'messageCart'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});
	$('messageCart').innerHTML = "Removing product from cart...";
}

function ordersStateDoChangeX(form) {
	var newState = $('state').value;
	if (newState != "") {
		var fields = Form.serialize(form);

		var myAjax = new Ajax.Updater(
				{success: 'stateChanges'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
		$('messageState').innerHTML = "Changing state...";
	} else {
		alert("Select new state!");
	}
}

function ordersSendOrdersExport(form) {
	
	$('do').value = "ordersExport";
	form.submit();
	
	return true;
} // End of ordersSendOrdersExport

function ordersSendOrdersDelete(form) {

	$('do').value = "ordersDoDelete";
	form.submit();

	return true;
} // End of ordersSendOrdersExport
