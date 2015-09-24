<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
?>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link type="text/css" href="css/demo_table.css" rel="stylesheet" />
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
        <!--    JQUERY   -->
        <script type="text/javascript" src="js/jquery2.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <!--    FORMATO DE TABLAS    -->
<script type="text/javascript">

$(document).ready(function(){
    verlistado()
		$("#nuevopavance").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'pagoavances.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionaruta").removeClass("active");	
				$("#nuevopavance").addClass("active");
			}
		});
		return false;
		});
$("#gestionaruta").click(function(){
		$('#contenido').show();
		$("#datos").hide();
		$("#gestionaruta").addClass("active");	
		$("#nuevopavance").removeClass("active");
				return false;
		});
	$("#backuser").click(function(){
	$('#usuarios').hide();
	$("#centro").show();
	});
$("#montopresta").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'montoprestamos.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionaruta").removeClass("active");	
				$("#montopresta").addClass("active");
			}
		});
		return false;
		});
	$("#cierremes").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'generapago.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionaruta").removeClass("active");	
				$("#cierremes").addClass("active");
			}
		});
		return false;
		});
	$("#agregacombustible").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'bcombustible.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionaruta").removeClass("active");	
				$("#cierremes").addClass("active");
			}
		});
		return false;
		});
		$("#iva").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'iva.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionaruta").removeClass("active");	
				$("#nuevopavance").removeClass("active");
				$("#montopresta").removeClass("active");	
				$("#cierremes").removeClass("active");
				$("#agregacombustible").removeClass("active");	
				$("#iva").addClass("active");
			}
		});
		return false;
		});
		$("#backuser").click(function(){
	$('#usuarios').hide();
	$("#centro").show();
	});
})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("listarrutas.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido").html(data);
            });
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
		<div class="row-2">
			<div class="left">
				<ul>
					<li><a id="gestionaruta" href="" class="active"><span>RUTAS</span></a></li>
					<li><a id="nuevopavance" href=""><span>PAGO AVANCES</span></a></li>
                    <li><a id="montopresta" href=""><span>PRÉSTAMOS</span></a></li>
                    <li><a id="cierremes" href=""><span>CIERRE DE MES</span></a></li>
                    <li><a id="agregacombustible" href=""><span>COMBUSTIBLE</span></a></li>
				</ul>
			</div>
		</div>
        		<div class="row-2">
			<div class="left" align="center">
				<ul>
                    <li><a id="iva" href=""><span>IVA</span></a></li>
				</ul>
			</div>
		</div>
                <div id="content1">
     <div class="indent">
<div id="formrutas" style="display:none;"></div>
<div id="tablarutas"><br />
  <div id="datos" align="center" style="display:none;"></div>
  <div id="contenido">
  </div>
</div>
  <form id="form1" name="form1">
  <div class="field2" align="center">
      <a id="backuser"><em><b>Atras<span>Atras</span></b></em></a>
      </div>
  </form>
    <footer>
       Control</footer></div>  
  </div>
    <div id="footer1">
    </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>
<body>
</body>
</html>
