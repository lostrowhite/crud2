<?php $fechas=explode('-', $fecha);?>



<html>
<head>
<title>Comprobante de Cheque</title>
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
	<table width='90%'  align='center'>
		<tr>
			<td colspan='2' align='left'>UNIVERSIDAD CENTRAL DE VENEZUELA</td>
		</tr>
		<tr>
			<td colspan='2' align='right'><br><br>NUMERO: </td>
		</tr>
		<tr>
			<td colspan='2' align='right'>FECHA:<?php echo $fecha;?><br><br> </td>
		</tr>
		<tr>
			<td colspan='2' align='center'>DEPENDENCIA SOLICITANTE</td>
		</tr>
		<tr>
			<td align='LEFT'>NOMBRE O RAZON SOCIAL</td>
			<td align='RIGHT'>RIF/C.I.</td>
		</tr>
		<tr>
			<td align='LEFT'><?php echo $dato['bene']?></td>
			<td align='RIGHT'><?php echo $dato['rif']?></td>
		</tr>
		<tr>
			<td colspan='2' align='center'>MONTO DEL CHEQUE</td>
		</tr>
		<tr>
			<td align='LEFT'>POR BOLIVARES FUERTES</td>
			<td align='RIGHT'><?php echo $dato['monto']?></td>
		</tr>
		<tr>
			<td align='LEFT'><?php echo $dato['montoletras']?></td>
			<td align='RIGHT'></td>
		</tr>
		<tr>
			<td colspan='2' align='center'>CONCEPTO</td>
		</tr>
		<tr>
			<td colspan='2' align='center'>------------------------------------------------------------------------------------------------------------------------------------</td>
		</tr>
		<tr>
			<td colspan='2' align='CENTER'><?php echo $dato['concepto']?></td>
		</tr>
		

	</table>
	<BR><br><br><br><br>
	<table width='640PX'  align='center'>
		<tr>
			<td colspan='6' align='center'>---------------------------------------DISTRIBUCION CONTABLE------------------------------------</td>
		</tr>
		<tr>
			<td align='CENTER'>UNIDAD EJECUTORA</td>
			<td align='CENTER'>PROGRAMA</td>
			<td align='CENTER'>NORMA CNU</td>
			<td align='CENTER'>FONDO</td>
			<td align='CENTER'>CODIGO CONTABLE</td>
			<td align='CENTER'>MONTO</td>
		</tr>
		<tr>
			<td align='CENTER'>-------------------</td>
			<td align='CENTER'>-----------</td>
			<td align='CENTER'>------------</td>
			<td align='CENTER'>--------</td>
			<td align='CENTER'>-----------------</td>
			<td align='CENTER'>--------</td>
		</tr>
		<?php foreach($dato['cuentas'] as $cuenta){
			echo "<tr>";
				echo "<td align='center'>".$cuenta['unidad']."</td>";
				echo "<td align='center'>".$cuenta['program']."</td>";
				echo "<td align='center'>000</td>";
				echo "<td align='center'>".$cuenta['fondo']."</td>";
				echo "<td align='center'>".$cuenta['cuenta']."</td>";
				echo "<td align='center'>".$cuenta['monto']."</td>";
			echo "</tr>";
		
			}
		?>
	</table>
	<br><br><br><br><br><br><br><br><br><br>
	<table width='640PX'  align='center'>
		<tr>
			<td colspan='3' align='center'>FIRMAS AUTORIZADAS</td>
			
		</tr>
		<tr>
			<td align='center'><br><br>FACULTAD O DEPENDENCIA</td>
			<td align='center'><br><br> </td>
			<td align='center'><br><br>DIRECCION DE ADMINISTRACION</td>
			
		</tr>
		<tr>
			<td align='center'><br><br>-----------------------------------------</td>
			<td align='center'><br><br>-----------------------------------------</td>
			<td align='center'><br><br>-----------------------------------------</td>
			
		</tr>

		<tr>
			<td align='center' width='213PX'>SOLICITANTE</td>
			<td align='center' width='214PX' >DECANO O DIRECTOR</td>
			<td align='center' width='213PX'>TESORERO</td>
			
		</tr>
	
	</table>
</body>
</html>
