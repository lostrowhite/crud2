<?php
session_start();
require('clases/cliente.class.php');
$objCliente=new Cliente;
$id_a=$_GET['id_a'];
$nsocio=$_GET['nsocio'];
$navance=$_GET['navance'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="2.2";
$detalle="Eliminado avance N:$navance de socio N:$nsocio";

if($objCliente->anularavance($id_a) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
		echo "Avance eliminado correctamente";
}else{
	echo "Ocurrio un error al eliminar el avance";
}
?>
