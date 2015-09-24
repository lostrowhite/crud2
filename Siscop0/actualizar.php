<?php
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');
	$objCliente=new Cliente;
	
	$usuario_id = htmlspecialchars(trim($_POST['usuario_id']));
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellido = htmlspecialchars(trim($_POST['apellido']));
	$login = htmlspecialchars(trim($_POST['login']));
	$email = htmlspecialchars(trim($_POST['email']));
	
	if ( $objCliente->actualizar(array($nombre,$apellido,$login,$email,),$usuario_id) == true){
		echo 'Datos guardados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->mostrar_cliente($_GET['id']);
		$cliente = mysql_fetch_array($consulta);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/func.js"></script>
<title>Documento sin título</title>
</head>
<body>
	
    <form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
    	<table width="264" border="1" align="center">
    	  <tr>
    	    <td width="89"><input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $cliente['id']?>" />
   	        Nombre</td>
    	    <td width="159"><input class="text" type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre']?>" /></td>
  	    </tr>
    	  <tr>
    	    <td>Apellido</td>
    	    <td><input class="text" type="text" name="apellido" id="apellido" value="<?php echo $cliente['apellido']?>" /></td>
  	    </tr>
    	  <tr>
    	    <td>Login</td>
    	    <td><input class="text" type="text" name="login" id="login" value="<?php echo $cliente['login']?>" /></td>
  	    </tr>
    	  <tr>
    	    <td>Email</td>
    	    <td><input class="text" type="text" name="email" id="email" value="<?php echo $cliente['email'] ?>" /></td>
  	    </tr>
    	  <tr>
    	    <td align="right"><input type="submit" name="submit" id="button" value="Enviar" /></td>
    	    <td align="left"><input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="CancelarModificar()" /></td>
  	    </tr>
  	  </table>
  </body>
</html>
	</form>
	<?php
	}
}
?>