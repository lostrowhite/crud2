<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/slideLock.css" rel="stylesheet" type="text/css" media="screen" /> 
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="js/jquery.slideLock.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine      
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
	
	function handleEnter (field, event) {
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
        fSubmit();
        return false;
    }
    else
    return true;
	} 
	function fSubmit(){
    document.form1.submit();
	}
	$("#form1").slideLock({  
		lockText: "Off", 
		unlockText: "On", 
		iconURL: "images/arrow_right.png", 
		inputID: "sliderInput", 
		onCSS: "#333", 
		offCSS: "#aaa", 
		inputValue: 1, 
		saltValue: 9, 
		checkValue: 10, 
		js_check: "js_check", 
		submitID: "#Entrar"  
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
<body id="page1">
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
					<li><a href="index.php" class="active"><span>INICIO</span></a></li>
					<li><a href="empresa.php"><span>La empresa</span></a></li>
					<li><a href="servicios.php"><span>SERVICIOS</span></a></li>
					<li><a href="aplicaciones.php"><span>RUTAS</span></a></li>
					<li class="last"><a href="contacto.php"><span>CONTÁCTANOS</span></a></li>
				</ul>
			</div>
		</div>
	  <div class="row-3"></div>
		<div class="extra"><img align="left" src="images/header-img2.png" alt="" width="455" height="575" /><img align="right" src="images/header-img3.png" alt="" width="445" height="420" /></div>
	</div>
<!-- CONTENT -->
	<div id="content1"><div class="ic"></div>
		<ul class="box-list">
			<li></li>
			<li class="alt"></li>
		</ul>
		<p>&nbsp;</p>
		<div class="indent">
		  <div class="wrapper">
		    <div class="col-1">
					<h3><b>SIS-</b>COP </h3>
					<p>Sistema para la gestión administrativa y logística.</p>
					<div class="img-box1"><img src="images/header-img2.png" alt="" width="317" height="350" />Éste es el sistema que llevará a cabo los procesos administrativos y logísticos para los socios de la cooperativa de transportes roosevelt.
					</div>
					<p>&nbsp;</p></div><div class="col-2">
				  <div class="box3">
					  <div class="right-bot-corner">
							<div class="left-bot-corner">
								<div class="inner">
									<h4><b>&lt;&lt;Ingreso&gt;&gt;</b></h4>
									<form id="form1" name="form1" method="POST" action="autenticar.php">
									  <fieldset>
											<div class="field"><label>Login:</label><input type="text" name="login" class="validate[required] text-input"  id="login"/></div>
										<div class="field"><label>Contraseña:</label><input type="password" name="password" class="validate[required] text-input"  id="password"  />
											</div>
										<p><br />
										<br />
										<input name="Entrar" type="submit" value="Entrar" id="Entrar" />
                                        <br />
										</p>
										<p> <a id="pagininicio" href="recupera.php">¿OLVIDÓ SU CONTRASEÑA?</a> </p>
										<div></div>
                                        <input type="hidden" name="js_check" id="js_check" value="0" />
									  </fieldset>
									</form>
								</div>
							</div>
					</div>
				  </div>
			  </div>
		  </div>
	  </div>
	</div>
<!-- FOOTER -->
	<div id="footer1">
		<div class="footer-nav">
			<div class="left">
				<ul>
					<li></li>
					<li><a href="empresa.php">Dirección</a></li>
					<li><a href="manual.php">Teléfonos</a></li>
					<li><a href="contacts-us.html">Email</a></li>
				</ul>
			</div>
		</div>
	  <div class="bottom"><span class="footnote">&copy;</span> Copyright <span class="footnote">&copy;</span> 2012 - <span class="footnote">Todos los Derechos Reservados</span><br />
		  <a rel="nofollow" href="http://www.templatemonster.com" class="new_window">Programación &amp; Diseño:</a> Carlos Castillo
		    | Jefryd Rojas | Alejandro Martín	  </div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>