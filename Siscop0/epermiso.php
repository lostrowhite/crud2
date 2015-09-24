<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
}else{
if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_permiso($_GET['id']);
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
<form id="form1" method="post" action="acpermiso.php" onSubmit="if(!confirm('Esta seguro que desea editar este permiso?')){return false;}">
  <table width="715" border="1" bordercolor="#0f56ba" align="center">
    <tr>
    <?php 
	$consulta2 = $objCliente->muestra_nsocio($cliente['id_s']);
	$cliente2 = mysql_fetch_array($consulta2);
	
	?>
      <td colspan="2" align="left">Socio:<input type="hidden" name="permisos_id" id="permisos_id" value="<?php echo $cliente['id']?>" />
      <input name="c_nsocio" type="text" id="c_nsocio"  value="<?php echo $cliente2['nsocio']?>" size="3" readonly="readonly" />
      </td>
      <td width="94" align="left">Nombre socio:</td>
      <td width="132">
        <input name="c_nombresoc" type="text" id="c_nombresoc" value="<?php echo $cliente2['nombre']?>" size="10" readonly="readonly" />
      </label></td>
      <td width="94" align="left">Cédula:</td>
      <td width="128" ><label for="c_cedulasoc">
        <input name="c_cedulasoc" type="text" id="c_cedulasoc" value="<?php echo $cliente2['cedula']?>" size="10" readonly="readonly" />
      </label></td>
    </tr>
    <tr>
      <td width="87" height="61">Fecha:</td>
      <td width="140"><input name="c_fecha" type="text" class="validate[required] fecha " id="c_fecha" value="<?php echo date('d-m-Y',strtotime($cliente['fecha']))?>" size="10" readonly="readonly" />        </label>
        </td>
      <td>Fecha inicial:</td>
      <td><input name="c_fechaini" type="text" class="validate[required] fecha " id="c_fechaini" value="<?php echo date('d-m-Y',strtotime($cliente['fechaini']))?>" size="10" readonly="readonly"/>        </label>
        <img src="images/calendario.png" id="fechaini" alt="" width="16" height="16"  />
 
        <script>
	Calendar.setup({
        trigger    : "fechaini",
        inputField : "c_fechaini",
		dateFormat: "%d-%m-%Y",
		onSelect   : function() { this.hide() }, 	
    });
</script>
        *</td>
      <td>Fecha final:</td>
      <td><input name="c_fechafin" type="text" class="validate[required] fecha " id="c_fechafin" value="<?php echo date('d-m-Y',strtotime($cliente['fechafin']))?>" size="10" readonly="readonly"/>        </label>
        <img src="images/calendario.png" id="fechafin" alt="" width="16" height="16"  />
        <script>
	Calendar.setup({
        trigger    : "fechafin",
        inputField : "c_fechafin",
		dateFormat: "%d-%m-%Y",
		onSelect   : function() { this.hide() },
    });
</script>
        *</td>
    </tr>
    <tr>
      <td>Avance 1:</td>
      <td><input name="c_avancep" type="text" id="c_avancep" value="<?php echo $cliente['avance1']?>" size="3" readonly="readonly" />
        </label></td>
      <td>Nombre:</td>
      <td><input name="c_nomavanp" type="text"  id="c_nomavanp" value="<?php echo $cliente['nombreavanp']?>" size="10" readonly="readonly"/>
        </label></td>
      <td>Cédula:</td>
      <td><input name="c_cedulaavanp" type="text" value="<?php echo $cliente['cedulaavanp']?>" size="10" readonly="readonly"/>
        </label></td>
    </tr>
    <tr>
      <td>Avance 2:</td>
      <td><input name="c_avances" type="text"  id="c_avances" value="<?php echo $cliente['avance2']?>" size="10" readonly="readonly"/></td>
      <td>Nombre:</td>
      <td><input name="c_nomavans" type="text" id="c_nomavans" value="<?php echo $cliente['nombreavans']?>" size="10" readonly="readonly" />
        </label></td>
      <td>Cédula:</td>
      <td><input name="c_cedulaavans" type="text"  id="c_cedulaavans" value="<?php echo $cliente['cedulaavans']?>" size="10" readonly="readonly"/>
        </label></td>
    </tr>
    <tr>
      <td>Dirige a:</td>
      <td colspan="5" id="dirigea">
        <input name="c_dirige" type="text" placeholder="Ejem:calle alonso, maracay" class="validate[required] text-input" id="c_dirige" value="<?php echo $cliente['dirige']?>" size="50" />
        *
      </td>
    </tr>
    <tr>
      <td>Placa:</td>
      <td><input name="c_placa" type="text" id="c_placa" value="<?php echo $cliente['placa']?>" size="10" readonly="readonly" />
        </label></td>
      <td>Marca:</td>
      <td><input name="c_marca" type="text" id="c_marca" value="<?php echo $cliente['marca']?>" size="10" readonly="readonly" />
        </label></td>
      <td>Modelo:</td>
      <td><input name="c_modelo" type="text" id="c_modelo" value="<?php echo $cliente['modelo']?>" size="10" readonly="readonly" />
        </label></td>
    </tr>
    <tr>
      <td>Color:</td>
      <td><input name="c_color" type="text" id="c_color" value="<?php echo $cliente['color']?>" size="10" readonly="readonly" />
        </label></td>
      <td>Año:</td>
      <td><input name="c_ano" type="text" id="c_ano" value="<?php echo $cliente['ano']?>" size="10" readonly="readonly" />
        </label></td>
      <td>Cantidad. ptos</td>
      <td><input name="c_cantidad" type="text" id="c_cantidad" value="<?php echo $cliente['cantidadptos']?>" size="3" readonly="readonly" />
        </label></td>
    </tr>
    <tr>
      <td>Motor N°:</td>
      <td><input name="c_motor" type="text" id="c_motor" value="<?php echo $cliente['motor']?>" size="10" readonly="readonly" />
        </label></td>
      <td>Chasis:</td>
      <td><input name="c_chasis" type="text" id="c_chasis" value="<?php echo $cliente['chasis']?>" size="10" readonly="readonly" />
        </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" colspan="6"><div align="center" class="field2">
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
  </table>
</form>
</div>
<?php }}?>
</div>
<!-- CONTENT --><!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>