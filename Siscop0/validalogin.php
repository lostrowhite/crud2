<?php
if(isset($_GET['login'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->consultalogin($_GET['login']);
while ($fila = mysql_fetch_array($consulta)) {
        $array = $fila;
		echo json_encode($array);
}
}
    ?>