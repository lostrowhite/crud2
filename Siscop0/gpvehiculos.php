<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$nsocio=$_POST['c_nsocio'];	
$nombre=$_POST['c_nombre'];
$exp=$_POST['c_expediente'];
$apellido=$_POST['c_apellido'];
$cedula=$_POST['c_cedula'];
$fechap=date("Y-m-d",strtotime($_POST['c_fecha']));
$monto=$_POST['c_monto'];
$concepto=$_POST['c_concepto'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="8";
$detalle="Registrado Préstamo Socio N: $nsocio, exp N=$exp";

    $sql="INSERT INTO prestamos (nsocio, expediente, nombre, apellido, cedula, fecha, monto, concepto, estado) VALUES ('$nsocio','$exp','$nombre','$apellido','$cedula','$fechap','$monto','$concepto','Pendiente')";
	 $sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	
	 $sql2= "INSERT INTO gastos (expediente, fecha, monto, referencia, socioavance) VALUES ('$exp','$fecha', '$monto', '$concepto', 							    '$nsocio')";	
if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
	mysql_query($sql2,$con);
echo "<script languaje='javascript'>alert('Agregado el pr\u00e9stamo correctamente')
document.location=('paneln.php')
</script>";
}
else {
echo "<script languaje='javascript'>alert('No se pudo ingresar el registro en la Base de Datos, Contacte al Administrador'); 
document.location=('bprestamos.php')
</script>";
}
mysql_close();

?>
