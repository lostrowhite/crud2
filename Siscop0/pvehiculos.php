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
<script src="calendario_dw/calendario_dw.js" type="text/javascript" ></script> 
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		            
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
		  function validateTest(field, rules, i, options) {
            if(parseInt($("#c_monto").val()) < parseInt($("#c_montomin").val()) || parseInt($("#c_monto").val()) > parseInt($("#c_montomax").val()))
                return "El monto no debe exceder los limites del prestamo";
        }
		    $(function() { // Equivalente a $(document).ready();
     
        $("#c_nsocio").change(function(event) {
            var nsocio = $("#c_nsocio").find(':selected').val();
            $.post('socios.php?nsocio='+nsocio,function(respuesta){
                res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_nombre").val(res.nombre)
				 $("#c_apellido").val(res.apellido)
				 $("#c_cedula").val(res.cedula)

            });
			    });
        });
		    $(function() { // Equivalente a $(document).ready();
     
        $("#c_combustible").change(function(event) {
            var id_tp = $("#c_combustible").find(':selected').val();
            $.post('generaprestamo.php?id_tp='+id_tp,function(respuesta){
                res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_montomin").val(res.montomi);
				 $("#c_montomax").val(res.montoma);

            });
			    });
        });
		
  function prueba(){
  var sum=0;
  sum =Number($("#c_montomin").val());
  sum+=Number($("#c_montomax").val());
  alert(sum);
  }

	$(document).ready(function(){
   $(".campofecha").calendarioDW();
})
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
	<form id="form1" method="post" action="gpvehiculos.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea registrar este préstamo?')){return false;}" >
  <td colspan="2" align="center" class="sder" ><h3>Nuevo préstamo de vehículo</h3></td>
  <table width="500" border="1" align="center">
    <tr>
      <td width="157">Nro de socio: </td>
      <td width="327" id="nsocio"><?php
      require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocio(); ?>        
        <select name="c_nsocio" id="c_nsocio" class="validate[required]">
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
      <td>Expediente:</td>
      <td><?php
	  $consulta1=$objCliente->mostrarprestamos();
	 
	$numeroRegistro=mysql_num_rows($consulta1);
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip=mysql_result($consulta1,$contador,"id");
	}
		$ndip++;
			echo"<input type='text' readonly='readonly'  name='c_expediente' id='c_expediente' value='4$ndip' size='2' >";
	  ?></td>
    </tr>
    <tr>
      <td>Nombre socio:</td>
      <td><input name="c_nombre" type="text" id="c_nombre" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Apellido:</td>
      <td><input name="c_apellido" type="text" id="c_apellido" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Nro Cédula:</td>
      <td><input name="c_cedula" type="text" id="c_cedula" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Fecha:</td>
      <td><input name="c_fecha" type="text" class="validate[required] fecha " id="c_fecha" size="10" readonly="readonly"/>   
       <img src="images/calendario.png" id="fechap" alt="" width="16" height="16" /><script>
    Calendar.setup({
        trigger    : "fechap",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fecha",
		onSelect   : function() { this.hide() },
    });
</script>*</td>
    </tr>
    <tr>
      <td>Tipo de Préstamo:</td>
      <td id="tprestamo"><?php
    $objCliente = new Cliente;
    $consulta = $objCliente->muestratprestamo(); ?>        
        <select name="c_combustible" id="c_combustible" class="validate[required]">
          <option value="">Seleccione</option>
     <?php
    while ($resultado = mysql_fetch_array($consulta)){

          echo "<option value='".$resultado['id_tp']."'>".$resultado['nombre']."</option>";

    }

?>
        </select>
        *</td>
    </tr>
    <tr>
      <td>Monto:</td>
      <td id="monto"><input name="c_monto" type="text" class="validate[required,funcCall[validateTest]]" id="c_monto" size="10" placeholder="Solo Num"/>
        * Mín:
          <input name="c_montomin" type="text" disabled="disabled" class="validate[required,custom[onlyNumberSp]] text-input" id="c_montomin" size="6"/> 
          Máx:
          <input name="c_montomax" type="text" disabled="disabled" class="validate[required,custom[onlyNumberSp]] text-input" id="c_montomax" size="6"/></td>
    </tr>
    <tr>
      <td>Por Concepto:</td>
      <td "concepto"><textarea class="validate[required] text-input" name="c_concepto" id="c_concepto" placeholder="Ejem: Ingrese concepto o motivo"></textarea>
      *</td>
    </tr>
   <tr>
      <td colspan="2" ><div align="center" class="field2">
       <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
       </div></td>
    </tr>
  </table>
</form>
        <br>    
  </div>
    </div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>