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
<form id="form1" method="post" action="gfacturav.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >

  <table width="638" height="346" border="0" align="center" >
    <tr>
    <td width="353" height="75" align="center" valign="middle" id="descripcionr2">
        <p>Nº de Socio<?php

    $objCliente = new Cliente;
    $consulta = $objCliente->mostrar_socios(); 
	?>
  	      <select name="c_socio" class="validate[required]" id="c_socio">
          <?php
			echo "<option value='' selected='selected'>Seleccione Socio ...</option>";
    		while ($resultado = mysql_fetch_array($consulta)){

          	echo "<option value='".$resultado['id_s']."'>"." Nº ".$resultado['nsocio']." ".$resultado['nombre']." ".$resultado['apellido']."</option>";
			}
		?>    
  	</select>
  	      *
  	      <a href="nrepuesto.php"></a></p>        </p></td>
      <td width="151" align="right" valign="middle" id="descripcionr2">
       Nº de Factura
  :
          
          <br />
          <?php
		//Muestra el id de la factura que se va a cargar
		//Arreglar cuando el contador esta en 0
	  $consulta1=$objCliente->mostrar_facturav(); 
	$numeroRegistro=mysql_num_rows($consulta1);
	if($numeroRegistro==0){
		$ndip_f =1;
		}else{ 
	for ($contador=0;$contador<$numeroRegistro;$contador++){
		$ndip_f=mysql_result($consulta1,$contador,"id_fv");
	}
		$ndip_f++;
	}
			echo"<input type='hidden' name='id_facv' id='id_facv' value='$ndip_f' size='2'  >";
		$ndip_f2 = str_pad($ndip_f,5,"0",STR_PAD_LEFT);	
	  ?>
<input type="hidden" name="OcultoDatoTabla" id="OcultoDatoTabla" />
          <br />
          Fecha de :            </td>
      <td width="306" align="left" valign="middle" id="descripcionr2"><input name="nfactura" type="text" id="nfactura" value="<?php echo $ndip_f2 ?>" size="12" readonly="readonly" />
        <br />
        <input name="c_fechaf" type="text" id="c_fechaf" value="<?php echo date('d-m-Y'); ?>" size="10" readonly='readonly' /></td>
    </tr>
    
    <tr>
    <!-- comienza la tabla  -->     
      <td colspan="3" ><table width="934" border="0" cellspacing="0">
        <tr>
          <td width="162">        <?php
   // $objCliente = new Cliente;
    //$consulta = $objCliente->mostrar_piezas(); ?>Pieza     
            <input type="text" id="num_act" name="num_act" value="0" />
            <input type="text" id="cant_act" name="cant_act" value="0" /></td>
          <td width="120">Cantidad<br /></td>
          <td width="192">Descripción<br /></td>
          <td width="126">Precio Unitario</td>
          <td width="82">Sub-Total<br /></td>
          <td width="106">
          <div class="field2">
          <a href="bproductosf.php" rel="facebox" ><em><b>Agregar<span>Agregar</span></b></em></a>
          </div>*
          </td>
        </tr>
      </table></td>
      
    </tr>
    <tr>
      <td colspan="3" id="titulo2"><table border="1" id="tblacti" width="800" align="left"></table></td>
    </tr>
    <tr id="izq">
    
    
    <!-- Aqui va el total de la factura -->
    <?php
	$consulta2=$objCliente->mostrar_iva(); 
	$ivap=mysql_fetch_array($consulta2);
	?>
     <td id="der" colspan="3" align="right">Total Sin IVA <input type="hidden" name="iva" id="iva" value="<?php echo $ivap['piva'] ?>"/>
      <input type="text" class="validate[required] text-input" name="tfacturasin" id="tfacturasin" readonly='readonly' />
      <br />
IVA: <?php echo $ivap['piva'] ?>%
<input type="text" class="validate[required] text-input" name="ivaf" id="ivaf" readonly='readonly' />
<br />
      Total Factura
      <input type="text" class="validate[required] text-input" readonly='readonly' name="tfactura" id="tfactura" />
      <br />
      </td>
    </tr>
    
    
    
    
      <td id="der" colspan="3" align="center"><div align="center" class="field2">
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