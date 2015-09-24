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
			jQuery("#form1").validationEngine();
		});
		   $(function() { // Equivalente a $(document).ready();
     
        $("#c_nsocio").change(function(event) {
            var nsocio = $("#c_nsocio").find(':selected').val();
			$.post('vehiculos.php?nsocio='+nsocio,function(respuesta){
				res1 = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				if(res1.nombres !=''){
					alert('Disculpe, este socio ya tiene un vehiculo asignado!\nSera redireccionado al menu principal');
					document.location=('paneln.php')
					}								
            });
            $.post('socios.php?nsocio='+nsocio,function(respuesta){
			res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
				 $("#c_nombres").val(res.nombre)
				 $("#c_apellidos").val(res.apellido)
				 $("#c_cedula").val(res.cedula)

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
	<form id="form1" method="post" action="gvehiculo.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
<table width="741" border="0" align="center">
      <tr id="sizq" >
        <td align="center" class="sder" colspan="2" ><h3>Nuevo Vehículo</h3></td>
      </tr>
    <tr>
      <td colspan="2" align="center" id="nsocio"> Socio Responsable:
        <?php
      require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocio(); ?>
        <select name="c_nsocio" class="validate[required]" id="c_nsocio">
          <option value="" selected="selected">Seleccione</option>
          <?php

    while ($resultado = mysql_fetch_array($consulta)){
  echo "<option value='".$resultado['id_s']."'>S° ".$resultado['nsocio']."</option>";

    }

?>
        </select>
        *</td>
      </tr>
    <tr>
      <td width="387" "nombre">
        Nombres<br />
        <input name="c_nombres" type="text" id="c_nombres" readonly="readonly" /> 
        *
      </td>
      <td width="344" id="ano">A&ntilde;o:<br />
        <input name="c_ano" type="text" id="c_ano" size="10" placeholder="Ej:2005" class="validate[required, custom[onlyNumberSp], minSize[4] required,maxSize[4]] text-input" />

      *</td>
    </tr>
    <tr>
      <td "apellido">
        Apellidos<br />
        <input name="c_apellidos" type="text" id="c_apellidos" readonly="readonly"/> 
        *</td>
      <td "cpuestos">Cant.Ptos.:<br />        
        <input type="text" name="c_cpuestos" size="4" placeholder="Ej:32" class="validate[required,custom[integer],min[10],max[50]] text-input"/> 
        *</td>
    </tr>
    <tr>
      <td>
        Cédula<br />
        <input name="c_cedula" type="text" id="c_cedula"  readonly="readonly" /> 
        *</td>
      <td "motorn">Motor N: <br />        
        <input type="text" placeholder="Ejem:xixixixixix" class="validate[required]" name="c_motor" id="c_motor" /> 
        *</td>
    </tr>
    <tr>
      <td "placa">Placa: <br />        
        <input type="text" placeholder="Ejem:XIV454" class="validate[required,minSize[6] required,maxSize[7]] text-input" name="c_placa" id="c_placa" /> 
        *</td>
      <td "chasis">Chasis N: <br />        
        <input type="text" placeholder="Ejem:VIMSOKD2863" class="validate[required]" name="c_chasis" id="c_chasis" /> 
        *</td>
    </tr>
    <tr>
      <td "marca">Marca:<br />        
        <input type="text"  placeholder="Ejem:encava" class="validate[required]" name="c_marca" id="c_marca" /> 
        *</td>
      <td "combustible">Combustible: <br />
   
        <select name="c_combustible" id="c_combustible" class="validate[required]">
      <option value="" selected="selected">Seleccione</option>
  <?php
		$conexion = mysql_connect ("localhost", "root","") or
		die ("Problemas en la conexion");

		mysql_select_db ("exten",$conexion)or
		die ("Problemas en la seleccion de la base de datos");

		$registro = mysql_query ("select id, Tipo from combustible", $conexion) or
		die ("Problemas en el select: ".mysql_error());

		while ($reg=mysql_fetch_array($registro))
		{
  				echo "<option value=\"$reg[Tipo]\">$reg[Tipo]</option>";
		}		
?>	
        </select> 
        *</td>
    </tr>
    <tr>
      <td "modelo">Modelo: <br />        
        <input type="text"  placeholder="Ejem:E-NT610" class="validate[required]" name="c_modelo" id="c_modelo" /> 
        *</td>
      <td id="ruta">Estado:<br />
        <select name="estado" class="validate[required]" id="estado">
          <option value="" selected="selected">Seleccione</option>
          <option value="0">Servicio</option>
          <option value="2">Inactivo</option>
        </select>
*</td>
    </tr>
    <tr>
      <td "color">Color:<br />        
        <input type="text" name="c_color" placeholder="Ejem:Blanca" class="validate[required]" id="c_color" /> 
        *</td>
      <td id="tseguro">
        Tipo de Seguro:<br />
        <select name="c_tseguro" id="c_tseguro" class="validate[required]">
          <option value="" selected="selected">Seleccione</option>
          <option value="RCV">RCV</option>
          <option value="CASCO">CASCO</option>
          <option value="TODO RIESGO">TODO RIESGO</option>
          </select> 
        *
      </td>
    </tr>
    <tr>
      <td id="cdesde">Cobertura Desde:<br />
        <input name="c_iniciocobertura" type="text" class="validate[required] fecha" id="c_iniciocobertura" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="desde" alt="" width="16" height="16" /><script>
   	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) -1;
			  var tope= (anio1*100+mes)*100+dia;

    Calendar.setup({
        trigger    : "desde",
		dateFormat: "%d-%m-%Y",
        inputField : "c_iniciocobertura",
		onSelect   : function() { this.hide() },
		min: tope,
				max: tiempo,
    });
        </script> *</td>
      <td id="chasta">Cobertura Hasta: <br />
        <input name="c_finalcobertura" type="text"class="validate[required] fecha" id="c_finalcobertura" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="hasta" alt="" width="16" height="16" /><script>
   	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +1;
			  var tope= (anio1*100+mes)*100+dia;

    Calendar.setup({
        trigger    : "hasta",
		dateFormat: "%d-%m-%Y",
        inputField : "c_finalcobertura",
		onSelect   : function() { this.hide() },
		min: tiempo,
				max: tope,
    });
        </script>
      *</td>
      </tr>
    <tr>
      <td "caseguradora">Cia Aseguradora: <br />        
        <input name="c_ciaseguradora"  id="c_ciaseguradora" placeholder="Ejem:Seguros rápido" /> 
        *</td>
      <td id="estadov">Nº Póliza: <br />
        <input name="c_poliza"  id="c_poliza" placeholder="Ejem:545215" />
*</td>
      </tr>
    <tr>
      <td id="obs" colspan="2" align="center">Observaciones<br />        
        <textarea  name= "c_obs" rows="4" cols="40"></textarea></td>
      </tr>
   <tr id="izq">
     <td id="der" colspan="2"><div align="center" class="field2">
       <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
       </div></td>
   </tr>
  </table>
</form>             
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