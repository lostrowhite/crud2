<?php
session_start();
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$nsocio =$_GET['nsocio'];
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="1.2";
$detalle="Eliminado el Socio N: $nsocio";
$objCliente=new Cliente;
if( $objCliente->eliminarsocio($usuario_id) AND $objCliente->insertarsinactivo($nsocio) AND $objCliente->eliminarsactivo($nsocio) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle,$nsocio) == true){
echo "Socio eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>