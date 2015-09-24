<?php 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_multas();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablamultas').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    });
$("#modim a").click(function(){
   var cliente_id=$(this).closest('tr').children('td:first').attr('id');   
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'emulta.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	});
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablamultas">
                <thead>
                    <tr>
                    	<th>Expediente</th>
                        <th>Nsocio</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Observación</th>
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
			  <td id="<?php echo $cliente['id'] ?>"><?php echo $cliente['expediente'] ?></td>
              <td><?php echo $cliente['nsocio'] ?></td>
			  <td><?php echo $cliente['nombresocio'] ?></td>
              <td><?php echo $cliente['observacion'] ?></td>
	<td><span id="modim"><a href=""><img src="imagenes/database_edit.png" title="Pagar" alt="Pagar" /></a></span></td>
    <td><a onClick="EliminarSocio(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><a onClick="EliminarSocio(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
