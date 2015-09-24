<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
			jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
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
<form id="form1" method="post" action="grepuesto.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >

  <table width="721" border="0" align="center" >
      <tr id="sizq" >
      <td colspan="2" align="center" class="sder" ><h3>
        <input type="hidden" name="c_codigor" id="c_codigor" />
        Ingreso de  Repuesto</h3></td>
    </tr>
    <tr>
      <td align="center" id="nombrer">
        Nombre del Repuesto<br />
        <input type="text" name="c_nombrer" id="nombrer" class="validate[required,custom[onlyLetterSp]] text-input"/> 
        * </td>
    </tr>
    <tr>
      <td align="center" id="costor">Costo<br />
        <input type="text" name="c_costor" id="c_costor" />
        *</td>
    </tr>
    <tr>
      <td align="center" id="descripcionr">Descripción<br />
         <input type="text" name="c_descripcionr" id="c_descripcionr" class="validate[required] text-input"  />
        *        </td>
    </tr>
    <tr id="izq">
      <td id="der" align="center"><div align="center" class="field2">
        <input name="atras"  type="button" id="atras" value="Atras" onclick="CancelarRep();" />
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
       </td>
    </tr>
    </table>
</form>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>