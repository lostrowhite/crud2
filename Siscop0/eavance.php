<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
}else{
if(isset($_GET['id_a'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_avances($_GET['id_a']);
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
<link rel="stylesheet" href="css/template.css" type="text/css"/>
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
<form id="form1" method="post" action="acavance.php" onSubmit="if(!confirm('Esta seguro que desea editar este avance?')){return false;}" >

  <table width="894" border="1" bordercolor="#0f56ba" align="center">
    <tr>
    <?php
    $consulta2 = $objCliente->muestra_nsocio($cliente['id_s']);
		$cliente2 = mysql_fetch_array($consulta2);
		?>
      <td colspan="2" align="right" id="nsocio"> <input type="hidden" name="avance_id" id="avance_id" value="<?php echo $cliente['id_a']?>" />NSocio Responsable
        <input name="c_nsocio" type="text" id="c_nsocio" value="<?php echo $cliente2['nsocio']?>" size="3" readonly="readonly" readonlyc_codigo="c_codigo" /></td>
      <td colspan="2" align="left" id="navance">
        Nro de Avance:
        <input name="c_nrodeavance" type="text" id="c_nrodeavance" value="<?php echo $cliente['navance']?>" size="3" readonly="readonly" /></td>
    </tr>
    <tr>
      <td width="267">Nombres</td>
      <td width="204" id="nombre"><input name="c_nombres" type="text" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Pedro Antonio" value="<?php echo $cliente['nombre']?>" />
      *</td>
      <td width="143">Contrato: </td>
      <td width="252" id="contrato"><input name="c_contrato" type="text" value="<?php echo $cliente['contrato']?>" readonly="readonly" />
      *</td>
    </tr>
    <tr>
      <td>Apellidos</td>
      <td id="apellido"><input name="c_apellidos" type="text" id="apellido" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Pérez Rojas" value=<?php echo $cliente['apellido']?> />
      *</td>
      <td>Beneficiario: </td>
      <td id="beneficiario"><input name="c_beneficiario"  value="<?php echo $cliente['beneficiario']?>" />
      *</td>
    </tr>
    <tr>
      <td>Cédula</td>
      <td id="cedula"><select name="c_nacionalidad" id="c_nacionalidad">
        <option value="<?php echo $cliente['nacionalidad']?>"><?php echo $cliente['nacionalidad']?></option>
        <?php
	  	if($cliente['nacionalidad']=="V"){
			echo'<option value="E">E</option>';
		}elseif($cliente['nacionalidad']=="E"){
			echo'<option value="V">V</option>';
			}
		?>
      </select>
      *
        <input name="c_cedula" type="text" class="validate[required, custom[onlyNumberSp], minSize[7] required,maxSize[8]]" placeholder="Ejem: 18000000" value="<?php echo $cliente['cedula']?>"/>
        *</td>
      <td>N° Licencia: </td>
      <td id="nlicencia"><input name="c_nlicencia" type="text" id="c_nlicencia" value="<?php echo $cliente['nlic']?>" class="validate[required,custom[onlyNumberSp]] text-input"/>
      *</td>
    </tr>
    <tr>
      <td>Vencimiento C.I: </td>
      <td id="cvencimiento"><input name="c_vcedula" type="text" class="validate[required] fecha " value="<?php echo $cliente['venci']?>" id="c_vcedula" size="10" readonly="readonly" />
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
        </script>*</td>
      <td>Grado:</td>
      <td id="glicencia"><input name="c_glicencia" type="text" id="c_glicencia" value="<?php echo $cliente['grado']?>" class="validate[required,minSize[1] required,maxSize[1]],custom[onlyNumberSp] text-input" />
      *</td>
    </tr>
    <tr>
      <td>Ingreso: </td>
      <td id="ingreso"><input name="c_ingreso" type="text" class="validate[required] fecha " id="c_ingreso" value="<?php echo $cliente['ingreso']?>" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="fing" alt="" width="16" height="16" />
        <script>
    Calendar.setup({
        trigger    : "fing",
        inputField : "c_ingreso",
		dateFormat: "%d-%m-%Y",
		onSelect   : function() { this.hide() },
    });
      </script>*</td>
      <td>Licencia Vence:</td>
      <td id="vlicencia"><input name="c_vlicencia" type="text" class="validate[required] fecha " id="c_vlicencia" size="10" readonly="readonly" value="<?php echo $cliente['vence']?>"/>
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
        </script>*</td>
    </tr>
    <tr>
      <td>Teléfono: </td>
      <td id="telefono"><input type="text" name="c_telefono" class="validate[required, custom[onlyNumberSp], minSize[10] required,maxSize[11]] text-input" placeholder="Ejem:02126000000" value="<?php echo $cliente['tlf']?>" />
      *</td>
      <td>Cuenta: </td>
      <td id="cbancaria"><input name="c_cuenta" type="text" value="<?php echo $cliente['cuenta']?>" size="30" class="validate[required,custom[onlyNumberSp]] text-input"/>
      *</td>
    </tr>
    <tr>
      <td>Celular: </td>
      <td id="celular"><input name="c_celular" type="text" class="validate[required, custom[onlyNumberSp], minSize[10] required,maxSize[11]] text-input" placeholder="Ejem:04100000000" value="<?php echo $cliente['celular']?>" />
      *</td>
      <td>Certificado Médico: </td>
      <td id="cmedico"><input name="c_certificadomedico" type="text" value="<?php echo $cliente['certmed']?>" class="validate[required,custom[onlyNumberSp]] text-input"/>
      *</td>
    </tr>
    <tr>
      <td>F Nacimiento</td>
      <td id="fnacimiento"><input name="c_nacimiento" type="text" class="validate[required] fecha " id="c_nacimiento" onfocus="this.blur()" size="10" readonly="readonly" value="<?php echo $cliente['nacimiento']?>" />
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
        </script>*</td>
      <td>Certificado Vence:</td>
      <td id="cvence"><input name="c_vcertificadomedico" type="text" class="validate[required] fecha " id="c_vcertificadomedico" onfocus="this.blur()" size="10" readonly="readonly" value="<?php echo $cliente['certmedven']?>" />
        <img src="images/calendario.png" id="fvcer" alt="" width="16" height="16" />
        *<script>
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
        </script></td>
    </tr>
    <tr>
      <td>Sexo: </td>
      <td ><select name="c_sexo" class="validate[required]" >
        <option value="<?php echo $cliente['sexo']?>"><?php echo $cliente['sexo']?></option>
        <?php
	  	if($cliente['sexo']=="Femenino"){
			echo'<option value="Masculino">Masculino</option>';
		}elseif($cliente['sexo']=="Masculino"){
			echo'<option value="Femenino">Femenino</option>';
			}
		?>
        
      </select>
      *</td>
      <td>Grupo Sanguíneo: </td>
      <td id="gsanguineo"><input name="c_gruposanguinieo" type="text" value="<?php echo $cliente['gruposang']?>" readonly="readonly" />
      *</td>
    </tr>
    <tr>
      <td>Estado Civil:</td>
      <td id="ecivil"><select name="c_estadocivil" class="validate[required]">
        <option value="<?php echo $cliente['edocivil']?>"><?php echo $cliente['edocivil']?></option>
        <?php
	  	if($cliente['edocivil']=="Soltero"){
			echo'<option value="Casado">Casado</option>';
			echo'<option value="Divorciado">Divorciado</option>';
			echo'<option value="Viudo">Viudo</option>';
		}elseif($cliente['edocivil']=="Casado"){
			echo'<option value="Soltero">Soltero</option>';
			echo'<option value="Divorciado">Divorciado</option>';
			echo'<option value="Viudo">Viudo</option>';
		}elseif($cliente['edocivil']=="Divorciado"){
			echo'<option value="Soltero">Soltero</option>';
			echo'<option value="Casado">Casado</option>';
			echo'<option value="Viudo">Viudo</option>';
		}elseif($cliente['edocivil']=="Viudo"){
			echo'<option value="Soltero">Soltero</option>';
			echo'<option value="Casado">Casado</option>';
			echo'<option value="Divorciado">Divorciado</option>';
			}
		?>
      </select>
      *</td>
      <td>Correo:</td>
      <td id="correo"><input name="c_correo" type="text" id="c_correo" class="validate[required,custom[email]] text-input" value="<?php echo $cliente['correo']?>" size="30" />
      *</td>
    </tr>
    <tr>
      <td>Carga Familiar:</td>
      <td id="cfamiliar"><input name="c_cfamiliar" type="text" id="c_cfamiliar" value="<?php echo $cliente['cargafam']?>" readonly="readonly" />
      *</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Dirección:</td>
      <td colspan="2" id="direccion"><textarea class="validate[required] text-input" name="c_direccion" cols="40" rows="2" id="c_direccion" placeholder="Ejem: Dirección donde habita "><?php echo $cliente['direccion']?></textarea>
      *</td>
    </tr>
    <tr>
      <td colspan="2">Historia:</td>
      <td colspan="2" id="historia"><textarea name="c_historia" cols="40" rows="2" id="c_historia"  placeholder="Breve historia trabajos anteriores"><?php echo $cliente['historia']?></textarea>
      *</td>
    </tr>
    <tr>
      <td align="center" colspan="4"><div align="center" class="field2">
           <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
</table>
</form>
</div>
<?php }}?>   
  </div>
  </div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>