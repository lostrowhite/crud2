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
	$("#user").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'buser.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
$("#soc").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bsocio.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#avan").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bavances.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
				
			}
		});
		return false;
	});
	$("#vehi").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bvehiculo.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#permi").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bpermiso.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#pago").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bpagosocio.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#presta").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bprestamos.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#multa").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bmulta.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#seg").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bauditoria.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
		$("#rep").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'breporte.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
		$("#cont").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'brutas.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#inven").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'binventarioprueba.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#factu").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bfactura.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
			}
		});
		return false;
	});
	$("#servicio").click(function(){
		$('#centro').hide();
		$("#usuarios").show();
		$.ajax({
			url: 'bservicios.php',
			type: "GET",
			success: function(datos){
				$("#usuarios").html(datos);
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
<!-- HEADER -->


 <div><table width="100%" border="0">
  <tr>
    <td width="60%" rowspan="2"><a href="index.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></td>
    <td width="33%"><strong>Nombre de Usuario:</strong> <?php echo $_SESSION['login']; ?></td>
    <td width="7%" rowspan="2" align="center"><a href="logout.php"><img src="images/exit5.png" alt="" width="64" height="63" /></a></td>
  </tr>
  <tr>
    <td align="left"><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?></td>
  </tr>
  </table>
   <br />
 </div>
<div id="usuarios" align="center" style="display:none;"></div>  
<div id="centro" align="center">
<div id="header0">
 <div class="row-2" >
 <div class="left">
<div class="right"> <br/>
<td align="center"><strong>Administración de módulos</strong></div> </td>
    </div>
    <hr />
</div>
  </div>

<br />
<strong>
<ul>
<li><a id="user"><span><img src="images/usuarios.png" alt="" width="40" height="40" /><br />
				    Usuarios</span></a></li>
					<li><a id="soc"><span><img src="images/socio1.png" alt="" width="40" height="40" /><br />
    Socios</span></a></li>
					<li><a id="avan"><span><img src="images/avances.png" alt="" width="40" height="40" /><br />
    Avances</span></a></li>
					<li><a id="vehi"><span><img src="images/transporte.png" alt="" width="40" height="40" /><br />
    Vehículos</span></a></li>
					<li><a id="permi"><span><img src="images/permisos.png" alt="" width="40" height="40" /><br />
    Permisos</span></a></li>
					<li><a id="pago"><span><img src="images/pagos.png" alt="" width="40" height="40" /><br />
    Pagos</span></a></li>
					<li><a id="multa"><span><img src="images/multas.png" alt="" width="40" height="40" /><br />
    Multas</span></a></li>
    				<li><a id="presta"><span><img src="images/prestamo.png" alt="" width="40" height="40" /><br />
    Préstamo</span></a></li>
	<li class="last"><a href="contacto.php"><span>9</span></a></li>
  </ul>
<br />

<ul>
<li><a id="seg"><span><img src="images/seguridad.png" alt="" width="40" height="40" /><br />
				    Seguridad</span></a></li>
					<li><a id="rep"><span><img src="images/reporte.png" alt="" width="40" height="40" /><br />
    Reportes</span></a></li>
					<li><a id="cont"><span><img src="images/control.png" alt="" width="40" height="40" /><br />
    Control</span></a></li>
					<li><a id="inven"><span><img src="images/inventario.png" alt="" width="40" height="40" /><br />
    Inventario</span></a></li>
					<li><a id="factu"><span><img src="images/facturacion.png" alt="" width="40" height="40" /><br />
    Facturación</span></a></li>
					<li><a id="servicio"><span><img src="images/busfigueres.gif" alt="" width="40" height="40" /><br />
    Servicios</span></a></li>
					  </ul>
                     </strong>
</div>
<div id="header2">
 <div class="row-2" >
 <div class="lefta">
  <div class="righta"></div>
 </div>
  </div>
<!-- CONTENT -->
	<div id="content1">
     <div class="indent">
  <p align="center"></p>  
    
      
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