<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compras extends CI_Controller{	

	public function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
 		$this->load->helper('url');
		$this->load->helper('xcrud');
        /* ------------------ */ 
        $this->load->library('grocery_CRUD');
		$this->load->library('Template');
		$this->load->model('tutorial_model');
		$this->load->model('comprasmodel');
		$this->load->library("mpdf");
    }

	public function index(){
		if( $this->session->userdata('isLoggedIn') ) {
            redirect('/main/show_main');
        } else {
        $data['title']='Inicio';
		$data['main_content']='registration_view';
		$this->load->view('main_templatei',$data);
        }
	}
	public function reqpdf(){

					$resultado=$this->comprasmodel->getReq($this->uri->segment(3));
					$fecha=$this->tutorial_model->get_time()->CURRENT_DATE;

					$data = array(
							'resultado'=>$resultado,
							'fecha'=>$fecha,
							'requisicion' => $this->uri->segment(3)
						);
	                $this->mpdf->mPDF('utf-8','A4');
	                //CONTENIDO DEL PDF

	                $html= $this->load->view('reportes/requisicion',$data,true);
	                $this->mpdf->showImageErrors = true;
	                //var_dump($html);exit;
	                $this->mpdf->WriteHTML($html);
	                //SALIDA DE NUESTRO PDF
	                $this->mpdf->Output();
	    
	}
	public function presubasepdf(){
				               
					$resultado=$this->comprasmodel->getPreBase($_GET['id']);
					$fecha=$this->tutorial_model->get_time()->CURRENT_DATE;

					$data = array(
							'resultados'=>$resultado,
							'fecha'=>$fecha,
							'preBase'=>$_GET['id']
						);

	                $this->mpdf->mPDF('utf-8','A4');
	                //CONTENIDO DEL PDF

	                $html= $this->load->view('reportes/presubase',$data,true);
	                $this->mpdf->showImageErrors = true;
	                //var_dump($html);exit;
	                $this->mpdf->WriteHTML($html);
	                //SALIDA DE NUESTRO PDF
	                $this->mpdf->Output();
	    
	}
	public function requisicion(){
		$requisicion = Xcrud::get_instance();
		$requisicion->table_name('Requisiciones');
		$requisicion->table('t_d_requisition');
		$requisicion->default_tab('Encabezado Requisición');
		$requisicion->relation('id_dept', 't_d_department', 'id_dept', 'name_dept');
		$requisicion->fields('id_requisition, id_dept, date', false, false, 'create');
		$requisicion->fields('id_requisition, id_dept, date', false, false, 'edit');
		$requisicion->columns('id_dept, date, total');
		$requisicion->hide_button('remove, save_new');

		// $requisicion->pass_default('id_requisition', $this->ultimo_id());
		$requisicion->pass_default('id_dept', $this->session->userdata('id_dept'));
		$requisicion->pass_default('date', $this->tutorial_model->get_time()->CURRENT_DATE);

		// $requisicion->change_type('date', 'text', $this->tutorial_model->get_time()->CURRENT_DATE);
		$requisicion->set_attr('id_requisition',array('id'=>'id_req'));
		$requisicion->set_attr('date',array('id'=>'fecha'));
		$requisicion->set_attr('id_dept',array('id'=>'depto'));
		$requisicion->set_attr('total',array('id'=>'total'));
		$requisicion->field_tooltip('id_dept', 'No modificable');
		$requisicion->field_tooltip('date', 'No modificable');
		$requisicion->field_tooltip('total', 'No modificable');
		$requisicion->readonly('id_dept, total');
		$requisicion->after_insert('refresh');
		$requisicion->button(base_url() . 'compras/reqpdf/{id_requisition}', 'Generar PDF', 'fa fa-file-pdf-o', '', array('target'=>'_blank','id'=>'BotonPDF','value'=>'{id_requisition}'), array('total', '!=', '0'));
		$requisicion->order_by('id_requisition', 'desc');

		$req_detail = $requisicion->nested_table('Detalle Requisición', 'id_requisition', 't_d_requisition_detail', 'id_requisition');
        $req_detail->table_name('Detalle de la requisición');
        $req_detail->default_tab('Detalle de la Requisición');

		$req_detail->relation('id_product', 't_d_product', 'id_product', 'name_product');
		$req_detail->relation('id_measure', 't_n_measure_unit', 'id_measure', 'name_unit');
		$req_detail->relation('id_req_status', 't_n_requisition_status', 'id_req_status', 'name');

		$req_detail->fields('quantity, id_product, id_measure', false, false, 'create');
		$req_detail->fields('quantity, id_product, id_measure', false, false, 'edit');
		$req_detail->fields('quantity, id_product, id_measure, id_req_status', false, false, 'view');

		$req_detail->validation_required('quantity, id_product, id_measure');

		$req_detail->columns('quantity, id_product, id_measure, id_req_status');
		$req_detail->sum('quantity');
		$req_detail->replace_remove('eliminar_detalle_req');
		$req_detail->hide_button('save_edit');
		$req_detail->unset_edit(true,'id_req_status','=','1');
		$req_detail->unset_remove(true,'id_req_status','=','1');
		$req_detail->after_insert('actualizar_total_req');
		$req_detail->after_update('actualizar_total_req');
		
		$requisicion->label(array(
			't_d_department.name_dept' => 'Departamento', 
			'date' 				  => 'Fecha', 
			'id_requisition' 	  => 'Nº de Requisición', 
			'id_dept' 			  => 'Departamento'
		));
		$req_detail->label(array(
			'quantity'		 => 'Cantidad',
			'id_product'	 => 'Producto',
			'id_measure'	 => 'Unidad de Medida',
			'id_req_status'  => 'Estatus'
		));

		$productos = Xcrud::get_instance();
		$productos->table_name('Productos');
		$productos->table('t_d_product');
		$productos->label(array('id_product' => 'Id','part_number' => 'Número de Parte','name' => 'Nombre'));
		$productos->start_minimized(true);
		
		$this->template->write('content', $requisicion.$productos);
		$this->template->render();
	}

	public function ultimo_id(){
		$id=$this->comprasmodel->get_ult_id();

		$id+=1;
		echo json_encode($id);
	}

	public function ultimo_id_depto(){
		$id=$this->comprasmodel->get_ult_id_depto();

		$id+=1;
		echo json_encode($id);
	}

	public function viejo(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table('t_d_base_budget');
		$xcrud->table_name('Presupuestos Base');
		$xcrud->label(array('id_base_budget' => 'N° Pre. Base','date' => 'Fecha','total' => 'Total'));
		$xcrud->sum('total'); // sum row(), receives data from full table (ignores pagination)
		$xcrud->relation('id_base_budget','t_d_base_budget_detail','id_base_budget','amount');
		$xcrud->fields('date,total,id_base_budget');
		$xcrud->load_view('create','presupuesto_base/listapartidas.php'); 
		$xcrud->load_view('edit','presupuesto_base/editapartidas.php'); 
		$xcrud->column_callback('name','add_user_icon');
		$this->template->write('content', $xcrud);
		$this->template->render();
	}
	public function beneficiariosM(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table('t_d_beneficiary');
		$xcrud->table_name('Beneficiarios Juridicos Manual');
		$xcrud->label(array('rif' => 'RIF','name' => 'Nombre','address' => 'Direccion','tlf'=>'Telefono','email'=>'Correo','rnc_code'=>'Codigo RNC','status'=>'Estado de la Empresa','create_date'=>'Fecha de Creacion','due_date'=>'Fecha de Vencimiento'));
		$xcrud->pass_default('id_type','1');
		$xcrud->fields('rnc_code,name,rif,status,address,tlf,email,create_date,due_date');
		$xcrud->columns('rnc_code,name,rif,status,address,tlf,email,create_date,due_date');

		$xcrud->change_type('due_date', 'datetime');		
		$this->template->write('content', $xcrud);
		$this->template->render();
	}
	public function beneficiarios(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table('t_d_beneficiary');
		$xcrud->table_name('Beneficiarios Juridicos');
		$xcrud->label(array('name' => 'Nombre o Razón Social','address' => 'Dirección','tlf' => 'Telefono','email' => 'Correo','rnc_code'=>'Codigo RNC','status'=>'Estado de la Empresa','create_date'=>'Fecha de Registro','due_date'=>'Fecha de Vencimiento'));
		$xcrud->fields('rnc_code,name,rif,status,address,tlf,email,create_date,due_date');
		$xcrud->columns('rnc_code,name,rif,status,address,tlf,email,create_date,due_date');
		$xcrud->where('id_type =', 1);
		$xcrud->set_attr('rif',array('id'=>'rif'));
		$xcrud->set_attr('name',array('id'=>'name'));
		$xcrud->set_attr('rnc_code',array('id'=>'rnc_code'));
		$xcrud->set_attr('status',array('id'=>'status'));
		$xcrud->set_attr('address',array('id'=>'address'));
		$xcrud->set_attr('tlf',array('id'=>'tlf'));
		$xcrud->set_attr('email',array('id'=>'email'));
		$xcrud->set_attr('create_date',array('id'=>'create_date'));
		$xcrud->set_attr('due_date',array('id'=>'due_date'));
		$xcrud->start_minimized(true);

		$xcrud1 = Xcrud::get_instance();
		$xcrud1->table('t_d_beneficiary');
		$xcrud1->table_name('Beneficiarios Naturales');
		$xcrud1->label(array('id_type'=>'Tipo de Persona','name' => 'Nombre o Razón Social','address' => 'Dirección','tlf' => 'Telefono','email' => 'Correo','rnc_code'=>'Codigo RNC','status'=>'Estado de la Empresa','create_date'=>'Fecha de Registro','due_date'=>'Fecha de Vencimiento'));
		$xcrud1->fields('name,rif,address,tlf,email,id_type');
		$xcrud1->columns('name,rif,address,tlf,email,id_type');
		$xcrud1->relation('id_type','t_n_type_beneficiary','id_type_beneficiary','name','id_type_beneficiary<>1');
		$xcrud1->where('id_type <>', 1);
		$xcrud1->start_minimized(true);
		//$xcrud->replace_insert('insertar_bene');
		$this->template->write('content', $xcrud.$xcrud1);
		$this->template->render();
	}
	public function beneficiariosManual(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table('t_d_beneficiary');
		$xcrud->table_name('Beneficiarios Juridicos');
		$xcrud->label(array('name' => 'Nombre o Razón Social','address' => 'Dirección','tlf' => 'Telefono','email' => 'Correo','rnc_code'=>'Codigo RNC','status'=>'Estado de la Empresa','create_date'=>'Fecha de Registro','due_date'=>'Fecha de Vencimiento'));
		$xcrud->fields('rnc_code,name,rif,status,address,tlf,email,create_date,due_date');
		$xcrud->columns('rnc_code,name,rif,status,address,tlf,email,create_date,due_date');
		

		$this->template->write('content', $xcrud);
		$this->template->render();
	}
		
	public function presupuesto(){
	 	$presu_base = Xcrud::get_instance();
	    $presu_base->table('t_d_base_budget');
	    $presu_base->table_name('Presupuestos Base');
	    $presu_base->default_tab('Presupuesto Base');
	    $presu_base->label(array('id_base_budget' => 'N° Pre. Base','date' => 'Fecha','total' => 'Total'));
	    $presu_base->columns('id_base_budget, total, date, Estatus');
	    $presu_base->fields('id_base_budget,date,total');
	    $query = $this->db->query('SELECT id_base_budget FROM t_d_base_budget Order BY id_base_budget desc');
		$row = $query->row();
	    //$presu_base->pass_default('id_base_budget',$row->id_base_budget + 1);
	    $presu_base->pass_default('date', $this->tutorial_model->get_time()->CURRENT_DATE);
	    $presu_base->set_attr('id_base_budget',array('id'=>'id_depto'));
		$presu_base->set_attr('date',array('id'=>'fecha'));
		$presu_base->set_attr('total',array('id'=>'total'));
		$presu_base->column_width('id_base_budget','100px'); 
		$presu_base->sum('total');
		$presu_base->show_primary_ai_column(true);
	    $presu_base->hide_button('remove');
		$presu_base->button(base_url().'compras/presubasepdf/?id={id_base_budget}','Generar PDF','fa fa-file-pdf-o','',array('target'=>'_blank','id'=>'BotonPDF','value'=>'{id_base_budget}'), array('total', '!=', '0'));
		$presu_base->unset_edit(true,'status','=','1');
		$presu_base->order_by('id_base_budget', 'desc');
		$presu_base->subselect('Estatus', 'if({status} = 0, "Por Comprometer", "Comprometida")');
		$presu_base->highlight_row('status', '=', 1, '#8DED79');
		$presu_base->change_type('Total,total', 'price', '0');
	    $presu_base->readonly('total');
	    
		$pbdetails = $presu_base->nested_table('Detalle PB','id_base_budget','t_d_base_budget_detail','id_base_budget'); // 2nd level
		$pbdetails->table_name('Detalle de Presupuesto Base');
		$pbdetails->fk_relation('Product Name','id_req_detail','t_d_requisition_detail','id_req_detail','id_product','t_d_product','id_product',array('name_product'));
		$pbdetails->set_attr('id_req_detail',array('id'=>'id_pb'));
		$pbdetails->set_attr('quantity',array('id'=>'cantidad_pb'));
		$pbdetails->set_attr('amount',array('id'=>'precio_pb'));
		$pbdetails->set_attr('subtotal',array('id'=>'subtotal_pb'));
		$pbdetails->validation_required('id_req_detail,quantity,amount');
		$pbdetails->hide_button('save_edit');
		$pbdetails->label(array('iva_exent'=>'Exento de Iva','id_req_detail' => 'N°Req/ Producto','Product Name' => 'Producto','quantity' => 'Cantidad','amount' => 'Precio R.M.'));
		$pbdetails->sum('subtotal');
		$pbdetails->fields('id_req_detail,quantity,amount,subtotal,iva_exent');
		$pbdetails->columns('Product Name,quantity,amount,subtotal,iva_exent');
		$pbdetails->set_var('idreq', '{id_req_detail}'); 
		$pbdetails->before_insert('change_req_status');
		$pbdetails->after_update('actualizar_subtotal_u');
		$pbdetails->after_insert('actualizar_subtotal_u');
		$pbdetails->before_remove('actualizar_subtotal_r');
		$pbdetails->replace_remove('eliminar_detalle_base_budget');
	    $pbdetails->default_tab('Detalle de Presupuesto Base');
	    $pbdetails->readonly('subtotal');
	    // $pbdetails->change_type('amount,subtotal', 'price', '0');
	    $pbdetails->change_type('iva_exent','select','',array('values'=>array('1'=>'Exento','0'=>'No Exento')));
		
		$this->template->write('content', $presu_base);
		$this->template->render();
  	}

	public function partidas(){
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table('cuentas1');
		 $this->template->write('content', $xcrud);
		 $this->template->render();
	}

}