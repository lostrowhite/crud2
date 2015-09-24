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
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <!--    FORMATO DE TABLAS    -->
<script type="text/javascript">

$(document).ready(function(){
	    verlistado();
	$("#nuevorep").click(function(){
		$("#formrep").show();
		$("#tablarep").hide();
		$.ajax({
			type: "GET",
			url: 'nrepuesto.php',
			success: function(datos){
				$("#formrep").html(datos);
			}
		});
		return false;
	});
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("listarproductos.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido1").html(data);
            });

}
</script>
</head>
<body id="page6">
    <header id="titulo">

        <h3>Añadir Producto</h3>
    </header>
<div id="formrep" style="display:none;">
</div>
<div id="tablarep"><br />
<div align="center"></div>
  <div id="contenido1">
</div>
</div>
  <form id="form1" name="form1">
  <div class="field2" align="center">
    <input name="Cancelar"  type="button"  id="cancelar" value="Cancelar" onclick="$(document).trigger('close.facebox')" />
      </div>
  </form>
    <footer>
       Seleccione Producto
    </footer></div>
        <br>
        <p align="center"></p>  
<!-- FOOTER -->
</div>
</body>
</html>