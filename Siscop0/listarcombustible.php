<?php 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_combustible();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablausuarios').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablausuarios">
                <thead>
                    <tr>
                        <th>Tipo de combustible</th>
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
              <tr id="fila-<?php echo $cliente['id'] ?>">
			  <td><?php echo $cliente['Tipo'] ?></td>
     
    <td><a onClick="EliminarTipoCombustible(<?php echo $cliente['id'] ?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
