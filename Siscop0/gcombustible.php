<?php
header("Content-Type: text/html;charset=iso-8859-1");
	
	require('clases/cliente.class.php');

	$com = htmlspecialchars(trim($_POST['com']));
	$objCliente=new Cliente;
	if ( $objCliente->insertarcombustible($com)== true){
		echo "<script languaje='javascript'>alert('Ingresado el tipo de combustible correctamente')
document.location=('bcombustible.php')
</script>";
	}else{
		"<script languaje='javascript'>alert('Error al ingresar el tipo de combustible en la Base de Datos, Contacte al Administrador')
document.location=('bcombustible.php')
</script>";
	} 
mysql_close();

?>
