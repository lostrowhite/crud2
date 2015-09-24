<?php
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
	
$nombrep=$_POST['c_nombrep'];
$rifp=$_POST['c_rifp'];
$direccionp=$_POST['c_direccionp'];
$telefonop=$_POST['c_telefonop'];
$nombrec=$_POST['c_nombrec'];

    $sql="INSERT INTO proveedores (proveedor, rproveedor, dproveedor, tproveedor, nombrecontacto) VALUES ('$nombrep','$rifp','$direccionp','$telefonop','$nombrec')";
	  
if (mysql_query($sql,$con)){
echo "<script languaje='javascript'>alert('Ingresado el proveedor correctamente')
document.location=('paneln.php')
</script>";

}
else {
echo "No se pudo ingresar el proveedor en la Base de Datos, Contacte al Administrador "; 
echo $codigop;
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
