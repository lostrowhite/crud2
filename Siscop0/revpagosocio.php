<?php
if(isset($_GET['nsocio'])){
require('clases/cliente.class.php');
     
    $objCliente = new Cliente;
    $consulta = $objCliente->mostrar_fpagosocios($_GET['nsocio']);
while ($fila = mysql_fetch_array($consulta)) {
        echo $fila['month(mes)'];
}
}

    ?>
