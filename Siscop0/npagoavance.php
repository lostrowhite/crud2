<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
require('clases/cliente.class.php');
$objCliente=new Cliente;
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
            if($("#c_monto").val() != $("#bmonto").val())
                return "El monto de el pago debe ser igual al de la finanza";
        }
		   $(document).ready(function(){
        $("#c_nsocio").change(function(event){
            var nsocio = $("#c_nsocio").find(':selected').val();
            $("#c_nrodeavance").load('generaavance1.php?nsocio='+nsocio);
        });
			$("#c_nrodeavance").change(function(event){
				 var nsocio = $("#c_nsocio").find(':selected').val();
				var navance = $("#c_nrodeavance").find(':selected').val();
		 $.post('avances1.php?nsocio='+nsocio+'&navance='+navance,function(respuesta){
				res1 = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_nombres").val(res1.nombre)
				 $("#c_apellidos").val(res1.apellido)
				 $("#c_cedula").val(res1.cedula)
            });
			
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
  <div id="header1">
                <div id="content1">
     <div class="indent">
	  <td colspan="2" align="center" class="sder" ><h3>Nuevo Pago Avance</h3></td>
  
<form id="form1" method="post" action="gpagoavance.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
  <table width="800" border="1" bordercolor="#0f56ba" align="center">
    <tr>
      <td colspan="2" align="left" id="socioavance"> N Socio      
        <?php
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
        *
        N Avance:
        <select name="c_nrodeavance" id="c_nrodeavance" class="validate[required]">
        </select>
        *<?php $consulta1=$objCliente->mostrar_pagosocios();
	 
	$numeroRegistro=mysql_num_rows ($consulta1);
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip=mysql_result($consulta1,$contador,"id");
	}
		$ndip++;
			echo"<input type='text' name='c_expediente' id='c_expediente' value='2$ndip' size='2' readonly='readonly' style='visibility:hidden' >";
	  ?></td>
      <td align="right">Nro Depósito:</td>
      <td align="left" "ndeposito">
        <input type="text" name="c_deposito" id="c_deposito" class="validate[required,custom[onlyNumberSp]] text-input" placeholder="Ejem: 453454234"/>
        *</td>
    </tr>
    <tr>
      <td width="120" align="right">Nombres</td>
      <td width="237"><input name="c_nombres" id="c_nombres" type="text" readonly="readonly" />
      </td>
      <td width="118" align="right">Fecha: </td>
      <td width="297"><input name="c_fecha" type="text" class="validate[required] fecha " id="c_fecha" size="10" readonly="readonly"/>
                       <img src="images/calendario.png" id="fdep" alt="" width="16" height="16" /><script>
    Calendar.setup({
        trigger    : "fdep",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fecha",
		onSelect   : function() { this.hide() },
    });
</script>
      *</td>
    </tr>
    <tr>
      <td align="right">Apellidos</td>
      <td>
      <input name="c_apellidos" type="text" id="c_apellidos" readonly="readonly" /></td>
      <td align="right">Banco:</td>
      <td "banco"><select name="c_banco" id="c_banco" class="validate[required]">
        <option value="">Seleccione Banco</option>
        <option value="Mercantil">Mercantil Banco Universal</option>
        <option value="Banesco">Banesco Banco Universal</option>
</select>
      *</td>
    </tr>
    <tr>
      <td align="right">Cédula</td>
      <td>
       <input name="c_cedula" type="text" id="c_cedula" readonly="readonly"/></td>
      <td align="right">Monto a Cancelar:</td>
      <td><?php 
		  $consulta2=$objCliente->mpagoavances();
		  while( $mon = mysql_fetch_array($consulta2) ){
	?>
        <input name="bmonto" type="text" id="bmonto" value="<?php echo $mon['monto']?>" readonly="readonly" size="10"/>
        <?php }?></td>
    </tr>
    <tr>
      <td align="right">Por Concepto:</td>
      <td "concepto"><textarea name="c_concepto" placeholder="Ingrese concepto o motivo" id="c_concepto" cols="20" rows="2" class="validate[required] text-input"></textarea>
      *</td>
      <td align="right">Monto</td>
      <td "monto"><input name="c_monto" type="text"  class="validate[required,funcCall[validateTest]]" placeholder="Ejem:190.80"id="c_monto" size="10" 
      onkeyup="format(this);"  maxlength="13"/>
      *</td>	
      </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
      <td colspan="2" align="right">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="4" align="right"><div align="center" class="field2">
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
  </table>
</form>
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