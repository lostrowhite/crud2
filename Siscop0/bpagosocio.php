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
	veravances()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
	$("#nuevopagosocio").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'npagosocio.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionapagosocio").removeClass("active");	
				$("#nuevopagosocio").addClass("active");
			}
		});
		return false;
		});
$("#gestionapagosocio").click(function(){
		$('#contenido').show();
		$("#datos").hide();
		$("#gestionapagosocio").addClass("active");	
		$("#nuevopagosocio").removeClass("active");
				return false;
		});
	$("#backuser").click(function(){
	$('#usuarios').hide();
	$("#centro").show();
	});
	$("#nuevopagoavan").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'npagoavance.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionapagoavan").removeClass("active");	
				$("#nuevopagoavan").addClass("active");
			}
		});
		return false;
		});
$("#gestionapagoavan").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'bpagoavance.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionapagoavan").addClass("active");	
				$("#nuevopagoavan").removeClass("active");
			}
		});
		return false;
		});

})
function veravances(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber1=Math.random()*11;
            $.post("listarpagosocio.php", {
                randomnumber1:randomnumber1
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
					<li><a id="gestionapagosocio" href="" class="active"><span>GESTIONAR PAGO SOCIO</span></a></li>
					<li><a id="nuevopagosocio" href=""><span>NUEVO PAGO SOCIO</span></a></li>
                    <li><a id="gestionapagoavan" href=""><span>GESTIONA PAGO AVANCE</span></a></li>
                    <li><a id="nuevopagoavan" href=""><span>NUEVO PAGO AVANCE</span></a></li>
				</ul>
			</div>
		</div>
        <div id="content1">
     <div class="indent">	
    </header>
    <div id="datos" align="center" style="display:none;"></div>
    <div id="contenido"></div>
  <form id="form1" name="form1">
  <div class="field2" align="center">
      <a id="backuser"><em><b>Atras<span>Atras</span></b></em></a>
      </div>
  </form>
    <footer>
       Data  Pago Socios y Avances</footer></div>
  </div>
   </div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>