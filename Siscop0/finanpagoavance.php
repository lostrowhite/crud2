<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script><script type="text/javascript">
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
<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, #header .row-2 ul li a, .extra img, #search-form a, #search-form a em, #login-form .field1 a, #login-form .field1 a em, #login-form .field1 a b');
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page6">
<div id="main">
  <a href="gfinanpagosocio.php">
  <!-- HEADER -->
  </a>
  <div id="header1">
		<div class="row-1">
			<div class="fleft"><a href="gfinanpagosocio.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></div>
			<div class="fright">
			  <ul>
			    <li><a href="index.php"><img src="images/icon1-act.gif" alt="" /></a></li>
		      </ul>
		  </div>
        </div>
                <div id="content1">
     <div class="indent">
	<p><strong>Nombre y Apellido</strong>: <?php echo $_SESSION['usuario']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?> |||  <strong>Nombre de Usuario</strong>: <?php echo $_SESSION['login']; ?></p>
<p><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?>
<form id="form1" method="post" action="gavance.php" >
  <p>&nbsp;</p>
</form>
<p>
<p>&nbsp; </p></div>
        <p align="center"> <?php echo "<br>Para acceder al menu principal, debe cerrar la sesion haciendo click: <a href='logout.php'>Aqui</html>";
isset($_SESSION); ?></a></p>  
     
  </div>
    <div id="footer1">
      <div class="footer-nav">
         
      </div>
      <div class="bottom"><span class="footnote">&copy;</span> Copyright <span class="footnote">&copy;</span> 2012 - <span class="footnote">Todos los Derechos Reservados</span><br />
        <a rel="nofollow" href="http://www.templatemonster.com" class="new_window">Programación &amp; Diseño:</a> Carlos Castillo
        | Jefryd Rojas | Alejandro Martín </div>
    </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>