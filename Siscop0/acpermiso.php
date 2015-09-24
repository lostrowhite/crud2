<html>
<head>
</head>
<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();


$id=$_POST['permisos_id'];
$nsocio=$_POST['c_nsocio'];
$fecha= date ("Y-m-d", strtotime($_POST['c_fecha']));
$fechaini=date ("Y-m-d", strtotime($_POST['c_fechaini']));
$fechafin=date ("Y-m-d", strtotime($_POST['c_fechafin']));
$dirige=$_POST['c_dirige'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="4.1";
$detalle="Actualizado permiso del Socio N: $nsocio";

$sql=("UPDATE permisos set fecha='".$fecha."', fechaini='".$fechaini."', fechafin='".$fechafin."', dirige='".$dirige."' WHERE id = '".$id."'");

$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  	  
if (mysql_query($sql,$con)){
   (mysql_query($sql1,$con));
echo '<script language="javascript">
alert("Actualizado el permiso para el socio");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
Sexy.alert("Error al actualizar permiso para el socio: Contacte al administrador del sistema");
window.location.href="paneln.php";
</script>
'; 
}
mysql_close();

?>

</html>