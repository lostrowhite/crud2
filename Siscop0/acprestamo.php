<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$id=$_POST['id_prestamo'];
$nsocio=$_POST['c_nsocio'];	
$nombre=$_POST['c_nombre'];
$cedula=$_POST['c_cedula'];
$fechap=$_POST['c_fecha'];
$monto=$_POST['c_monto'];
$concepto=$_POST['c_concepto'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="8.1";
$detalle="Registrado pago prestamo Socio N: $nsocio";

    $sql="INSERT INTO ingresos (fecha, monto, referencia,socioavance) VALUES ('$fechap','$monto','$concepto','$nsocio')";
	 $sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	
	 $sql2= "UPDATE prestamos set estado ='Pagado', fechap ='".$fecha."' WHERE id = '".$id."'";	
if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
	mysql_query($sql2,$con);
echo "<script languaje='javascript'>alert('Se pago el prestamo correctamente')
document.location=('paneln.php')
</script>";
}
else {
echo "No se ingreso el registro en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
