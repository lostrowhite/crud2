<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

	
$nsocio=$_POST['c_nsocio'];
$nombre=$_POST['c_nombres'];
$apellido=$_POST['c_apellidos'];
$nacionalidad=$_POST['c_nacionalidad'];
$cedula=$_POST['c_cedula'];
$nvcedula=date("Y-m-d",strtotime($_POST['c_vcedula']));
$ingreso=date("Y-m-d",strtotime($_POST['c_ingreso']));
$telefono=$_POST['c_telefono'];
$celular=$_POST['c_celular'];
$nacimiento=date("Y-m-d",strtotime($_POST['c_nacimiento']));
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
$ev="1";
$detalle="Registrado el Socio N: $nsocio";

    $sql="INSERT INTO socios (nsocio, nombre, apellido, cedula, venci, ingreso, tlf, celular, nacimiento, nacionalidad, sexo, edocivil, cargafam, contrato, beneficiario, nlic, grado, vence, cuenta, certmed, certmedven, gruposang, correo, direccion, historia) VALUES ('$nsocio','$nombre','$apellido','$cedula','$nvcedula','$ingreso','$telefono','$celular','$nacimiento','$nacionalidad','$sexo','$estadocivil','$familiar','$contrato','$beneficiario','$licencia','$glicencia','$vlicencia','$cuenta','$certificado','$vcertificado','$grupo','$correo','$direccion','$historia')";

$sql1= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	  
$sql2= "INSERT INTO sactivos (nsocio, nombre) VALUES ('$nsocio', '$nombre')";	
$sql3= "DELETE FROM sinactivos WHERE nsocio='$nsocio'";	 

if (mysql_query($sql,$con)){
mysql_query($sql1,$con);
mysql_query($sql2,$con);
mysql_query($sql3,$con);
echo "<script languaje='javascript'>alert('Registrado el socio correctamente')
document.location=('paneln.php')
</script>";
}else {
echo "Error en el registro del socio en la Base de Datos, Contacte al Administrador "; 
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
