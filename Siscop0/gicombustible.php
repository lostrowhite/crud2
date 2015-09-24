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
<link rel="stylesheet" href="css/template.css" type="text/css"/>
<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<link href="css/slideLock.css" rel="stylesheet" type="text/css" media="screen" />  
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="calendario_dw/calendario_dw.js" type="text/javascript" ></script> 
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formcombustible").validationEngine();
		});
		</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agregar Tipo de Combustible</title>
<script>
function Agregar(){
		var com = $('#com').val();
		$.ajax({
			url: 'gicombustible.php',
			type: "POST",
			data: "submit=&com="+com,
			success: function(datos){
				alert(datos);
				$("#formcom").hide();
				$('#contenido').load('listarcombustible.php');
				$("#tablacom").show();
			}
		});
		return false;
	}
	function Cancelar(){
		$("#formcom").hide();
		$("#tablacom").show();
		return false;
	}
</script>
</head>
<body>
<form name="formcombustible" id="formcombustible" method="post" action="gcombustible.php">
<table align="center">
<tr>
<td align="center">
Inserte el nuevo combustible<br />
<input name="com" id="com"  type="text" class="validate[required] text-input" />
*
</td>
</tr>
<tr>
<td colspan="2" align="center">
<br>
<input type="submit" value="Grabar">
<input type="button" onclick="Cancelar();" value="Cancelar">
</td>
</tr>
</table>
</form>
</body>
</html>
