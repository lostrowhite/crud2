<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();	
$usuario_id=$_GET['id'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="11.3";
$detalle="Anulada factura de compra idfactura N: $usuario_id";

//Anula Factura
$sql = ("UPDATE factura set estado='1' WHERE id_f='".$usuario_id."'") or die ("Problemas en anular la factura:".mysql_error()) ; 

//Buscar detalles de factura a revertir 
$sql2 =("SELECT * FROM afactura WHERE id_f='".$usuario_id."'") or die ("Problemas en buscar detalles de factura:".mysql_error());


//Crea Auditoria 
$sql4 = "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";

if (mysql_query($sql,$con)){
	$consulta=mysql_query($sql2,$con);
	while ($cliente = mysql_fetch_array($consulta)){
		//Revertir cambio en repuestos
$sql3= ("UPDATE repuestos SET cantidad=cantidad- '".$cliente['cantidad']."' WHERE id_r= '".$cliente['id_r']."'")or die("Problemas en revertir cambios".mysql_error);
		(mysql_query($sql3,$con));
	}
	(mysql_query($sql4,$con));
	echo "Anulada la factura de compra correctamente";
	';
	}
else {
echo "Error al anular la factura de compra: Contacte al administrador del sistema";

'; 
}
mysql_close();
	
	/*if( $objCliente->eliminarfactura($usuario_id) AND $objCliente->creaauditoria($fecha,$ip,$login,$ev,$detalle) == true){
		echo "Factura de Venta Eliminada Correctamente";
}else{
	echo "Ocurrio un error al eliminar la factura de venta";
}*/
?>