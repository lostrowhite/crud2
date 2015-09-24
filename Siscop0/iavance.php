<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
}else{
if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_avances($_GET['id']);
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
<body id="page6" onload="impresion()">
<div id="main">
<!-- HEADER -->
  <div id="header1">
		<div class="row-1">
			<div align="center"><a href="index.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></div>
	</div>
    <header id="titulo">

        <h3>Ficha Informativa de Avances</h3>
    </header>
	<form id="form1" method="post" action="acsocio.php" >
	  <table width="894" border="1" align="center">
	    <tr>
	      <td align="right" colspan="2"><input type="hidden" name="avance_id" id="avance_id" value="<?php echo $cliente['id']?>" />
	        NSocio Responsable
	        <input name="c_nsocio" type="text" id="c_nsocio" value="<?php echo $cliente['nsocio']?>" size="3" readonly="readonly" readonlyc_codigo="c_codigo" /></td>
	      <td colspan="2" align="left"> Nro de Avance:
	        <input name="c_nrodeavance" type="text" id="c_nrodeavance" value="<?php echo $cliente['navance']?>" size="3" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Nombres</td>
	      <td><input name="c_nombres" type="text" value="<?php echo $cliente['nombre']?>" readonly="readonly" /></td>
	      <td>Contrato: </td>
	      <td><input name="c_contrato" type="text" value="<?php echo $cliente['contrato']?>" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Apellidos</td>
	      <td><input name="c_apellidos" type="text" onfocus="this.blur()" value="<?php echo $cliente['apellido']?>" readonly="readonly" /></td>
	      <td>Beneficiario: </td>
	      <td><input name="c_beneficiario" type="text" value="<?php echo $cliente['beneficiario']?>" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Cédula</td>
	      <td><select name="c_nacionalidad" id="c_nacionalidad" disabled="disabled">
	        <option value="<?php echo $cliente['nacionalidad']?>"><?php echo $cliente['nacionalidad']?></option>
	        <?php
	  	if($cliente['nacionalidad']=="V"){
			echo'<option value="E">E</option>';
		}elseif($cliente['nacionalidad']=="E"){
			echo'<option value="V">V</option>';
			}
		?>
	        </select>
	        <input name="c_cedula" type="text" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $cliente['cedula']?>" size="8" maxlength="8" readonly="readonly"/></td>
	      <td>N° Licencia: </td>
	      <td><input name="c_nlicencia" type="text" id="c_nlicencia" value="<?php echo $cliente['nlic']?>" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Vencimiento C.I: </td>
	      <td><input name="c_vcedula" type="text" class="validate[required,custom[date]] text-input" value="<?php echo $cliente['venci']?>" id="c_vcedula" size="10" readonly="readonly" />
	        <img src="images/calendario.png" id="vced" alt="" width="16" height="16"  />
	        <script>
	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "vced",
        inputField : "c_vcedula",
		min:tiempo,
    });
        </script></td>
	      <td>Grado:</td>
	      <td><input name="c_glicencia" type="text" id="c_glicencia" value="<?php echo $cliente['grado']?>" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Ingreso: </td>
	      <td><input name="c_ingreso" type="text" class="validate[required,custom[date]] text-input" id="c_ingreso" value="<?php echo $cliente['ingreso']?>" size="10" readonly="readonly" />
	        <img src="images/calendario.png" id="fing" alt="" width="16" height="16" />
	        <script>
    Calendar.setup({
        trigger    : "fing",
        inputField : "c_ingreso",
    });
        </script></td>
	      <td>Vence:</td>
	      <td><input name="c_vlicencia" type="text" class="validate[required,custom[date]] text-input" id="c_vlicencia" size="10" readonly="readonly" value="<?php echo $cliente['vence']?>"/>
	        <img src="images/calendario.png" id="fvlic" alt="" width="16" height="16" />
	        <script>
   	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
    Calendar.setup({
        trigger    : "fvlic",
        inputField : "c_vlicencia",
		min: tiempo,
    });
        </script></td>
        </tr>
	    <tr>
	      <td>Teléfono: </td>
	      <td><input name="c_telefono" type="text" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $cliente['tlf']?>" readonly="readonly" /></td>
	      <td>Cuenta: </td>
	      <td><input name="c_cuenta" type="text" value="<?php echo $cliente['cuenta']?>" size="30" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Celular: </td>
	      <td><input name="c_celular" type="text" value="<?php echo $cliente['celular']?>" readonly="readonly" /></td>
	      <td>Certificado Médico: </td>
	      <td><input name="c_certificadomedico" type="text" value="<?php echo $cliente['certmed']?>" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>F Nacimiento</td>
	      <td><input name="c_nacimiento" type="text" class="validate[required,custom[date]] text-input" id="c_nacimiento" onfocus="this.blur()" size="10" readonly="readonly" value="<?php echo $cliente['nacimiento']?>" />
	        <img src="images/calendario.png" id="fnac" alt="" width="16" height="16" />
	        <script>
    Calendar.setup({
        trigger    : "fnac",
        inputField : "c_nacimiento",
		min: 19200101,
        max: 19881231
    });
        </script></td>
	      <td>Certificado Vence:</td>
	      <td><input name="c_vcertificadomedico" type="text" class="validate[required,custom[date]] text-input" id="c_vcertificadomedico" onfocus="this.blur()" size="10" readonly="readonly" value="<?php echo $cliente['certmedven']?>" />
	        <img src="images/calendario.png" id="fvcer" alt="" width="16" height="16" />
	        <script>
		   	 var fecha = new Date();
              var anio = fecha.getYear();
              var mes = fecha.getMonth();
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
    Calendar.setup({
        trigger    : "fvcer",
        inputField : "c_vcertificadomedico",
		min: tiempo,
    });
        </script></td>
        </tr>
	    <tr>
	      <td>Sexo: </td>
	      <td><select name="c_sexo" disabled="disabled">
	        <option value="<?php echo $cliente['sexo']?>"><?php echo $cliente['sexo']?></option>
	        <?php
	  	if($cliente['sexo']=="Femenino"){
			echo'<option value="Masculino">Masculino</option>';
		}elseif($cliente['sexo']=="Masculino"){
			echo'<option value="Femenino">Femenino</option>';
			}
		?>
	        </select></td>
	      <td>Grupo Sanguíneo: </td>
	      <td><input name="c_gruposanguinieo" type="text" value="<?php echo $cliente['gruposang']?>" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Estado Civil:</td>
	      <td><select name="c_estadocivil" disabled="disabled">
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
	        </select></td>
	      <td>Correo:</td>
	      <td><input name="c_correo" type="text" id="c_correo" value="<?php echo $cliente['correo']?>" size="30" readonly="readonly" /></td>
        </tr>
	    <tr>
	      <td>Carga Familiar:</td>
	      <td><input name="c_cfamiliar" type="text" id="c_cfamiliar" value="<?php echo $cliente['cargafam']?>" readonly="readonly" /></td>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
        </tr>
	    <tr>
	      <td colspan="2">Dirección:</td>
	      <td colspan="2"><textarea name="c_direccion" cols="40" rows="2" readonly="readonly" id="c_direccion"><?php echo $cliente['direccion']?></textarea></td>
        </tr>
	    <tr>
	      <td colspan="2">Historia:</td>
	      <td colspan="2"><textarea name="c_historia" cols="40" rows="2" readonly="readonly" id="c_historia"><?php echo $cliente['historia']?></textarea></td>
        </tr>
      </table>
	</form>
</div>
 <footer>
 <?php
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
?>
    </footer>
        <br>
        <p align="center"> <?php }}?></p>  
</div>
<!-- CONTENT --><!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>