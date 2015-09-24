<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

	
$nsocio=$_POST['c_nsocio'];
$navance=$_POST['c_nrodeavance'];
$nombre=$_POST['c_nombres'];
$apellido=$_POST['c_apellidos'];
$cedula=$_POST['c_cedula'];
$deposito=$_POST['c_deposito'];
$fecha= date("Y-m-d",strtotime($_POST['c_fecha']));
$banco=$_POST['c_banco'];
$monto=$_POST['c_monto'];
$concepto=$_POST['c_concepto'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="5";
$detalle="Registrado pago de Socio N: $nsocio";
$socioavance="S".$nsocio."A".$navance;

    $sql="INSERT INTO pagoavances (navance, nombres, apellido, cedula, deposito, fecha, banco, monto, concepto) VALUES ('$socioavance','$nombre','$apellido','$cedula','$deposito','$fecha','$banco','$monto','$concepto')";
	  $sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
	 	  $sql2= "INSERT INTO ingresos (fecha, monto, referencia, socioavance) VALUES ('$fecha', '$monto', '$concepto', 							    '$socioavance')";	  
	  
if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
mysql_query($sql2,$con);
echo "<script languaje='javascript'>alert('Registrado el pago del avance')
document.location=('paneln.php')
</script>";
}
else {
echo "Error en el registro del pago del avance en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
