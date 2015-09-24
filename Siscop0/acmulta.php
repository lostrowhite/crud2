<html>
<head>
</head>
<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$id=$_POST['multa_id'];
$nsocio=$_POST['c_nsocio'];
$expediente=$_POST['c_expediente'];
$fecha1=$_POST['c_fecha'];
$monto=$_POST['c_monto'];
$pago=$_POST['c_pago'];
$login=$_SESSION['login'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="7.1";
$ref="Pago multa socio N:$nsocio, Exp :$expediente";
$detalle="Registrado pago de multa socio N: $nsocio";

	$sql= "INSERT INTO ingresos (fecha, monto, referencia, socioavance) VALUES ('$fecha','$pago','$ref','$nsocio')";
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
	$sql2= "UPDATE multas set estado ='Pagado', fechap ='".$fecha."' WHERE id = '".$id."'";	  
	
	  
if (mysql_query($sql,$con)){
	(mysql_query($sql1,$con));
	(mysql_query($sql2,$con));
echo '<script language="javascript">
alert("Realizado el pago de la multa");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
Sexy.alert("Error pagar multa: Contacte al administrador del sistema");
window.location.href="paneln.php";
</script>
'; 
}
mysql_close();

?>

</html>