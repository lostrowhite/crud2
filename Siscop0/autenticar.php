<?php 
header("Content-Type: text/html;charset=utf-8");
//1.- Capturar los datos del formulario
date_default_timezone_set('America/Caracas');
$login=$_POST['login'];
$pass=$_POST['password'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="0.4";
$detalle="Autenticación Fallida";
$ev2="0.3";
$detalle2="Autenticación Correcta";
//2.-Crear de DAO
require ("clases/class_DAO_usuario.php");
try {
	$dao=new DAO_usuario();
	// devuelve el registro de usuario o false
	$usuario=$dao->validar($login, $pass);
	if (!$usuario){ //el usuario es valido
	$dao->auditoria($fecha,$ip,$login,$ev,$detalle);
		echo "<script languaje='javascript'>alert('Usuario o contraseña invalida')
document.location=('index.php')
</script>";
}else { //si es valido
	$dao->auditoria($fecha,$ip,$login,$ev2,$detalle2);
		session_start(); //crea la sesion
		$_SESSION['usuario']=$usuario['nombre'];
		$_SESSION['apellido']=$usuario['apellido'];
		$_SESSION['login']=$usuario['login'];
		$_SESSION['privilegio']=$usuario['privilegio'];
			header ("Location: paneln.php");
	}
} catch (Exception $e){
	//redireccionar a una pagina que muestre mensaje error
	//echo $e->getMessage();
	header ("Location: errorConexion.php");
	
}
?>