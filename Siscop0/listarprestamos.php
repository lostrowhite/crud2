<?php 
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrarprestamos();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablaprestamos').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
$("#modipr a").click(function(){
   var cliente_id=$(this).closest('tr').children('td:first').attr('id');   
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'eprestamo.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	});
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaprestamos">
                <thead>
                    <tr>
                        <th>Nsocio</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Cédula</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Concepto</th>
                        <th>Pagar</th>
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
			  <td id="<?php echo $cliente['id'] ?>"><?php echo $cliente['nsocio'] ?></td>
			  <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['cedula'] ?></td>
              <td><?php echo $cliente['fecha'] ?></td>
              <td><?php echo $cliente['monto'] ?></td>
              <td><?php echo $cliente['concepto'] ?></td>
	<td><span id="modipr"><a href=""><img src="imagenes/database_edit.png" title="Pagar" alt="Editar" /></a></span></td>
    		  <td><a onClick="EliminarPrestamo(<?php echo "'".$cliente["id"]."','".$cliente["nsocio"]."','".$cliente["expediente"]."'" ?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
   
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
