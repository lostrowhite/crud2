<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require('clases/cliente.class.php');
$buscar = $_POST['b'];

 

       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
 function buscar($b) {     
	  $buscar = $_POST['b']; 
	  $objCliente=new Cliente;
	  $consultape=$objCliente->mostrarprestamospe($buscar);
	  $consultapa=$objCliente->mostrarprestamospa($buscar);    
            $contar = mysql_num_rows($consultape);
			$contar1 = mysql_num_rows($consultapa);

                 ?>
                  <table width="700" border="2">
  <tr>
    <td colspan="6" align="center">PRÉSTAMOS EN ESTATUS PENDIENTE
      <hr>
    </td>
    </tr>

  <tr>
    <td width="93">#Socio</td>
    <td width="81">#Expediente</td>
    <td width="108">Nombre</td>
    <td width="110">Fecha</td>
    <td width="175">Concepto</td>
    <td width="91">Monto</td>
    </tr>
                <?php 
            if($contar == 0 ){
                echo "<tr><td colspan='6'>'Ud. No posee prestamos en estatus Pendiente'<b>".$b."</b></td></tr>";
                 
				   	while( $row = mysql_fetch_array($consultape) ){
	?>
  <tr>
    <td><?php echo $row['nsocio'];?></td>
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
    <td colspan="6" align="center">PRÉSTAMOS EN ESTATUS PAGADO
      <hr>
    </td>
    </tr>

  <tr>
    <td width="93">#Socio</td>
    <td width="81">#Expediente</td>
    <td width="108">Nombre</td>
    <td width="110">Fecha</td>
    <td width="175">Concepto</td>
    <td width="91">Monto</td>
    </tr>
    <?php
     if($contar1 == 0 ){
                  echo "<tr><td colspan='6'>'Ud. No posee prestamos en estatus Pagados'<b>".$b."</b></td></tr>";
            }
	?>
                  <?php
				   	while( $row = mysql_fetch_array($consultapa) ){
	?>
  <tr>
    <td><?php echo $row['nsocio'];?></td>
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
      }
       
?>