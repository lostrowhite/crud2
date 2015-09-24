<?php
session_start();
require('clases/cliente.class.php');
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "exten"; 
$mes=$_GET['mes'];
$ano=$_GET['ano'];
$dia=date('d');
$fecha1=$ano."-".$mes."-".$dia;
date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="12";
$detalle="Cierre de mes:$mes año:$ano por Usuario: $login";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die('Error de conexion al Servidor: ' . mysql_error());; 
mysql_select_db($bd_base, $con) or die('Error de conexión con la BD: ' . mysql_error()); 

$sql4= "SELECT fecha from mpagos WHERE year(fecha) ='$ano' AND month(fecha)='$mes' ";
$res = mysql_query($sql4);
 if (mysql_num_rows($res)!=0){
echo "Realizado el cierre del mes seleccionado";
	 }
	 else{
//Querys
$sql="SELECT * FROM socios";  
$sql1="SELECT SUM(monto) as suma from gastos WHERE year(fecha) ='$ano' AND month(fecha)='$mes' ";
$sql2="INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 						    '$ev','$detalle')";	
$result = mysql_query($sql);
$numero = mysql_num_rows($result); 
$resulta=mysql_query($sql1);
$row=mysql_fetch_array($resulta);
$pago= $row['suma'] / $numero;
$cuota=round($pago,2);
$gastomes=round($row['suma'],2);
$sql3="INSERT INTO mpagos (montoc,fecha) VALUES ('$cuota','$fecha1')";	
		 mysql_query($sql2,$con);
	     mysql_query($sql3,$con);
echo "Realizado el cierre de mes correctamente!!!";
}
mysql_close();	
    ?>
