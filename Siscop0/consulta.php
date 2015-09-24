<?php
require('clases/cliente.class.php');
$objCliente=new Cliente;
$consulta=$objCliente->mostrar_clientes();
?>
<div id="contenedor">
    <div id="formusuario" style="display:none;"></div>
    <div id="tablausuario">
<span id="nuevo"><a href="nuser2.php"><img src="imagenes/nuser.png" alt="Agregar dato" width="33" height="31" /></a></span><br />
<strong>LISTA DE USUARIOS DEL SISTEMA</strong>
<table>
   		<tr>
   			<th>Nombre</th>
    		<th>Apellido</th>
    		<th>Login</th>
    		<th>Email</th>
            <th class="boton">Editar</th>
            <th class="boton">Editar Password</th>
            <th class="boton">Eliminar</th>
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
			  <td><span class="modi"><a href="actualizar.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
			  <td align="center"> <span class="clave"><a href="cambiar_pass.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/pass_edit.png" alt="Editar_pass" title="Editar_pass" /></a></span></td>
			  <td><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"><img src="imagenes/delete.png" title="Eliminar" alt="Eliminar" /></a><a onClick="EliminarDato(<?php echo $cliente['id'] ?>); return false" href="eliminarsocio.php?id=<?php echo $cliente['id'] ?>"></a></td>
		  </tr>
	<?php
	}
}
?>
    </table>
</div>
</div>