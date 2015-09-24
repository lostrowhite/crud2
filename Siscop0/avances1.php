<?php
if(isset($_GET['nsocio'])AND isset($_GET['navance'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->muestraavance1($_GET['nsocio'],$_GET['navance']);

while ($fila = mysql_fetch_array($consulta)) {
        $array = $fila;
}
}
echo json_encode($array)
    ?>
