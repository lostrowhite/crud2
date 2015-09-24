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
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		            
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
  function validateTest(field, rules, i, options) {
            if($("#c_monto").val() != $("#c_pago").val())
                return "El monto de el pago debe ser igual al de la multa";
        }
			   $(function() { // Equivalente a $(document).ready();
     
        $("#c_nsocio").change(function(event) {
            var nsocio = $("#c_nsocio").find(':selected').val();
            $.post('socios.php?nsocio='+nsocio,function(respuesta){
			     res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_expediente").val(res.contrato)
				 $("#c_nombresocio").val(res.nombre)
            });});});
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
  <div id="header1">
    <div id="content1">
     <div class="indent">
<form id="form1" method="post" action="acmulta.php" >
  <table width="444" border="1" bordercolor="#0f56ba" align="center">
    <tr>
      <td width="185"  align="left"> Nro de socio: </td>
      <?php 
	  require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_multas($_GET['id']);  
	  $cliente = mysql_fetch_array($consulta); {?>
      <td width="243" align="left">
      <input type="hidden" name="multa_id" id="multa_id" value="<?php echo $cliente['id']?>" />
      <input name="c_nsocio" value="<?php echo $cliente['nsocio']?>" type="text" id="c_nsocio" size="5" readonly="readonly" /></td>
      </tr>
    <tr>
      <td >Fecha:</td>
      <td >
        <input name="c_fecha" type="text"  id="c_fecha" size="10" value="<?php echo $cliente['fecha']?>" readonly="readonly"/>
        </td>
    </tr>
    <tr>
      <td >Expediente</td>
      <td ><input name="c_expediente" type="text"  id="c_expediente" size="10" value="<?php echo $cliente['expediente']?>" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Monto:</td>
      <td >
  <input name="c_monto" type="text" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $cliente['monto']; }?>" id="c_monto" size="15" readonly="readonly"/>
      </td>
      </tr>
    <tr>
      <td >Pago:</td>
        
        <td id="monto"><input name="c_pago" type="text" placeholder="Monto en Bf." class="validate[required,funcCall[validateTest]]" id="c_pago" size="15"/>
        *</td>
    </tr>
   <tr>
      <td colspan="2" align="right"><div align="center" class="field2">
           <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
  </table>
</form>   
  </div>
    </div>
<!-- FOOTER -->
</div>
</body>
</html>