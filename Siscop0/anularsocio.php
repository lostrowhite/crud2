<?php
session_start();
require('clases/cliente.class.php');
$objCliente=new Cliente;
$id_s=$_GET['id_s'];
$nsocio=$_GET['nsocio'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="1.2";
$detalle="Eliminado socio N:$nsocio";

if($objCliente->anularsocio($id_s) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
		echo "Socio eliminado correctamente";
}else{
	echo "Ocurrio un error al eliminar el socio";
}
?>
