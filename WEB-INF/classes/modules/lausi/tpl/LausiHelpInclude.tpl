<div id="help" style="display:block;height:20px;width:100%;padding-right:50px;"><img src="images/icon_help.png" onClick="switch_vis('helpMap');" style="float:right;"/><div id="helpMap" style="display:none;background-color:#FFFFFF;border:#000000 1px solid;padding:10px;float:left;margin-bottom:10px;position:absolute;z-index:12000"><img src="images/icon_no.png" onClick="switch_vis('helpMap');" style="float:right;"/><p>|-if $help eq "circuit"-| <strong>Para modificar un circuito:</strong> <br />
  Si desea agregar un punto en una línea, mueva el cursor hasta la linea donde quiere agregar el punto hasta que el cursos indique con el índice la línea. Haga click sobre al línea y el sistema creará un punto adicional.
  <br />
  Si queire eliminar un punto, haga click sobre el marcador (<img src="images/pin_blue.png" />) y el mismo desaparecerá uniendo los puntos adyacentes con una sola línea.<br />
  Para mover un punto, seleccione el marcador (<img src="images/pin_blue.png" />) y arraste con el mouse.
  |-elseif $help eq "distribution" || $help eq "distributionByDistance"-|
  Las direcciones en cuyas carteleras se han propuesto afiches del tema a distribuir se indican con <img src="images/marker_blue.png" width="20" height="34" /><br />
  
  Las direcciones en cuyas carteleras se han propuesto afiches del tema a distribuir que aun cuentan con carteleras disponibles se indica con <img src="images/marker_partiallyAssigned.png" width="20" height="34" /><br />
  
  Las direcciones donde hay carteleras disponibles y no hay afiches asignados del tema a distribuir se indican con <img src="images/marker_green.png" width="20" height="34" /> |-elseif $help eq "distributionByDistance"-|
  La distancia máxima solicitada a partir de la dirección se indica con el círculo verde. 
  El circulo azul indica una distancia que supera en un 30% la distancia límite.
  El circulo amarillo indica una distancia del 60% mayor a la distancia indicada.
  El circulo rojo indica una distancia 100% superior a al ingresada.
  Si el sistema no encuentra carteleras suficientes en el radio ingresado, mostrará las disponibles en los rangos adicionales de hasta 30%, hasta 60% y hasta 100% respectivamente hasta encontrar el total de carteleras necesarias.
  |-/if-|
  </p>
<p>Para ver la imágen mas grande, puede presionando la tecla de mayúsculas ("shift") al pasar el mouse por el mapa, aparecerá un puntero que permite seleccionar un área para ampliar. Al soltar la tecal mayuscula, el mapa se ampliará en la zona seleccionada. </p></div></div>