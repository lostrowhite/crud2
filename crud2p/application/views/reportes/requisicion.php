
<html>
<head>
<title>Requisicion</title>
<style>
td{
	font-family:arial;

}
th{
	font-weight: bold;

}
.prod{
	text-align: center;

}

.titulo{
	text-align: center;
	font-weight: bold;
	font-style: italic;

}
.tituloP{
	text-align: center;
	font-weight: bold;

}
</style>
</head>
<body>
	<table width='100%'>
		<tr>
			<td rowspan='3'><img src="images/ucv.gif" style='height:70px; width:70px;'></td>
			<td align='center'>UNIVERSIDAD CENTRAL DE VENEZUELA</td>
			<td rowspan='3'><img src="images/deu.jpg" style='height:70px; width:70px;'></td>
		</tr>
		<tr>
			<td align='center'>DIRECCIÓN DE EXTENSIÓN UNIVERSITARIA</td>
		</tr>
		<tr>
			<td align='center'>RIF: G200000062-7</td>
		</tr>
	</table>
	<br><br>
	<table align='right' width='30%' border='1' style='border-collapse: collapse;'>
		<tr>
			<td align='center'>ORDEN DE REQUISICION N° <?php echo $requisicion;?></td>
		</tr>
		<tr>
			<td align='center'>FECHA [YYYY/MM/DD]</td>
		</tr>
		<tr>
			<td align='center'><?php echo $fecha;?></td>
		</tr>
	</table>
	<br>
	<br>
	<table align='center' width='95%' border='1' style='border-collapse: collapse;'>
		<tr>
			<td colspan='4' align='center'>SIRVASE DE DESPACHAR POR CUENTA DE ESTA DEPENDENCIA LOS MATERIALES QUE SE ESPECIFICAN A CONTINUACION</td>
		</tr>
		<tr>
			<td align='center' class='titulo'>Unidad de Medida</td>
			<td align='center' class='titulo'>Cantidad</td>
			<td align='center' class='titulo'>Mes</td>
			<td align='center' class='titulo'>Descripcion</td>
		</tr>
		<?php 
			foreach ($resultado as $result) {
				echo '<tr>';
					echo "<td align='center'>$result->name_unit</td>";
					echo "<td align='center'>$result->quantity</td>";
					echo "<td align='center'>$result->mes</td>";
					echo "<td align='center'>$result->name_product</td>";
				echo '</tr>';
			}
		?>
	</table>
	<br>
	<table align='center' width='95%' border='1' style='border-collapse: collapse;'>	
		<tr>

			<td align='center' class='titulo' width='200px' colspan='2'>Unidad Ejecutora</td>
			<td align='center' class='titulo' width='200px' colspan='2'>Programa</td>
		</tr>
		<tr>

			<td align='center'  colspan='2'><?php echo $resultado[0]->name_dept?></td>
			<td align='center' colspan='2'><?php echo $resultado[0]->cod_program?></td>
		</tr>
		<tr>
			<td align='center' class='titulo'>Solicitante</td>
			<td align='center' class='titulo' colspan='2'>Firma Autorizada</td>
			<td align='center' class='titulo'>Control de Presupuesto</td>
		</tr>
		<tr>
			<td align='center' class='titulo' height='37px'></td>
			<td align='center' class='titulo' height='37px' colspan='2'></td>
			<td align='center' class='titulo' height='37px'></td>
		</tr>
		<tr>
			<td align='center' class='titulo'>Nombre y Apellido</td>
			<td align='center' class='titulo' colspan='2'>Nombre y Apellido</td>
			<td align='center' class='titulo'>Nombre y Apellido</td>
		</tr>
	</table>


</body>
</html>