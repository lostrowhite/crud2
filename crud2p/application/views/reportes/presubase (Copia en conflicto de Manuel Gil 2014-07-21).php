<?php $fecha=explode('-', $fecha);
?>

<html>
<head>
<title>Orden De Compra</title>
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

.grey{
		background-color: grey;
		font-weight: bold;
		font-style: italic;
}

.blue{
	background-color: #2A9CFA;
	font-weight: bold;
	font-style: italic;

}
</style>
</head>
<body>
	<table width='100%'>
		<tr>
			<td rowspan='2'><img src="images/ucv.gif" style='height:70px; width:70px;'></td>
			<td align='center'>UNIVERSIDAD CENTRAL DE VENEZUELA</td>
			<td rowspan='2'><img src="images/deu.jpg" style='height:70px; width:70px;'></td>
		</tr>
		<tr>
			<td align='center'>DIRECCIÓN DE EXTENSIÓN UNIVERSITARIA</td>
		</tr>
	</table>

	<table align='right' width='30%' border='1' style='border-collapse: collapse;'>
		<tr>
			<td align='center' colspan='3' class='grey'>PRESUPUESTO BASE N° <?php echo $preBase;?></td>
		</tr>
		<tr>
			<td align='center' colspan='3'>FECHA</td>
		</tr>
		<tr>
			<td align='center'>DIA</td>
			<td align='center'>MES</td>
			<td align='center'>AÑO</td>
		</tr>
		<tr>
			<td align='center'><?php echo $fecha[2];?></td>
			<td align='center'><?php echo $fecha[1];?></td>
			<td align='center'><?php echo $fecha[0];?></td>
		</tr>
	</table>
	<br>
	<table align='CENTER' width='100%' style='border-collapse: collapse;'>
		<tr>
			<td align='center' style='border:1;' width='75,5px' class='blue'>CANTIDAD</td>
			<td align='center' style='border:1;' width='151,1px' class='blue'>DESCRIPCION</td>
			<td align='center' style='border:1;' width='113px' class='blue'>UNIDAD EJECUTORA</td>
			<td align='center' style='border:1;' width='75,5px' class='blue'>PRECIO UNITARIO</td>
			<td align='center' style='border:1;' width='56,6px' class='blue'>IVA</td>
			<td align='center' style='border:1;' width='113px' class='blue'>PRECIO REFERENCIAL CON IVA</td>
			<td align='center' style='border:1;' width='94,4px' class='blue'>MONTO TOTAL</td>
		</tr>
		<?php
		foreach ($resultados as $resultado) {
			# code...
		
			echo "<tr>";
				echo "<td align='center' style='border:1;' width='75,5PX'>$resultado->quantity</td>";
				echo "<td align='center' style='border:1;' width='151,1PX'>$resultado->name_product $resultado->part_number</td>";
				echo "<td align='center' style='border:1;' width='113PX'>$resultado->name_dept $resultado->code_dept</td>";
				echo "<td align='center' style='border:1;' width='75,5PX'>$resultado->amount</td>";
				echo "<td align='center' style='border:1;' width='56,6PX'>12%</td>";
				echo "<td align='center' style='border:1;' width='113PX'>($resultado->amount*12)/100</td>";
				echo "<td align='center' style='border:1;' width='94,4PX'>$resultado->amount+(($resultado->amount*12)/100)</td>";
			echo "<tr>";
		}
		?>
		<tr>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center' style='border:1;'  COLSPAN='2' class='grey'>SUB-TOTAL</td>
			<td align='center' style='border:1;' class='grey'>0.00</td>
		</tr>
		<tr>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center' style='border:1;' class='grey' COLSPAN='2'>IVA 11</td>
			<td align='center' style='border:1;' class='grey' >0.00</td>
		</tr>
		<tr>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center' style='border:1;' class='grey' COLSPAN='2'>TOTAL</td>
			<td align='center' style='border:1;' class='grey' >0.00</td>
		</tr>
	</table>
	<br><br><br><br>
	<table>
		<tr>
			<td align='center'  width='75,5PX'></td>
			<td align='center'  width='151,1PX'>ELABORADO POR</td>
			<td align='center'  width='113px'></td>
			<td align='center'  width='75,5PX'></td>
			<td align='center'  width='56,6PX'></td>
			<td align='center'  width='113px'>REVISADO POR</td>
			<td align='center'  width='94,4PX'></td>
		</tr>
	</table>


</body>
</html>