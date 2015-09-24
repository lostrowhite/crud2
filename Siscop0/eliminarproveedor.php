<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$id_proveedor=$_GET['id_proveedor'];
$proveedor=$_GET['proveedor'];

date_default_timezone_set('America/Caracas');
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="14.2";
$detalle="Eliminado proveedor: $proveedor";

$objCliente=new Cliente;
if( $objCliente->eliminarproveedor($id_proveedor) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
	echo "Proveedor eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>