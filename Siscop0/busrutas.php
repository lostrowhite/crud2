<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require('clases/cliente.class.php');
$buscar = $_POST['d'];

 

       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
 function buscar($d) {     
	  $buscar = $_POST['d']; 
	  $objCliente=new Cliente;
	  $consultape=$objCliente->mostrarprestamospe($buscar);
	  $consultapa=$objCliente->mostrarprestamospa($buscar);    
            $contar = mysql_num_rows($consultape);
			$contar1 = mysql_num_rows($consultapa);

                 ?>
                  <table width="700" border="2">
  <tr>
    <td colspan="6" align="center">RUTAS REGISTRADAS
      <hr>
    </td>
    </tr>

  <tr>
    <td width="81">#ID</td>
    <td width="108">#Socio</td>
    <td width="110">Nombre</td>
    <td width="175">Fecha</td>
    <td width="91">Ruta</td>
    </tr>
                <?php 
            if($contar == 0 ){
                echo "<tr><td colspan='6'>'Ud. No posee prestamos en estatus Pendiente'<b>".$d."</b></td></tr>";
			}
				   	while( $row = mysql_fetch_array($consultape) ){
	?>
  <tr>
    <td><?php echo $row['expediente'];?></td>
    <td><?php echo $row['nombre'];?></td>
    <td><?php echo $row['fecha'];?></td>
    <td><?php echo $row['concepto'];?></td>
    <td><?php echo $row['monto'];?> </td>
    </tr>
    <?php } ?>
</table>
<table width="700" border="2">
  <tr>
    <td colspan="6" align="center">REGISTRAR RUTA DEL DIA 
      <hr>
    </td>
    </tr>

  <tr>
    <td>#ID</td>
    <td>#Socio</td>
    <td>Nombre</td>
    <td>Fecha</td>
    <td>Ruta</td>
    </tr>
    <?php
     if($contar1 == 0 ){
                  echo "<tr><td colspan='6'>'Ud. No posee prestamos en estatus Pagados'<b>".$d."</b></td></tr>";
            }
	?>
                  <?php
				   	while( $row = mysql_fetch_array($consultapa) ){
	?>
  <tr>
    <td><?php echo $row['expediente'];?></td>
    <td><?php echo $row['nombre'];?></td>
    <td><?php echo $row['fecha'];?></td>
    <td><?php echo $row['concepto'];?></td>
    <td><?php echo $row['monto'];?> </td>
    </tr>
    <?php } ?>
</table>
                  <?php 
                  
            }       
?>