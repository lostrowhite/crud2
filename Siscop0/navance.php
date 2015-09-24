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
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		            
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
    $(document).ready(function(){
        $("#c_nsocio").change(function(event){
            var nsocio = $("#c_nsocio").find(':selected').val();
            $("#c_nrodeavance").load('generaavance.php?nsocio='+nsocio);
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
	
<form id="form1" method="post" action="gavance.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea registrar este avance?')){return false;}" >
  <table width="800" border="0" bordercolor="#0f56ba" align="center">
      <tr id="sizq" >
      <td align="center" colspan="2" class="sder" ><h3>Nuevo Avance</h3></td>
    </tr>
    <tr>
      <td id="nsocio">Socio Responsable<br />
        <?php
	require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocio(); ?>
       <select name="c_nsocio" class="validate[required]" id="c_nsocio">
         <option value="" selected="selected"> Seleccione el numero del Socio</option>
          <?php
    while ($resultado = mysql_fetch_array($consulta)){
       echo "<option value='".$resultado['id_s']."'>S° ".$resultado['nsocio']."</option>";
			}
?>
        </select>
       *
      </td>
      <td id="navance">Nro de Avance:<br />        
        <select name="c_nrodeavance" id="c_nrodeavance" class="validate[required]">
        </select>
        *</td>
      </tr>
    <tr>
      <td width="223" "nombre">
        Nombres<br />
        <input type="text" name="c_nombres" placeholder="Ejem: Pedro Antonio" class="validate[required,custom[onlyLetterSp]] text-input"/>
        *</td>
      <td width="257" id="contrato">
        Contrato: <br />
        <?php
	  $consulta1=$objCliente->mostrar_avances();
	 
	$numeroRegistro=mysql_num_rows ($consulta1);
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip=mysql_result($consulta1,$contador,"id_a");
	}
		$ndip++;
			echo"<input type='text' name='c_contrato' id='c_contrato' value='00$ndip' size='4' readonly='readonly'  >";
	  ?>
      </td>
    </tr>
    <tr>
      <td "apellido">
        Apellidos<br />
        <input type="text" name="c_apellidos" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Pérez Rojas" />
        </label>*</td>
      <td "beneficiario">Beneficiario: <br />
        <input type="text" name="c_beneficiario"  placeholder="Ejem: Pedro Pérez"/>
        *</td>
      </tr>
    <tr>
      <td "cedula">Cédula<br />
        <select name="c_nacionalidad" class="validate[required]" id="c_nacionalidad">
          <option value= "" selected="selected">Seleccione Nacionalidad</option>
          <option value="V">V</option>
          <option value="E">E</option>
          </select>
        <input name="c_cedula" type="text" class="validate[required, custom[number], minSize[7] required,maxSize[10]] text-input" placeholder="Ejem: 18000000" maxlength="10" onkeyup="puntitos(this,this.value.charAt(this.value.length-1))"/>
        *</td>
      <td "nlicencia">N° Licencia: <br />
        <input name="c_nlicencia" type="text" id="c_nlicencia" placeholder="Escriba N° de Licencia"class="validate[required,custom[onlyNumberSp]] text-input"/>
        *</td>
      </tr>
    <tr>
      <td id="vcedula">Vencimiento C.I:<br />
        <input name="c_vcedula" type="text" class="validate[required] fecha " id="c_vcedula" size="10" readonly="readonly"  />
        <img src="images/calendario.png" id="vced" alt="" width="16" height="16"  />
        <script>
		 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +10;
			  var tope= (anio1*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "vced",
		dateFormat: "%d-%m-%Y",
        inputField : "c_vcedula",
		onSelect   : function() { this.hide() },
		min: tiempo,
				max: tope,
    });
        </script>
        *</td>
      <td "glicencia">Grado Licencia:<br />
        <select name="c_glicencia" id="c_glicencia" class="validate[required]">
          <option value="" selected="selected">Seleccione grado de Licencia</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          </select>
        *</td>
      </tr>
    <tr>
      <td id="ingreso">Ingreso: <br />
        <input name="c_ingreso" type="text" class="validate[required] fecha " id="c_ingreso" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="fing" alt="" width="16" height="16" />
        <script>
    Calendar.setup({
		dateFormat: "%d-%m-%Y",
        trigger    : "fing",
        inputField : "c_ingreso",
		onSelect   : function() { this.hide() },
    });
        </script>
        *</td>
      <td id="vlicencia">Licencia Vence:<br />
        <input name="c_vlicencia" type="text" class="validate[required] fecha " id="c_vlicencia" size="10" readonly="readonly"/>
        <img src="images/calendario.png" id="fvlic" alt="" width="16" height="16" />
         <script>
   	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +10;
			  var tope= (anio1*100+mes)*100+dia;

    Calendar.setup({
        trigger    : "fvlic",
		dateFormat: "%d-%m-%Y",
        inputField : "c_vlicencia",
		onSelect   : function() { this.hide() },
		min: tiempo,
				max: tope,
    });
        </script>
        *</td>
      </tr>
    <tr>
      <td "telefono">
        Teléfono: <br />
        <input type="text" name="c_telefono" class="validate[required, custom[onlyNumberSp], minSize[10] required,maxSize[11]] text-input" text-input"  maxlength="13" placeholder="Ejem:02126000000" />
        *</td>
      <td "cbancaria">N° Cuenta Bancaria:<br />
        <input name="c_cuenta" type="text" size="20" placeholder="Ejem:112444545411"class="validate[required,custom[onlyNumberSp]] text-input"/>
        *</td>
      </tr>
    <tr>
      <td "celular">Celular: <br />
        <input type="text" name="c_celular" placeholder="Ejem:04100000000"  class="validate[required, custom[onlyNumberSp], minSize[10] required,maxSize[11]] text-input" text-input"  maxlength="13"  />
        *</td>
      <td "cmedico">N°Certificado Médico: <br />
        <input type="text" name="c_certificadomedico" class="validate[required,custom[onlyNumberSp]] text-input" placeholder="Ejem:989898"/>
        *</td>
      </tr>
    <tr>
      <td id="fnacimiento">F Nacimiento<br />
        <input name="c_nacimiento" type="text" class="validate[required] fecha " id="c_nacimiento" onfocus="this.blur()" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="fnac" alt="" width="16" height="16" />
      <script>
		 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) -25;
			  var minimo= (anio1*100+mes)*100+dia;
			  			var anio2 = (anio1) -62;
			  var tope= (anio2*100+mes)*100+dia;
    Calendar.setup({
        trigger    : "fnac",
		dateFormat: "%d-%m-%Y",
        inputField : "c_nacimiento",
		onSelect   : function() { this.hide() },
        min: tope,
		max: minimo,
    });
        </script>
        *</td>
      <td id="cvence">Certificado Vence:<br />
        <input name="c_vcertificadomedico" type="text"class="validate[required] fecha " id="c_vcertificadomedico" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="fvcer" alt="" width="16" height="16" />
        <script>
		 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +2;
			  var tope= (anio1*100+mes)*100+dia;
    Calendar.setup({
        trigger    : "fvcer",
		dateFormat: "%d-%m-%Y",
        inputField : "c_vcertificadomedico",
		onSelect   : function() { this.hide() },
        min: tiempo,
		max: tope,
    });
        </script>
        *</td>
      </tr>
    <tr>
      <td "sexo">Sexo: <br />
        <select name="c_sexo" class="validate[required]" >
          <option value="" selected="selected">Seleccione sexo</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
          </select>
        *</td>
      <td "gsanguineo">Grupo Sanguíneo:<br />
        <select name="c_gruposanguinieo" id="c_gruposanguinieo" class="validate[required]">
          <option value="" selected="selected">Seleccione Grupo Sanguíneo</option>
          <option value="O-">O-</option>
          <option value="O+">O+</option>
          <option value="A-">A-</option>
          <option value="A+">A+</option>
          <option value="B-">B-</option>
          <option value="B+">B+</option>
          <option value="AB-">AB-</option>
          <option value="AB+">AB+</option>
          </select>
        *</td>
      </tr>
    <tr>
      <td ="ecivil">Estado Civil:<br />
        <select name="c_estadocivil" class="validate[required]">
          <option value="" selected="selected">Seleccione estado civil</option>
          <option value="Soltero">Soltero</option>
          <option value="Casado">Casado</option>
          <option value="Divorciado">Divorciado</option>
          <option value="Viudo">Viudo</option>
          </select>
        *</td>
      <td "correo">Correo:<br />
        <input name="c_correo" type="text" placeholder="Escriba Correo" size="20"class="validate[required,custom[email]] text-input" />
        *</td>
      </tr>
    <tr>
      <td "cfamiliar">Carga Familiar:<br />
        <select name="c_cfamiliar" id="c_cfamiliar" class="validate[required]">
          <option value="" selected="selected">Seleccione carga familiar</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          </select>
        *</td>
      <td id="correo">&nbsp;</td>
      </tr>
    <tr>
      <td id="direccion">Dirección:<br />
        <textarea class="validate[required] text-input"name="c_direccion" rows="2" cols="40" placeholder="Ejem: Dirección donde habita "></textarea></td>
      <td id="historia">Historia:<br />
        <textarea name="c_historia" rows="2" cols="40" placeholder="Breve historia trabajos anteriores"> </textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr id="izq">
      <td id="der" colspan="2"><div align="center" class="field2">
           <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
      </tr>
  </table>
</form>

        <p align="center">&nbsp;</p>  
     
  </div>
    </div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>