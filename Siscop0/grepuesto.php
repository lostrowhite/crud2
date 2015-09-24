<?php
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
	
$nombrer=$_POST['c_nombrer'];
//$cantidadr=$_POST['c_cantidadr'];
$costor=$_POST['c_costor'];
$descripcionr=$_POST['c_descripcionr'];


if($_POST["c_codigor"]==""){
		$codigor=0;
		$sql1="SELECT MAX(id_r) as maximo FROM repuestos";
		$resMaximo=mysql_query($sql1,$con);
		if(mysql_num_rows($resMaximo)>0){
			$codigor=mysql_result($resMaximo,0,"maximo");
		}
		$sql2 = "SELECT * FROM repuestos WHERE id_r=".$codigor;
		$codigorr=mysql_query($sql2,$con);
		$codigor2=mysql_fetch_array($codigorr,MYSQL_ASSOC);
		$codigo_r=$codigor2["codigo_r"];
		
		$codigo = substr ($codigo_r, -3,3);
		$codigo++;
		$comienzo=  strtoupper(substr($nombrer, 0, 2));
		$codigo0 = str_pad($codigo,3,"0",STR_PAD_LEFT);	
		$codigop = $comienzo.$codigo0; 
}

    $sql="INSERT INTO repuestos (codigo_r, pieza, descripcion, costo) VALUES ('$codigop','$nombrer','$descripcionr','$costor')";
	  
if (mysql_query($sql,$con)){
echo "<script languaje='javascript'>alert('Ingresado el Repuesto correctamente')
document.location=('paneln.php')
</script>";

}
else {
echo "No se pudo ingresar el Repuesto en la Base de Datos, Contacte al Administrador "; 
echo $codigop;
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
