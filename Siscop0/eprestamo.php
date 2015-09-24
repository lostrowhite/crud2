<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
}else{
if(isset($_GET['id'])){
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->pagar_prestamo($_GET['id']);
		$cliente = mysql_fetch_array($consulta);
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
            if($("#c_monto").val() != $("#c_pago").val())
                return "El monto de el pago debe ser igual al del prestamo";
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
	<form id="form1" method="post" action="acprestamo.php" onSubmit="if(!confirm('Esta seguro que desea registrar esta pago?')){return false;}" >
  <table width="500" border="1" align="center">
    <tr>
      <td width="220">Nro de socio: </td>
      <td width="264">
        <input type="hidden" name="id_prestamo" id="id_prestamo" value="<?php echo $cliente['id']?>" />
        <input name="c_nsocio" type="text" id="c_nsocio" value="<?php echo $cliente['nsocio']?>" size="4" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Nombre socio:</td>
      <td><input name="c_nombre" type="text" id="c_nombre" value="<?php echo $cliente['nombre']?>" size="15" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Nro Cédula:</td>
      <td><input name="c_cedula" type="text" id="c_cedula" value="<?php echo $cliente['cedula']?>" size="12" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Fecha:</td>
      <td><input name="c_fecha" type="text" class="validate[required,custom[date]] text-input" id="c_fecha" value="<?php echo $cliente['fecha']?>" size="10" readonly="readonly"/>        <script>
    Calendar.setup({
        trigger    : "fechap",
        inputField : "c_fecha",
    });
</script></td>
    </tr>
    <tr>
      <td>Monto del Préstamo:</td>
      <td id="monto"><input name="c_monto" type="text" placeholder="Solo Bf." class="validate[required,funcCall[validateTest]]" id="c_monto" size="10"/>
      *</td>
    </tr>
    <tr>
      <td>Monto:</td>
      <td><input name="c_pago" type="text" class="validate[required,custom[onlyNumberSp]] text-input" id="c_pago" value="<?php echo $cliente['monto']?>" size="10" readonly="readonly"/></td>
    </tr>
    <tr>
      <td>Por Concepto:</td>
      <td id="concepto"><textarea name="c_concepto" readonly="readonly" class="validate[required] text-input" id="c_concepto"><?php echo $cliente['concepto']?></textarea>
      *</td>
    </tr>
   <tr>
      <td colspan="2" ><div align="center" class="field2">
       <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
       </div></td>
    </tr>
  </table>
</form>  
 <?php }} ?>
  </div>
    </div>
<!-- FOOTER -->
</div>
</body>
</html>