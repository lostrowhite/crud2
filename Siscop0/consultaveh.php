<?php
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_socios();
?>
<script type="text/javascript">

</script>
<div id="contenedor1">
    <div id="formveh" style="display:none;"></div>
    <div id="tablaveh">
<span id="nuevoveh"><a href="nsocio.php"><img src="imagenes/nveh.jpg" alt="Agregar dato" width="44" height="35" /></a></span><br />
<strong>LISTA DE VEHÍCULOS </strong>
 <table>
   		<tr>
   			<th>NSocio</th>
    		<th>Marca</th>
    		<th>Modelo</th>
    		<th>A&ntilde;o</th>
            <th class="boton">Editar Vehículo</th>
            <th class="boton">Eliminar Vehículo</th>
        </tr>
<?php
if($consulta) {
	while( $cliente = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $cliente['id'] ?>">
			  <td><?php echo $cliente['nombre'] ?></td>
			  <td><?php echo $cliente['apellido'] ?></td>
			  <td><?php echo $cliente['login'] ?></td>
			  <td><?php echo $cliente['email'] ?></td>
			  <td><span class="modiveh"><a href="actualizar.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
			  <td><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"></a></td>
		  </tr>
	<?php
	}
}
?>
    </table>
</div>
</div>