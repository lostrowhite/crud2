<html>
<head>
</head>
<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$id=$_POST['usuarios_id'];
$nombrep=$_POST['c_nombrep'];
$rif=$_POST['c_rifp'];
$direccionp=$_POST['c_direccionp'];
$telefonop=$_POST['c_telefonop'];
$nombrec= $_POST['c_nombrec'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="14.1";
$detalle="Actualizado el proveedor: $nombrep";

    $sql=("UPDATE proveedores set proveedor ='".$nombrep."', rproveedor='".$rif."', nombrecontacto='".$nombrec."', dproveedor='".$direccionp."', tproveedor='".$telefonop."' WHERE id_proveedor = '".$id."'");
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
	  
if (mysql_query($sql,$con)){
	(mysql_query($sql1,$con));
echo '<script language="javascript">
alert("Actualizado el proveedor correctamente");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
Sexy.alert("Error al actualizar proveedor: Contacte al administrador del sistema");
window.location.href="paneln.php";
</script>
'; 
}
mysql_close();

?>

</html>