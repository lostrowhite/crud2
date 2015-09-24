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
<link rel="stylesheet" href="css/template.css" type="text/css"/>
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
		</script>
        
<script type="text/javascript">
    $(function() { // Equivalente a $(document).ready();
     
        $("#c_nsocio").change(function(event) {
            var nsocio = $("#c_nsocio").find(':selected').val();
            $.post('socios.php?nsocio='+nsocio,function(respuesta){
                res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_nombresoc").val(res.nombre)
				 $("#c_cedulasoc").val(res.cedula)

            });
			 $.post('vehiculos.php?nsocio='+nsocio,function(respuesta){
                res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_placa").val(res.placa)
				 $("#c_marca").val(res.marca)
				  $("#c_modelo").val(res.modelo)
				   $("#c_color").val(res.color)
				   $("#c_ano").val(res.ano)
				    $("#c_cantidad").val(res.cantptos)
					 $("#c_motor").val(res.nmotor)
					  $("#c_chasis").val(res.chasis)

            });
				$.post('avances.php?nsocio='+nsocio,function(respuesta){
                res1 = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 if(res1[1] == null){
					 $("#c_avancep").val(res1[0].navance)
				 $("#c_nomavanp").val(res1[0].nombre)
				 $("#c_cedulaavanp").val(res1[0].cedula)
				 $("#c_avances").val('')
				 $("#c_nomavans").val('')
				 $("#c_cedulaavans").val('')
					 }else{
				 $("#c_avancep").val(res1[0].navance)
				 $("#c_nomavanp").val(res1[0].nombre)
				 $("#c_cedulaavanp").val(res1[0].cedula)
				 $("#c_avances").val(res1[1].navance)
				 $("#c_nomavans").val(res1[1].nombre)
				 $("#c_cedulaavans").val(res1[1].cedula)
					 }
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
   
<form id="form1" method="post" action="gpermiso.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
  <table width="800" border="1" bordercolor="#0f56ba" align="center">
    <tr>
      <td colspan="2" align="left" id="nsocio">Socio:
      <?php
      require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocio(); ?>        
        <select name="c_nsocio" id="c_nsocio" class="validate[required]">
         <option value="">Seleccione</option>
     <?php

    while ($resultado = mysql_fetch_array($consulta)){

          echo "<option value='".$resultado['nsocio']."'>S° ".$resultado['nsocio']."</option>";

    }

?>
        </select>
        *</td>
      <td width="100" align="left">Nombre socio:</td>
      <td width="137" "nomsocio"><input name="c_nombresoc" type="text" id="c_nombresoc" size="10" readonly="readonly" />
      </td>
      <td width="95" align="left">Cédula:</td>
      <td width="129"  id="csocio">
        <input name="c_cedulasoc" type="text" id="c_cedulasoc" size="10" readonly="readonly" />
      </td>
      </tr>
    <tr>
      <td width="137">Fecha:</td>
      <td width="162" id="fechap">
        <input name="c_fecha" type="text"  id="c_fecha" size="10" readonly="readonly" class="validate[required] fecha " />
                <img src="images/calendario.png" id="fecha" alt="" width="16" height="16"  /><script>
	var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +10;
			  var tope= (anio1*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "fecha",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fecha",
		onSelect   : function() { this.hide() },
		min: tiempo,
    });
</script>
      </td>
      <td>Fecha inicial:</td>
      <td id="finicialp">
        <input name="c_fechaini" type="text" class="validate[required] fecha " id="c_fechaini" size="10" readonly="readonly"/>
                        <img src="images/calendario.png" id="fechai" alt="" width="16" height="16"  /><script>
	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +10;
			  var tope= (anio1*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "fechai",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fechaini",
		onSelect   : function() { this.hide() },
		min: tiempo,
    });
</script>
     *</td>
      <td>Fecha final:</td>
      <td id="ffinalp">
        <input name="c_fechafin" type="text" class="validate[required] fecha " text-input" id="c_fechafin" size="10" readonly="readonly"/>
                                <img src="images/calendario.png" id="fechaf" alt="" width="16" height="16"  /><script>
			 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +10;
			  var tope= (anio1*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "fechaf",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fechafin",
		onSelect   : function() { this.hide() },
		min: tiempo, 
    });
</script>
      *</td>
    </tr>
    <tr>
      <td>Avance N°:</td>
      <td "navance1">
        <input name="c_avancep" type="text" id="c_avancep" size="2" readonly="readonly" />
      </td>
      <td>Nombre:</td>
      <td "avance1">
        <input name="c_nomavanp" type="text" id="c_nomavanp" size="10" readonly="readonly" />
      </td>
      <td>Cédula:</td>
      <td "cavance1">
        <input name="c_cedulaavanp" type="text" id="c_cedulaavanp" size="10" readonly="readonly"/>
      </td>
    </tr>
    <tr>
      <td>Avance N°:</td>
      <td "navance2"><input name="c_avances" type="text" id="c_avances" size="2" readonly="readonly" /></td>
      <td>Nombre:</td>
      <td id="avance2">
        <input name="c_nomavans" type="text" id="c_nomavans" size="10" readonly="readonly" />
      </td>
      <td>Cédula:</td>
      <td "cavance2">
        <input name="c_cedulaavans" type="text" id="c_cedulaavans" size="10" readonly="readonly" />
      </td>
    </tr>
    <tr>
      <td>Dirige a:</td>
      <td colspan="5" id="dirigea">
        <input name="c_dirige" type="text" placeholder="Ejem:calle alonso, maracay"class="validate[required] text-input" id="c_dirige" size="50" />
        *</td>
      </tr>
    <tr>
      <td>Placa:</td>
      <td "placa">
        <input name="c_placa" type="text" id="c_placa" size="10" readonly="readonly" class="validate[required] text-input"  />
      </td>
      <td>Marca</td>
      <td "marca">
        <input name="c_marca" type="text" id="c_marca" size="10" readonly="readonly" class="validate[required] text-input" />
      </td>
      <td>Modelo:</td>
      <td "modelo">
        <input name="c_modelo" type="text" id="c_modelo" size="10" readonly="readonly" class="validate[required] text-input" />
      </td>
    </tr>
    <tr>
      <td>Color:</td>
      <td "color">
        <input name="c_color" type="text" id="c_color" size="10" readonly="readonly" class="validate[required] text-input" />
      </td>
      <td>Año:</td>
      <td "ano">
        <input name="c_ano" type="text" id="c_ano" size="10" readonly="readonly" class="validate[required] text-input" />
      </td>
      <td>Cantidad. ptos</td>
      <td "cpuestos">
        <input name="c_cantidad" type="text" id="c_cantidad" size="4" readonly="readonly" class="validate[required] text-input" />
      </td>
    </tr>
    <tr>
      <td>Motor N°:</td>
      <td "motorn">
        <input name="c_motor" type="text" id="c_motor" size="15" readonly="readonly" class="validate[required] text-input"/>
      </td>
      <td>Chasis:</td>
      <td "chasis">
        <input name="c_chasis" type="text" id="c_chasis" size="20" readonly="readonly" class="validate[required] text-input" />
      </td>
      <td>&nbsp;</td>
      <td id="linea">&nbsp;</td>
    </tr>
   <tr>
     <td colspan="6"><div align="center" class="field2">
       
      
       <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
       </div></td>
   </tr>
  </table>
</form>
        <br>
     
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