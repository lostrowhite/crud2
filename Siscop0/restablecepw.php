<?php
header("Content-Type: text/html;charset=utf-8");
require('clases/cliente.class.php');
	$cedula=$_GET['cedula'];
	$pass1=$_GET['pass'];   
    $objCliente = new Cliente;
    $consulta = $objCliente->recuperapw($pass1,$cedula);
	if ($consulta){
		echo "$pass1";
		}else{
		echo "Error. Contacte al administrador del sistema";	
		}
	
?>