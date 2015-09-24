<?php 
session_start();
$login=$_SESSION['login'];
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_pagosocios();

?>
<script type="text/javascript" src="js/func.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablapagosocios').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );
$("#modips a").click(function(){
   var cliente_id=$(this).closest('tr').children('td:first').attr('id');   
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'epagosocio.php?id='+cliente_id,
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
                        <th>Nsocio</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Meses</th>
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
					$consulta2=$objCliente->muestra_nsocio($cliente['id_s']);
					$cliente2= mysql_fetch_array($consulta2);
	?>
              <tr id="fila-<?php echo $cliente['id'] ?>">
			  <td id="<?php echo $cliente['id'] ?>"><?php echo $cliente2['nsocio'] ?></td>
			  <td><?php echo $cliente2['nombre'] ?></td>
              <td><?php 
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
echo $meses[date("m",strtotime($cliente['mes']))-1]; ?></td>
              <td><?php echo $cliente['monto'] ?></td>
	<td><span id="modips"><a href=""><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
             <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
            <td><a onClick="EliminarPagos(<?php echo "'".$cliente["id"]."','".$cliente2["nsocio"]."','".$cliente["expediente"]."'"?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a></td>
   
                           </tr>
							   <?php   }}
                    ?>
                <tbody>
            </table>
