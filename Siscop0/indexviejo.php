<?php
session_start();
if(isset($SESSION)){
header("location:sec1.php"); /* Si ha iniciado la sesion, vamos a user.php */
} else { 
/* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos será mas cómodo así que metiendo echo's */
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>...:::Siscop:::...</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
</head>

<body>
	<div id="header">
	<a href="index.html" id="logo"><img src="images/encabezado.png" alt="LOGO" width="1069" height="159" /></a></div> 
	<!-- /#header -->
	<div id="adbox"><br>
<br>
    <form id="form1" name="form1" method="POST" action="autenticar.php">
    <table align="center" width="200" border="1">
             <tr>
                <td colspan="2"> <div align="center"><span class="Estilo3">LOGIN</span></div></td>
               
      </tr>
              <tr>
                <td>Usuario</td>
                <td><input type="text" name="login" id="login"></td>
              </tr>
              <tr>
                <td>Contraseña</td>
                <td><input type="password" name="password" id="password"></td>
              </tr>
              <tr>
                <td align="center" colspan="2">                    
                  <input type="submit" value="Entrar" class="boton">               
                </td></tr>
            </table>
         </form>    
    </div> <!-- /#adbox --><!-- /#contents -->
<div id="footer" >
	  <ul class="contacts">
			<h3>Contacto</h3>
			<li>Email: administrador@iut.com 
		</li>
			<li>Dirección: Av. Roosevelt.</li>
			<li>Telefono: 0212-6312227<br></li>
	  </ul>
		<ul id="connect">
		  <h3>&nbsp;</h3>
	  </ul>
      
		<span class="footnote">&copy; Copyright &copy; 2012. Todos los Derechos Reservados</span>
</div> <!-- /#footer -->
</body>
<?php
} /* Y cerramos el else */ 
?>
</html>

