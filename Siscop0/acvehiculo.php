<html>
<head>
</head>
<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();


$id=$_POST['vehiculo_id'];
$nsocio=$_POST['c_nsocio'];
$placa=$_POST['c_placa'];
$marca=$_POST['c_marca'];
$modelo=$_POST['c_modelo'];
$color=$_POST['c_color'];
$ano=$_POST['c_ano'];
$cantptos=$_POST['c_cpuestos'];
$nmotor=$_POST['c_motor'];
$chasis=$_POST['c_chasis'];
$combustible=$_POST['c_combustible'];
$cobdesde=date("Y-m-d",strtotime($_POST['c_iniciocobertura']));
$cobhasta=date("Y-m-d",strtotime($_POST['c_finalcobertura']));
$compaseg=$_POST['c_ciaseguradora'];
$tseguro=$_POST['c_tseguro'];
$obs=$_POST['c_obs'];
$estado=$_POST['estado'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="3.1";
$detalle="Actualizado Vehículo de socio N: $nsocio Placa: $placa";

    $sql=("UPDATE vehiculos set placa='".$placa."', marca='".$marca."', modelo='".$modelo."', color='".$color."', ano='".$ano."', cantptos='".$cantptos."', nmotor='".$nmotor."', chasis='".$chasis."', combustible='".$combustible."', cobdesde='".$cobdesde."', cobhasta='".$cobhasta."', compaseg='".$compaseg."', tseguro='".$tseguro."', obs='".$obs."', estado='".$estado."' WHERE id = '".$id."'");
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";  
if (mysql_query($sql,$con)){
	(mysql_query($sql1,$con));
echo '<script language="javascript">
alert("Actualizado veh\u00edculo correctamente");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
alert("Error al actualizar Veh\u00eculo: Contacte al administrador del sistema");
window.location.href="paneln.php";
</script>
'; 
}
mysql_close();

?>

</html>