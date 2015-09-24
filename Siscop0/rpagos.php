<?php
require('fpdf/fpdf.php');
require('clases/conexion.class.php');
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
	$this->Cell(100,10,'REPORTE DE PAGO SOCIOS Y AVANCES:'.date('d/m/Y h:m:s').'',0,0,'L');

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

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'Login: '.$fila['login'],0,1);
	$pdf->Cell(0,6,'Nombre: '.$fila['nombre'],0,1);
	$pdf->Cell(0,6,'Privilegio: '.$fila['privilegio'],0,1); 
	
	$pdf->Ln(10);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'PAGO DE SOCIOS',0,1);
	
	$pdf->SetWidths(array(40, 35, 35, 35, 40));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(28,69,131);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
			$pdf->Row(array('NSOCIO', 'NOMBRE', 'CÉDULA', 'FECHA', 'CONCEPTO'));	
			}
	
	$historial = $con->conectar();	
	$strConsulta = "SELECT * FROM pagosocios";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			//Consulta para socio
			$consulta =("SELECT * FROM socios WHERE id_s=".$fila['id_s']);
			$socio = mysql_query($consulta);
			$cliente = mysql_fetch_array($socio);
		
			
			$pdf->SetFont('Arial','',10);
			
			if($i%2 == 1)
			{
				$pdf->SetFillColor(184,184,184);
    			$pdf->SetTextColor(255,255,255);
				$pdf->Row(array("S ".$cliente['nsocio'], $cliente['nombre'], $cliente['cedula'],date('d-m-Y',strtotime($fila['fecha'])), $fila['concepto']));
			}
			else
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array("S ".$cliente['nsocio'], $cliente['nombre'], $cliente	['cedula'],date('d-m-Y',strtotime($fila['fecha'])), $fila['concepto']));
			}
		}
		//Mostrar Pago avances
	$strConsulta2 = "SELECT * FROM pagoavances";
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'PAGO DE AVANCES',0,1);
	
	$pdf->SetWidths(array(40, 40, 35, 35, 35, 40));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(28,69,131);
    $pdf->SetTextColor(255);
		
	
	$historial2 = mysql_query($strConsulta2);
	$numfilas2 = mysql_num_rows($historial2);
	$pdf->Row(array('NSOCIO', 'NAVANCE', 'NOMBRE', 'CÉDULA', 'FECHA', 'CONCEPTO'));
	for ($i=0; $i<$numfilas2; $i++)
		{
			$fila2 = mysql_fetch_array($historial2);
			//Consulta para Socio
			$consulta =("SELECT * FROM socios WHERE id_s=".$fila2['id_s']);
			$socio = mysql_query($consulta);
			$cliente = mysql_fetch_array($socio);
			
			//Consulta para Avance
			$consulta2 =("SELECT * FROM avances WHERE id_a=".$fila2['id_a']);
			$avance = mysql_query($consulta2);
			$cliente2 = mysql_fetch_array($avance);
			$pdf->SetFont('Arial','',10);
			
			if($i%2 == 1)
			{
				$pdf->SetFillColor(184,184,184);
    			$pdf->SetTextColor(0);
				$pdf->Row(array("S ".$cliente['nsocio'], "a ".$cliente2['navance'], $cliente2['nombre'], $cliente2['cedula'],date('d-m-Y',strtotime($fila2['fecha'])), $fila2['concepto']));
			}
			else
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array("S ".$cliente['nsocio'], "A ".$cliente2['navance'], $cliente2['nombre'], $cliente2['cedula'],date('d-m-Y',strtotime($fila2['fecha'])), $fila2['concepto']));
			}
		}
		
	

$pdf->Output();
?>