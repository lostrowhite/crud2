<?php
header("Content-Type: text/html;charset=utf-8");
require('clases/cliente.class.php');
			$objCliente=new Cliente;
	$consulta=$objCliente->generaavance1();
	echo "<option value=''>Seleccione</option>";
    while ($fila = mysql_fetch_array($consulta)) {
        echo '<option value="'.$fila['navance'].'">A°'.$fila['navance'].'</option>';
    };
 
?>
