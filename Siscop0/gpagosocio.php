<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

if (isset($_POST['c_nrodeavance'])){
$nsocio="S".$_POST['c_nsocio']."A".$nsocio=$_POST['c_nrodeavance'];	
	}else{
$nsocio="S".$_POST['c_nsocio'];			
		};
$nombre=$_POST['c_nombres'];
$expediente=$_POST['c_expediente'];
$apellido=$_POST['c_apellidos'];
$cedula=$_POST['c_cedula'];
$deposito=$_POST['c_deposito'];
$fecha=date("Y-m-d",strtotime($_POST['c_fecha']));
$banco=$_POST['c_banco'];
$monto=$_POST['c_monto'];
$concepto=$_POST['c_concepto'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="5";
$detalle="Registrado pago de Socio N: $nsocio";

    $sql="INSERT INTO pagosocios (expediente, nsocio, nombres, apellidos, cedula, deposito, fecha, banco, monto, concepto) VALUES ('$expediente','$nsocio','$nombre','$apellido','$cedula','$deposito','$fecha','$banco','$monto','$concepto')";
	  $sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
	 	  $sql2= "INSERT INTO ingresos (expediente, fecha, monto, referencia, socioavance) VALUES ('$expediente','$fecha', '$monto', '$concepto', 							    '$nsocio')";	  
	  
if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
mysql_query($sql2,$con);
echo "<script languaje='javascript'>alert('Ingresado el pago del socio')
document.location=('paneln.php')
</script>";
}
else {
echo "No pudo ingresar el registro en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
