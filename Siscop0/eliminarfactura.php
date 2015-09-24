<?php
session_start();
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$objCliente=new Cliente;
$con=$objCliente->con->conectar();
	
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="12.3";
$detalle="Eliminada factura de venta por el usuario $login 			idfactura N: $usuario_id";
	
	if( $objCliente->eliminarfactura($usuario_id) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
		echo "Factura de Venta Eliminada Correctamente";
}else{
	echo "Ocurrio un error al eliminar la factura de venta, contacte al administrador del sistema";
}
?>