<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$data  = explode("-",$_POST['id']);

$campo = $data[0]; // nombre del campo
$id    = $data[1]; // id del registro
$value = $_POST['value']; // valor por el cual reemplazar


		 
// sql para actualizar el registro

$query = mysql_query("UPDATE mprestamos SET ".$campo." = '".$value."' 
							WHERE id = '".$id."'");

echo ($campo == 'meses') ? $meses[$value] : $value;
?>