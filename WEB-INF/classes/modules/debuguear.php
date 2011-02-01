/* Debuguear */

/*		$query=print_r($arraydiff,true); */

  	$handle = fopen("WEB-INF/classes/modulos/modulos/actions/modulos.log", "a");
		fwrite($handle, "Post: ".$query."\n");
  	fclose($handle);
