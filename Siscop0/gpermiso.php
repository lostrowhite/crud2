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
$nombre=$_POST['c_nombresoc'];
$cedula=$_POST['c_cedulasoc'];
$fecha=$_POST['c_fecha'];
$fechaini=$_POST['c_fechaini'];
$fechafin=$_POST['c_fechafin'];
$avancep=$_POST['c_avancep'];
$nomavanp=$_POST['c_nomavanp'];
$cedulaavanp=$_POST['c_cedulaavanp'];
$avances=$_POST['c_avances'];
$nomavans=$_POST['c_nomavans'];
$cedulaavans=$_POST['c_cedulaavans'];
$dirige=$_POST['c_dirige'];
$placa=$_POST['c_placa'];
$marca=$_POST['c_marca'];
$modelo=$_POST['c_modelo'];
$color=$_POST['c_color'];
$ano=$_POST['c_ano'];
$cantidad=$_POST['c_cantidad'];
$motor=$_POST['c_motor'];
$chasis=$_POST['c_chasis'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="4";
$detalle="Registrado PFR Socio N: $nsocio, Placa Carro: $placa";



    $sql="INSERT INTO permisos (nsocio, nombresocio, cedulasocio, fecha, fechaini, fechafin, avance1, nombreavanp, cedulaavanp, avance2, nombreavans, cedulaavans, dirige, placa, marca, modelo, color, ano, cantidadptos,motor, chasis) VALUES ('$nsocio','$nombre','$cedula','$fecha','$fechaini','$fechafin','$avancep','$nomavanp','$cedulaavanp','$avances','$nomavans','$cedulaavans','$dirige','$placa','$marca','$modelo','$color','$ano','$cantidad','$motor','$chasis')";
		  $sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
if (mysql_query($sql,$con)){
mysql_query($sql1,$con);
echo "<script languaje='javascript'>alert('Registrado el permiso correctamente')
document.location=('paneln
.php')
</script>";
}
else {
echo "<script languaje='javascript'>alert('Error en el registro del permiso en la Base de Datos, Contacte al Administrador ')
document.location=('bpermiso.php')
</script>";
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
