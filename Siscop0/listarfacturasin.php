<?php 
header("Content-Type: text/html;charset=utf-8");
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_facturasin();
?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablafac').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablafac">
                <thead>
                    <tr>
                        <th>NºFactura</th>
                        <th>Proveedor</th>
                        <th>Monto</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Factura</th>
                        <th>Estado</th>
                        <th>Mostrar</th>
                                                 <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
                        <th>Anular</th>
                        <?php }?>
                    </tr>
                    
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                    </tr>
                </tfoot>
                  <tbody>
                    <?php
				   	while( $cliente = mysql_fetch_array($consulta) ){			
			
			$consultar2 = mysql_query("SELECT * FROM proveedores WHERE id_proveedor= '$cliente[id_proveedor]'") or
			die("Problemas en el select:".mysql_error());	
			
			$cliente2 = mysql_fetch_array($consultar2);
					?>
              <tr id="fila-<?php echo $cliente['id_f'] ?>">	
              <td><?php echo $cliente['nfactura'] ?></td>
              <td><?php echo $cliente2['proveedor']?></td> 
              <td><?php echo $cliente['fmonto'] ?></td>
			  <td><?php echo date("d-m-Y",strtotime($cliente['fechainv'])) ?></td>
              <td><?php echo date("d-m-Y",strtotime($cliente['fechafac'])) ?></td>
     <td>	
	 
	 <?php if ($cliente['estado']==1){
				echo "Anulada"; 
				}else{ echo "Activa";}?></td>
  <td><a onClick="imprimir_facturainv(<?php echo $cliente['id_f'].",".$cliente2['id_proveedor'].",".$cliente['nfactura'].",'".$cliente['fechafac']."'"?>); return false" href="#"><img src="imagenes/pdf.gif" title="Mostrar" alt="Mostrar" width="21" height="19" /></a></td>
 
    <td><?php if ($cliente['estado']==0 and $_SESSION['privilegio']=="ADMINISTRADOR"){ ?><a onClick="AnularFacturaIn(<?php echo $cliente['id_f'] ?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><?php }?></td>
   
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
 