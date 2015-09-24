<?php
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$objCliente=new Cliente;
if( $objCliente->eliminar($usuario_id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>