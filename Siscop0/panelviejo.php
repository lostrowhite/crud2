<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>...:::Siscop:::...</title>
<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
<script src="SpryAssets/SpryTabbedpanelns.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedpanelns.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modi a").click(function(){
		$('#tablausuario').hide();
		$("#formusuario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formusuario").html(datos);
			}
		});
		return false;
	});
		// mostrar formulario de actualizar datos
	$("table tr .clave a").click(function(){
		$('#tablausuario').hide();
		$("#formusuario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formusuario").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formusuario").show();
		$("#tablausuario").hide();
		$.ajax({
			type: "GET",
			url: 'nuser.php',
			success: function(datos){
				$("#formusuario").html(datos);
			}
		});
		return false;
	});
});
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modiveh a").click(function(){
		$('#tablaveh').hide();
		$("#formveh").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formveh").html(datos);
			}
		});
		return false;
	});
		// mostrar formulario de actualizar datos
	$("table tr .claveveh a").click(function(){
		$('#tablaveh').hide();
		$("#formveh").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formveh").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevoveh a").click(function(){
		$("#formveh").show();
		$("#tablaveh").hide();
		$.ajax({
			type: "GET",
			url: 'nveh.php',
			success: function(datos){
				$("#formveh").html(datos);
			}
		});
		return false;
	});
});
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modisoc a").click(function(){
		$('#tablasoc').hide();
		$("#formsoc").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formsoc").html(datos);
			}
		});
		return false;
	});
		// mostrar formulario de actualizar datos
	$("table tr .clavesoc a").click(function(){
		$('#tablasoc').hide();
		$("#formsoc").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formsoc").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevosoc a").click(function(){
		$("#formsoc").show();
		$("#tablasoc").hide();
		$.ajax({
			type: "GET",
			url: 'nsocio.php',
			success: function(datos){
				$("#formsoc").html(datos);
			}
		});
		return false;
	});
});
</script>
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
</head>

<body>
	<div id="header">
	<a href="index.html" id="logo"><img src="images/encabezado.png" alt="LOGO" width="1069" height="159" /></a></div> 
	<!-- /#header -->
	<div id="paneln">
        <p><strong>Nombre y Apellido</strong>: <?php echo $_SESSION['usuario']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?></p>
		<p><strong>Nombre de Usuario</strong>: <?php echo $_SESSION['login']; ?></p>   
		<p><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?>
    <br>
 <div id="Tabbedpanelns1" class="Tabbedpanelns">
  <ul class="TabbedpanelnsTabGroup">
    <li class="TabbedpanelnsTab" tabindex="0">Administrar Usuarios<br />
    </li>
    <li class="TabbedpanelnsTab" tabindex="0">Administrar Vehiculos<br>
    </li>
<li class="TabbedpanelnsTab" tabindex="0">Administrar Socios</li>
</ul>
  <div class="TabbedpanelnsContentGroup">
    <div class="TabbedpanelnsContent"> <?php include('consulta.php') ?></div>
    <div class="TabbedpanelnsContent"> <?php include('consultaveh.php') ?></div>
<div class="TabbedpanelnsContent"> <?php include('consultasoc.php') ?></div>
</div>

<p>
  <script type="text/javascript">
<!--
var Tabbedpanelns1 = new Spry.Widget.Tabbedpanelns("Tabbedpanelns1");
//-->
  </script>
</p></div>
        <br>
</div>
</div>

<p align="center"> <?php echo "<br>Para cerrar la sesión, pulsa: <a href='logout.php'>Aqui</a> </html>";
isset($_SESSION); ?></p>    
<br>
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
</html>

