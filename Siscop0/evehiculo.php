<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} else{
if(isset($_GET['id'])){
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->edita_vehiculo($_GET['id']);
		$cliente = mysql_fetch_array($consulta);

		
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
<link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
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
<div id="main">
<!-- HEADER -->
  <div id="header1">
<form id="form1" method="post" action="acvehiculo.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea editar este veh\u00edculo?')){return false;}" >
  <table width="850" border="1" align="center">
    <tr>
      <td colspan="4" align="center" id="nsocio"><input type="hidden" name="vehiculo_id" id="vehiculo_id" value="<?php echo $cliente['id']?>" />
      <?php 
	  $consulta2=$objCliente->muestra_nsocio($cliente['id_s']);
	  $cliente2 = mysql_fetch_array($consulta2)
	  ?>
        Socio Responsable:
          <input name="c_nsocio" type="text" id="c_nsocio"  value="<?php echo $cliente2['nsocio']?>" size="3" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Nombres</td>
      <td><input name="c_nombres" type="text" value="<?php echo $cliente2['nombre']?>" readonly="readonly" /></td>
      <td> A&ntilde;o:</td>
      <td><input name="c_ano" type="text" placeholder="Ej:2005" class="validate[required, custom[onlyNumberSp], minSize[4] required,maxSize[4]] text-input" id="c_ano" value="<?php echo $cliente['ano']?>" size="6" />
      *
        </td>
    </tr>
    <tr>
      <td>Apellidos</td>
      <td><input name="c_apellidos" type="text" value="<?php echo $cliente2['apellido']?>" readonly="readonly" /></td>
      <td>Cant.Ptos.:</td>
      <td id="cpuestos"><input name="c_cpuestos" type="text" placeholder="Ej:32" class="validate[required,custom[integer],min[10],max[50]] text-input" value="<?php echo $cliente['cantptos']?>" size="4"/>
      *</td>
    </tr>
    <tr>
      <td>Cédula</td>
      <td><input name="c_cedula" type="text" id="c_cedula" value="<?php echo $cliente2['cedula']?>"  readonly="readonly" /></td>
      <td>Motor N: </td>
      <td id="motorn"><input name="c_motor" type="text" placeholder="Ejem:ENT55454685A" class="validate[required] text-input" id="c_motor" value="<?php echo $cliente['nmotor']?>" />
      *</td>
    </tr>
    <tr>
      <td>Placa: </td>
      <td id="placa"><input name="c_placa" type="text" class="validate[required,minSize[6] required,maxSize[7]] text-input" placeholder="Ejem:XIV454"  value="<?php echo $cliente['placa']?>"  />
      *</td>
      <td>Chasis N: </td>
      <td id="chasis"><input name="c_chasis" type="text" placeholder="Ejem:RST5454AS4" class="validate[required] text-input" id="c_chasis" value="<?php echo $cliente['chasis']?>" />
      *</td>
    </tr>
    <tr>
      <td>Marca:</td>
      <td id="marca"><input name="c_marca" type="text"  class="validate[required] text-input"  placeholder="Ejem:ENCAVA" value="<?php echo $cliente['marca']?>" />
      *</td>
      <td>Combustible: </td>
      <td id="combustible"><select name="c_combustible" id="c_combustible" class="validate[required]">
        <option value="<?php echo $cliente['combustible']?>"><?php echo $cliente['combustible']?></option>
       <?php
		$conexion = mysql_connect ("localhost", "root","") or
		die ("Problemas en la conexion");

		mysql_select_db ("exten",$conexion)or
		die ("Problemas en la seleccion de la base de datos");

		$registro = mysql_query ("select id, Tipo from combustible", $conexion) or
		die ("Problemas en el select: ".mysql_error());

		while ($reg=mysql_fetch_array($registro))
		{
  				if ($reg['Tipo']<>$cliente['combustible']){
				echo "<option value=\"$reg[Tipo]\">$reg[Tipo]</option>";
				}
		}		
?>	
        </select> *
        </td>
    </tr>
    <tr>
      <td >Modelo: </td>
      <td id="modelo"><input name="c_modelo" type="text" class="validate[required] text-input"  placeholder="Ejem:E-NT610"  value="<?php echo $cliente['modelo']?>" />
      *</td>
      <td>Tipo de Seguro:</td>
      <td id="ruta"><select name="c_tseguro" id="c_tseguro" class="validate[required]">
        <option value="<?php echo $cliente['tseguro']?>"><?php echo $cliente['tseguro']?> </option>
        <?php
	  if ($cliente['tseguro']=="RCV"){
		 echo'<option value="CASCO">CASCO</option>'; 
		 echo'<option value="TODO RIESGO">TODO RIESGO</option>';
		  }
	  if ($cliente['tseguro']=="CASCO"){
		 echo'<option value="RCV">RCV</option>'; 
		 echo'<option value="TODO RIESGO">TODO RIESGO</option>';
		  }
		if ($cliente['tseguro']=="TODO RIESGO"){
		 echo'<option value="CASCO">CASCO</option>'; 
		 echo'<option value="RCV">TODO RCV</option>';
		  }
	  ?>
        <?php
	  /*	if($cliente['tseguro']=="RCV"){
			echo'<option value="Casco">Casco</option>';
			echo'<option value="TodoRiesgo">TodoRiesgo</option>';
		}elseif($cliente['tseguro']=="Casco"){
			echo'<option value="RCV">RCV</option>';
			echo'<option value="TodoRiesgo">TodoRiesgo</option>';
		}elseif($cliente['tseguro']=="TodoRiesgo"){
			echo'<option value="RCV">RCV</option>';
			echo'<option value="Casco">Casco</option>';
			}*/
		?>
      </select>*</td>
    </tr>
    <tr>
      <td>Color:</td>
      <td id="color"><input name="c_color" type="text" placeholder="Ejem:Blanca"  class="validate[required]" value="<?php echo $cliente['color']?>" />
      *</td>
      <td>Cobertura Hasta: </td>
      <td id="tseguro"><input name="c_finalcobertura" type="text"class="validate[required] fecha" id="c_finalcobertura" value="<?php echo date('d-m-Y',strtotime($cliente['cobhasta']))?>" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="hasta" alt="" width="16" height="16" />
        <script>
   	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) +1;
			  var tope= (anio1*100+mes)*100+dia;

    Calendar.setup({
        trigger    : "hasta",
		dateFormat: "%d-%m-%Y",
        inputField : "c_finalcobertura",
		onSelect   : function() { this.hide() },
		min: tiempo,
				max: tope,
    });
        </script>*</td>
    </tr>
    <tr>
      <td>Cobertura Desde:</td>
      <td id="cdesde"><input name="c_iniciocobertura" type="text" class="validate[required] fecha" id="c_iniciocobertura" value="<?php echo date('d-m-Y',strtotime($cliente['cobdesde']))?>" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="desde" alt="" width="16" height="16" />
        <script>
   	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio) -1;
			  var tope= (anio1*100+mes)*100+dia;

    Calendar.setup({
        trigger    : "desde",
		dateFormat: "%d-%m-%Y",
        inputField : "c_iniciocobertura",
		onSelect   : function() { this.hide() },
		min: tope,
				max: tiempo,
    });
        </script>*</td>
      <td>Estado:</td>
      <td><select name="estado" id="estado" class="validate[required]">
        <option value="<?php switch ($cliente['estado']){ case 0:
		echo "1";
		break;
		case 1:
		echo "1";
		break;
		case 2:
		echo "2";
		break;
			
			}?>"><?php  switch ($cliente['estado']){ case 0:
		echo "Servicio";
		break;
		case 1:
		echo "Retirado";
		break;
		case 2:
		echo "Inactivo";
		break;
			
			}?></option>
        <?php
		switch ($cliente['estado']){ case 0:
		echo'<option value="2">Inactivo</option>';
		break;
		case 2:
		echo'<option value="0">Servicio</option>';
		break;
			}
		?>
      </select>*</td>
    </tr>
    <tr>
      <td>Cia Aseguradora: </td>
      <td id="caseguradora"><input name="c_ciaseguradora" type="text" placeholder="Ej:Mercantil" class="validate[required]" id="c_ciaseguradora" 
      value="<?php echo $cliente['compaseg']?>" />
      *</td>
      <td>&nbsp;</td>
      <td id="estadov">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Obs.</td>
      <td colspan="2" id="obs"><textarea class="validate[required] text-input" name= "c_obs" rows="4" cols="40"><?php echo $cliente['obs']?></textarea></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center" class="field2">
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
      </div></td>
    </tr>
  </table>
</form>
</div>  
  </div>
 <?php }} ?>
</div>
<!-- FOOTER -->
</div>
</body>
</html>