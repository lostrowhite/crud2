<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
	


$pfactura=$_POST['pfactura'];
$cproveedor=$_POST['c_proveedor'];
$tfactura=$_POST['tfactura'];
$id_fac=$_POST['id_fac'];
$iva=$_POST['iva'];
$fechain =date("Y-m-d",strtotime($_POST['c_fechainv']));
$fechafac =date("Y-m-d",strtotime($_POST['c_fechafac']));

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="11.1";
$detalle="Registrada factura de compra el usuario $login idfactura N: $id_fac";


//Auditoria
$sql5= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";	

//Insertar Nº de Factura
$sql1= "INSERT INTO factura (nfactura, id_proveedor, fmonto, fechainv, fechafac, iva) VALUES ('$pfactura', '$cproveedor', '$tfactura', '$fechain', '$fechafac', '$iva')";

//En caso de error borrar ingreso de factura
$sql3= "DELETE FROM factura WHERE id_f=".$id_fac ;

mysql_query($sql1,$con) or die (mysql_error());
	$cadena = $_POST['OcultoDatoTabla'];
	$partes = explode(";",$cadena); // divide una cadena segun separador
	array_pop($partes); // elimina el ultimo elemento del array
	for($i=0;$i<=(count($partes)-1);$i++){
	$subpartes = explode("|",($partes[$i]));
	
	//Insertando detalle de factura de compra
	$sql2= "INSERT INTO afactura (id_f, cantidad, id_r, preciou) VALUES ('$id_fac', '$subpartes[1]','$subpartes[5]','$subpartes[3]')";
	
	//Actualizar cantidad de repuestos
	$sql4= "UPDATE repuestos SET cantidad=cantidad+ $subpartes[1] WHERE id_r= '$subpartes[5]'";
	
	//Buscar el respuesto específico
	$sql6= "SELECT * FROM respuestos WHERE id_r= '$subpartes[5]'";
		
		$consulta= mysql_query($sql6,$con);
		if ($resultado= mysql_fetch_array($consulta)){
			if ($resultado['costo']=='$subpartes[3]'){
				mysql_query($sql2,$con);
				mysql_query($sql4,$con);
				}else {
		//Si es un producto con otro precio			
		
		$codigop= $resultado['codigo_r'];
		$pieza= $resultado['pieza'];
		$descripcion = $resultado['descripcion'];
		
		$sql9="SELECT MAX(id_r) as maximo FROM repuestos";
		$resMaximo=mysql_query($sql9,$con);
		if(mysql_num_rows($resMaximo)>0){
			$codigor=mysql_result($resMaximo,0,"maximo");
		
		$sql10 = "SELECT * FROM repuestos WHERE id_r=".$codigor;
		$codigorr=mysql_query($sql10,$con);
		$codigor2=mysql_fetch_array($codigorr,MYSQL_ASSOC);
		$codigo_r=$codigor2["codigo_r"];
		
		$codigo = substr ($codigo_r, -3,3);
		$codigo++;
		$comienzo=  strtoupper(substr($resultado['pieza'], 0, 2));
		$codigo0 = str_pad($codigo,3,"0",STR_PAD_LEFT);	
		$codigop = $comienzo.$codigo0; 
}

    $sql="INSERT INTO repuestos (codigo_r, pieza, descripcion, costo, cantidad) VALUES ('$codigop','$pieza','$descripcion','$subpartes[3]','$subpartes[1]')";
			$codigor = $codigor+1;
			//Insertar repuesto con otro precio
			mysql_query($sql,$con);
			
			//Insertar detalle de factura de articulo con otro precio
			$sql2= "INSERT INTO afactura (id_f, cantidad, id_r, preciou) VALUES ('$id_fac', '$subpartes[1]','$codigor','$subpartes[3]')";
			
			//Insertar detalle de factura pero con otro precio
			mysql_query($sql,$con);
			}
		}
			
			if ($i == count($partes)-1){
			mysql_query($sql5,$con);
			echo "<script languaje='javascript'>alert('Se ha ingresado la factura correctamente')
			document.location=('paneln.php')
			</script>";
			
			}else {
				die (mysql_error());
				mysql_query($sql3,$con);
				$ev="11.2";
				$detalle="Intento fallido de registro de factura de compra por el usuario $login";
				mysql_query($sql5,$con);
echo "<script languaje='javascript'>alert('ERROR!. No se pudo cargar el detalle de factura, Contacte al administrador del Sistema')
document.location=('paneln.php')
</script>";
			}
			}
mysql_close();
?>



<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
    