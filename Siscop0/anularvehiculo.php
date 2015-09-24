<?php
session_start();
require('clases/cliente.class.php');
$objCliente=new Cliente;
$id=$_GET['id'];
$nsocio=$_GET['nsocio'];
$placa=$_GET['placa'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="3.2";
$detalle="Eliminado vehículo de Socio N:$nsocio placa: $placa";

if($objCliente->anularvehiculo($id) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
		echo "Vehículo eliminado correctamente";
}else{
	echo "Ocurrio un error al eliminar el vehículo";
}
?>
