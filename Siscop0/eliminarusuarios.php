<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$user=$_GET['user'];

date_default_timezone_set('America/Caracas');
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="0.5";
$detalle="Eliminado usuario: $user";

$objCliente=new Cliente;
if( $objCliente->eliminarusuario($usuario_id) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
	echo "Usuario eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>