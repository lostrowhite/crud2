<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportesm extends CI_Controller{	

public function __construct()
    {
        parent::__construct();
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
 		$this->load->helper('url');
		$this->load->helper('xcrud');
		$this->load->helper('form');
        /* --------------- */ 
        $this->load->library('grocery_CRUD');
		$this->load->library('Template');
		$this->load->model('musers');
		$this->load->model('comprasmodel');
		$this->load->model('reportesma');
		$this->load->model('tutorial_model');
        $this->load->library("mpdf");
    }
public function index()
	{
		if( $this->session->userdata('isLoggedIn') ) {
            redirect('/main/show_main');
        } else {
        $data['title']='Inicio';
		$data['main_content']='registration_view';
		$this->load->view('main_templatei',$data);
        }
		
	}
public function prueba()
	{

		 $this->template->write('content',$this->load->view('xcrud/reportesM/cargartxt.php'));
		 $this->template->render();
		 
	}
public function transacciones(){
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Transacciones');
		 $xcrud->table('t_d_transaction');
		
		 //$xcrud->label(array('t_d_report_id' => 'Id','description' => 'Descripcion'));
		 $this->template->write('content', $xcrud);
		 $this->template->render();

}
public function reportes(){
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Reportes');
		 $xcrud->table('t_d_reports');

		 $xcrud->load_view('edit','reportesM/fecha_reporte.php'); 
		 $this->template->write('content', $xcrud);
		 $this->template->render();

}
public function cuentas(){
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Cuentas');
		 $xcrud->table('t_d_account_manual');
		 $this->template->write('content', $xcrud);
		 $this->template->render();

}
public function generarReporte(){
		//var_dump($_POST);exit;
		switch($_POST['Report']){
			case 1:

					$fecha[0]=$_POST['fechai'];
					$fecha[1]=$_POST['fechaf'];
					$fondo=$_POST['tipof'];
					$pr=$_POST['tipopr'];
					$datos=$this->reportesma->reportemayor($fecha,$fondo,$pr);
					
						$enviar= array('data'=>$datos,'fecha'=>$fecha[1]);
						
						$this->mpdf->mPDF('utf-8','A4');
						//CONTENIDO DEL PDF
						$header= $this->load->view('reportes/MA_header',$enviar,true);
						$this->mpdf->setAutoTopMargin='stretch';
						$this->mpdf->autoMarginPadding=0;
						$this->mpdf->SetHTMLHeader($header);
						$html= $this->load->view('reportes/mayorAnalitico',$enviar,true);
						$this->mpdf->showImageErrors = true;
						//var_dump($html);exit;
						$this->mpdf->WriteHTML($html);
						//SALIDA DE NUESTRO PDF
						$this->mpdf->Output();
			break;
			case 2:
					$fecha[0]=$_POST['fechai'];
					$fecha[1]=$_POST['fechaf'];
					$fondo=$_POST['tipof'];
					$pr=$_POST['tipopr'];
					$datos=$this->reportesma->reportebalancecompro($fecha,$fondo,$pr);
					//var_dump($datos);exit;
						$enviar= array('data'=>$datos,'fecha'=>$fecha[1]);

						$this->mpdf->mPDF('utf-8','A4');
						//CONTENIDO DEL PDF
						$header= $this->load->view('reportes/ba_header',$enviar,true);
						$this->mpdf->setAutoTopMargin='stretch';
						$this->mpdf->autoMarginPadding=-5;
						$this->mpdf->SetHTMLHeader($header);
						$html= $this->load->view('reportes/balanceCompro',$enviar,true);
						$this->mpdf->showImageErrors = true;
						//var_dump($html);exit;
						$this->mpdf->WriteHTML($html);
						//SALIDA DE NUESTRO PDF
						$this->mpdf->Output();
			break;
		}



}
public function file()
	{
			
		 	if($_POST['Datos']!=''){
				
				$datos=array(
					'Datos'=>$_POST['Datos'],
					'Opciones'=>$_POST['Opciones'],
					);
				
				$this->musers->addUserPrivi($datos);
			}
		 
	}
	function upload_file()
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			$fileData = file($_FILES["fileToUpload"]["tmp_name"]);
			foreach($fileData as $file){
				$datos=explode('|',$file);
				$fecha=explode('/',$datos[14]);
				$fecha[2]=trim($fecha[2]);
				$fechas=$fecha[2]."-".$fecha[1]."-".$fecha[0];
				
				$datosInsert = array (
					"year" => $datos[0],
					"month" => $datos[1],
					"doc_type" => $datos[2].$datos[3],
					"account" => $datos[4],
					"aux_code" => $datos[5],
					"unit" => $datos[7],
					"fund" => $datos[8],
					"n_trans" => $datos[9],
					"owe" => $datos[10],
					"income" => $datos[11],
					"doc_type_l" => $datos[12],
					"doc_number" => $datos[13],
					"date" => $fechas
				
				);
				$this->reportesma->insertT($datosInsert);
			}
			echo "Archivo Subido con exito";
		}
		
		
	}

}
