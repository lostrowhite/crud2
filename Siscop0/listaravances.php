<?php 
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_avances();


?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablaavances').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    });
})
function edita(cliente_id){
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'eavance.php?id_a='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	};
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaavances">
                <thead>
                    <tr>
                    	<th></th>
                    	<th>Nsocio</th>
                        <th>Navance</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Estado</th>
                        <th>Imprimir</th>
                        <th>Editar</th>
                                                 <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
                        <th>Eliminar</th>
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
					$consulta2=$objCliente->muestra_nsocio($cliente['id_s']);
					$cliente2 = mysql_fetch_array($consulta2)
	?>
             
              <tr id="fila-<?php echo $cliente['id_a'] ?>">
			  <td id="<?php echo $cliente['id_a'] ?>">S</td>
              <td><?php echo $cliente2['nsocio'] ?></td>
              <td>A°<?php echo $cliente['navance'] ?></td>
              <td><?php echo $cliente['nombre'] ?></td>
			  <td><?php echo $cliente['apellido'] ?></td>
              <td><?php echo $cliente['cedula'] ?></td>
              <td><?php if ($cliente['estado']==1){
				  echo "Retirado";			
					}else{
				echo "Activo";	
				} ?> </td>
     <td><a href="#" onclick="imprimir_avance(<?php echo $cliente['id_a']?>);"><img src="imagenes/imprimir.gif" alt="Imprimir" width="18" height="18" title="Imprimir" /></a></td>
     <td><?php if ($cliente['estado']==0){?><a onClick="edita(<?php echo $cliente['id_a']; ?>);" href="#"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a><?php }?></td>

   <td><?php if ($cliente['estado']==0 and $_SESSION['privilegio']=="ADMINISTRADOR"){ ?>
   <a onClick="AnularAvance(<?php echo $cliente['id_a'],",",$cliente2['nsocio'],",",$cliente['navance']?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><?php }?></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
