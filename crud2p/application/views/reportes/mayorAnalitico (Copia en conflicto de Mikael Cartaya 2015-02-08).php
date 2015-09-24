
<html>
<head>
<title>Mayor Analitico</title>
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
				echo "<td colspan='8'>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2'><b>".$dat['Cuenta']."</td>";
				echo "<td colspan='2'><b>".strtoupper($dat['Descripcion'])."</td>";
				echo "<td colspan='2'><b>".number_format($dat['Total'],2 , "." , "," )."</b></td>";
				$total=$dat['Total'];
			echo "</tr>";
				$saldo=0;
				$debe=0;
				foreach ($dat['Resultados'] as $resultado){
					echo "<tr>";
						echo "<td>";
							echo $resultado['fondo'];
						echo "</td>";
						echo "<td>";
							echo $resultado['t_doc'];
						echo "</td>";
						echo "<td>";
							echo $resultado['unidad'];
						echo "</td>";
						echo "<td>";
							echo $resultado['fecha'];
						echo "</td>";
						echo "<td>";
							echo $resultado['descripcion'];
						echo "</td>";
						echo "<td>";
							if($resultado['debe']!=0){
								echo number_format($resultado['debe'],2 , "." , "," );
								$total+=$resultado['debe'];
								}
						echo "</td>";
						echo "<td>";
							if($resultado['haber']!=0){
								echo number_format($resultado['haber'],2 , "." , "," );
								$total-=$resultado['haber'];
								}
						echo "</td>";
						echo "<td>";
							echo number_format($total,2 , "." , "," );
						echo "</td>";
					echo "</tr>";
					$saldo+=$resultado['debe'];
					$debe+=$resultado['haber'];
				}
				echo "<tr>";
					echo "<td></td>";
					echo "<td colspan='3'>SALDOS DE LA CUENTA >>>>>>>>>> </td>";
					echo "<td >".number_format($dat['Total'],2 , "." , "," )."</td>";
					echo "<td >".number_format($saldo,2 , "." , "," )."</td>";
					echo "<td >".number_format($debe,2 , "." , "," )."</td>";
					echo "<td >".number_format($total,2 , "." , "," )."</td>";
				echo "</tr>";
				$totalSaldo+=$saldo;
				$totalDebe+=$debe;
			}
			echo "<tr>";
				echo "<td colspan='8'>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='8'>*******************************************************************************************************************************************************************</td>";
			echo "</tr>";	
			echo "<tr>";
				echo "<td></td>";
				echo "<td colspan='3'>SALDOS GENERALES >>>>>>>>>> </td>";
				echo "<td >0</td>";
				echo "<td >".number_format($totalSaldo,2 , "." , "," )."</td>";
				echo "<td >".number_format($totalDebe,2 , "." , "," )."</td>";
				echo "<td >0</td>";
			echo "</tr>";
			
			
			
			?>
			
			
		
	</table>


</body>
</html>