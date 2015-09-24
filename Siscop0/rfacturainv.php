<?php
require('fpdf/fpdf.php');
require('clases/conexion.class.php');
$id_f=$_GET['id_f'];
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

	$this->SetFont('Arial','',10);
	$this->Image('images/enc.png',22,10,200);
	$this->Ln(30);
}


function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'Fecha y Hora :'.date('d/m/Y h:m:s').'',0,0,'L');

}

}
	$con = new DB;
	$pacientes = $con->conectar();	
	
	$strConsulta = "SELECT * from usuarios";
	$pacientes = mysql_query($strConsulta);
	
	$fila = mysql_fetch_array($pacientes);

	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(10);
	
	//Nombre de socio
	$consultaproveedor = mysql_query("SELECT * FROM proveedores WHERE id_proveedor= ".$_GET['id_proveedor']) or die("Problemas en el select:".mysql_error());
 $nombreproveedor = mysql_fetch_array($consultaproveedor);

	
	 
    $pdf->SetFont('Arial','',12);
//DATOS DEL LADO DERECHO

	$pdf->Cell(0,6,'Factura N: '.$_GET['nfactura'],0,1,"R");
	$pdf->Cell(0,6,'Fecha de factura: '.date("d-m-Y",strtotime($_GET['fechafac'])),0,1);
	$pdf->Cell(0,6,'Nombre del Proveedor: '.$nombreproveedor['proveedor'],0,1);
	
	$pdf->Ln(5);
	
	$pdf->SetWidths(array(40, 70, 35, 40, 40));
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(28,69,131);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('CÓDIGO', 'DESCRIPCIÓN', 'CANTIDAD', 'PRECIO UNITARIO', 'TOTAL'));
			}
	
	$historial = $con->conectar();
	
	$registros=mysql_query("SELECT id_r, cantidad, preciou FROM afactura WHERE id_f=".$_GET['id_f']) or
  die("Problemas en el select:".mysql_error());	
 $total2=0;
  while ($reg=mysql_fetch_array($registros))
{
	$cant=$reg['cantidad']*$reg['preciou'];
	$total2=$total2+$cant;
 	$strConsulta = "SELECT * FROM repuestos WHERE id_r='$reg[id_r]'";
	//$sumatoria= mysql_query("SELECT SUM(preciou) as totalsiniva FROM afactura WHERE id_f=".$_GET['id_f']);	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			//$otro = mysql_fetch_array($sumatoria);
			$pdf->SetFont('Arial','B',12);
			//$total=$otro['totalsiniva'];
			$pdf->SetFillColor(255,255,255);
    		$pdf->SetTextColor(0);
			$pdf->Row(array($fila['codigo_r'], $fila['pieza'], $reg['cantidad'], $reg['preciou'], $cant));
		
		}
	
}
$pdf->Row(array('', '','', '', ''));	
	
		$consulta7=mysql_query("SELECT * FROM factura WHERE id_f=".$_GET['id_f']) or
  die("Problemas en el select:".mysql_error());	
	 $cliente7 = mysql_fetch_array($consulta7);
 	$piva=$cliente7['iva']/100;
	//$iva = $total2*0.12;
	$iva=$total2*$piva;
	$preciot = $total2+$iva;
	
	$pdf->Ln(1);
	$pdf->SetWidths(array(80));
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
	
	$pdf->Row(array('SUBTOTAL: '.$total2." BSF"));
	$pdf->Row(array('IVA'.$cliente7['iva'].'%: '.$iva." BSF"));
	$pdf->Row(array('TOTAL FACTURA: '.$preciot." BSF"));
$pdf->Output();
//('rfactura.pdf','D');
?>