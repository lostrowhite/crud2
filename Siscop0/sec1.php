<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:paneln.php");
} 
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/modelo1.dwt" codeOutsideHTMLIsLocked="false" --><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>...:::COOPERATIVA ROOSEVELT:::...</title>
<script src="SpryAssets/SpryTabbedpanelns.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedpanelns.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function parpadear() {
  var blink = document.all.tags("BLINK")
  for (var i=0; i < blink.length; i++)
    blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}

function empezar() {
  if (document.all)
    setInterval("parpadear()",1000)
}
window.onload = empezar;
</script>
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
<!-- InstanceEndEditable -->
<link href="css/formatosDW.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="externa">
  <tr>
    <td class="encabezado" id="encabezado"><a name="arriba" id="arriba"></a></td>
  </tr>
  <tr>
    <td id="encabezado2"><!-- InstanceBeginEditable name="menuSuperior" -->
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="menu">
        <tr>
          <td width="12"><img src="imagenes/barraEsquinaIzq.gif" width="12" height="32" alt="barra equina izq" /></td>
          <td class="fondoBarra"><a href="indexviejo.php">Inicio</a> | <span class="fondoBarraActual">Ingresar Proyecto</span><a href="administra.php" target="_parent"> | Administraci&oacute;n Siscop</a> |<a href="contacto.php" target="_parent"> Contacto</a></td>
          <td width="12"><img src="imagenes/barraEsquinaDer.gif" width="12" height="32" alt="barra esquina der" /></td>
        </tr>
      </table>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="cuerpo">
      <tr>
        <td width="23%" valign="top"><div align="center"><img src="imagenes/coop.jpg" width="99" height="95"><br>        
        </div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="etiquetaBlanca"><ul class="listaMenu">
                <li><a href="indexviejo.php" target="_parent">Inicio</a></li>
                <li><a href="paneln.php" target="_parent">Ingresar</a></li>
                <li><a href="administra.php" target="_parent">Administraci&oacute;n </a></li>
                <li><a href="contacto.php" target="_parent">Contacto</a></li>
              </ul></td>
            </tr>
          </table>
          Este sistema se debe utilizar con el siguiente Explorador &quot;MOZILLA FIREFOX&quot;, descargalo <a href="http://www.mozilla.org/es-ES/firefox/new/" target="_blank">AQUI</a><br>          </td>
        <td valign="top"><!-- InstanceBeginEditable name="textoModificable" -->
          
          <p align="center"><span class="general">BIENVENID@ AL SISTEMA DE GESTION PARA LOS SOCIOS DE LA COOPERATIVA DE TRANSPORTES ROOSEVELT</span></p>
          <p><strong>Nombre y Apellido</strong>: <?php echo $_SESSION['usuario']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?></p>
		<p><strong>Nombre de Usuario</strong>: <?php echo $_SESSION['login']; ?></p>   
		<p><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?><br>
		  <br>
		  <p align="center">&nbsp;</p>
        </p>
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
          <p id="arriba"><a href="#arriba" target="_parent">^inicio..</a></p>
   
        <!-- InstanceEndEditable --></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td id="pie"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="menu">
        <tr>
          <td width="12" height="32"><img src="imagenes/barraEsquinaIzq.gif" width="12" height="32" alt="barra equina izq"></td>
          <td width="468" class="fondoBarra"><?php
    function actual_date ()  
    {  
        $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
        $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
        $year_now = date ("Y");  
        $month_now = date ("n");  
        $day_now = date ("j");  
        $week_day_now = date ("w");  
        $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
        return $date;    
    }  
echo "<strong>".actual_date()."</strong>";

?></td>
          <td width="508" class="fondoBarrad">...:::Roosevelt:::... &copy; 2012</td>
          <td width="12"><img src="imagenes/barraEsquinaDer.gif" width="12" height="32" alt="barra esquina der"></td>
        </tr>
      </table>&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
