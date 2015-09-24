<?php
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$objCliente=new Cliente;
if( $objCliente->eliminarcombustible($usuario_id) == true){
	echo "Tipo de Combustible eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>