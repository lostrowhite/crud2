<?php
include_once("cEmpleado.php");

//creamos el objeto $objempleados de la clase cEmpleado
$objempleados=new cEmpleado;

//la variable $lista consulta todos los empleados
$lista= $objempleados->consultar();

?>
<table style="border:1px solid #FF0000; color:#000099;width:400px;">
<tr style="background:#99CCCC;">
<td>Facultad</td>
<td>Escuela</td>
</tr>
<?php
while($row = mysql_fetch_array($lista)){
  echo "<tr>";
  echo "<td>".$row['cmbfacultad']."</td>";
  echo "<td>".$row['cmbescuela']."</td>";
  echo "</tr>";
}
?>
</table>