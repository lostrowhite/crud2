<?php 
header("Content-Type: text/html;charset=utf-8");
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_socios();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 var asInitVals = new Array();
$(document).ready(function(){
   var oTable = $('#tablasocios').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers",
		  "oLanguage": {
            "sSearch": "Busqueda en todas las Columnas:"
        } //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    });
	 $("tfoot input").keyup( function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter( this.value, $("tfoot input").index(this) );
    } );
})
function edita(cliente_id){
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'esocio.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	};
 </script>


<form id="form2">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablasocios">
                <thead>
                    <tr>
                        <th>Nsocio</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
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
                    	<th><input name="nsocio" type="text" placeholder="N° Socio" /></th>
                        <th><input name="nombre" type="text" placeholder="Nombre" /></th>
                        <th><input name="apellido" type="text" placeholder="Apellido" /></th>
                        <th><input name="estado" type="text" placeholder="Estado" /></th>
                    </tr>
                </tfoot>
                  <tbody>
                    <?php
				   	while( $cliente = mysql_fetch_array($consulta) ){
	?>
              <tr id="fila-<?php echo $cliente['id_s'] ?>" class="<?php echo $cliente['id_s'] ?>">
              <td id="<?php echo $cliente['id_s'] ?>">S°<?php echo $cliente['nsocio']  ?></td>
			  <td><?php echo $cliente['nombre'] ?></td>
              <td><?php echo $cliente['apellido'] ?></td>
              <td><?php if ($cliente['estado']==1){
				  echo "Retirado";			
					}else{
				echo "Activo";	
				} ?> </td>
    <td><a href="#" onclick="imprimir_socio(<?php echo $cliente['id_s']?>);"><img src="imagenes/imprimir.gif" alt="Imprimir" width="18" height="18" title="Imprimir" /></a></td>
    <td> <?php if ($cliente['estado']==0){?><a onClick="edita(<?php echo $cliente['id_s']; ?>);" href="#"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a><?php }?></td>
        <td>
        <?php if ($cliente['estado']==0 and $_SESSION['privilegio']=="ADMINISTRADOR"){ ?>
        <a onClick="AnularSocio(<?php echo $cliente['id_s'].",'".$cliente['nsocio']."'"?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a>
		<?php } ?>
		</td>
       </tr>
         <?php   }
                    ?>
						
                </tbody>
            </table>
</form>