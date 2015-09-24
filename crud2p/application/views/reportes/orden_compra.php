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
	<table WIDTH='100%'>
		<tr>
			<td width='113px'>
				EMPRESA:
			</td>
			<td width='226px'>
				<?php echo $cabezal[0]->name;?>
 			</td>
			<td align='center' style='border:1;' width='339px' colspan='3'>
				ORDEN DE COMPRA
			</td>
		</tr>
		<tr>
			<td width='113px'>
				RIF:
			</td>
			<td width='226px'>
				<?php echo $cabezal[0]->rif;?>
			</td>
			<td align='center' style='border:1;' width='339px' colspan='3'>
				<?php echo 'N° '.$cabezal[0]->id_purchase_order;?>
			</td>
		</tr>
		<tr>
			<td width='113px'>
				TELEFONO:
			</td>
			<td width='226px'>
				<?php echo $cabezal[0]->tlf;?>
			</td>
			<td align='center' style='border:1;' width='339px' colspan='3'>
				N° DE PROCEDIMIENTO
			</td>
		</tr>
		<tr>
			<td  width='113px' ROWSPAN='4'>
				DIRECCIÓN:
			</td>
			<td  width='226px' ROWSPAN='4'>
				<?php echo $cabezal[0]->address;?>
				
			</td>
			<td align='center' style='border:1;' width='339px' colspan='3'>
				CP/DEU/UCV/<?php ECHO $cabezal[0]->id_purchase_order;?>/<?php echo $fecha[0];?>
			</td>
		</tr>
		<tr>

			<td align='center' style='border:1;' width='339px' colspan='3'>
				FECHA
			</td>
		</tr>
		<tr>

			<td align='center' style='border:1;' width='113px'>
				DIA
			</td>
			<td align='center' style='border:1;' width='113px'>
				MES
			</td>
			<td align='center' style='border:1;' width='113px'>
				AÑO
			</td>
		</tr>
		<tr>

			<td align='center' style='border:1;'  width='113px'>
				<?php echo $fecha[2];?>
			</td>
			<td align='center' style='border:1;' width='113px'>
				<?php echo $fecha[1];?>
			</td>
			<td align='center' style='border:1;' width='113px'>
				<?php echo $fecha[1];?>
			</td>
		</tr>

	</table>

	<table >
		<tr>
			<td colspan='5' >
				SIRVASE DESPACHAR POR CUENTA DE ESTA DEPENDENCIA LOS MATERIALES QUE SE ESPECIFICACAN A CONITNUACIÓN
			</td>
		</tr>


		<tr>
			<td>
				<table style='border-collapse: collapse;' width='100%'>
					<tr>
						<td colspan='8' style='border:1;' width='580px' class='titulo'>
							DIVISIÓN
						</td>
					</tr>
					<tr>
						<td style='border:1;' width='69px' class='titulo'>
							CANTIDAD
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							DESCRIPCION
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							CUENTA DE GASTO
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							FONDO
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							UNIDAD EJECUTORA
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							PROGRAMA
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							PRECIO UNITARIO
						</td>
						<td style='border:1;' width='69px' class='titulo'>
							TOTAL
						</td>
					</tr>
					<?php foreach ($productos as $producto) {
						echo '<tr>';
						//var_dump($producto);exit;
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->quantity;
							echo "</td>";
							echo "<td style='border:1;' width='220px' class='prod'>";
								echo $producto->name_product;
							echo "</td>";
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->name_account.', '.$producto->code_account;
							echo "</td>";
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->fund;
							echo "</td>";
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->code_dept;
							echo "</td>";
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->cod_program;
							echo "</td>";
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->amount;
							echo "</td>";
							echo "<td style='border:1;' width='113px' class='prod'>";
								echo $producto->amount*$producto->quantity;
							echo "</td>";
						echo '</tr>';
						$subtotal+=$producto->amount*$producto->quantity;
					}?>


					<tr>
						<td colspan='3'></td>
						<td style='border:1;' align='center' colspan='2'>
							SUB-TOTAL
						</td>
						<td style='border:1;' align='center'>
							Bs.
						</td>
						<td style='border:1;' align='center' colspan='2'>
							<?php echo $subtotal;?>
						</td>
					</tr>
					<tr>
						<td colspan='3'></td>
						<td style='border:1;' align='center' colspan='2' >
							IVA
						</td>
						<td style='border:1;' align='center'>
							<?php echo $cabezal[0]->iva.'%';?>
						</td>
						<td style='border:1;' align='center' colspan='2'>
							<?php echo ($subtotal*$cabezal[0]->iva)/100; ?>
						</td>
					</tr>
					<tr>
						<td colspan='3'></td>
						<td style='border:1;' align='center' colspan='2'>
							TOTAL
						</td>
						<td style='border:1;' align='center'>
							Bs.
						</td>
						<td style='border:1;' align='center' colspan='2'>
							<?php echo $subtotal+(($subtotal*$cabezal[0]->iva)/100);?>
						</td>
					</tr>
					</table>
					<br>
					<table style='border-collapse: collapse;' width='100%'>
					<tr>
						<td style='border:1;' colspan='5' align='center' width='1011px'>
							FIRMAS AUTORIZADAS
						</td>
					</tr>
					<tr>
						<td style='border:1;' width='202,2px' align='center'>
							ELABORADO
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							REVISADO
						</td>
						<td style='border:1;' width='206,2px' align='center' >
							REVISADO
						</td>
						<td style='border:1;' width='202,2px' align='center' >
							APROBADO
						</td>
						<td style='border:1;' width='202,2px' align='center' >
							PROVEEDOR
						</td>
					</tr>
					<tr>
						<td style='border:1;' width='202,2px' height='37px' align='center'>
							
						</td>
						<td style='border:1;' width='202,2px' height='37px' align='center'>
							
						</td>
						<td style='border:1;' width='202,2px' height='37px' align='center'>
							
						</td>
						<td style='border:1;' width='202,2px' height='37px' align='center'>
							
						</td>
						<td style='border:1;' width='202,2px' height='37px' align='center'>
							
						</td>
					</tr>
					<tr>
						<td style='border:1;' width='202,2px' align='center'>
							<?php echo $firmas['COMPRAS']->first_name.' '.$firmas['COMPRAS']->last_name;?>
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							<?php echo $firmas['PRESUPUESTO']->first_name.' '.$firmas['PRESUPUESTO']->last_name;?>
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							<?php echo $firmas['ADMINISTRADORA']->first_name.' '.$firmas['ADMINISTRADORA']->last_name;?>
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							<?php echo $firmas['DIRECTORA']->first_name.' '.$firmas['DIRECTORA']->last_name;?>
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							<?php echo $cabezal[0]->name;?>
						</td>
					</tr>
					<tr>
						<td style='border:1;' width='202,2px' align='center'> 
							COMPRA
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							PRESUPUESTO
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							ADMINISTRADORA
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							DIRECTORA DE LA D.E.U
						</td>
						<td style='border:1;' width='202,2px' align='center'>
							REPRESENTANTE LEGAL
						</td>
					</tr>
					<tr>
						<td width='170px' >

						</td>
						<td width='170px' >

						</td>
						<td width='170px' >
							ORIGINAL DE PROVEEDOR
						</td>
						<td  width='170px' >
							<input type="checkbox"> 
						</td>
					</tr>
					<tr>
						<td width='170px' >
							
						</td>
						<td width='170px' >
						
						</td>
						<td  width='170px'>
							COPIA EXPEDIENTE
						</td>
						<td  width='170px' >
							<input type="checkbox"> 
						</td>
					</tr>
					<tr>
						<td width='170px' >
						
						</td>
						<td width='170px' >
						
						</td>
						<td  width='170px' >
							COPIA CONTABILIDAD
						</td>
						<td width='170px' >
							<input type="checkbox"> 
						</td>
					</tr>
				</table>
			</td>
		</tr>

	</table>



</body>
</html>