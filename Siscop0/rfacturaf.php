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

	$this->SetFont('Arial','B',12);
	$this->Cell(0,5,'SENIAT',0,0,'C');
	$this->SetFont('Arial','B',8);
	$this->Cell(-80,15,'COOPERATIVA DE TRANSPORTES ROOSEVELT',0,0,'C');
	$this->Cell(80,22,'AV. ROOSEVELT, CALLE LOS CASTANOS. EL CEMENTERIO CARACAS',0,0,'C');
	$this->Cell(-80,30,'TLF.0212-631.22.27 | RIF: J-0031114820',0,0,'C');
	$this->Cell(10,40,''.date('d/m/Y h:m:s',time()-15000).'',0,0,'C');
	$this->Cell(0,40,'Factura N: '.$_GET['nfactura'],0,0,"R");
	$this->Cell(-80,50,'------------------------------------Datos de Consumidor------------------------------------',0,0,"C");
	$this->Ln(25);
}


function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'Fecha y Hora :'.date('d/m/Y h:m:s').'',0,0,'L');
	$this->SetFont('Arial','B',10);
	$this->Cell(-100,-10,'---------------------------------IMPRESORA---------------------------------',0,0,"C");
}

}
	$con = new DB;
	$pacientes = $con->conectar();	
	
	$strConsulta = "SELECT * from usuarios";
	$pacientes = mysql_query($strConsulta);
	
	$fila = mysql_fetch_array($pacientes);

	$pdf=new PDF('P','mm',array(100,150));
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(1,0,0);
	$pdf->Ln(5);
	
	//Nombre de socio
	$consultasocio = mysql_query("SELECT * FROM socios WHERE id_s= ".$_GET['c_socio']) or die("Problemas en el select:".mysql_error());
 $nombresocio = mysql_fetch_array($consultasocio);

	
	 
    $pdf->SetFont('Arial','',10);
	//DATOS DEL LADO DERECHO
	$pdf->Cell(0,4,'NOMBRE: '.$nombresocio['nombre']." ".$nombresocio['apellido'],0,1);
	$pdf->Cell(0,6,'CI/RIF: '.$nombresocio['nacionalidad']."-".$nombresocio['cedula'],0,1);
	$pdf->Cell(0,4,'Dirección: '.$nombresocio['direccion'],0,1);
	  $pdf->SetFont('Arial','B',10);
	$pdf->Cell(0,6,'----------------------------------FACTURA----------------------------------',0,0,"C");
	
	$pdf->Ln(6);
	
	$pdf->SetWidths(array(10, 33, 20, 15, 18));
	$pdf->SetFont('Arial','B',8);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('COD', 'DESCRIPCIÓN', 'CANTIDAD', 'PRECIO c/u', 'TOTAL'));
			}
	
	$historial = $con->conectar();
	
	$registros=mysql_query("SELECT id_r, cantidad, preciou FROM dfacturav WHERE id_fv=".$_GET['nfactura']) or
  die("Problemas en el select:".mysql_error());	
 $total2=0;
  while ($reg=mysql_fetch_array($registros))
{
	$cant=$reg['cantidad']*$reg['preciou'];
	$total2=$total2+$cant;
 	$strConsulta = "SELECT * FROM repuestos WHERE id_r='$reg[id_r]'";
	//$sumatoria= mysql_query("SELECT SUM(preciou) as totalsiniva FROM dfacturav WHERE id_fv=".$_GET['nfactura']);	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			//$otro = mysql_fetch_array($sumatoria);
			$pdf->SetFont('Arial','',6);
			//$total=$otro['totalsiniva'];
			$pdf->SetFillColor(255,255,255);
    		$pdf->SetTextColor(0);
			$pdf->Row(array($fila['codigo_r'], $fila['pieza'], $reg['cantidad'], $reg['preciou']." BsF", $cant." BsF"));
		
		}
		
}

	$consulta7=mysql_query("SELECT * FROM facturav WHERE id_fv=".$_GET['id_fv']) or
  die("Problemas en el select:".mysql_error());	
	 $cliente7 = mysql_fetch_array($consulta7);
 	$piva=$cliente7['iva']/100;
	//$iva = $total2*0.12;
	$iva=$total2*$piva;
	$preciot = $total2+$iva;
	
	
	$pdf->Ln(1);
	$pdf->SetWidths(array(10, 30, 35, 18));
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0);
	$pdf->Row(array('','','SUBTOTAL: ',''.$total2." BsF"));
	$pdf->Row(array('','','IVA'.$cliente7['iva'].'%: ',''.$iva." BsF"));
	$pdf->Row(array('','','TOTAL FACTURA: ',''.$preciot." BsF"));
$pdf->Output();
//('rfactura.pdf','D');
?>