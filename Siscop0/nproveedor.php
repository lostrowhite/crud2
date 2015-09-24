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
<!--<script type="text/javascript" src="js/ayuda.js"></script>
	<script>
			jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
		</script>-->
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
		<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></div>
			<div class="fright">
			  <ul>
			    <li><a href="paneln.php"><img src="images/icon1-act.gif" alt="" /></a></li>
		      </ul>
		  </div>
        </div>
                <div id="content1">
     <div class="indent">
	<p><strong>Nombre y Apellido</strong>: <?php echo $_SESSION['usuario']; ?>&nbsp;<?php echo $_SESSION['apellido']; ?> |||  <strong>Nombre de Usuario</strong>: <?php echo $_SESSION['login']; ?></p>
<p><strong>Privilegio</strong>: <?php echo $_SESSION['privilegio']; ?>
<form id="form1" method="post" action="gproveedor.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >

  <table width="721" border="0" align="center" >
      <tr id="sizq" >
      <td colspan="2" align="center" class="sder" ><h3>
        <input type="hidden" name="c_codigor" id="c_codigor" />
        Ingreso de Nuevo Proveedor</h3></td>
    </tr>
    <tr>
      <td align="center" id="nombrer">
        Nombre del Proveedor<br />
        <input type="text" name="c_nombrep" id="nombrep" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Inversiones Pagamenos"/> 
        * </td>
    </tr>
    <tr>
      <td align="center" id="cantidadr">
        Rif<br />
        <input type="text" name="c_rifp" id="c_rifp" class="validate[required,minSize[7] required,maxSize[10]] text-input" placeholder="Ejem: J-6854122" /> 
        *</td>
    </tr>
    <tr>
      <td align="center" id="costor">Dirección<br />
        <input type="text" name="c_direccionp" id="c_direccionp" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: El Cementerio" />
        *</td>
    </tr>
    <tr>
      <td align="center" id="descripcionr">Teléfono<br />
         <input type="text" name="c_telefonop" id="c_telefonop" class="validate[required, custom[onlyNumberSp], minSize[10] required,maxSize[11]] text-input" placeholder="Ejem:02127512458" />
        *        </td>
        
    </tr>
<tr>
      <td align="center" id="descripcionr">Nombre de Contacto<br />
         <input type="text" name="c_nombrec" id="c_nombrec" class="validate[required,custom[onlyLetterSp]] text-input" placeholder="Ejem: Jose Sánchez"/>
        *        </td>
        
    </tr>
    <tr></tr>
    <tr id="izq">
      <td id="der" align="center"><div align="center" class="field2">
        <a href="paneln.php" ><em><b>Atras<span>Atras</span></b></em></a>
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
    </table>
</form>
<p>
<p>&nbsp; </p></div>
        <br>
        <p align="center"> <?php echo "<br>Para acceder al menu principal, debe cerrar la sesion haciendo click: <a href='logout.php'>Aqui</a> </html>";
isset($_SESSION); ?></p>  
     
  </div>
    <div id="footer1">
      <div class="footer-nav">
         
      </div>
      <div class="bottom"><span class="footnote">&copy;</span> Copyright <span class="footnote">&copy;</span> 2012 - <span class="footnote">Todos los Derechos Reservados</span><br />
        <a rel="nofollow" href="http://www.templatemonster.com" class="new_window">Programación &amp; Diseño:</a> Carlos Castillo
        | Jefryd Rojas | Alejandro Martín </div>
    </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>