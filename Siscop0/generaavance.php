<?php
header("Content-Type: text/html;charset=utf-8");
require('clases/cliente.class.php');
			$objCliente=new Cliente;
	$consulta=$objCliente->generaavance();
	$numero = mysql_num_rows($consulta); 
    while ($fila = mysql_fetch_array($consulta)) {
			if ($numero == 1 and $fila['navance']== 1){
		echo "<option value=''>Seleccione...</option>";			
		echo '<option value="2">A°2</option>';
			}elseif ($numero == 1 and $fila['navance']== 2){
		echo "<option value=''>Seleccione...</option>";
		echo '<option value="1">A°1</option>';
			}
    };
 	if ($numero == 0){
		echo "<option value=''>Seleccione...</option>";
		echo '<option value="1">A°1</option>';
		echo '<option value="2">A°2</option>';
			}
	elseif ($numero == 2){
		echo "<option value=''>Máximo de Avances Alcanzado</option>";
	}
?>
