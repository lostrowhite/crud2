<script type="text/javascript" src="js/func.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link href="js/facebox.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/facebox.js"type="text/javascript"></script>
	<script>
	 jQuery(document).ready(function($) {
	 
		   $('a[rel*=facebox]').facebox({
        loadingImage : 'images/loading.gif',
        closeImage   : 'images/closelabel.png'
      })
    })
jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		            
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
		</script>
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
                  <table width="600px" border="1">
  <tr>
    <td colspan="6" align="center"><b>PRÉSTAMOS EN ESTATUS PENDIENTE</b>
      <hr>
    </td>
    </tr>

  <tr>
    <td width="89"><strong>#Expediente</strong><hr></td>
    <td width="119"><strong>Nombre</strong><hr></td>
    <td width="170"><strong>Fecha</strong><hr></td>
    <td width="143"><strong>Concepto</strong><hr></td>
    <td width="104"><strong>Monto</strong><hr></td>
    </tr>
                <?php 
            if($contar == 0 ){
                echo "<tr><td colspan='6'><b>'El #".$b." No posee prestamos en estatus Pendiente'</b></td></tr>";
			}
				   	while( $row = mysql_fetch_array($consultape) ){
	?>
  <tr>
    <td><a href="cprestamo.php?id=<?php echo $row['id']; ?>" rel="facebox"><?php echo $row['expediente'];?></a><hr></td>
    <td><?php echo $row['nombre'];?><hr></td>
    <td><?php echo $row['fecha'];?><hr></td>
    <td><?php echo $row['concepto'];?><hr></td>
    <td><?php echo $row['monto'];?><hr></td>
    </tr>
    <?php } ?>
</table>
<br />
<table width="600" border="1">
  <tr>
    <td colspan="6" align="center"><b>PRÉSTAMOS EN ESTATUS PAGADO</b>
      <hr>
    </td>
    </tr>

  <tr>
    <td width="89"><strong>#Expediente</strong></td>
    <td width="119"><strong>Nombre</strong></td>
    <td width="170"><strong>Fecha</strong></td>
    <td width="143"><strong>Concepto</strong></td>
    <td width="104"><strong>Monto</strong></td>
    </tr>
    <?php
     if($contar1 == 0 ){
                  echo "<tr><td colspan='6'><b>'El # ".$b." No posee prestamos en estatus Pagados'</b></td></tr>";
            }
	?>
                  <?php
				   	while( $row = mysql_fetch_array($consultapa) ){
	?>
  <tr>
    <td><?php echo $row['expediente'];?><hr></td>
    <td><?php echo $row['nombre'];?><hr></td>
    <td><?php echo $row['fecha'];?><hr></td>
    <td><?php echo $row['concepto'];?><hr></td>
    <td><?php echo $row['monto'];?><hr></td>
    </tr>
    <?php } ?>
</table>
                  <?php 
                  
            }       
?>