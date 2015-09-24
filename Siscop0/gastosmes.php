<?php
include("clases/FusionCharts.php");
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
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<link href="css/slideLock.css" rel="stylesheet" type="text/css" media="screen" />  
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script language="javascript" src="jquery-1.3.2.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="js/jquery.slideLock.js"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		            
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
</script>
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
<div id="main" >
<!-- HEADER -->
  <div id="header1">
		<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></div>
			<div class="fright">
			  <ul>
			    <li><a href="index.php"><img src="images/icon1-act.gif" alt="" /></a></li>
		      </ul>
		  </div>
        </div>
                <div id="content1">
     <div class="indent">
	<p><strong>Nombre y Apellido</strong>: <?php echo $_SESSION['usuario']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?> |||  <strong>Nombre de Usuario</strong>: <?php echo $_SESSION['login']; ?></p>
<p><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?></p>
	  <header id="titulo">

        <h3>Gráfico de gastos por mes</h3>
    </header>
    <form name="form1" id="form1" method="post" action="" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}">
      <table width="100%" border="1">
        <tr>
          <td align="center"><select name="ano" class="validate[required]" id="ano">
            <option value="" selected="selected">Seleccione </option>
            <option value="2013">2013</option>
          </select></td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="submit" id="button" value="Enviar" /></td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td align="center"><?php
if(isset($_POST['submit'])) { 
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "exten"; 

$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die('Error de conexion al Servidor: ' . mysql_error());; 
mysql_select_db($bd_base, $con) or die('Error de conexion con la BD: ' . mysql_error()); 
	
// Suma de gastos
$ano=$_POST['ano'];
$sql1 = "SELECT SUM(monto) as suma from ingresos WHERE year(fecha) ='$ano' AND month(fecha)='1' ";
$sql2 = "SELECT SUM(monto) as suma from ingresos WHERE year(fecha) ='$ano' AND month(fecha)='2' ";
$sql3 = "SELECT SUM(monto) as suma from gastos WHERE year(fecha) ='$ano' AND month(fecha)='1' ";
$sql4 = "SELECT SUM(monto) as suma from gastos WHERE year(fecha) ='$ano' AND month(fecha)='2' ";

//////INGRESOS 
//Enero
$enero=mysql_query($sql1);
$ene=mysql_fetch_array($enero);
$ingresoenero=round($ene['suma'],2);
//Febrero
$febrero=mysql_query($sql2);
$feb=mysql_fetch_array($febrero);
$ingresofebrero=round($feb['suma'],2);

////GASTOS
//Enero
$enero=mysql_query($sql3);
$ene=mysql_fetch_array($enero);
$gastoenero=round($ene['suma'],2);
//Febrero
$febrero=mysql_query($sql4);
$feb=mysql_fetch_array($febrero);
$gastofebrero=round($feb['suma'],2);


   $strXML  = "";
   $strXML .= "<graph caption='Grafico Ingreso-Gastos año:$ano ' PYAxisName='Revenue' SYAxisName='Quantity' numberPrefix='Bsf. ' showvalues='0' numDivLines='4' formatNumberScale='0' decimalPrecision='0' anchorSides='10' anchorRadius='3' anchorBorderColor='009900'>";
   $strXML .= "<categories font='Arial' fontSize='11' fontColor='000000'>";
   $strXML .= "<category name='Enero' hoverText='Enero'/>";
   $strXML .= "<category name='Febrero'/>";
   $strXML .= "<category name='Marzo'/>";
   $strXML .= "<category name='Abril'/>";
   $strXML .= "<category name='Mayo'/>";
   $strXML .= "<category name='Junio'/>";
   $strXML .= "<category name='Julio'/>";
   $strXML .= "<category name='Agosto'/>";
   $strXML .= "<category name='Sept'/>";
   $strXML .= "<category name='Oct'/>";
   $strXML .= "<category name='Nov'/>";
   $strXML .= "<category name='Dic'/>";
   $strXML .= "</categories>";
   $strXML .= "<dataset seriesname='Ingresos' color='FDC12E' showValues='0'>";
   $strXML .= "<set value='$ingresoenero'/>";
   $strXML .= "<set value='$ingresofebrero'/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value='' />";
   $strXML .= "<set value='' />";
   $strXML .= "<set value='' />";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value='' />";
   $strXML .= "</dataset>";
   $strXML .= "<dataset seriesname='Gastos' color='56B9F9' showValues='0'>";
   $strXML .= "<set value='$gastoenero'/>";
   $strXML .= "<set value='$gastofebrero'/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value='' />";
   $strXML .= "<set value='' />";
   $strXML .= "<set value='' />";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value=''/>";
   $strXML .= "<set value='' />";
   $strXML .= "</dataset>";
   $strXML .= "</graph>";

	
	//Create the chart - Column 3D Chart with data from Data/Data.xml
	echo renderChartHTML("images/FCF_MSColumn3D.swf", "", $strXML, "myNext", 800, 500);
	}
?></td>
        </tr>
      </table>
</form>
<form id="form1" name="form1">
  <div class="field2" align="center">
      <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
      </div>
  </form>
     </div>
  <div id="mensajesAyuda">
	<div id="ayudaTitulo"></div>
	<div id="ayudaTexto"></div>
</div>
        <br>
        <p align="center"> <?php echo "<br>Para acceder al menu principal, debe cerrar la sesion haciendo click: <a href='logout.php'>Aqui</a> </html>";
isset($_SESSION);?></p>  
     
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

