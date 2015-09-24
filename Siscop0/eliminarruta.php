<?php
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$objCliente=new Cliente;
if( $objCliente->eliminarruta($usuario_id) == true){
	echo "Ruta eliminada correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>