<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<script type="text/javascript" src="js/func.js"></script>
</head>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
	


$nfactura=$_POST['nfactura'];
$c_socio=$_POST['c_socio'];
$tfactura=$_POST['tfactura'];
$id_facv=$_POST['id_facv'];
$c_fechaf=date("Y-m-d",strtotime($_POST['c_fechaf']));
$iva=$_POST['iva'];


date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="12.1";
$detalle="Registrada factura de venta por el usuario $login idfactura N: $id_facv";

/* CONEXION PARA GUARDAR FACTURA Y SUS DETALLES */

//Insertar Nº de Factura
	$sql1= "INSERT INTO facturav (id_fv, id_s, fvmonto, fechaf, iva) VALUES ('$nfactura', '$c_socio', '$tfactura', '$c_fechaf' , '$iva')";
//En caso de error borrar ingreso de factura
	$sql3= "DELETE FROM facturav WHERE id_fv=".$id_facv ;


mysql_query($sql1,$con) or die (mysql_error());
	$cadena = $_POST['OcultoDatoTabla'];
	$partes = explode(";",$cadena); // divide una cadena segun separador
	array_pop($partes); // elimina el ultimo elemento del array
	for($i=0;$i<=(count($partes)-1);$i++){
	$subpartes = explode("|",($partes[$i]));
	//Insertar detalle de Factura
	$sql2= "INSERT INTO dfacturav (id_fv, cantidad, id_r, preciou) VALUES ('$id_facv', '$subpartes[1]','$subpartes[5]' ,'$subpartes[3]')";
	//Actualizar cantidad en inventario
$sql4= "UPDATE repuestos SET cantidad=cantidad- $subpartes[1] WHERE id_r= '$subpartes[5]'";

$sql5= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	
	//imprimir_factura(".$id_facv.",".$c_socio.",".$nfactura.",'".$c_fechaf."');
	if	(mysql_query($sql2,$con)){
		 mysql_query($sql4,$con);
		 	if ($i == count($partes)-1){
			mysql_query($sql5,$con);
		echo "<script languaje='javascript'>
		imprimir_fiscal('".$id_facv."','".$c_socio."','".$nfactura."','".$c_fechaf."');
		alert('Cargada la factura correctamente');
		document.location=('paneln.php');
		</script>";

			}
			}else {
			die (mysql_error());
			mysql_query($sql3,$con);
				
echo "<script languaje='javascript'>alert('ERROR!. No se pudo cargar el detalle de factura, Contacte al administrador del Sistema')
document.location=('paneln.php')</script>";
$ev="12.2";
$detalle="Intento fallido de registro de factura de vente por el usuario $login";
mysql_query($sql5,$con);
}
	}
mysql_close();
?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
</HTML>   