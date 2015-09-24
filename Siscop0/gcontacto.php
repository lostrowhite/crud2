<?php
header("Content-Type: text/html;charset=utf-8");

require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
	
$nombre=$_POST['c_nombre'];
$correo=$_POST['c_correo'];
$telefono=$_POST['c_telefono'];
$cedula=$_POST['c_cedula'];
$comentario=$_POST['c_comentario'];


    $sql="INSERT INTO contacto (nombre, correo, telefono, cedula, comentario) VALUES ('$nombre','$correo','$telefono','$cedula','$comentario')";  
if (mysql_query($sql,$con)){
echo "<script languaje='javascript'>alert('Registrada sugerencia correctamente')
document.location=('paneln.php')
</script>";
}
else {
echo "<script languaje='javascript'>alert('Error al enviar sugerencia, Contacte al Administrador ')
document.location=('paneln.php')
</script>";
}
mysql_close();

?>
<div class="field2">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
