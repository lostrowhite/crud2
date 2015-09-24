<?php
require('clases/cliente.class.php');
$obj=new Cliente;
$con=$obj->con->conectar();
?>
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
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/ayuda.js"></script>
	<script>
	   function recuperaus() { // Equivalente a $(document).ready();
            var cedula = $("#c_cedula").val();
            $.post('recuperacion.php?cedula='+cedula,function(respuesta){
				if(respuesta ==''){
					alert('Disculpe, esta cedula no se encuentra registrada en la BD');
					}else if(respuesta !=''){						
				res = $.parseJSON(respuesta); 
		$("#rec1").show();
		$("#rec").hide();
		$.ajax({
			type: "GET",
			url: 'recuperaus.php',
			success: function(datos){
				$("#rec1").html(datos);
				$("#c_nombre").val(res.nombre)
				$("#c_cedula").val(res.cedula)
				$("#c_pregunta").val(res.pregunta)
			}
		});
		return false;
				
				}
            });		
        };
	   function recuperaopt() { // Equivalente a $(document).ready();
            var cedula = $("#c_cedula").val();
            $.post('recuperacion.php?cedula='+cedula,function(respuesta){
				if(respuesta ==0){
					alert('Disculpe, esta cedula no se encuentra registrada en la BD');
					}else if(respuesta !=''){						
				res = $.parseJSON(respuesta); 
		$("#rec1").show();
		$("#rec").hide();
		$.ajax({
			type: "GET",
			url: 'recuperaopt.php',
			success: function(datos){
				$("#rec1").html(datos);
			}
		});
		return false;
				
				}
            });		
        };
			   function recuperapw() { // Equivalente a $(document).ready();
            var cedula = $("#c_cedula").val();
            $.post('recuperacion.php?cedula='+cedula,function(respuesta){
				if(respuesta ==''){
					alert('Disculpe, esta cedula no se encuentra registrada en la BD');
					}else if(respuesta !=''){						
				res = $.parseJSON(respuesta); 
		$("#rec1").show();
		$("#rec").hide();
		$.ajax({
			type: "GET",
			url: 'recuperacom.php',
			success: function(datos){
				$("#rec1").html(datos);
				$("#c_nombre").val(res.nombre)
				$("#c_cedula").val(res.cedula)
				$("#c_pregunta").val(res.pregunta)
			}
		});
		return false;
				
				}
            });		
        };
 function compruebaus() { // Equivalente a $(document).ready();
            var cedula = $("#c_cedula").val();
            $.post('recuperacion.php?cedula='+cedula,function(respuesta){
				var resp = $("#c_respuesta").val();					
				res = $.parseJSON(respuesta); 
		if(resp != res.respuesta){	
		alert('Disculpe la respuesta ingresada es incorrecta');
		}else if(respuesta = res.respuesta){
		$("#rec1").show();
		$("#rec").hide();
		$.ajax({
			type: "GET",
			url: 'muestrausuario.php',
			success: function(datos){
				$("#rec1").html(datos);
				$("#user").val(res.login)
			}
		});
		return false;
				}
            });		
        };
 function compruebapw() { // Equivalente a $(document).ready();
            var cedula = $("#c_cedula").val();
            $.post('recuperacion.php?cedula='+cedula,function(respuesta){
				var resp = $("#c_respuesta").val();
		var pass = $("#pass").val();
		var pass2 = $("#pass2").val();	
		res = $.parseJSON(respuesta); 
		if(resp != res.respuesta){	
		alert('Disculpe la respuesta ingresada es incorrecta');
		}else if(pass != pass2 || pass.length<6 || pass.length<6){	
		alert('Disculpe las contraseñas deben ser iguales y tener al menos 6 caracteres');
		}else if(respuesta = res.respuesta){
		$("#rec1").show();
		$("#rec").hide();
		jQuery.ajax({
				url: 'restablecepw.php',
				type: "GET",
				data: "submit=&pass="+pass2+"+&cedula="+cedula,
				success: function(datos){
					alert(datos);
				}
				});
		return false;
				}
            });		
        };
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
<body id="page6">
<div id="main" >
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
                <div id="content1">
     <div class="indent">
     <div id="rec1" style="display:none"></div>
     <div id="rec">
	<form id="form1"  method="post" action="recupera.php" onSubmit="if(!confirm('Esta seguro que ingreso la cedula correctamente?')){return false;}" >
	<table width="700" border="0" align="center" id="cuerpo">
    <tr id="sizq" >
      <td align="center" class="sder" ><h3>Recuperación de usuario y clave</h3></td>
    </tr>
    <tr>
      <td align="center" "cedula" class="cedula">Ingresar cédula:<br />
        <input name="c_cedula" type="text" size="30" placeholder="Ejemplo: 18999999"class="validate[required,custom[onlyNumberSp]] text-input" id="c_cedula"/></td>
    </tr>	
    <tr id="izq">
      <td id="der" class="camp1" align="center">
              <div id="camp" style="display:none" >asda</div>
      <div align="center" class="field2">
        <a href="index.php" ><em><b>Atras<span>Atras</span></b></em></a>
      <dt><dl><input name="button" value="Recuperar" type="button" onclick="recuperaopt();" /></dl></dt>
        </div></td>
    </tr>
  </table>

</form>
</div>
</div>
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
</body>
</html>