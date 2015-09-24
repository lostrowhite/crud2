<?php 
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrarhprestamos();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablahprestamos').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablahprestamos">
                <thead>
                    <tr>
                        <th>Nsocio</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Cédula</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Pago</th>
                        <th>Monto</th>
                        <th>Concepto</th>
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
	?>
              <tr id="fila-<?php echo $cliente['id'] ?>">
			  <td><?php echo $cliente['nsocio'] ?></td>
			  <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['cedula'] ?></td>
              <td><?php echo $cliente['fecha'] ?></td>
              <td><?php echo $cliente['fechap'] ?></td>
              <td><?php echo $cliente['monto'] ?></td>
              <td><?php echo $cliente['concepto'] ?></td>
   
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
