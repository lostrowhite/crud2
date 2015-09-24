<?php
if(isset($_GET['id_tp'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->muestracprestamo($_GET['id_tp']);
while ($fila = mysql_fetch_array($consulta)) {
        $array = $fila;
}
}
echo json_encode($array)

    ?>
