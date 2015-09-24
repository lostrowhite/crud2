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
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="js/jquery.idTabs.min.js" type="text/javascript"></script>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/script.js" type="text/javascript"></script>
        <!--    JQUERY   -->
        <script type="text/javascript" src="js/jquery2.js"></script>

        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <!--    FORMATO DE TABLAS    -->
<script type="text/javascript">

$(document).ready(function(){
    verlistado();
	// mostrar formulario de actualizar datos
	$("#nuevousuario").click(function(){
		$('#contenido').hide();
		$("#datos").show();
		$.ajax({
			url: 'nuser.php',
			type: "GET",
			success: function(datos){
				$("#datos").html(datos);
				$("#gestionausuario").removeClass("active");	
				$("#nuevousuario").addClass("active");
			}
		});
		return false;
		});
$("#gestionausuario").click(function(){
		$('#contenido').show();
		$("#datos").hide();
		$("#gestionausuario").addClass("active");	
		$("#nuevousuario").removeClass("active");
				return false;
		});
	$("#backuser").click(function(){
	$('#usuarios').hide();
	$("#centro").show();
	});
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("listaruser.php", {
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
					<li><a id="gestionausuario" href="" class="active"><span>GESTIONAR USUARIOS</span></a></li>
					<li><a id="nuevousuario" href=""><span>NUEVO USUARIO</span></a></li>
				</ul>
			</div>
		</div>
</div>
  <div id="header1">
    <div id="content1">
     <div class="indent">
<div id="datos" align="center" style="display:none;"></div> 
       <div id="contenido"></div>
  <form id="form1" name="form1">
  <div class="field2" align="center">
      <a id="backuser"><em><b>Atras<span>Atras</span></b></em></a>
      </div>
  </form>
    <footer>
       Data Usuarios
    </footer></div> 
  </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>