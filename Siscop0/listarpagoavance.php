<?php 
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_pagoavance();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablapagosocios').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
$("#modipa a").click(function(){
   var cliente_id=$(this).closest('tr').children('td:first').attr('id');   
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'epagoavance.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	});
})
 
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablapagosocios">
                <thead>
                    <tr>
                        <th>Navance</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Monto</th>
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
			  <td id="<?php echo $cliente['id'] ?>"><?php echo $cliente['navance'] ?></td>
			  <td><?php echo $cliente['nombres'] ?></td>
              <td><?php echo date('d-m-Y',strtotime($cliente['fecha'])) ?></td>
              <td><?php echo $cliente['monto'] ?></td>
	<td><span id="modipa"><a href=""><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
             <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
            <td><a onClick="EliminarPagos(<?php echo "'".$cliente["id"]."','".$cliente["navance"]."'"?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
   
                           </tr>
							   <?php   }}
                    ?>
                <tbody>
            </table>
