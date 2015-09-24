<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

	
$nombre=$_POST['c_nombres'];
$correo=$_POST['c_correo'];
$fechai=date("Y-m-d",strtotime($_POST['fechaida']));
$fechar=date("Y-m-d",strtotime($_POST['fechavuelta']));
$telefono=$_POST['c_telefono'];
$estados=$_POST['estados'];
$cantidad=$_POST['c_cantidad'];
$estado="Noprocesada";
//CONFIGURACION DE CORREO ELECTRONICO
$para =$correo;
//se indica el tipo multiparte y se le indica el nombre del borde
$encabezados="MIME-Version: 1.0\n";
$encabezados.="Content-type: text/html; charset=iso-8859-1";
//se crel el cuerpo del mensaje
$mensaje= "Estimado $nombre, Le informamos que hemos recibido su solcitud de viaje correctamente. Nuestro personal evaluara dicha solicitud y se le enviará por esta misma vía la respuesta.
Saludos
Cooperativa de Transportes Roosevelt ";


    $sql="INSERT INTO servicios (nombre, correo, fechai, fechar, telefono, cantidad, lugar, estatus) VALUES ('$nombre','$correo','$fechai','$fechar','$telefono','$cantidad','$estados','$estado')";

if (mysql_query($sql,$con)){
echo "<script languaje='javascript'>alert('Registrado el servicio correctamente, fue enviado un correo de confirmaci\u00f3n con los datos del servicio solicitado')
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
