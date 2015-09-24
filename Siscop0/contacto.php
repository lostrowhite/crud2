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
<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
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
<body id="page4">
<div id="main">
<!-- HEADER -->
  <div id="header1">
	<div class="row-1">
			<div class="fleft"><a href="index.php"><img src="images/enc.png" alt="" width="531" height="62" /></a></div>
			<div class="fright">
				<ul>
					<li><a href="index.php"><img src="images/icon1-act.gif" alt="" /></a></li>
				</ul>
			</div>
		</div>
	<div class="row-2">
	  <div class="left">
	    <ul>
	      <li><a href="index.php" ><span>INICIO</span></a></li>
	      <li><a href="empresa.php"><span>La empresa</span></a></li>
	      <li><a href="servicios.php"><span>SERVICIOS</span></a></li>
	      <li><a href="aplicaciones.php"><span>rutas</span></a></li>
	      <li class="last"><a href="contacto.php" class="active"><span>Contáctanos</span></a></li>
        </ul>
      </div>
    </div>
<div class="row-3"></div>
	<div class="extra"><img align="left" src="images/header-img2.png" alt="" width="455" height="575" /><img align="right" src="images/header-img3.png" alt="" width="445" height="420"" /></div>
  </div>
<!-- CONTENT -->
		<div class="box">
			<div class="border-bot">
				<div class="right-bot-corner">
					<div class="left-bot-corner">
						<div class="inner">
							<div class="box1 alt">
							  <h4><b>Deseas contactarnos</b><br />
								  <br />
                                </h4>
                                
									<p><b>Si tienes alguna inquietud acerca de nuestros servicios, llámanos al numero 0212-6312227 o dirígete</b> <b>a <br />
								    <br />
						      nuestra sede ubicada  en las adyacencias de la Av. Principal del Cementerio, Santa Rosalía, Libertador, </b></p>
									<p><b>Caracas, distrito Capital, Venezuela <br />
								    <br />
								    </b>
							  </p>
									<div id="header2">
						          <div id="content1">
						            <div class="indent">
<form id="form1"  method="post" action="gcontacto.php" onsubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
						                <table width="700" border="0" id="cuerpo" align="center">
						                  <tr id="sizq" >
						                    <td colspan="2" align="center" class="sder" ><h3>También puedes enviar tus inquietudes a través de esta vía</h3></td>
					                      </tr>
		
						                  <tr>
						                    <td align="left" id="historia21">Nombre<br />
						                      <input class="validate[required] text-input" type="text" name="c_nombre" placeholder="Ejem:Pedro Antonio" id="c_nombre" />
						                      *</td>
						                    <td id="direccion21">Correo<br />
						                      <input name="c_correo" type="text" size="30" class="validate[required,custom[email]] text-input" placeholder="Ejem:correo@ghot.com"/>
						                      *</td>
					                      </tr>
						                  <tr>
						                    <td "telefono"> Teléfono:<br />
						                      <input type="text" name="c_telefono" class="validate[custom[phone]] text-input" onkeyup="mascara(this,'-',tlf,true)" maxlength="13" placeholder="Ejem: 02126666666"/>
						                      *<br /></td>
						                    <td id="direccion19">Cédula<br />
                                              <input type="text" name="c_cedula" class="validate[custom[phone]] text-input" onkeyup="mascara(this,'-',tlf,true)" maxlength="13" placeholder="Ejem: 184531665" id="c_cedula"/>
*</td>
					                      </tr>
                                            <tr>
						                    <td colspan="2" "telefono">Comentario:<br />
                                              <label for="c_comentario"></label>
                                              <textarea name="c_comentario" id="c_comentario" cols="70" rows="2"></textarea>
*</td>
					                      </tr>
						                  <tr>
						                    <td colspan="2">* Campos obligatorios</td>
					                      </tr>
						                  <tr id="izq">
						                    <td id="der" colspan="2" align="center"><div align="center" class="field2">
						                 
						                      <dt>
						                        <dl>
						                          <input name="Grabar" value="Enviar" type="submit" />
					                            </dl>
					                          </dt>
						                      </div></td>
					                      </tr>
					                    </table>
					                  </form>
					                </div>
						            <br />
						            <p align="center"></p>
					            </div>
					          </div>
						  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="indent">
			<div class="wrapper"></div>
		</div>
	</div>
<!-- FOOTER -->
	<div id="footer1">
		<div class="footer-nav">
			<div class="left">
				<ul>
					<li></li>
					<li><a href="empresa.php">Dirección</a></li>
					<li><a href="servicios.php">Teléfonos</a></li>
					<li><a href="contacts-us.html">Email</a></li>
				</ul>
			</div>
		</div>
		<div class="bottom"><span class="footnote">&copy;</span> Copyright <span class="footnote">&copy;</span> 2012 - <span class="footnote">Todos los Derechos Reservados</span><br />
          <a rel="nofollow" href="http://www.templatemonster.com" class="new_window">Programación &amp; Diseño:</a> Carlos Castillo
	    | Jefryd Rojas | Alejandro Martín </div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>