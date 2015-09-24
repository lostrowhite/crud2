<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$nsocio=$_POST['c_nsocio'];
$nrodeavance=$_POST['c_nrodeavance'];
$nombre=$_POST['c_nombres'];
$apellido=$_POST['c_apellidos'];
$cedula=$_POST['c_cedula'];
$vcedula=date("Y-m-d",strtotime($_POST['c_vcedula']));
$ingreso=date("Y-m-d",strtotime($_POST['c_ingreso']));
$telefono=$_POST['c_telefono'];
$celular=$_POST['c_celular'];
$nacimiento=date("Y-m-d",strtotime($_POST['c_nacimiento']));
$nacionalidad=$_POST['c_nacionalidad'];
$sexo=$_POST['c_sexo'];
$estadocivil=$_POST['c_estadocivil'];
$familiar=$_POST['c_cfamiliar'];
$contrato=$_POST['c_contrato'];
$beneficiario=$_POST['c_beneficiario'];
$licencia=$_POST['c_nlicencia'];
$glicencia=$_POST['c_glicencia'];
$vlicencia=date("Y-m-d",strtotime($_POST['c_vlicencia']));
$cuenta=$_POST['c_cuenta'];
$certificado=$_POST['c_certificadomedico'];
$vcertificado=date("Y-m-d",strtotime($_POST['c_vcertificadomedico']));
$grupo=$_POST['c_gruposanguinieo'];
$correo=$_POST['c_correo'];
$direccion=$_POST['c_direccion'];
$historia=$_POST['c_historia'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="2";
$detalle="Registrado el Avance N: $nrodeavance de Socio N: $nsocio";

    $sql="INSERT INTO avances (id_s, navance, nombre, apellido, cedula, venci, ingreso, tlf, celular, nacimiento, nacionalidad, sexo, edocivil, cargafam, contrato, beneficiario, nlic, grado, vence, cuenta, certmed, certmedven, gruposang, correo, direccion, historia) VALUES ('$nsocio','$nrodeavance','$nombre','$apellido','$cedula','$vcedula','$ingreso','$telefono','$celular','$nacimiento','$nacionalidad','$sexo','$estadocivil','$familiar','$contrato','$beneficiario','$licencia','$glicencia','$vlicencia','$cuenta','$certificado','$vcertificado','$grupo','$correo','$direccion','$historia')";
	  $sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	   
if (mysql_query($sql,$con)){
mysql_query($sql1,$con) or die (mysql_error());;
echo "<script languaje='javascript'>alert('Registrado el Avance correctamente')
document.location=('paneln.php')
</script>";
}
else {
	die (mysql_error());
echo "Error en el registro del avance en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>