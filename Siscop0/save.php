<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$data  = explode("-",$_POST['id']);

$campo = $data[0]; // nombre del campo
$id    = $data[1]; // id del registro
$value = $_POST['value']; // valor por el cual reemplazar

$anos = array(
			"2012"=>"2012",
			"2013"=>"2013",
			"2014"=>"2014",
			"2015"=>"2015",
			"2016"=>"2016",
			"2017"=>"2017",
			"2018"=>"2018",
			"2019"=>"2019"
		 );
$meses = array(
			"1"=>"Enero",
			"2"=>"Febrero",
			"3"=>"Marzo",
			"4"=>"Abril",
			"5"=>"Mayo",
			"6"=>"Junio",
			"7"=>"Julio",
			"8"=>"Agosto",
			"9"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre"
		 );

		 
// sql para actualizar el registro

$query = mysql_query("UPDATE mpagosa SET ".$campo." = '".$value."' 
							WHERE id = '".$id."'");

echo ($campo == 'meses') ? $meses[$value] : $value;
?>