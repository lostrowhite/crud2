<?php $fecha=explode('-', $fecha);
?>

<html>
<head>
<title>Presupuesto Base</title>
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
	<bR><br>
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
			<td align='center' style='border:1;' width='200px' class='blue'>UNIDAD EJECUTORA</td>
			<td align='center' style='border:1;' width='150px' class='blue'>PRECIO UNITARIO</td>
			<td align='center' style='border:1;' width='94,4px' class='blue'>MONTO TOTAL</td>
		</tr>
		<?php
		foreach ($resultados as $resultado) {
			# code...
			$iva=($resultado->amount*12)/100;
			$total=$resultado->amount+(($resultado->amount*12)/100);
			$totalCanti=$resultado->amount*$resultado->quantity;
			echo "<tr>";
				echo "<td align='center' style='border:1;' width='75,5PX'>$resultado->quantity</td>";
				echo "<td align='center' style='border:1;' width='151,1PX'>$resultado->name_product</td>";
				echo "<td align='center' style='border:1;' width='113PX'>$resultado->name_dept $resultado->code_dept</td>";
				echo "<td align='center' style='border:1;' width='75,5PX'>".number_format((float)$resultado->amount, 2, ',', '.')."</td>";
				echo "<td align='center' style='border:1;' width='94,4PX'>".number_format((float)$totalCanti, 2, ',', '.')."</td>";
			echo "<tr>";
			$SubFinal+=$totalCanti;
		}
		$ivaFinal=($SubFinal*12)/100;
		$totalFinal=$SubFinal+$ivaFinal;
		?>
		<tr>
			
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center' style='border:1;'  COLSPAN='1' class='grey'>SUB-TOTAL</td>
			<td align='center' style='border:1;' class='grey'><?php echo number_format((float)$SubFinal, 2, ',', '.');?></td>
		</tr>
		<tr>
			
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center' style='border:1;' class='grey' COLSPAN='1'>IVA 12%</td>
			<td align='center' style='border:1;' class='grey' ><?php echo number_format((float)$ivaFinal, 2, ',', '.');?></td>
		</tr>
		<tr>
			
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center' style='border:1;' class='grey' COLSPAN='1'>TOTAL</td>
			<td align='center' style='border:1;' class='grey' ><?php echo number_format((float)$totalFinal, 2, ',', '.');?></td>
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