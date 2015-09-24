<?php
session_start();
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$objCliente=new Cliente;
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="11.3";
$detalle="Eliminada factura de compra por el usuario $login 			idN: $usuario_id";

if( $objCliente->eliminarfacturain($usuario_id) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
	
echo "Factura de Compra Eliminada Correctamente";
}else{
	echo "Ocurrio un error al eliminar la factura de compra, contacte al administrador del sistema";
}
?>