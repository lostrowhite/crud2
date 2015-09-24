<?php 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_piezas();
?>
 <script type="text/javascript">
$(document).ready(function(){
   $('#tablaproductos').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaproductos">
                <thead>
                    <tr>
                      <th>ID</th>
                    	<th>Código</th>
                        <th>Nombre</th><!--Estado-->
                        <th>Descripción</th>
                        <th>Costo</th>
                        <th>Cantidad</th>
                        <th>Añadir</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th></th>
                        <th></th>
                    </tr>
                </tfoot>
                  <tbody class="factu">
                    <?php
				   	while( $cliente = mysql_fetch_array($consulta) ){
	?>
              <tr id="fila-<?php echo $cliente['id_r'] ?>">
                <td><?php echo $cliente['id_r'] ?></td>
			  <td><?php echo $cliente['codigo_r'] ?></td>
              <td><?php echo $cliente['pieza'] ?></td>
			  <td><?php echo $cliente['descripcion'] ?></td>
              <td><?php echo $cliente['costo'] ?></td>
              <td><?php echo $cliente['cantidad'] ?></td>
    <td><img class="cursor" src="imagenes/nuevo.png" alt="Añadir" width="19" height="20" title="Añadir" 
    
    onClick="facturar(document.getElementById('cant_act'),<?php echo $cliente['id_r']?>); return false";
    
     /></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
