
<html>
<head>
<title>BALANCE DE COMPROBACION DETALLADO</title>
<style>
td{
	font-family:arial;
	font-size: 9px;

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

			<?php ini_set('memory_limit', '-1'); foreach($data as $dat){
				echo "<tr>";
					echo "<td></td>";
					echo "<td width='170px'><b>".$dat['CuentaPrincipal']."</td>";
					
				echo "</tr>";
				
				$saldoTotall=0;
				$debitoTotall=0;
				$creditoTotall=0;
				$saldomesTotall=0;
				$saldoacTotall=0;
				
				foreach($dat['CuentaSecundaria'] as $sec){
					
					echo "<tr>";
						echo "<td></td>";
						echo "<td width='170px' ><b>".strtoupper($sec['desc'])."</td>";
					echo "</tr>";
						$saldoTotal=0;
						
						
						$saldomesTotal=0;
						$saldoacTotal=0;
					foreach($sec['Resultados'] as $cuenta){
						$credMes=$cuenta['debe']-$cuenta['haber'];
						$saldoAc=$cuenta['acc_total']+($cuenta['debe']-$cuenta['haber']);
						echo "<tr>";
							echo "<td width='75.5px'>".$cuenta['acc_number']."</td>";
							echo "<td width='170px'>".strtoupper($cuenta['acc_desc'])."</td>";
							echo "<td width='94.3px'>".number_format($cuenta['acc_total'],2 , "." , "," )."</td>";
							echo "<td width='94.3px'>".number_format($cuenta['debe'],2 , "." , "," )."</td>";
							echo "<td width='94.3px'>".number_format($cuenta['haber'],2 , "." , "," )."</td>";
							echo "<td width='94.3px'>".number_format($credMes,2 , "." , "," )."</td>";
							echo "<td width='94.3px'>".number_format($saldoAc,2 , "." , "," )."</td>";
						echo "</tr>";
						$saldoTotal+=$cuenta['acc_total'];
						$debitoTotal+=$cuenta['debe'];
						$creditoTotal+=$cuenta['haber'];
						$saldomesTotal+=$credMes;
						$saldoacTotal+=$saldoAc;
						
						$saldoTotall+=$cuenta['acc_total'];
						$debitoTotall+=$cuenta['debe'];
						$creditoTotall+=$cuenta['haber'];
						$saldomesTotall+=$credMes;
						$saldoacTotall+=$saldoAc;
					}
					echo "<tr>";
							echo "<td>Total >>>".$sec['type']."</td>";
							echo "<td>".strtoupper($sec['desc'])."</td>";
							echo "<td>".number_format($saldoTotal,2 , "." , "," )."</td>";
							echo "<td>".number_format($debitoTotal,2 , "." , "," )."</td>";
							echo "<td>".number_format($creditoTotal,2 , "." , "," )."</td>";
							echo "<td>".number_format($saldomesTotal,2 , "." , "," )."</td>";
							echo "<td>".number_format($saldoacTotal,2 , "." , "," )."</td>";
					echo "</tr>";
				}
				echo "<tr>";
							echo "<td>Total >>>".$dat['CuentaPrincipalTipo']."</td>";
							echo "<td>".strtoupper($dat['CuentaPrincipal'])."</td>";
							echo "<td>".number_format($saldoTotall,2 , "." , "," )."</td>";
							echo "<td>".number_format($debitoTotall,2 , "." , "," )."</td>";
							echo "<td>".number_format($creditoTotall,2 , "." , "," )."</td>";
							echo "<td>".number_format($saldomesTotall,2 , "." , "," )."</td>";
							echo "<td>".number_format($saldoacTotall,2 , "." , "," )."</td>";
					echo "</tr>";
			}
					echo "<tr>";
							echo "<td colspan='2'>Totales para control >>></td>";
							echo "<td>0</td>";
							echo "<td>".number_format($debitoTotal,2 , "." , "," )."</td>";
							echo "<td>".number_format($creditoTotal,2 , "." , "," )."</td>";
							echo "<td>0</td>";
							echo "<td>0</td>";
					echo "</tr>";
			

			
			
			
			?>
			
			
		
	</table>


</body>
</html>