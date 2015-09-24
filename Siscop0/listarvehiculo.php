<?php 
session_start();
$login=$_SESSION['login'];
$estado = array(
			"Servicio"=>"Servicio",
			"Inactivo"=>"Inactivo",
		 );
$ruta = array(
			"1"=>"Carmelitas",
			"2"=>"Chacaito",
			"3"=>"Previsora",
		 );
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_vehiculos();

?>
<script type="text/javascript" src="js/func.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/js.js"></script>
 <script type="text/javascript">
 
$(document).ready(function(){
   $('#tablavehiculos').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
	} );
})
function edita(cliente_id){
		$("#datos").show();
		$("#contenido").hide();
		$.ajax({
			type: "GET",
			url: 'evehiculo.php?id='+cliente_id,
			success: function(datos){
				$("#datos").html(datos);
			}
		});
		return false;
	};
 </script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablavehiculos">
                <thead>
                    <tr>
                    	<th> </th>
                        <th>Nsocio</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Placa</th>
                        <th>Estado</th>
                        <th>Editar</th>
                       <?php if ($_SESSION['privilegio']=="ADMINISTRADOR"){?>
                        <th>Eliminar</th>
                        <?php } ?>
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
						$id = $cliente['id'];
						$consulta2=$objCliente->muestra_nsocio($cliente['id_s']);
					$cliente2 = mysql_fetch_array($consulta2)
	?>
              <tr id="fila-<?php echo $cliente['id'] ?>"  >
			  <td id="<?php echo $cliente['id'] ?>">Sº</td>
			 <td> <?php echo $cliente2['nsocio'] ?></td>
			  <td><?php echo $cliente2['nombre'] ?></td>
              <td id="2"><?php echo $cliente['marca'] ?></td>
              <td id="p"><?php echo $cliente['placa'] ?></td>
              <td><div class="estado" id="estado-<?php echo $id ?>"><?php switch ($cliente['estado']){ case 0:
		echo "Servicio";
		break;
		case 1:
		echo "Retirado";
		break;
		case 2:
		echo "Inactivo";
		break;
			
			}?></div></td>
              <td><?php if ($cliente['estado']==0 or $cliente['estado']==2){ ?><a onClick="edita(<?php echo $cliente['id']; ?>);" href="#"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a> <?php }?></td>
	 
    <td><?php if ($cliente['estado']==0 and $_SESSION['privilegio']=="ADMINISTRADOR" or $cliente['estado']==2 and $_SESSION['privilegio']=="ADMINISTRADOR" ){ ?><a onclick="AnularVehiculo(<?php echo "'".$cliente["id"]."','".$cliente2["nsocio"]."','".$cliente["placa"]."'" ?>); return false" href="#"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><a href="evehiculo.php?id=<?php echo $cliente['id'] ?>"></a></span><?php }?></td>
                           </tr>
							   <?php   }
                    ?>
                <tbody>
            </table>
