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
			jQuery("#form1").validationEngine();
		});
			   $(function() { // Equivalente a $(document).ready();
     
        $("#c_nsocio").change(function(event) {
            var nsocio = $("#c_nsocio").find(':selected').val();
            $.post('socios.php?nsocio='+nsocio,function(respuesta){
			     res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_expediente").val(res.contrato)
				 $("#c_nombresocio").val(res.nombre)
				 $("#c_cedula").val(res.cedula)
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
<form id="form1" method="post" action="gmulta.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea registrar esta multa?')){return false;}" >
  <table width="444" border="1" bordercolor="#0f56ba" align="center">
    <tr>
      <td width="185"  align="left"> Nro de socio: </td>
      <td width="243" align="left" id="nsocio"><?php
      require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocio(); ?>        
        <select name="c_nsocio" class="validate[required]" id="c_nsocio">
         <option value="" selected="selected">Seleccione</option>
     <?php

    while ($resultado = mysql_fetch_array($consulta)){

          echo "<option value='".$resultado['nsocio']."'>S° ".$resultado['nsocio']."</option>";

    }

?>
        </select>
        *</td>
      </tr>
    <tr>
      <td align="left">Expediente:</td>
      <td  align="left"><?php
	  $consulta1=$objCliente->mostrar_multas();
	 
	$numeroRegistro=mysql_num_rows($consulta1);
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip=mysql_result($consulta1,$contador,"id");
	}
		$ndip++;
			echo"<input type='text' readonly='readonly'  name='c_expediente' id='c_expediente' value='02$ndip' size='2' onfocus='this.blur()' >";
	  ?></td>
    </tr>
    <tr>
      <td  align="left">Nombre del socio:</td>
      <td  align="left"><input name="c_nombresocio" type="text" id="c_nombresocio" readonly="readonly" /></td>
      </tr>
    <tr>
      <td  align="left">Cédula</td>
      <td  align="left"><input name="c_cedula" type="text" id="c_cedula" readonly="readonly" /></td>
    </tr>
    <tr>
      <td >Fecha:</td>
      <td >
        <input name="c_fecha" type="text"  id="c_fecha" size="10"  readonly="readonly"  class="validate[required] fecha "/>
    <img src="images/calendario.png" id="fecham" alt="" width="16" height="16" /><script>
     var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "fecham",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fecha",
		onSelect   : function() { this.hide() },
		max:tiempo,
    });
</script>
      *</td>
      </tr>
    <tr>
      <td>Monto:</td>
      <td "monto" >
        <input name="c_monto" type="text" placeholder="Ejem:220	" class="validate[required,custom[onlyNumberSp]] text-input" id="c_monto" size="15"/>
        *
      </td>
      </tr>
    <tr>
      <td >Observación:
     
        </td>
        
        <td "obs">
        <textarea class="validate[required] text-input" name="c_observacion" cols="20" id="c_observacion" placeholder="Ejem:Ingrese información detallada "></textarea>
        *
        </td>
    </tr>
   <tr>
      <td colspan="2" align="right"><div align="center" class="field2">
           <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
  </table>
</form>     
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