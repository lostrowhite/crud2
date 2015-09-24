<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
header("Content-Type: text/html;charset=iso-8859-1");
$iva= $_POST['niva'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="16";
$detalle="Actualizado iva%: $iva";
	
	$sql2= "UPDATE iva set piva ='".$iva."' WHERE id = '1'";
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
		  
if (mysql_query($sql2,$con)){
	mysql_query($sql1,$con);
		echo "<script languaje='javascript'>alert('Modificado el IVA correctamente')
document.location=('paneln.php')
</script>";
	}else{
		"<script languaje='javascript'>alert('No pudo modificar el nuevo iva en la Base de Datos, Contacte al Administrador')
document.location=('paneln.php')
</script>";
	} 
mysql_close();

?>