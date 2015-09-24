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
            if($("#c_monto").val() != $("#bmonto").val())
                return "El monto de el pago debe ser igual al de la finanza";
        }
		
	 function validatePago(field, rules, i, options) {
            if($("#c_monto").val() != $("#bmonto").val())
                return "El monto de el pago debe ser igual al de la finanza";
        }

		   $(function() { // Equivalente a $(document).ready();
     
        $("#c_nsocio").change(function(event) {
            var nsocio = $("#c_nsocio").find(':selected').val();
            $.post('socios.php?&nsocio='+nsocio,function(respuesta){
			     res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_nombres").val(res.nombre)
				 $("#c_apellidos").val(res.apellido)
				 $("#c_cedula").val(res.cedula)
            });
$.post('revpagosocio.php?&nsocio='+nsocio,function(respuesta1){// Convertimos nuestra cadena en un objeto JSON
var months = new Array(12);
months[0] = "Enero";
months[1] = "Febrero";
months[2] = "Marzo";
months[3] = "Abril";
months[4] = "Mayo";
months[5] = "Junio";
months[6] = "Julio";
months[7] = "Agosto";
months[8] = "Septiembre";
months[9] = "Octubre";
months[10] = "Noviembre";
months[11] = "Deciembre";

var fech = new Date();
var mesac = fech.getMonth()+1;
var anoac = fech.getFullYear();

var mes = parseInt(respuesta1)-1;
$("#mesa").val(months[mes]);
$("#anoa").val(anoac);
if (mesac < respuesta1){
	$("#anoa").val(anoac-1);
	}
if (mesac == respuesta1){
alert("Disculpe! este socio ya se encuentra al dia en los pagos")
document.location=('paneln.php');
	}else
{
var pago = mes +1;	
$("#mesa").val(months[pago]);
	}
if (respuesta1 == 12){
	var mes1 = parseInt(respuesta1)-12;
	$("#mesa").val(months[mes1]);
	$("#anoa").val(anoac);
	}
if (respuesta1 ==0){
	$("#mesa").val(months[0]);
	$("#anoa").val(anoac);
	}
            });
        });
    });
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
    </header>
    <td colspan="2" align="center" class="sder" ><h3>Nuevo Pago Socio</h3></td>
<form id="form1" method="post" action="gpagosocio.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
  <table width="800" border="1" bordercolor="#0f56ba" align="center">
    <tr>
      <td align="right"> N Socio      
        <?php
      require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocio(); ?></td>
      <td align="left" id="nsocio"><select name="c_nsocio" id="c_nsocio" class="validate[required]">
        <option value="" selected="selected">Seleccione</option>
        <?php

    while ($resultado = mysql_fetch_array($consulta)){

          echo "<option value='".$resultado['nsocio']."'>S° ".$resultado['nsocio']."</option>";

    }

?>
      </select>
      *
      <?php
	  $consulta1=$objCliente->mostrar_pagosocios();
	 
	$numeroRegistro=mysql_num_rows ($consulta1);
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip=mysql_result($consulta1,$contador,"id");
	}
		$ndip++;
			echo"<input type='text' name='c_expediente' id='c_expediente' value='1$ndip' size='2' readonly='readonly' style='visibility:hidden' >";
	  ?></td>
      <td align="right">Nro Depósito:</td>
      <td align="left" "ndeposito">
        <input type="text" placeholder="Ejem:76543423423"name="c_deposito" id="c_deposito" class="validate[required,custom[onlyNumberSp]] text-input" />
        *</td>
    </tr>
    <tr>
      <td width="96" align="right">Nombres</td>
      <td width="260"><input name="c_nombres" type="text" id="c_nombres" readonly="readonly" />
      </td>
      <td width="122" align="right">Fecha: </td>
      <td width="294"><input name="c_fecha" type="text"  id="c_fecha" size="10" readonly="readonly" class="validate[required] fecha "/>
                 <img src="images/calendario.png" id="fdep" alt="" width="16" height="16" /><script>
    Calendar.setup({
        trigger    : "fdep",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fecha",
		onSelect   : function() { this.hide() },
    });
</script>
              *<br /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">Mes:</td>
      <td><input name="mesa" type="text" id="mesa" size="10" readonly="readonly" />
Año:
<input name='anoa' type='text' id='anoa' size='6' readonly='readonly' /></td>
    </tr>
    <tr>
      <td align="right">Apellidos</td>
      <td>
      <input name="c_apellidos" type="text" id="c_apellidos" readonly="readonly" /></td>
      <td align="right">Banco:</td>
      <td align="left" id="banco"><select name="c_banco" id="c_banco" class="validate[required]" >
        <option value="" selected="selected">Seleccione</option>
        <option value="Mercantil">Mercantil Banco Universal</option>
        <option value="Banesco">Banesco Banco Universal</option>
</select>
      *</td>
    </tr>
    <tr>
      <td align="right">Cédula</td>
      <td>
       <input name="c_cedula" type="text"  id="c_cedula" readonly="readonly"/></td>
      <td align="right">Monto a cancelar:</td>
      <td>  	  <?php 
		  $consulta2=$objCliente->mpagos();
		  while( $mon = mysql_fetch_array($consulta2) ){
	?>
    <input name="bmonto" type="text" id="bmonto" value="<?php echo $mon['montoc']?>" readonly="readonly" size="6"/>
    Fecha de Cierre:
    <input name="bmonto" type="text" id="bmonto" value="<?php echo $mon['fecha']?>" readonly="readonly" size="10"/>
    <?php }?></td>
    </tr>
    <tr>
      <td align="right" id="concepto">Por Concepto:        </td>
      <td><textarea placeholder="Ejem: Pago de meses......" name="c_concepto" id="c_concepto" cols="20" rows="2" class="validate[required] "></textarea>
      *</td>
      <td align="right">Monto</td>
      <td id="monto"><input name="c_monto" type="text"  class="validate[required,funcCall[validateTest]]" id="c_monto" size="10"/>
      *</td>
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