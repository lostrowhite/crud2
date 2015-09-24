<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$id=$_POST['c_id'];	
$nombre=$_POST['c_nombres'];
$correo=$_POST['c_correo'];
$respuesta=$_POST['respuesta'];
$estado="Procesada";
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="13";
$detalle="Procesado el servicio N:$id";
//CONFIGURACION DE CORREO ELECTRONICO
$para =$correo;
//se indica el tipo multiparte y se le indica el nombre del borde
$encabezados="MIME-Version: 1.0\n";
$encabezados.="Content-type: text/html; charset=iso-8859-1";
//se crel el cuerpo del mensaje
$mensaje= "Estimado $nombre, a continuacion le enviamos la información correspondiente a su solicitud de servicio de viaje:<br />
$respuesta </br>
Saludos
Cooperativa de Transportes Roosevelt ";

	 $sql= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	
	 $sql1= "UPDATE servicios set estatus ='".$estado."', respuesta ='".$respuesta."' WHERE id = '".$id."'";	

if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
echo "<script languaje='javascript'>alert('Procesado el servicio correctamente, se le envi\u00f3 un correo de confirmaci\u00f3n con la respuesta del servicio solicitado')
document.location=('paneln.php')
</script>";

}else {
		 die (mysql_error());
echo "<script languaje='javascript'>alert('No se pudo enviar la solicitud correctamente: contacte al 0212-6312227')
document.location=('paneln.php')
</script>";
}
mysql_close();
?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
