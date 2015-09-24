<?php
session_start();
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$nsocio =$_GET['nsocio'];
$navance =$_GET['navance'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="2.2";
$detalle="Eliminado el Avance N: $navance de socio N: $nsocio";
$objCliente=new Cliente;
if( $objCliente->eliminaravance($usuario_id) AND $objCliente->insertarainactivo($nsocio,$navance) AND $objCliente->eliminaraactivo($nsocio,$navance) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
echo "Avance eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>