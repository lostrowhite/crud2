<?php
header("Content-Type: text/html;charset=iso-8859-1");
	
	require('clases/cliente.class.php');

	$ruta = htmlspecialchars(trim($_POST['ruta']));
	$objCliente=new Cliente;
	if ( $objCliente->insertarruta($ruta)== true){
		echo "<script languaje='javascript'>alert('Registrado la ruta correctamente')
document.location=('brutas.php')
</script>";
	}else{
		"<script languaje='javascript'>alert('No se pudo ingresar la ruta en la Base de Datos, Contacte al Administrador')
document.location=('brutas.php')
</script>";
	} 
mysql_close();
?>