<?php 
header('Content-Type: text/html; charset=UTF-8'); 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_usuarios();

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablausuarios').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
function edita(cliente_id){
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'euser.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	};
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablausuarios">
                <thead>
                    <tr>
                    	
                     
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Privilegio</th>
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
	?>
              <tr id="fila-<?php echo $cliente['id'] ?>">
			  <td id="<?php echo $cliente['id'] ?>"><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['apellido'] ?></td>
			  <td><?php echo $cliente['email'] ?></td>
              <td><?php echo $cliente['privilegio'] ?></td>
	<td><a onClick="edita(<?php echo $cliente['id']; ?>);" href="#"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></td>
    <td><a onClick="EliminarUsuario(<?php echo "'".$cliente["id"]."','".$cliente["login"]."'" ?>); return false " href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
