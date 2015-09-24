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
<script src="js/script.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script><script type="text/javascript">
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
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body id="page6">
<div id="main">
<!-- HEADER -->
  <div id="header1">
		<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></div>
			<div class="fright">
			  <ul>
			    <li><a href="paneln.php"><img src="images/icon1-act.gif" alt="" /></a></li>
		      </ul>
		  </div>
        </div>
  </div>
<!-- CONTENT -->
	<div id="content1">
     <div class="indent">
  <p><strong>Nombre y Apellido</strong>: <?php echo $_SESSION['usuario']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?> |||  <strong>Nombre de Usuario</strong>: <?php echo $_SESSION['login']; ?></p>
<p><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
  <li><a class="MenuBarItemSubmenu" href="#">Usuario</a>
    <ul>
      <li><a href="nuser.php">Nuevo</a></li>
      <li><a href="buser.php">Gestionar</a></li>
    </ul>
  </li>
  <?php }?>
  <li><a href="#" class="MenuBarItemSubmenu">Socios</a>
    <ul>
      <li><a href="nsocio.php">Nuevo</a></li>
      <li><a href="bsocio.php">Gestionar</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Avances</a>
    <ul>
      <li><a href="navance.php">Nuevo</a></li>
      <li><a href="bavances.php">Gestionar</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Vehículos</a>
    <ul>
      <li><a href="nveh.php">Nuevo</a></li>
      <li><a href="bvehiculo.php">Gestionar</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Permisos</a>
    <ul>
      <li><a href="npermiso.php">Crear</a></li>
      <li><a href="bpermiso.php">Gestionar</a></li>
    </ul>
  </li>
  <li><a class="MenuBarItemSubmenu" href="#">Pagos</a>
    <ul>
      <li><a href="npagosocio.php">Pago Socios</a>        </li>
      <li><a href="npagoavance.php">Pago Avances</a></li>
      <li><a href="bpagosocio.php">Gestionar</a></li>
    </ul>
  </li>
  <ul>
    <li><a href="#">Nuevo</a></li>
    <li><a href="#">Editar</a></li>
    <li><a href="#">Eliminar</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="#">Listar</a></li>
</ul>
  <li><a href="#" class="MenuBarItemSubmenu">Multas</a>
    <ul>
      <li><a href="nmulta.php">Nuevo</a></li>
      <li><a href="bmulta.php">Gestionar</a></li>
      <li><a href="hmultas.php">Historial de Multas</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Pr&eacute;stamos</a>
    <ul>
      <li><a href="pvehiculos.php">Fondo Motor-Personal</a></li>
      <li><a href="bprestamos.php">Gestionar</a></li>
      <li><a href="hprestamos.php">Historial de prestamos</a></li>
    </ul>
  </li>
   <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
  <li><a href="#" class="MenuBarItemSubmenu">Seguridad</a>
    <ul>
      <li><a href="cbackup.php">Backup</a></li>
      <li><a href="rbackup.php">Restaurar</a></li>
      <li><a href="bauditoria.php">Auditoría</a></li>
    </ul>
  </li>
  <?php } ?>
  <li><a href="#" class="MenuBarItemSubmenu">Reportes</a>
    <ul>
     <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
      <li><a href="auditar.php">Auditoría</a></li><?php }?>
      <li><a href="rpagos.php">Pagos</a></li>
      <li><a href="#" class="MenuBarItemSubmenu">Vehículos</a>
        <ul>
          <li><a href="rvehiculos.php">Estado</a></li>
          <li><a href="rrvehiculos.php">Rutas</a></li>
        </ul>
      </li>
      <li><a href="rmultas.php">Reporte de Multas</a></li>
      <li><a href="rrutas.php">Reporte de Rutas</a></li>
      <li><a href="rprestamos.php">Reporte de Prestamos</a></li>
      <li><a href="rsocios.php">Reporte de Socios</a></li>
      <li><a href="ravances.php">Reporte de Avances</a></li>
      <li><a href="#" class="MenuBarItemSubmenu">Graficos</a>
        <ul>
          <li><a href="gastosmes.php">Ingreso- Egresos</a></li>
        </ul>
      </li>
    </ul>
  </li>
   <?php if ($_SESSION['privilegio']=="ADMINISTRADOR")
 { ?>
  <li><a href="#" class="MenuBarItemSubmenu">Control</a>
    <ul>
      <li><a href="pagoavances.php">Asignar pago avances</a></li>
      <li><a href="montoprestamos.php">Montos Prestamos</a></li>
      <li><a href="generapago.php">Cierre de Mes</a></li>
      <li><a href="bcombustible.php">Tipo de Combustible</a></li>
      <li><a href="brutas.php">Rutas</a></li>
      <li><a href="iva.php">IVA</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Inventario</a>
    <ul>
      <li><a href="binventarioprueba.php">Consultar</a></li>
      <li><a href="ainventario.php">Ingresar</a></li>
    </ul>
  </li>
  
  <li><a href="#" class="MenuBarItemSubmenu">Facturación</a>
    <ul>
      <li><a href="bfactura.php">Consultar</a></li>
      <li><a href="nfactura.php">Ingresar</a></li>
      <li><a href="rfactura2.php">Imprimir</a></li>
    </ul>
  </li>
  
  <?php }?>
</ul>
<p>
  <img src="images/fondo.png" alt="" width="750" height="392" />
<p align="center"> <?php echo "<br>Para acceder al menu principal, debe cerrar la sesion haciendo click: <a href='logout.php'>Aqui</a> </html>";
isset($_SESSION); ?></p>  
    
      
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
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>