<?php
session_start();
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$nsocio =$_GET['nsocio'];
$placa =$_GET['placa'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="3.2";
$detalle="Eliminado Vehículo del Socio N: $nsocio Placa N:$placa";
$objCliente=new Cliente;
if( $objCliente->eliminarvehiculo($usuario_id) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
echo "Vehículo eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>