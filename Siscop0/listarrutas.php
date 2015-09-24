<?php 
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_rutas();

?>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
		//CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
	$("#nuevocomb a").click(function(){
		$("#formrutas").show();
		$("#tablarutas").hide();
		$.ajax({
			type: "GET",
			url: 'girutas.php',
			success: function(datos){
				$("#formrutas").html(datos);
			}
		});
		return false;
	});
   $('#tablausuarios').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
})
 
 </script>

<div id="nuevocomb" align="center"><a href="girutas.php"><img  src="images/new.png"  alt="" width="75" height="76" /></a></div>
<div id="formrutas" style="display:none;"></div>
<div id="tablarutas"><br/>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablausuarios">
                <thead>
                    <tr>
                        <th>Rutas</th>
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
			  <td><?php echo $cliente['nombreruta'] ?></td>
     
    <td><a onClick="EliminarRuta(<?php echo $cliente['id'] ?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
</div>