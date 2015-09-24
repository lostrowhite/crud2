<?php
if(isset($_GET['cedula'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->consultacorreo($_GET['cedula']);
while ($fila = mysql_fetch_array($consulta)) {
        $array = $fila;
		echo json_encode($array);
}
}
    ?>