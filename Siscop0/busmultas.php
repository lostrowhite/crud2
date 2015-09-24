<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require('clases/cliente.class.php');
$buscar = $_POST['c'];

 

       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
 function buscar($c) {     
	  $buscar = $_POST['c']; 
	  $objCliente=new Cliente;
	  $consultampe=$objCliente->mostrarmultaspe($buscar);
	  $consultampa=$objCliente->mostrarmultaspa($buscar);    
            $contarm = mysql_num_rows($consultampe);
			$contarm1 = mysql_num_rows($consultampa);

                 ?>
<table width="100%" border="2">
  <tr>
    <td colspan="6" align="center"><strong>MULTAS EN ESTATUS PENDIENTE
    </strong>      <hr>
    </td>
  </tr>

  <tr>
    <td width="81"><strong>#Expediente</strong></td>
    <td width="108"><strong>Nombre</strong></td>
    <td width="110"><strong>Fecha</strong></td>
    <td width="175"><strong>Observación</strong></td>
    <td width="91"><strong>Monto</strong></td>
  </tr>
                <?php 
            if($contarm == 0 ){
                echo "<tr><td colspan='6'>'El # ".$c." No posee multas en estatus Pendiente'<b></b></td></tr>";
			}
				   	while( $row = mysql_fetch_array($consultampe) ){
	?>
  <tr>
    <td><?php echo $row['expediente'];?></td>
    <td><?php echo $row['nombresocio'];?></td>
    <td><?php echo $row['fecha'];?></td>
    <td><?php echo $row['observacion'];?></td>
    <td><?php echo $row['monto'];?> </td>
  </tr>
    <?php } ?>
</table>
<br />
<table width="100%" border="2">
  <tr>
    <td colspan="6" align="center"><strong>MULTAS EN ESTATUS PAGADO
    </strong>      <hr>
    </td>
  </tr>

  <tr>
    <td width="81"><strong>#Expediente</strong></td>
    <td width="108"><strong>Nombre</strong></td>
    <td width="110"><strong>Fecha</strong></td>
    <td width="175"><strong>Observación</strong></td>
    <td width="91"><strong>Monto</strong></td>
  </tr>
                <?php 
            if($contarm1 == 0 ){
                echo "<tr><td colspan='6'>'El # ".$c." No posee multas en estatus Pagado'<b></b></td></tr>";
			}
				   	while( $row = mysql_fetch_array($consultampa) ){
	?>
  <tr>
    <td><?php echo $row['expediente'];?></td>
    <td><?php echo $row['nombresocio'];?></td>
    <td><?php echo $row['fecha'];?></td>
    <td><?php echo $row['observacion'];?></td>
    <td><?php echo $row['monto'];?> </td>
  </tr>
    <?php } ?>
</table>
                  <?php 
                  
            }
?>
