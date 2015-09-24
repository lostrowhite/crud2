<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
}else{
if(isset($_GET['id'])){
		$id= $_GET['id'];	
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_proveedor($_GET['id']);
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
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
			jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
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
<form id="form1" method="post" action="acproveedor.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
  <table width="721" border="0" align="center" >
      <tr id="sizq" >
      <td colspan="2" align="center" class="sder" ><h3>
        <input type="hidden" name="usuarios_id" id="usuarios_id" value="<?php echo $id?>" />
        Editar Proveedor</h3></td>
    </tr>
    <tr>
      <td align="center" id="nombrer">
        Proveedor<br />
        <input type="text" name="c_nombrep" id="c_nombrep" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Inversiones Pagamenos" value="<?php echo $cliente['proveedor']?>"/> 
        * </td>
    </tr>
    <tr>
      <td align="center" id="cantidadr">
        Rif<br />
        <input type="text" name="c_rifp" id="c_rifp" class="validate[required,minSize[7] required,maxSize[10]] text-input" placeholder="Ejem: placeholder=J-6854122" value="<?php echo $cliente['rproveedor']?>" /> 
        *</td>
    </tr>
    <tr>
      <td align="center" id="costor">Dirección<br />
        <input type="text" name="c_direccionp" id="c_direccionp" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: El Cementerio" value="<?php echo $cliente['dproveedor']?>" />
        *</td>
    </tr>
    <tr>
      <td align="center" id="descripcionr">Teléfono<br />
         <input type="text" name="c_telefonop" id="c_telefonop" class="validate[required, custom[onlyNumberSp], minSize[10] required,maxSize[11]] text-input" placeholder="Ejem:02127512458" value="<?php echo $cliente['tproveedor']?>"/>
        *        </td>
        
    </tr>
<tr>
      <td align="center" id="descripcionr">Nombre de Contacto<br />
         <input type="text" name="c_nombrec" id="c_nombrec" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Jose Sánchez" value="<?php echo $cliente['nombrecontacto']?>"/>
        *        </td>
    </tr>
    <tr></tr>
    <tr id="izq">
      <td id="der" align="center"><div align="center" class="field2">
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
</body>
</html>