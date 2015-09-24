<html>
<head>
</head>
<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();


$id=$_POST['usuarios_id'];
$nombre=$_POST['c_nombre'];
$apellido=$_POST['c_apellido'];
$user=$_POST['c_login'];
$cedula= $_POST['c_cedula'];
$password=md5($_POST['c_password']);
$email=$_POST['c_email'];
$privilegio=$_POST['c_privilegio'];
$nacionalidad=$_POST['c_nacionalidad'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="0.1";
$detalle="Actualizado el usuario: $user";

    $sql=("UPDATE usuarios set nombre ='".$nombre."', apellido='".$apellido."', cedula='".$cedula."', password='".$password."', email='".$email."', privilegio='".$privilegio."', nacionalidad='".$nacionalidad."' WHERE id = '".$id."'");
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
	  
if (mysql_query($sql,$con)){
	(mysql_query($sql1,$con));
echo '<script language="javascript">
alert("Actualizado el usuario correctamente");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
Sexy.alert("Error al actualizar socio: Contacte al administrador del sistema");
window.location.href="paneln.php";
</script>
'; 
}
mysql_close();

?>

</html>