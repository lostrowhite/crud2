<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
}else{
if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_pagosocios($_GET['id']);
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
<form id="form1" method="post" action="acpagosocio.php" onSubmit="if(!confirm('Esta seguro que desea editar este pago?')){return false;}" >
  <table width="800" border="1" align="center" bordercolor="#0f56ba">
    <tr>
      <td align="left" colspan="2"> <input type="hidden" name="pago_id" id="pago_id" value="<?php echo $cliente['id']?>" />
        Número de Socio
<?php
    $objCliente = new Cliente;
    $consulta = $objCliente->muestrasocioinactivos(); ?>
<input name="c_nsocio" type="text" id="c_nsocio" value="<?php echo $cliente['nsocio']?>" size="6" readonly="readonly" />
</td>
      <td align="center">Nro Depósito:</td>
      <td align="left" id="ndeposito">
        <input name="c_deposito" placeholder="Ejem:76543423423" class="validate[required,custom[onlyNumberSp]] text-input" type="text" id="c_deposito2" value="<?php echo $cliente['deposito']?>" />
        *</td>
    </tr>
    <tr>
      <td>Nombres</td>
      <td><input name="c_nombres" type="text" class="validate[required] text-input" value="<?php echo $cliente['nombres']?>" readonly="readonly" /></td>
      <td>Fecha: </td>
      <td id="fdeposito"><input name="c_fecha" type="text"class="validate[required] fecha " id="c_fecha" value="<?php echo date('d-m-Y',strtotime( $cliente['fecha']))?>"/>  <img src="images/calendario.png" id="fdep" alt="" width="16" height="16" /><script>
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
      <td>Apellidos</td>
      <td><input name="c_apellidos" type="text" class="validate[required] text-input" value="<?php echo $cliente['apellidos']?>" readonly="readonly" /></td>
      <td>Banco:</td>
      <td id="banco"><select name="c_banco" id="c_banco">
        <option value="c_mercantil">Mercantil Banco Universal</option>
        <option value="c_banesco">Banesco Banco Universal</option>
      </select>
      *</td>
    </tr>
    <tr>
      <td>Cédula</td>
      <td><input name="c_cedula" type="text" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $cliente['cedula']?>" readonly="readonly"/></td>
      <td>Monto</td>
      <td id="monto"><input name="c_monto" type="text" id="c_monto" value="<?php echo $cliente['monto']?>" readonly="readonly"/>
      *</td>
    </tr>
    <tr>
      <td colspan="2" align="center">Por Concepto:</td>
      <td colspan="2" align="right" id="concepto"><label for="c_concepto">
        <textarea name="c_concepto" placeholder="Ejem: Pago de meses......" class="validate[required,custom[onlyLetterSp]] text-input" id="c_concepto" cols="20" rows="2"><?php echo $cliente['concepto']?></textarea>
      </label>*</td>
    </tr>
    <tr>
      <td colspan="4" align="right"><div align="center" class="field2"> 
        <dt>
          <dl>
            <input name="Grabar" value="Grabar" type="submit" />
          </dl>
        </dt>
      </div></td>
    </tr>
  </table>
</form>
</div>
</div>
<?php  }}?>
<!-- CONTENT --><!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>