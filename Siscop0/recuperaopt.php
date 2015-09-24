<?php
header("Content-Type: text/html;charset=utf-8");
if(isset($_POST['submit'])){
	require('clases/cliente.class.php');

	$respuesta = htmlspecialchars(trim($_POST['c_respuesta']));
	$objCliente=new Cliente;
	$consulta=$objCliente->consultarespuesta($respuesta);
	$datos = mysql_num_rows($consulta); 
	if ( $datos >0){
	while( $cliente = mysql_fetch_array($consulta) ){
	$login=$cliente['login'];
	$pass=md5($cliente['password']);
	echo "<script languaje='javascript'>
	alert('Su Usuario es:$pass °');
</script>";
	}
	}else{
	$data="Chao";
	} 
	
}else{
?>
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
	function Atras(){
		$("#rec1").hide();
		$("#rec").show();
		return false;
	}
</script>
</head>
<body>
<form id="form1"  method="post" action="recuperacom.php" onSubmit="if(!confirm('Esta seguro que ingreso la respuesta correcta?')){return false;}" >
	<table width="700" border="0" align="center" id="cuerpo">
    <tr id="sizq" >
      <td align="center" class="sder" ><h3>Seleccione la información a recuperar</h3></td>
    </tr>
    <tr>
      <td align="center" id="cedula" class="cedula"><table width="314" border="0">
        <tr>
          <td width="142" align="right"><img onclick="recuperaus();" src="images/usuario.jpg" alt="" width="50" height="54" />LOGIN</td>
          <td width="156" align="left"><img onclick="recuperapw();" src="images/password.png" alt="" width="50" height="50" />CONTRASEÑA</td>
        </tr>
        </table>
      <br /></td>
    </tr>
    <tr id="izq">
      <td id="der" class="camp1" align="center">
              <div id="camp" style="display:none" >asda</div>
      <div align="center" class="field2">
        <a href=""  onclick="Atras();"><em><b>Atras<span>Atras</span></b></em></a>
      <dt>&nbsp;</dt>
        </div></td>
    </tr>
  </table>

</form>
</body>
</html>
<?php
}
?>