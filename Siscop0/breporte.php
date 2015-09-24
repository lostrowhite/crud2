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
<div id="usuarios" align="center" style="display:none;"></div>  
<div id="centro" align="center">
<div id="header0">
 <div class="row-2" >
 <div class="left">
<div class="right"> <br/>
<td align="center"><strong>REPORTES</strong></div> </td>
    </div>
    <hr />
</div>
  </div>

<br />
<ul>
<li><a id="audi" href="auditar.php"><span><img src="images/auditoriar.png" alt="" width="40" height="40" /><br />
    Auditoría</span></a></li>
					<li><a id="pago" href="rpagos.php"><span><img src="images/pagosr.png" alt="" width="40" height="40" /><br />
    Pagos realizados</span></a></li>
					<li><a id="veh" href="rvehiculos.php"><span><img src="images/vehiculor.png" alt="" width="45" height="40" /><br />
    Vehículos</span></a></li>
					<li><a id="vehrut" href="rrvehiculos.php"><span><img src="images/vrutasr.png" alt="" width="40" height="40" /><br />
    Veh en rutas</span></a></li>
					<li><a id="multar" href="rmultas.php"><span><img src="images/multar.png" alt="" width="40" height="40" /><br />
    Reporte Multas</span></a></li>
					<li><a id="rutar" href="rrutas.php"><span><img src="images/rutasr.png" alt="" width="40" height="40" /><br />
    Permisos</span></a></li>
					<li><a id="prestar" href="rprestamos.php"><span><img src="images/prestamosr.png" alt="" width="40" height="40" /><br />
    Préstamos</span></a></li>
    				<li><a id="socr" href="rsocios.php"><span><img src="images/sociosr.png" alt="" width="90" height="40" /><br />
     Socios</span></a></li>
	<li class="last"><a href="contacto.php"><span>9</span></a></li>
  </ul>
<br />

<ul>
<li><a id="avanr" href="ravances.php"><span><img src="images/avancer.png" alt="" width="70" height="40" /><br />
    Avances</span></a></li>
					<li><a id="grafir" href="gastosmes.php"><span><img src="images/graficor.png" alt="" width="40" height="40" /><br />
    Gráficos</span></a></li>    					
  </ul>
</div>
<div id="header2">
 <div class="row-2" >
 <div class="lefta">
  <div class="righta"></div>
    <form id="form1" name="form1">
  <div class="field2" align="center">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
  </form>
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