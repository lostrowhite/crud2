<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
$privilegio=$_POST['c_privilegio'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="0";


$nombre=$_POST['c_nombre'];
$apellido=$_POST['c_apellido'];
$cedula=$_POST['c_cedula'];
$pregunta=$_POST['c_pregunta'];
$respuesta=$_POST['c_respuesta'];
$user=$_POST['c_login'];
$password=md5($_POST['c_password']);
$email=$_POST['c_email'];
$nacionalidad=$_POST['c_nacionalidad'];
$detalle="Registrado el usuario: $user";


    $sql="INSERT INTO usuarios (nombre, apellido, cedula, pregunta, respuesta, login, password, email, privilegio, nacionalidad) VALUES ('$nombre','$apellido','$cedula','$pregunta','$respuesta','$user','$password','$email','$privilegio','$nacionalidad')";
	
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	
	  
if (mysql_query($sql,$con)){
	(mysql_query($sql1,$con));
echo "<script languaje='javascript'>alert('Registrado el Usuario correctamente')
document.location=('paneln.php')
</script>";

}
else {
echo "Error en el registro del usuario en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
