<?php
if(isset($_GET['nsocio'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->muestraavance($_GET['nsocio']);

while ($fila = mysql_fetch_array($consulta)) {
	
        $array[] = $fila;
}
}
echo json_encode($array);

    ?>
