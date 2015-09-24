<?php
if(isset($_GET['id_r'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->mostrar_piezas1($_GET['id_r']);
while ($fila = mysql_fetch_array($consulta)) {
        $array = $fila;
}
}
echo json_encode($array)

    ?>
