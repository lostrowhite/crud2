<?php
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
<link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
<script type="text/javascript" src="JSCal2/js/lang/es.js"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		            
			jQuery("#form1").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true});
		});
	function Cancel(){
		$("#formsol").hide();
		$("#tablasol").show();
		return false;
	}
</script>
</head>
<body>
<!-- HEADER -->
  <div id="header1">
    <div id="content1">
      <div class="indent">
	<form id="form1"  method="post" action="gservicio.php" onSubmit="if(!confirm(String.fromCharCode(191)+'Esta seguro que desea enviar esta información?')){return false;}" >
	<table width="700" border="0" align="center" id="cuerpo">
    <tr id="sizq" >
      <td colspan="2" align="center" class="sder" ><h3>Procesar Solicitud de Servicio</h3></td>
    </tr>
    <tr>
      <td width="366" align="left" id="historia21">Nombre<br />
        <input class="validate[required] text-input" type="text" name="c_nombres" placeholder="Ejem:Pedro Antonio" />
*</td>
      <td width="324" id="direccion21">Correo:<br />
        <input name="c_correo" type="text" size="30" class="validate[required,custom[email]] text-input" placeholder="Ejem:correo@ghot.com"/>
*</td>
    </tr>
    <tr>
      <td "vcedula">Fecha de Ida: <br />
        <input name="fechaida" type="text" class="validate[required] fecha " id="fechaida" size="25" readonly="readonly" />
        <img src="images/calendario.png" id="vced" alt="" width="16" height="16"  />
        <script>
	 var fecha = new Date();
              var anio = fecha.getYear()+1900;
              var mes = fecha.getMonth()+1;
              var dia = fecha.getDate();
              var tiempo = (anio*100+mes)*100+dia;
	Calendar.setup({
        trigger    : "vced",
		dateFormat: "%d-%m-%Y",
        inputField : "fechaida",
		onSelect   : function() { this.hide() },
    });
        </script>
        *</td>
      <td id="direccion20">Fecha de Retorno:<br />
        <input name="fechavuelta" type="text" class="validate[required] fecha" id="fechavuelta" size="25" readonly="readonly" />
        <img src="images/calendario.png" id="fing" alt="" width="16" height="16" />
        <script>
    Calendar.setup({
        trigger    : "fing",
		dateFormat: "%d-%m-%Y",
        inputField : "fechavuelta",
		onSelect   : function() { this.hide() }
    });
        </script>
*</td>
    </tr>
    <tr>
      <td "telefono"> Teléfono:<br />
        <input type="text" name="c_telefono" class="validate[custom[phone]] text-input" onkeyup="mascara(this,'-',tlf,true)" maxlength="13" placeholder="Ejem: 02126666666"/>
        *<br />
        Cantidad de personas<br />
        <input name="c_cantidad" type="text" class="validate[required,custom[onlyNumberSp]] text-input" placeholder="Ejem: 2" onkeyup="mascara(this,'-',tlf,true)" size="5" maxlength="13" id="c_cantidad"/>
        *</td>
      <td id="direccion19">Solicitud:<br />
        <textarea class="validate[required] text-input" name="c_historia" rows="2" cols="40"></textarea>
*</td>
    </tr>
        <tr>
          <td colspan="2">* Campos obligatorios</td>
          
        </tr>
    <tr id="izq">
      <td id="der" colspan="2" align="center"><div align="center" class="field2">
           <dt><dl><input name="Cancelar" value="Cancelar" type="button" onclick="Cancel();" /></dl></dt>
           <dt><dl><input name="Grabar" value="Enviar" type="submit" /></dl></dt>
        </div></td>
      </tr>
  </table>

</form>
</div>
        <br>
        <p align="center"></p>  
     
</div>
  </div>
<!-- FOOTER -->
</div>
</body>
</html>