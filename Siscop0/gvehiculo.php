<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();




$id_s=$_POST['c_nsocio'];
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
$poliza=$_POST['c_poliza'];

$sql2= "SELECT nsocio FROM socios WHERE id_s='$id_s'";
if ($consulta3= mysql_query($sql2,$con)){
	$cliente3= mysql_fetch_array($consulta3);
	$nsocio = $cliente3['nsocio'];
}

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="3";
$detalle="Ingresado el Vehículo de Socio N: $nsocio Placa: $placa";


    $sql="INSERT INTO vehiculos (id_s, placa, marca, modelo, color, ano, cantptos, nmotor, chasis, combustible, cobdesde, cobhasta, compaseg, tseguro, obs, estado, poliza) VALUES ('$id_s','$placa','$marca','$modelo','$color','$ano','$cantptos','$nmotor','$chasis','$combustible','$cobdesde','$cobhasta','$compaseg','$tseguro','$obs','$estado','$poliza')";
	$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	 
	  
if (mysql_query($sql,$con)){
	mysql_query($sql1,$con);
echo "<script languaje='javascript'>alert('Registrado el veh\u00edculo correctamente')
document.location=('paneln.php')
</script>";

}
else {
echo "Error en el registro del veh\u00eculo en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
