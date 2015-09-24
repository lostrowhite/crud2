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
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
			jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
		function validateLog(field, rules, i, options) {
			  var login = $("#c_login").val();
            $.post('validalogin.php?login='+login,function(respuesta){
				res = $.parseJSON(respuesta);
				 $("#c_log").val(res.login)
            });		
			if($("#c_log").val() == $("#c_login").val())
					return "Discupe, este login no esta disponible";
        }
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
        <form id="form1" method="post" action="guser.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
          <table width="721" border="0" align="center" >
      <tr id="sizq" >
      <td colspan="2" align="center" class="sder" ><h3>Nuevo Usuario</h3></td>
    </tr>
    <tr>
      <td align="center" "nombre">
        <input type="text" name="c_log" id="c_log" style="visibility:hidden" /><br />
        Nombre<br />
        <input type="text" name="c_nombre" placeholder="Ejem: Pedro" id="c_nombre" class="validate[required,custom[onlyLetterSp]] text-input" />
        * 
         </td>
    </tr>
    <tr>
      <td align="center" "apellido">
        Apellido<br />
        <input type="text" placeholder="Ejem:Pérez" name="c_apellido" id="c_apellido" class="validate[required,custom[onlyLetterSp]] text-input" />
        * 
        </td>
    </tr>
    <tr>
      <td align="center" id="apellido4">Pregunta Secreta<br />
        <input type="text" name="c_pregunta" id="c_pregunta" placeholder="Ejem:¿Donde nació?" class="validate[required,custom[onlyLetterSp]] text-input" />
        *
        </td>
    </tr>
    <tr>
      <td align="center" id="apellido3">Respuesta<br />
        <input type="text" name="c_respuesta" id="c_respuesta" placeholder="Ejem: Caracas" class="validate[required] text-input"/>
        *
        </td>
    </tr>
    <tr>
      <td align="center" id="login">
        Login<br />
        <input type="text" name="c_login" id="c_login" class="validate[required,custom[onlyLetterSp],funcCall[validateLog]] text-input"/>
        *
        </td>
    </tr>
    <tr>
      <td align="center" id="pass">
        Contraseña<br />
        <input type="password" name="c_password" id="password" class="validate[required,minSize[6]] text-input"/>
        *
        </td>
    </tr>
    <tr>
      <td align="center" id="rpass">
        Repita contraseña<br />
        <input type="password" name="c_password" id="c_password" class="validate[required,equals[password]] text-input"/>
        *
        </td>
    </tr>
    <tr>
      <td align="center" "email">
        Email<br />
        <input type="text" placeholder="Correo@electro.com" name="c_email" id="c_email" class="validate[required,custom[email]] text-input" />
        *
        </td>
    </tr>
     <tr>
      <td align="center" "apellido2">Cédula<br />
        <input type="text" placeholder="Ejem:18999999" name="c_cedula" id="c_cedula" class="validate[required,minSize[7],maxSize[8],custom[number]] text-input" onkeyup="puntitos(this,this.value.charAt(this.value.length-1))" maxlength="10"/>
        *
        </td>
    </tr>
    <tr>
     <td align="center" "nacionalidad">
     Nacionalidad<br/><select name="c_nacionalidad" class="validate[required]" id="c_nacionalidad">
          <option value= "" selected="selected">Seleccione Nacionalidad</option>
          <option value="V">V</option>
          <option value="E">E</option>
        </select>
     *
        </td>
    </tr>
    <tr>
      <td align="center" id="privilegio">
        Privilegio<br />
        <select name="c_privilegio" class="validate[required]">
          <option value="" selected="selected">Seleccione</option>
          <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          <option value="CARGADOR">CARGADOR</option>
        </select>*
        Todos los campos son obligatorios </td>
    </tr>
    <tr id="izq">
      <td id="der" align="center"><div align="center" class="field2">
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
    </table>
</form>
</div>
        <br> 
     
</div>
  </div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>