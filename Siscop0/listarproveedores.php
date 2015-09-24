<?php 
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_proveedores();
?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablafac').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 function edita(cliente_id){
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'eproveedor.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	};
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablafac">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>Rif</th>
                        <th>Representante</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Editar</th>
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
			
			//$consultar2 = mysql_query("SELECT * FROM proveedores WHERE id_proveedor= '$cliente[id_proveedor]'") or
		//	die("Problemas en el select:".mysql_error());	
			
			//$cliente2 = mysql_fetch_array($consultar2);
					?>
              <tr id="fila-<?php echo $cliente['id_proveedor'] ?>">	
              <td><?php echo $cliente['proveedor'] ?></td>
              <td><?php echo $cliente['rproveedor']?></td> 
              <td><?php echo $cliente['nombrecontacto'] ?></td>
			  <td><?php echo $cliente['tproveedor'] ?></td>
              <td><?php echo $cliente['dproveedor'] ?></td>
              	<td><a onClick="edita(<?php echo $cliente['id_proveedor']; ?>);" href="#"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></td>
              <td><a onClick="EliminarProveedor(<?php echo "'".$cliente["id_proveedor"]."','".$cliente["proveedor"]."'"?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
 