<?php
session_start();
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$nsocio =$_GET['nsocio'];
$exp =$_GET['expediente'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="5.2";
$detalle="Eliminado el pago del Socio N: $nsocio";
$objCliente=new Cliente;
if( $objCliente->eliminarpago($usuario_id) AND $objCliente->eliminaripago($exp) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
echo "Eliminado el pago de socio correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>