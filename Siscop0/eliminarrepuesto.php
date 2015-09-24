<?php
require('clases/cliente.class.php');
$usuario_id=$_GET['id'];
$objCliente=new Cliente;
if( $objCliente->eliminarrepuesto($usuario_id) == true){
	echo "Repuesto Eliminado de Inventario Satisfactoriamente";
}else{
	echo "Ocurrio un error, contacte al administrador del sistema";
}
?>