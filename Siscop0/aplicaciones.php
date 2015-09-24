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
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/menu_jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
   	$("#carme a").click(function(){
		$("#formsol").show();
		$("#tablasol").hide();
		$.ajax({
			type: "GET",
			url: 'carme.php',
			success: function(datos){
				$("#formsol").html(datos);
			}
		});
		return false;
	});
	$("#previsora a").click(function(){
		$("#formsol").show();
		$("#tablasol").hide();
		$.ajax({
			type: "GET",
			url: 'previsora.php',
			success: function(datos){
				$("#formsol").html(datos);
			}
		});
		return false;
	});
	$("#chacaito a").click(function(){
		$("#formsol").show();
		$("#tablasol").hide();
		$.ajax({
			type: "GET",
			url: 'chacaito.php',
			success: function(datos){
				$("#formsol").html(datos);
			}
		});
		return false;
	});
})
	</script>
</head>
<body id="page2">
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
	        <li><a href="aplicaciones.php" class="active"><span>RUTAS</span></a></li>
	        <li class="last"><a href="contacto.php" class="right-bot-corner"><span>CONTACTANOS</span></a></li>
          </ul>
        </div>
      </div>
	</div>
<!-- CONTENT -->
	
		<div class="box">
			<div class="border-bot">
				<div class="right-bot-corner">
					<div class="left-bot-corner">
						<div class="inner">
						  <p>&nbsp;</p>
<div class="box1 alt">
								<div class="inner">
                              </div><div id="formsol" style="display:none;"></div>
<div id="tablasol">
  <h4> <br />
    <br />
    Haga Click en la Ruta para conocerla</h4>
</div>

									  <div id='cssmenu'>
  <ul>
   <li class='active'><a href='index.php'><span>Nuestras rutas</span></a></li>
   <li class='has-sub'><a href='#'><span>Área Metropolitana</span></a>
      <ul>
         <li id="carme"><a href='carme.php'><span>Cementerio-Carmelitas</span></a></li>
         <li id="previsora" class='has-sub'><a href='previsora.php'><span>Cementerio-Previsora</span></a>
   </li>
      <li id="chacaito" class='has-sub'><a href='chacaito.php'><span>Cementerio-Chacaito</span></a>
   </li>
      </ul>
  </ul>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="indent"></div>
</div>
<!-- FOOTER -->
	<div id="footer1" align="center">
		<div class="footer-nav">
			<div class="left">
				<ul>
					<li></li>
					<li><a href="empresa.php">Dirección</a></li>
					<li><a href="servicios.php">Teléfonos</a></li>
					<li><a href="contacts-us.html">Contacto</a></li>
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