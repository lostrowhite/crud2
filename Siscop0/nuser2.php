<?php
header("Content-Type: text/html;charset=iso-8859-1");
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');

	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellido = htmlspecialchars(trim($_POST['apellido']));
	$login = htmlspecialchars(trim($_POST['login']));
	$pass = htmlspecialchars (md5($_POST['password']));
	$email = htmlspecialchars(trim($_POST['email']));
	$privilegio = htmlspecialchars(trim($_POST['privilegio']));
	$objCliente=new Cliente;
	if ( $objCliente->insertarusuario(array($nombre,$apellido,$login,$pass,$email,$privilegio)) == true){
		echo 'Se Registro el Usuario Correctamente';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
	
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/func.js"></script>
<title>Documento sin título</title>
</head>
<body>
<form id="formnusuario" name="formnusuario" method="post" action="nuser2.php" >
  <table align="center" width="200" border="1" >
    <tr>
      <td width="89">Nombre</td>
      <td width="95"><label for="nombre"></label>
        <input type="text" name="nombre" id="nombre" /></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="apellido"></label>
        <input type="text" name="apellido" id="apellido" /></td>
    </tr>
    <tr>
      <td>Login</td>
      <td><label for="login"></label>
        <input type="text" name="login" id="login" /></td>
    </tr>
    <tr>
      <td>Contrase&ntilde;a</td>
      <td><label for="password"></label>
        <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="email"></label>
        <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Privilegio</td>
      <td><label for="privilegio"></label>
        <select name="privilegio" id="privilegio">
          <option value="--" selected="selected">Seleccione</option>
          <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          <option value="CARGADOR">CARGADOR</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center" ><input type="button" name="button" id="button" onclick="GrabarUsuario()" value="Enviar" />
        <input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onclick="CancelarUsuario()" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>