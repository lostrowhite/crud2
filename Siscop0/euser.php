<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} else{
if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_usuarios($_GET['id']);
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
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
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
<?php }} ?>
<form id="form1" method="post" action="acuser.php" onsubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea editar este usuario?')){return false;}" >

  <table align="center" width="200" border="1" >
    <tr id="sizq" >
      <td colspan="2" align="center" class="sder" ><h3>Editar Usuario</h3></td>
    </tr>
    <tr>
      <td><input name="c_login" type="hidden" id="c_login" value="<?php echo $cliente['login']?>" class="validate[required] text-input" /><input type="hidden" name="usuarios_id" id="usuarios_id" value="<?php echo $cliente['id']?>" />        Nombre </td>
      <td id="nombre">
        <input name="c_nombre" type="text" id="c_nombre" placeholder="Ejem: Pedro" value="<?php echo $cliente['nombre']?>" class="validate[required,custom[onlyLetterSp]] text-input"/>
        *</td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td id="apellido">
        <input name="c_apellido" type="text" id="c_apellido" placeholder="Ejem:Pérez" value="<?php echo $cliente['apellido']?>" class="validate[required,custom[onlyLetterSp]] text-input"/>
        *</td>
    </tr>
    <tr>
      <td>Contraseña</td>
     
      <td id="pass">
        <input type="password" name="contraseña" id="password" class="validate[required] text-input"/>
        *</td>
    </tr>
    <tr>
      <td>Repita Contrase&ntilde;a</td>
      <td id="rpass">
        <input name="c_password" type="password" id="c_password"  class="validate[required,equals[password]] text-input"/>
        *</td>
    </tr>
    <tr>
      <td>Email</td>
      <td id="email">
        <input name="c_email" type="text" id="c_email" placeholder="Correo@electro.com" value="<?php echo $cliente['email'] ?>" class="validate[required,custom[email]] text-input"/>
        *</td>
    </tr>
    <tr>
      <td>Cédula</td>
      <td id="login">
        <input name="c_cedula" type="text" id="c_cedula" value="<?php echo $cliente['cedula']?>" class="validate[required] text-input" />
        *</td>
    </tr>
    <tr>
    <tr>
    <td> Nacionalidad</td>
    <td id="nacionalidad">
    <select name="c_nacionalidad" class="validate[required]" id="c_nacionalidad">
          <option value= "<?php echo $cliente['nacionalidad']?>" selected="selected"><?php echo $cliente['nacionalidad']?></option>
         <?php if ($cliente['nacionalidad']=="V" ){
		echo'<option value="E">E</option>';	
		 }else{
			 
		echo'<option value="V">V</option>';	 
			 } ?>
        </select>
    *
    </tr>
     <tr>
       <td>Privilegio</td>
       <td id="privilegio">
         <select name="c_privilegio" id="c_privilegio">
           <option value="<?php echo $cliente['privilegio']?>"><?php echo $cliente['privilegio']?></option>
           <?php
	  	if($cliente['privilegio']=="CARGADOR"){
			echo'<option value="ADMINISTRADOR">ADMINISTRADOR</option>';
		}elseif($cliente['privilegio']=="ADMINISTRADOR"){
			echo'<option value="CARGADOR">CARGADOR</option>';
			}
		?>
          </select>
         *</td>
     </tr>
    <tr id="izq">
      <td id="der" colspan="2" align="center"><div align="center" class="field2">
           <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
  </table>
</form>
</div>
        <br>
</div>
<!-- CONTENT -->
	<div id="content1">
	  <div class="indent"></div>
	</div>
<!-- FOOTER -->
</div>
</body>
</html>