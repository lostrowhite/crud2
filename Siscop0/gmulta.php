
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "exten"; 

$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die('Error de conexion al Servidor: ' . mysql_error());; 
mysql_select_db($bd_base, $con) or die('Error de conexion con la BD: ' . mysql_error()); 

	

$nrosocio=$_POST['c_nsocio'];
$expediente=$_POST['c_expediente'];
$nombre=$_POST['c_nombresocio'];
$cedula=$_POST['c_cedula'];
$fecha=$_POST['c_fecha'];
$monto=$_POST['c_monto'];
$observacion=$_POST['c_observacion'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="7";
$detalle="Registrado Multa de Socio N: $nrosocio";
$estado="Pendiente";


    $sql="INSERT INTO multas (expediente, nsocio, nombresocio, cedula, fecha, monto, observacion, estado) VALUES ('$expediente','$nrosocio','$nombre','$cedula','$fecha','$monto','$observacion','$estado')";
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";
	  
if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
echo "<script languaje='javascript'>alert('Ingresado la multa correctamente')
document.location=('paneln.php')
</script>";
}
else {
echo "No se pudo ingresar el registro en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
