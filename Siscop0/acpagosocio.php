<html>
<head>
</head>
<?php
session_start();
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();

$id=$_POST['pago_id'];
$nsocio=$_POST['c_nsocio'];
$deposito=$_POST['c_deposito'];
$fecha=date("Y-m-d",strtotime($_POST['c_fecha']));
$banco=$_POST['c_banco'];
$monto=$_POST['c_monto'];
$concepto=$_POST['c_concepto'];

date_default_timezone_set('America/Caracas');
$login=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$fecha=date('Y/m/d h:m:s');
$ev="5.1";
$detalle="Actualizado el pago de socio N: $nsocio";

    $sql=("UPDATE pagosocios set deposito='".$deposito."', fecha='".$fecha."', banco='".$banco."', monto='".$monto."', concepto='".$concepto."' WHERE id = '".$id."'");
	  
if (mysql_query($sql,$con)){
echo '<script language="javascript">
alert("Actualizado el pago de socio");
window.location.href="paneln.php";
</script>
'; 
}
else {
echo '<script language="javascript">
Sexy.alert("Error al actualizar pago: Contacte al administrador del sistema");
window.location.href="paneln.php";
</script>
'; 
}
mysql_close();

?>

</html>