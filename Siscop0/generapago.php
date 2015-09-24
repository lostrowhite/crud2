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
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<link href="css/slideLock.css" rel="stylesheet" type="text/css" media="screen" />  
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="calendario_dw/calendario_dw.js" type="text/javascript" ></script> 
<script language="javascript" src="jquery-1.3.2.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="js/jquery.slideLock.js"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#form1").validationEngine();
		});
// Equivalente a $(document).ready();
     function ejecutar(){
            var mes = $("#mes").find(':selected').val();
			var ano = $("#ano").find(':selected').val();
			$.post('gcierremes.php?mes='+mes+'&ano='+ano,function(respuesta){
					alert(respuesta);							
            });		
        }
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
                <div id="content1">
     <div class="indent">
<form id="form1" method="post" action="#" onSubmit="if(!confirm('Esta seguro que desea hacer el cierre de mes?')){return false;}" >
  <table align="center" width="300" border="1" >
    <tr>
      <td>&nbsp;</td>
      <td><p>SELECCIONE EL AÑO Y EL MES AL CUAL DESEA HACER EL CIERRE DE GASTOS<br />
      </p></td>
    </tr>
    <tr>
      <td>Año</td>
      <td>
        <select name="ano" class="validate[required]" id="ano">
          <option value="" selected="selected">Seleccione</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
        </select>
        *
      </td>
    </tr>
    <tr>
      <td>Mes</td>
      <td><select name="mes" class="validate[required]" id="mes">
        <option value="" selected="selected">Seleccione</option>
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
      </select>
      *</td>
    </tr>
    <tr>
<td colspan="2" align="right"><div align="center" class="field2">
           <dt><dl><input name="Grabar" value="Ejecutar" type="button" onclick="ejecutar();" /></dl></dt>
        </div></td>
      </tr>
  </table>
</form>
</div>
  <div id="mensajesAyuda">
	<div id="ayudaTitulo"></div>
	<div id="ayudaTexto"></div>
</div>     
  </div>
    <div id="footer1">
      <div class="footer-nav">
         
      </div>
    </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>

