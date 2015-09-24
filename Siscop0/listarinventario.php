<?php 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_piezas();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablainventario').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablainventario">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>Descripción</th>
                        <th>Eliminar</th>
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
              <tr id="fila-<?php echo $cliente['id_r'] ?>">	
              <td><?php echo $cliente['codigo_r'] ?></td>
              <td><?php echo $cliente['pieza'] ?></td>
              <td><?php echo $cliente['cantidad'] ?></td>
              <td><?php echo $cliente['costo'] ?></td>
              <td><?php echo $cliente['descripcion'] ?></td>
     
    <td><a onClick="EliminarRepuesto(<?php echo $cliente['id_r'] ?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
