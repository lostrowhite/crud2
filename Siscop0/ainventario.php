<?php
		require('clases/cliente.class.php');
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
<script type="text/javascript" src="js/func.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link href="js/facebox.css" rel="stylesheet" type="text/css" />
<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET">
<link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">	</script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/facebox.js"type="text/javascript"></script>
<script>
 jQuery(document).ready(function($) {
	 
		   $('a[rel*=facebox]').facebox({
        loadingImage : 'images/loading.gif',
        closeImage   : 'images/closelabel.png'
      })
    })
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
                <div id="content1">
     <div class="indent">
<form id="form1" method="post" action="ginventario.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >

  <table width="638" height="346" border="0" align="center" >
    <tr>
    <td width="407" height="75">
        <br />
        <br />
        Proveedor
<?php

    $objCliente = new Cliente;
    $consulta = $objCliente->mostrar_proveedores(); ?>
<a href="nproveedor.php"><img  src="images/new.png"  alt="" width="23" height="24" /></a>
<select name="c_proveedor" class="validate[required]" id="c_proveedor">
  <?php
	echo "<option value='' selected='selected'>Seleccione</option>";
    while ($resultado = mysql_fetch_array($consulta)){

          echo "<option value='".$resultado['id_proveedor']."'>".$resultado['proveedor']."</option>";

    }

			?>    
</select>
*
    <a href="nproveedor.php"></a> <a href="nrepuesto.php"></a></td>
      <td width="407" >
        <p><br />
          <br />
          Nº de Factura
  <?php
	  $consulta1=$objCliente->mostrar_factura();
	 
	$numeroRegistro=mysql_num_rows($consulta1);
	if ($numeroRegistro==0){
		$ndip=1;
		}else {
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip=mysql_result($consulta1,$contador,"id_f");
	}
		$ndip++;
	}
			echo"<input type='hidden' readonly='readonly'  name='id_fac' id='id_fac' value='$ndip' size='2' >";
	  ?>
  <input class="validate[required] text-input" type="text" name="pfactura" id="pfactura"  />
        <input type="text" name="OcultoDatoTabla" id="OcultoDatoTabla" />
        *
        </p>
        <p>
        Fecha de Factura: <input name="c_fechafac" type="text" class="validate[required] fecha" id="c_fechafac" size="10" readonly="readonly" />
        <img src="images/calendario.png" id="ffac" alt="" width="16" height="16" />
        <script>
		 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
			  			  var anio1 = (anio);
			  var tope= (anio1*100+mes)*100+dia;
    Calendar.setup({
        trigger    : "ffac",
		dateFormat: "%d-%m-%Y",
        inputField : "c_fechafac",
		onSelect   : function() { this.hide() },
		max: tiempo,
    });
        </script>
          *
          <input name="c_fechainv" type="hidden" class="validate[required] fecha" id="c_fechainv" size="10" readonly="readonly" value="<?php echo date('d-m-Y') ?>"/>
        </p></td>
    </tr>
    
    <tr>
    <!-- comienza la tabla  -->     
      <td colspan="2" ></td>
    </tr>
    <tr>
      <td colspan="2" id="titulo2">
      <table width="553" border="0" cellspacing="0">
        <tr>
          <td width="184">        <?php
    $objCliente = new Cliente;
    $consulta = $objCliente->mostrar_piezas(); ?>Pieza     
            <input type="hidden" id="num_act" name="num_act" value="0" />
            <input type="hidden" id="cant_act" name="cant_act" value="0" /></td>
          <td width="123">Cantidad<br /></td>
          <td width="177">Descripción<br /></td>
          <td width="152">Precio Unitario<br /></td>
          <td width="97">Precio Total</td>
          <td width="55">
          <div class="field2">
          <a href="bproductos.php" rel="facebox" ><em><b>Agregar<span>Agregar</span></b></em></a>
          </div>* 
          </td>
        </tr>
      </table>
            
      <table border="1" id="tblacti" width="800" align="left"></table></td>
    </tr>
    <tr id="izq">
    
    
    <!-- Aqui va el total de la factura -->
    <?php
	$consulta2=$objCliente->mostrar_iva(); 
	$ivap=mysql_fetch_array($consulta2);
	?>
    
    <td id="der" colspan="2" align="right">Total Sin IVA
      <input type="hidden" name="iva" id="iva" value="<?php echo $ivap['piva'] ?>"/>
      <input type="text" class="validate[required] text-input" name="tfacturasin" id="tfacturasin" readonly='readonly' />
      <br />
      IVA <?php echo $ivap['piva'] ?>%
      <input type="text" class="validate[required] text-input" name="ivaf" id="ivaf" readonly='readonly' />
      <br />
      Total Factura
<input type="text" class="validate[required] text-input" name="tfactura" id="tfactura" readonly='readonly' />
<br />
</td>
    </tr>
    
    
    
    
      <td id="der" colspan="2" align="center"><div align="center" class="field2">
        <dt><dl><input name="Grabar" value="Grabar" type="submit" /></dl></dt>
        </div></td>
    </tr>
    </table>
</form>     
  </div>
    <div id="footer1">
      <div class="footer-nav">
         
      </div>

    </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>