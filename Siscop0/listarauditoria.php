<?php 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->auditoria();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablaauditoria').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaauditoria">
                <thead>
                    <tr>
                    	
                     
                        <th>Fecha y Hora</th>
                        <th>Dirección IP</th>
                        <th>Usuario</th>
                        <th>Evento</th>
                        <th>Detalle</th>
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
              <tr>
			  <td><?php echo date("d-m-Y h:m:sa",strtotime($cliente["fecha"])) ?></td>
              <td><?php echo $cliente['ip'] ?></td>
			  <td><?php echo $cliente['usuario'] ?></td>
              <td><?php echo $cliente['evento'] ?></td>
              <td><?php echo $cliente['detalle'] ?></td>

                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
