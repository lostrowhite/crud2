<?php
function co(){
   $servidor = mysql_connect("localhost","castilloc","castilloc1502") or die('Error de conexion al Servidor: ' . mysql_error());
   $basedatos = mysql_select_db("exten") or die('Error de conexion con la BD: ' . mysql_error());
}
function de(){
   mysql_close();
}
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects1=array(
"facultad"=>"facultades",
"escuela"=>"escuelas",
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects1;
	if(isset($listadoSelects1[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	$tabla=$listadoSelects1[$selectDestino];
	co();
	$consulta=mysql_query("SELECT id, opcion FROM $tabla WHERE relacion='$opcionSeleccionada'") or die(mysql_error());
	de();
	
	// Comienzo a imprimir el select
	echo "<select name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido1(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>