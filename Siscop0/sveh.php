<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "exten"; 

$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die('Error de conexion al Servidor: ' . mysql_error());; 
mysql_select_db($bd_base, $con) or die('Error de conexion con la BD: ' . mysql_error()); 

$data  = explode("-",$_POST['id']);

$campo = $data[0]; // nombre del campo
$id    = $data[1]; // id del registro
$value = $_POST['value']; // valor por el cual reemplazar

$estado = array(
			"Servicio"=>"Servicio",
			"Inactivo"=>"Inactivo",
		 );
$ruta = array(
			"1"=>"Carmelitas",
			"2"=>"Chacaito",
			"3"=>"Previsora",
		 );

		 
// sql para actualizar el registro

$query = mysql_query("UPDATE vehiculos SET ".$campo." = '".$value."' 
							WHERE id = '".$id."'",$con);

echo ($campo == 'estado') ? $estado[$value] : $value;
echo "<script>
$(document).ready(function(){  
$('#contenido').load('listarvehiculo.php');
});
</script>";
?>
