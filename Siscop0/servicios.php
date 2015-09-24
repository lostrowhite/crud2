<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/menu_jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
   	$("#nviaje a").click(function(){
		$("#formsol").show();
		$("#tablasol").hide();
		$.ajax({
			type: "GET",
			url: 'viajes.php',
			success: function(datos){
				$("#formsol").html(datos);
			}
		});
		return false;
	});
	$("#nsocio a").click(function(){
		$("#formsol").show();
		$("#tablasol").hide();
		$.ajax({
			type: "GET",
			url: 'servsocios.php',
			success: function(datos){
				$("#formsol").html(datos);
			}
		});
		return false;
	});
})
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page5">
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
	        <li><a href="index.php"><span>INICIO</span></a></li>
	        <li><a href="empresa.php"><span>La empresa</span></a></li>
	        <li><a href="servicios.php" class="active"><span>SERVICIOS</span></a></li>
	        <li><a href="aplicaciones.php"><span>Rutas</span></a></li>
	        <li class="last"><a href="contacto.php"><span>CONTACTANOS</span></a></li>
          </ul>
        </div>
      </div>
		<div class="row-3">
		  <div class="extra"><img align="left" src="images/header-img2.png" alt="" width="455" height="575" /><img align="right" src="images/header-img3.png" alt="" width="445" height="420" /></div>
		</div>
	</div>
<!-- CONTENT -->
	<div id="content1"><div class="ic"></div>
		<div class="box">
			<div class="border-bot">
				<div class="right-bot-corner">
					<div class="left-bot-corner">
						<div class="inner">
							<div class="box1 alt">
								<div class="inner">
								  <p>&nbsp;</p>
								  <p>&nbsp;</p>
                              </div>
							  <div id="formsol" style="display:none;"></div>
<div id="tablasol">
  <h4>&nbsp;   </h4>
  <h4>&nbsp;</h4>
  <h4>&nbsp;</h4>
  <h4> <br />
    <br />
    Haga Click en el Servicio Requerido</h4>
</div>

									  <div id='cssmenu'>
  <ul>
   <li class='active'><a href=''><span>Nuestros Servicios</span></a></li>
   <li class='has-sub'><a href='#'><span>Para la Comunidad</span></a>
      <ul>
         <li id="nviaje"><a href='viajes.php'><span>Viajes</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Para la Cooperativa</span></a>
      <ul>
         <li id="nsocio"><a href='servsocios.php'><span>Socios</span></a></li>
         <li class='last'><a href='#'><span>Avances</span></a></li>
      </ul>
   </li>
  </ul>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="indent">
			<div class="wrapper">

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
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>