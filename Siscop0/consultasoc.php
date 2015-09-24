<?php
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_socios();
?>
<script type="text/javascript">

</script>
<div id="contenedor2">
    <div id="formsoc" style="display:none;"></div>
    <div id="tablasoc">
<span id="nuevosoc"><a href="nsocio.php"><img src="imagenes/nsocio.jpg" alt="Agregar dato" width="45" height="46" /></a></span><br />
<strong>LISTA DE SOCIOS</strong>
 <table>
   		<tr>
	  	  <th width="48">NSocio</th>
   			<th width="54">Nombre</th>
    		<th width="55">Apellido</th>
    		<th width="38">Login</th>
    		<th width="38">Email</th>
            <th width="81" class="boton">Editar Socio</th>
            <th width="99" class="boton">Eliminar Socio</th>
        </tr>
<?php
if($consulta) {
	while( $cliente = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $cliente['id'] ?>">
		    <td>&nbsp;</td>
			  <td><?php echo $cliente['nombre'] ?></td>
			  <td><?php echo $cliente['apellido'] ?></td>
			  <td><?php echo $cliente['login'] ?></td>
			  <td><?php echo $cliente['email'] ?></td>
			  <td><span class="modisoc"><a href="actualizar.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
			  <td><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"></a></td>
		  </tr>
	<?php
	}
}
?>
    </table>
</div>
</div>