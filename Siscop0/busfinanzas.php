<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
require('clases/cliente.class.php');
$buscar = $_POST['e'];

 

       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
 function buscar($e) {     
	  $buscar1 = $_POST['e']; 
	  $objCliente=new Cliente;
	  $consultape=$objCliente->mostrarfinanzape($buscar1);
	  $consultapa=$objCliente->mostrarfinanzapa($buscar1);  
	  $consultasocio= $objCliente->muestra_nsociof($buscar1); 
	   $clientesoc = mysql_fetch_array($consultasocio);
            $contar = mysql_num_rows($consultape);
			$contar1 = mysql_num_rows($consultapa);

                 ?>
                  <table width="700" border="2">
  <tr>
    <td align="center"><strong>FINANZAS POR PAGAR
    </strong>      <hr>
    </td>
    </tr>

  <tr>
    <td align="center"><strong>Meses pendientes por pagar </strong><strong></strong></td>
    </tr>
                <?php 
            if($contar == 0 ){
                echo "<tr><td colspan='6'>'El # <b>".$e." No posee finanzas en estatus Pendiente'</b></td></tr>";
			}
				   	while( $row = mysql_fetch_array($consultape) ){
	?>
  <tr>
    <td><?php
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
echo $meses[date("m",strtotime($row ['mes']))-1]." ".date("Y",strtotime($row['mes']));
	 ;?></td>
    </tr>
    <?php } ?>
</table>
<table width="700" border="2">
  <tr>
    <td colspan="6" align="center"><strong>FINANZAS PAGADAS
      </strong>      <hr>
    </td>
    </tr>

  <tr>
    <td width="93"><strong>#Socio</strong></td>
    <td width="81"><strong>#Expediente</strong></td>
    <td width="108"><strong>Nombre</strong></td>
    <td width="110"><strong>Fecha</strong></td>
    <td width="175"><strong>Concepto</strong></td>
    <td width="91"><strong>Monto</strong></td>
    </tr>
    <?php
     if($contar1 == 0 ){
                  echo "<tr><td colspan='6'>'El # <b>".$e." No posee finanzas en estatus Pagados'</b></td></tr>";
            }
	?>
                  <?php
				   	while( $row = mysql_fetch_array($consultapa) ){
							 
	?>
  <tr>
    <td><?php echo $row['id_s'];?></td>
    <td><?php echo $row['expediente'];?></td>
    <td><?php echo $clientesoc['nombre'];?></td>
    <td><?php echo $row['fecha'];?></td>
    <td><?php echo $row['concepto'];?></td>
    <td><?php echo $row['monto'];?> </td>
    </tr>
    <?php } ?>
</table>
                  <?php 
                  
            }
       
?>