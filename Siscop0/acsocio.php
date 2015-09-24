<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();


$id=$_POST['socio_id'];
$nsocio=$_POST['c_nsocio'];
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
$ev="1.1";
$detalle="Actualizado Socio N: $nsocio";

    $sql=("UPDATE socios set nsocio ='".$nsocio."', nombre='".$nombre."', apellido='".$apellido."', cedula='".$cedula."', venci='".$vcedula."', ingreso='".$ingreso."', tlf='".$telefono."', celular='".$celular."', nacimiento='".$nacimiento."', nacionalidad='".$nacionalidad."', sexo='".$sexo."', edocivil='".$estadocivil."', cargafam='".$familiar."', contrato='".$contrato."',beneficiario='".$beneficiario."', nlic='".$licencia."', grado='".$glicencia."', vence='".$vlicencia."', cuenta='".$cuenta."', certmed='".$certificado."', certmedven='".$vcertificado."', gruposang='".$grupo."', correo='".$correo."', direccion='".$direccion."', historia='".$historia."' WHERE id_s = '".$id."'");

$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  	  
if (mysql_query($sql,$con)){
	(mysql_query($sql1,$con));
echo '<script language="javascript">
alert("Actualizado socio correctamente");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
alert("Error al actualizar socio: Contacte al administrador del sistema");
window.location.href="bsocio.php";
</script>
'; 
}
mysql_close();

?>
