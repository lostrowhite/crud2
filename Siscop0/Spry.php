<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>

<link rel="stylesheet" href="mi_estilo.css" />

<script type="text/javascript" src="js/core.js"></script>
<script type="text/javascript" src="js/more.js"></script>
<script type="text/javascript" src="formcheck/lang/es.js"> </script>
<script type="text/javascript" src="formcheck/formcheck.js"> </script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.js" ></script>

<script type="text/javascript">
    window.addEvent('domready', function(){
         new FormCheck('formulario');
    });

</script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<link rel="stylesheet" href="formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />
<form method="POST"  id="formulario" name="formulario" action="P5a_EB.php" accept-charset="utf-8">
<input type="hidden" name="id_cedula" value=" "/>
<input type="hidden" name="id_nombre" value=" "/>
<input type="hidden" name="id" value=" "/>

<h4>Grupo familiar del niño(a)</h4>
<table id="customers">
<tr>
<td>Nombre y  Apellido</td>
<td>Parentesco</td>
<td>Edad</td>

<td>Sexo</td>
<td>Grado de<br />instrucción</td>
<td>Ocupación actual</td>
</tr>
<tr>
<td><input type="text" size="42" name="nombre_fami0" class="validate['required','text']"/></td>
<td><select name="parentesco0" size="1" class="validate['required','select']">
<option value="nadie">-- seleccione --</option>
<option value="padre">Padre</option>
<option value="madre">Madre</option>

<option value="hermano">Hermano(a)</option>
<option value="abuelo">Abuelo(a)</option>
<option value="tio">Tio(a)</option>
<option value="otro">Otro</option>
</select></td>
<td><input type="text" size="2" name="edad_fami0" maxlength="2" /></td>
<td><select size="1" name="sexo_fami0" class="validate['required','select']">
    <option value="">-</option>
	<option value="M">M</option>

	<option value="F">F</option>
</select></td>
<td><select name="instruc_fami0" size="1" class="validate['required','select']">
<option value="nadie">-- seleccione --</option>
<option value="1">Primaria</option>
<option value="2">Secundaria</option>
<option value="3">Superior</option>
<option value="0">Otro</option>
</select></td>
<td><input type="text" name="ocup_fami0" class="validate['required','text']"/></td>

</tr>
<tr>
<td><input type="text" size="42" name="nombre_fami1" /></td>
<td><select name="parentesco1" size="1">
<option value="nadie">-- seleccione --</option>
<option value="padre">Padre</option>
<option value="madre">Madre</option>
<option value="hermano">Hermano(a)</option>
<option value="abuelo">Abuelo(a)</option>
<option value="tio">Tio(a)</option>
<option value="otro">Otro</option>

</select></td>
<td><input type="text" size="2" name="edad_fami1" maxlength="2" /></td>
<td><select size="1" name="sexo_fami1">
    <option value="">-</option>
	<option value="M">M</option>
	<option value="F">F</option>
</select></td>
<td><select name="instruc_fami1" size="1">
<option value="nadie">-- seleccione --</option>
<option value="1">Primaria</option>

<option value="2">Secundaria</option>
<option value="3">Superior</option>
<option value="0">Otro</option>
</select></td>
<td><input type="text" name="ocup_fami1" /></td>
</tr>
<tr>
<td><input type="text" size="42" name="nombre_fami2" /></td>
<td><select name="parentesco2" size="1">
<option value="nadie">-- seleccione --</option>
<option value="padre">Padre</option>
<option value="madre">Madre</option>

<option value="hermano">Hermano(a)</option>
<option value="abuelo">Abuelo(a)</option>
<option value="tio">Tio(a)</option>
<option value="otro">Otro</option>
</select></td>
<td><input type="text" size="2" name="edad_fami2" maxlength="2"/></td>
<td><select size="1" name="sexo_fami2">
    <option value="">-</option>
	<option value="M">M</option>

	<option value="F">F</option>
</select></td>
<td><select name="instruc_fami2" size="1">
<option value="nadie">-- seleccione --</option>
<option value="1">Primaria</option>
<option value="2">Secundaria</option>
<option value="3">Superior</option>
<option value="0">Otro</option>
</select></td>
<td><input type="text" name="ocup_fami2" /></td>

</tr>
<tr>
<td><input type="text" size="42" name="nombre_fami3" /></td>
<td><select name="parentesco3" size="1">
<option value="nadie">-- seleccione --</option>
<option value="padre">Padre</option>
<option value="madre">Madre</option>
<option value="hermano">Hermano(a)</option>
<option value="abuelo">Abuelo(a)</option>
<option value="tio">Tio(a)</option>
<option value="otro">Otro</option>

</select></td>
<td><input type="text" size="2" name="edad_fami3" maxlength="2"/></td>
<td><select size="1" name="sexo_fami3">
    <option value="">-</option>
	<option value="M">M</option>
	<option value="F">F</option>
</select></td>
<td><select name="instruc_fami3-" size="1">
<option value="nadie">-- seleccione --</option>
<option value="1">Primaria</option>

<option value="2">Secundaria</option>
<option value="3">Superior</option>
<option value="0">Otro</option>
</select></td>
<td><input type="text" name="ocup_fami3" /></td>
</tr>
</table>
<br />
<table id="customers">
<tr>
    <td>Indique tipo de vivienda:</td>
    <td><select size="1" name="vivienda" class="validate['required','select']">

    <option value="nadie">-- seleccione --</option>
	<option value="Cas">Casa</option>
	<option value="Apto">Apartamento</option>
	<option value="Pen">Pensión</option>
    <option value="Hab">Habitación</option>
	<option value="Otra">Otra</option>

</select></td>
</tr>
<tr>
    <td>Tenencia de la vivienda:</td>
    <td><select size="1" name="vivienda_propiedad" class="validate['required','select']">
    <option value="nadie">-- seleccione --</option>
	<option value="Propia">Propia</option>
	<option value="Pagandose">Propia Pagandose</option>

	<option value="Alquilada">Alquilada</option>
	<option value="Otra">Otra</option>
</select></td>
  </tr>
</table>


<center><h4>Distribución del ingreso real (mensual)</h4>
<table id="customers">
<tr>
<td>Vivienda Bs.:</td>

<td><input type="text" size="10" name="monto_vivienda" class="validate['required','digit']"/></td>
</tr>
<tr>
<td>Alimentacion Bs.:</td>
<td><input type="text" size="10" name="monto_alimentos" class="validate['required','digit']"/></td>
</tr>
<tr>
<td>Condominio Bs.:</td>
<td><input type="text" size="10" name="monto_condo" class="validate['required','digit']"/></td>
</tr>
<tr>
<td>Servicios públicos(agua, luz, teléfono, etc.) Bs.:</td>
<td><input type="text" size="10" name="monto_servicios" class="validate['required','digit']"/></td>
</tr>

<tr>
<td>Transporte Bs.:</td>
<td><input type="text" size="10" name="monto_transporte" class="validate['required','digit']"/></td>
</tr>
<tr>
<td>Educación Bs.:</td>
<td><input type="text" size="10" name="monto_educacion" class="validate['required','digit']"/></td>
</tr>
<tr>
<td>Otros gastos Bs.:</td>
<td><input type="text" size="10" name="monto_otros" class="validate['required','digit']"/></td>
</tr>
<tr>
<td>OBSERVACIONES:</td>

<td><textarea name="observa" rows="6" cols="65"></textarea></td>
</tr>
</table></center>
<center><input type="submit" value="Siguiente" class="validate['submit']"/> </center>

</form>
<br />
<!-- Firma y fecha de la página -->


</body>


</html>