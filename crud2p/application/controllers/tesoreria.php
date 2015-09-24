<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tesoreria extends CI_Controller{	

public function __construct()
    {
        parent::__construct();
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
 		$this->load->helper('url');
		$this->load->helper('xcrud');
		$this->load->helper('numeros');
        /* ------------------ */ 
        $this->load->library('grocery_CRUD');
		$this->load->library('Template');
        $this->load->library("mpdf");
		$this->load->model('tutorial_model');
		$this->load->model('comprasmodel');
		$this->load->model('tesoreriaModel');
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
public function vista()
	{
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table('t_r_account_fund');
		 $xcrud->table_name('Presupuesto Con Financiamiento Aprobado');
		 $xcrud->relation('id_account','t_d_account','id_account','code_account');
		 $xcrud->relation('id_fund','t_d_fund','id_fund','id_fund');
		 $xcrud->relation('id_dept','t_d_department','id_dept','code_dept');
		 $xcrud->sum('amount'); // sum row(), receives data from full table (ignores pagination)
		 $xcrud->columns('id_account,id_fund,id_dept,amount');
		 $xcrud->fields('id_account,id_fund,id_dept,amount');
		 $xcrud->label(array('id_account' => 'Partida','id_fund' => 'Fondo','id_dept' => 'Unidad Ejecutora','t_d_department.id_program'=>'Programa','amount' => 'Monto'));
		 $xcrud->replace_remove('remove_replacer');
		 $this->template->write('content', $xcrud);
		 $this->template->render();
	}
public function compromisos()
	{
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table('t_r_account_fund');
		 $xcrud->table_name('Compromisos Presupuestarios');
		 $xcrud->relation('id_account','t_d_account','id_account','code_account');
		 $xcrud->relation('id_fund','t_d_fund','id_fund','id_fund');
		 $xcrud->relation('id_dept','t_d_department','id_dept','code_dept');
		 $xcrud->sum('amount'); // sum row(), receives data from full table (ignores pagination)
		 $xcrud->columns('id_account,id_fund,id_dept,amount');
		 $xcrud->fields('id_account,id_fund,id_dept,amount');
		 $xcrud->label(array('id_account' => 'Partida','id_fund' => 'Fondo','id_dept' => 'Unidad Ejecutora','t_d_department.id_program'=>'Programa','amount' => 'Monto'));
		 $xcrud->hide_button('remove, save_new');
		 $xcrud->replace_remove('remove_replacer');
		 $this->template->write('content', $xcrud);
		 $this->template->render();
	}
public function partidas()
	{
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Partidas');
		 $xcrud->table('t_d_account');
		 $xcrud->label(array('id_account' => 'Id','code' => 'Código','name' => 'Nombre'));
		 $this->template->write('content', $xcrud);
		 $this->template->render();
		}
public function bancos(){
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Bancos');
		 $xcrud->table('t_d_bank');
		 $xcrud->default_tab('Bancos');
		 $xcrud->label(array('bank_name' => 'Nombre del Banco','account_number' => 'Numero de Cuenta'));
		 $xcrud->columns('bank_name,account_number');
		 $xcrud->fields('bank_name,account_number');

	    $check=$xcrud->nested_table('Chequeras','id_bank','t_d_checkbook','id_bank');
	    $check->table_name('Chequeras');
	    $check->table('t_d_checkbook');
	    $check->label(array('first_number'=>'Primer Cheque','last_number'=>'Ultimo Cheque','id_bank'=>'Banco Emisor'));
	    $check->relation('id_bank','t_d_bank','id_bank','bank_name');
	    $check->set_attr('id_bank',array('id'=>'bancoEmisor'));
	    $check->default_tab('Chequeras');
	    $check->readonly('id_bank');
		 $this->template->write('content', $xcrud);
		 $this->template->render();
}
public function chequefactpdf(){
				//$numero='58960.25';
				//$numeroLtra=num_to_letras($numero);
				//var_dump($numeroLtra);exit;

				$datos=$this->tesoreriaModel->datosChequeNiveluno($_GET['id']);
				
				$cont=0;
				foreach($datos as $dato){
					
						$datos[$cont]['montoletras']=num_to_letras($datos[$cont]['monto']);
						//var_dump(num_to_letras('800.00'),$dato['montoletras']);exit;
						
					$cont++;
				}
				
				$fecha=$this->tutorial_model->get_time()->CURRENT_DATE;

				$this->mpdf->mPDF('utf-8','A4');
				$cont=1;
				$paginas=count($datos);
				foreach($datos as $dato){
					
					//CONTENIDO DEL PDF
						$data = array(
								'fecha'=>$fecha,
								'dato'=>$dato
							);
					$html= $this->load->view('reportes/comprocheque',$data,true);
					$this->mpdf->showImageErrors = true;
					//var_dump($html);exit;
					$this->mpdf->WriteHTML($html);
					//SALIDA DE NUESTRO PDF
					if($cont<$paginas){
					$this->mpdf->AddPage();}
					$cont++;
				}
                $this->mpdf->Output();

    
}
public function cheques(){
		// Solicitud de cheques
		$soli_cheque = Xcrud::get_instance();
		$soli_cheque->table_name('Solicitud de Cheques');
		$soli_cheque->table('t_d_check_request');
		$soli_cheque->default_tab('Gestión de Cheques');
		// $soli_cheque->relation('id_purchase_order','t_d_purchase_order','id_purchase_order','id_purchase_order', 't_d_purchase_order.status = 1');
		$soli_cheque->label(array('orden_compra'=>'Ordenes de Compra','id_check_request' => 'N° Sol. Cheque','date' => 'Fecha'));
		$soli_cheque->columns('id_check_request,date,Ordenes de Compra Asignadas');
		$soli_cheque->fk_relation('orden_compra','id_check_request','t_r_check_pb','id_check_request','id_pb','t_d_purchase_order','id_purchase_order','id_purchase_order','id_po_status=3');
		$soli_cheque->button(base_url().'tesoreria/chequefactpdf/?id={id_check_request}','Generar Comprobante de Cheque','fa fa-file-pdf-o','',
		            array('target'=>'_blank', 'id'=>'BotonPDF', 'value'=>'{id_purchase_order}'));
		$query = $this->db->query('SELECT id_check_request FROM t_d_check_request Order BY id_check_request desc');
		$row = $query->row();
		$soli_cheque->pass_default('id_check_request',$row->id_check_request + 1);
		$soli_cheque->pass_default('date', $this->tutorial_model->get_time()->CURRENT_DATE);
		$soli_cheque->replace_insert('check_request_insert');
		$soli_cheque->replace_update('check_request_update');
		$soli_cheque->fields('id_check_request,date,orden_compra');
		$soli_cheque->subselect('Ordenes de Compra Asignadas','SELECT GROUP_CONCAT(id_pb SEPARATOR ",") 
														FROM t_r_check_pb
														WHERE
														id_check_request={id_check_request}');
		//$soli_cheque->after_insert('check_request');
		//$soli_cheque->after_update('check_request');
		//$soli_cheque->disabled('id_purchase_order', 'edit');
		$soli_cheque->readonly('id_check_request,date');
		//$soli_cheque->validation_required('id_purchase_order');
		$soli_cheque->hide_button('remove');
		//$soli_cheque->set_attr('id_purchase_order', array('id'=>'id_orden'));
		$soli_cheque->set_attr('id_check_request', array('id'=>'id_sol_cheque'));
		$soli_cheque->order_by('id_check_request', 'desc');

		// Factura
		$factura=$soli_cheque->nested_table('Factura','id_check_request','t_d_invoice','id_check_request');
		$factura->table_name('Factura');
		$factura->label(array('id_check_request'=>'N° Sol. Cheque','invoice_number'=>'N° Factura','control_number'=>'N° Control','date'=>'Fecha',
							  'id_iva'=>'% de IVA','invoice_amount'=>'Monto Neto','iva_amount'=>'Monto de IVA','id_retention'=>'% de Retención',
							  'iva_retained'=>'IVA Retenido','iva_pay'=>'IVA a Pagar','total_pay'=>'Total a Pagar','taxable_base'=>'Base Imponible',
							  'tax_stamp'=>'Monto de Timbre Fiscal', 'id_islr'=>'ISLR','id_sermat'=>'Ley de Timbre Fiscal','islr_retained'=>'ISLR Retenido','t_d_islr.name_islr'=>'ISLR'));
		$factura->columns('date, invoice_number, control_number, invoice_amount, taxable_base, id_iva, iva_amount, id_retention, iva_retained, iva_pay, id_sermat, tax_stamp, t_d_islr.name_islr, islr_retained, total_pay');
		$factura->fields('date, invoice_number, control_number, invoice_amount, taxable_base, id_iva, iva_amount, id_retention, iva_retained, iva_pay, id_sermat, tax_stamp, id_islr, islr_retained, total_pay');
		$factura->table('t_d_invoice');
		$factura->join('id_islr', 't_d_type_islr', 'id_islr_type');
		$factura->join('t_d_type_islr.id_islr', 't_d_islr', 'id_islr');
		$factura->relation('id_iva', 't_n_iva', 'id_iva', 'iva');
		$factura->relation('id_retention', 't_d_retention', 'id_retention', 'percentage_retention');
		$factura->relation('id_sermat', 't_d_sermat', 'id_sermat', 'sermat_name');
		$factura->subselect('Iva', 'SELECT iva FROM t_n_iva WHERE id_iva = {id_iva}');
		// $factura->subselect('Subtotal', '{invoice_amount} * TRUNCATE((1 + {Iva} / 100), 2)');
		$factura->sum('total_pay');
	    $factura->hide_button('edit, save_edit');
		$factura->disabled('id_check_request', false, false, 'edit');
		$factura->set_attr('taxable_base', array('id'=>'base_imponible'));
		$factura->set_attr('id_retention', array('id'=>'id_retention'));
		$factura->set_attr('invoice_amount', array('id'=>'monto_factura'));
		$factura->set_attr('id_iva', array('id'=>'iva_factura'));
		$factura->set_attr('iva_amount', array('id' => 'monto_iva'));
		$factura->set_attr('iva_retained', array('id' => 'iva_retained'));
		$factura->set_attr('iva_pay', array('id' => 'iva_pay'));
		$factura->set_attr('tax_stamp', array('id' => 'timbre'));
		$factura->set_attr('total_pay', array('id' => 'total_pay'));
		$factura->set_attr('id_islr',array('id'=>'islr_factura'));
		$factura->set_attr('id_sermat',array('id'=>'sermat'));
		$factura->set_attr('islr_retained',array('id'=>'islr_retenido'));
		$factura->readonly('total_pay, taxable_base, tax_stamp, iva_pay, iva_retained, iva_amount, islr_retained');
		$factura->pass_default('id_iva, id_retention', '1');
		$factura->pass_default('id_sermat', '2');
		$factura->replace_insert('add_invoice');
		$factura->replace_remove('drop_invoice');
		$factura->validation_required('date, invoice_number, control_number, invoice_amount, id_iva, id_retention, id_sermat');

		// Ingresos Propios
	    $ip=$soli_cheque->nested_table('Ingresos Propios','id_check_request','t_d_check_issued','id_check_request');
	    $ip->table_name('Ingresos Propios');
	    $ip->label(array('id_check_request'=>'N° Sol. Cheque','amount'=>'Monto del Cheque','id_check_issued'=>'N° Cheque','date'=>'Fecha','id_bank'=>'Banco','description'=>'Concepto','id_islr'=>'Tipo de ISLR','id_sermat'=>'SERMAT A USAR','amount_sermat'=>'Monto SERMAT'));
	    $ip->table('t_d_check_issued');
	    $ip->relation('id_bank', 't_d_bank', 'id_bank', 'bank_name');
	    $ip->set_attr('amount', array('id'=>'chk_amount'));
	    // $ip->set_attr('amount_sermat', array('id'=>'ser_amount'));
	    $ip->change_type('description', 'textarea');
	    $ip->columns('id_check_request,id_check_issued,date,amount, id_bank,description');
	    $ip->fields('id_check_issued,date,amount,id_bank,descriptionamount_sermat');
	    $ip->hide_button('add, save_new, save_edit');
	    $ip->where('type = ', 1);
		$ip->change_type('amount', 'price', '0');

	    // Ingresos Ordinarios
		$io=$soli_cheque->nested_table('Ingresos Ordinarios','id_check_request','t_d_check_issued','id_check_request');
		$io->table_name('Ingresos Ordinarios');
		$io->label(array('id_check_request'=>'N° Sol. Cheque','amount'=>'Monto del Cheque','id_check_issued'=>'N° Cheque','date'=>'Fecha','id_bank'=>'Banco','description'=>'Concepto','id_islr'=>'Tipo de ISLR','id_sermat'=>'SERMAT A USAR','amount_sermat'=>'Monto SERMAT'));
		$io->table('t_d_check_issued');
	    $io->relation('id_bank','t_d_bank','id_bank','bank_name');
	    $io->set_attr('amount', array('id'=>'chk_amount'));
	    // $io->set_attr('amount_sermat', array('id'=>'ser_amount'));
	    $io->change_type('description', 'textarea');
		$io->columns('id_check_request,id_check_issued,date,amount,id_bank,description');
		$io->fields('id_check_issued,amount,date,id_bank,descriptionamount_sermat');
	    $io->hide_button('add, save_new, save_edit');
	    $io->where('type = ', 2);
		$io->change_type('amount', 'price', '0');

		$this->template->write('content', $soli_cheque);
		$this->template->render();
}
public function obtenerSermat()
    {   
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
    $this->db->select('*');    
    $this->db->from('t_d_sermat');
    $this->db->join('t_d_tributary_unity', 't_d_sermat.id_tributary_unity = t_d_tributary_unity.id_tributary_unity');
    $query = $this->db->get();
    
            //$this->db->select('id_d, cuenta_gasto as value');
           // $this->db->like('cuenta_gasto', '%$q%'); 
           // $query=$this->db->get('cuentas');
      if($query->num_rows() > 0)
            {
                foreach ($query->result_array() as $row)
                {
                    $result[]= $row;
                }
            }

            echo json_encode($result);

    }
public function iva(){
	// Impuestos
	$iva = Xcrud::get_instance();
	$iva->table_name('Porcentajes de Iva');
	$iva->table('t_n_iva');
	$iva->label(array('iva' => 'Porcentaje de Iva'));
	$iva->change_type('iva', 'price', '0', array('suffix' => '%'));
	$iva->start_minimized(true);

	$islr = Xcrud::get_instance();
	$islr->table_name('ISLR');
	$islr->table('t_d_islr');
	$islr->label(array('name_islr' => 'Concepto Del Pago'));
	$islr->default_tab('Concepto');
	$islr->unset_remove();
	$islr->start_minimized(true);

	$natural=$islr->nested_table('Persona Natural','id_islr','t_d_type_islr','id_islr');
	$natural->table_name('Tipos de Beneficiarios');
	$natural->table('t_d_type_islr');
	$natural->join('id_type_beneficiary', 't_r_full_type_benef', 'id_full_type');
	$natural->relation('t_r_full_type_benef.id_sub_type','t_n_sub_type','id_sub_type','name_sub');
	$natural->label(array('id_type_beneficiary'=>'Tipo de Beneficiario','min_amount'=>'Pagos Mayores A Bs','base'=>'% Base Imponible','percentage'=>'% Tarifa','deductible'=>'Sustraendo en Bs.', 'amount' => 'Monto Sujeto a Retención', 't_r_full_type_benef.id_sub_type' => 'SubTipo'));
	$natural->columns('t_r_full_type_benef.id_sub_type, base, percentage, amount, min_amount, deductible');
	$natural->fields('id_type_beneficiary, base, percentage, amount, min_amount, deductible');
	$natural->set_attr('id_type_beneficiary',array('id'=>'sub_type_natural'));
	$natural->set_attr('base',array('id'=>'base'));
	$natural->set_attr('percentage',array('id'=>'tarifa'));
	$natural->set_attr('amount',array('id'=>'monto'));
	$natural->set_attr('min_amount',array('id'=>'monto_min'));
	$natural->set_attr('deductible',array('id'=>'sustraendo'));
	$natural->readonly('base, percentage, amount, min_amount, deductible');
	$natural->default_tab('TIPOS DE ISLR');
	$natural->where('id_type_beneficiary <=', 2);
	$natural->field_tooltip('base', 'Coloque el monto del porcentaje o escriba: MSR');
	$natural->field_tooltip('percentage', 'Coloque el monto del porcentaje o escriba: TARIFA');
	$natural->field_tooltip('deductible', 'Coloque el monto en Bs');
	$natural->field_tooltip('min_amount', 'Coloque el monto en Bs o escriba: TODO');
	$natural->field_tooltip('amount', 'Puede dejar el valor por defecto o escribir TODO');
	$natural->validation_required('id_type_beneficiary');
	$natural->replace_insert('add_islr');
	$natural->replace_remove('remove_islr');
	$natural->unset_edit();

	$juridico=$islr->nested_table('Persona Jurídica','id_islr','t_d_type_islr','id_islr');
	$juridico->table_name('Tipos de Beneficiarios');
	$juridico->table('t_d_type_islr');
	$juridico->join('id_type_beneficiary', 't_r_full_type_benef', 'id_full_type');
	$juridico->relation('t_r_full_type_benef.id_sub_type','t_n_sub_type','id_sub_type','name_sub');
	$juridico->label(array('id_type_beneficiary'=>'Tipo de Beneficiario','min_amount'=>'Pagos Mayores A Bs','base'=>'% Base Imponible','percentage'=>'% Tarifa','deductible'=>'Sustraendo en Bs.', 'amount' => 'Monto Sujeto a Retención', 't_r_full_type_benef.id_sub_type' => 'SubTipo'));
	$juridico->columns('t_r_full_type_benef.id_sub_type, base, percentage, amount, min_amount, deductible');
	$juridico->fields('id_type_beneficiary, base, percentage, amount, min_amount, deductible');
	$juridico->set_attr('id_type_beneficiary',array('id'=>'sub_type_juridico'));
	$juridico->set_attr('base',array('id'=>'base'));
	$juridico->set_attr('percentage',array('id'=>'tarifa'));
	$juridico->set_attr('amount',array('id'=>'monto'));
	$juridico->set_attr('min_amount',array('id'=>'monto_min'));
	$juridico->set_attr('deductible',array('id'=>'sustraendo'));
	$juridico->readonly('base, percentage, amount, min_amount, deductible');
	$juridico->default_tab('TIPOS DE ISLR');
	$juridico->where('id_type_beneficiary >=', 3);
	$juridico->field_tooltip('base', 'Coloque el monto del porcentaje o escriba: MSR');
	$juridico->field_tooltip('percentage', 'Coloque el monto del porcentaje o escriba: TARIFA');
	$juridico->field_tooltip('deductible', 'Coloque el monto en Bs');
	$juridico->field_tooltip('min_amount', 'Coloque el monto en Bs o escriba: TODO');
	$juridico->field_tooltip('amount', 'Puede dejar el valor por defecto o escribir TODO');
	$juridico->validation_required('id_type_beneficiary');
	$juridico->replace_insert('add_islr');
	$juridico->replace_remove('remove_islr');
	$juridico->unset_edit();

	$timbre = Xcrud::get_instance();
	$timbre->table_name('Timbre Fiscal');
	$timbre->table('t_d_sermat');
	$timbre->label(array('percentage' => 'A partir de','id_tributary_unity' => 'Unidad Tributaria', 'sermat_name' => 'Nombre'));
	$timbre->relation('id_tributary_unity', 't_d_tributary_unity', 'id_tributary_unity', 'amount');
	$timbre->columns('sermat_name, percentage, id_tributary_unity');
	$timbre->change_type('percentage', 'price', '0', array('suffix' => ' UT'));
	$timbre->start_minimized(true);

	$unidad = Xcrud::get_instance();
	$unidad->table_name('Unidad Tributaria');
	$unidad->table('t_d_tributary_unity');
	$unidad->label(array('amount' => 'Monto','date' => 'Fecha'));
	$unidad->change_type('amount', 'price', '0', array('prefix' => 'Bs.'));
	$unidad->order_by('id_tributary_unity', 'desc');
	$unidad->columns('amount, date');
	$unidad->start_minimized(true);

	$retencion = Xcrud::get_instance();
	$retencion->table_name('Retención');
	$retencion->table('t_d_retention');
	$retencion->label(array('percentage_retention' => 'Porcentaje de Retención'));
	$retencion->columns('percentage_retention');
	$retencion->fields('percentage_retention');
	$retencion->change_type('percentage_retention', 'price', '0', array('suffix' => '%', 'max' => 100));
	$retencion->start_minimized(true);

	$this->template->write('content', $iva.$islr.$timbre.$unidad.$retencion);
	$this->template->render();
}
public function ordenpdf(){
               
				$cabezal=$this->comprasmodel->getCabezal($_GET['id']);
				$productos=$this->comprasmodel->getProductos($_GET['id']);
				$fecha=$this->tutorial_model->get_time()->CURRENT_DATE;

				$data = array(
						'cabezal'=>$cabezal,
						'productos'=>$productos,
						'fecha'=>$fecha
					);

                $this->mpdf->mPDF('utf-8','A4');
                //CONTENIDO DEL PDF

                $html= $this->load->view('reportes/orden_compra',$data,true);
                $this->mpdf->showImageErrors = true;
                //var_dump($html);exit;
                $this->mpdf->WriteHTML($html);
                //SALIDA DE NUESTRO PDF
                $this->mpdf->Output();
    
}
public function orden()
	{
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table('t_d_purchase_order');
		 $xcrud->table_name('Ordenes de Compra ó Servicio');
		 $xcrud->default_tab('Orden de Compra');
		 $xcrud->label(array('date' => 'Fecha','id_purchase_order' => 'N° Orden de Compra','id_iva' => 'IVA','id_base_budget' => 'Presupuesto Base','id_beneficiary' => 'Beneficiario'));
	     $xcrud->relation('id_iva','t_n_iva','id_iva','iva');
	     $xcrud->relation('id_beneficiary','t_d_beneficiary','id_beneficiary','name');
	     $query = $this->db->query('SELECT id_purchase_order FROM t_d_purchase_order Order BY id_purchase_order desc');
		 $row = $query->row();
		 if (empty($row->id_purchase_order)){
		 	$identificador = 1; 
		 }else{
		 $identificador = $row->id_purchase_order  + 1;
		 }
		 $xcrud->pass_default('id_purchase_order',$identificador);
	     $xcrud->pass_default('date', $this->tutorial_model->get_time()->CURRENT_DATE);
	     $xcrud->set_attr('date',array('id'=>'fecha'));
		 $xcrud->set_attr('id_purchase_order',array('id'=>'depto'));
		 $xcrud->set_attr('id_base_budget',array('id'=>'presupuesto'));
	     $xcrud->fields('id_purchase_order,date,id_beneficiary,id_base_budget,id_iva');
	     $xcrud->columns('id_purchase_order,date,id_beneficiary,id_base_budget,id_iva');
	     $xcrud->readonly('id_purchase_order, date');
         $xcrud->create_action('Comprometer', 'comprometer'); // llamado a activa_action() en functions.php
    	 $xcrud->create_action('Cancelar', 'cancelar');
         $xcrud->button(base_url().'presupuesto/ordenpdf/?id={id_purchase_order}','Generar PDF','icon-close glyphicon glyphicon-list-alt','',
         	            array('target'=>'_blank',
         	            	  'id'=>'BotonPDF',
         	            	  'value'=>'{id_purchase_order}'),
         	            array(  // set condition ( when button must be shown)
				            'status',
				            '=',
				            '2'));
         $xcrud->button('#', 'Cancelar', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
				        array(  // set action vars to the button
				            'data-task' => 'action',
				            'data-action' => 'Cancelar',
				            'data-primary' => '{id_purchase_order}'),
				        array(  // set condition ( when button must be shown)
				            'status',
				            '=',
				            '1'));
   		$xcrud->button('#', 'Comprometer', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', 
		   			 	array(
					        'data-task' => 'action',
					        'data-action' => 'Comprometer',
					        'data-primary' => '{id_purchase_order}'), 
		   			 	array(
					        'status',
					        '=',
					        '0'));
		    $ocdetails = $xcrud->nested_table('Detalle Orden','id_base_budget','t_d_base_budget_detail','id_base_budget'); // 2nd level
		    $ocdetails->table_name('Detalle de Orden');
	        $ocdetails->default_tab('Detalle de Orden');
	        $ocdetails->label(array('Product_Name' => 'Producto','amount' => 'Precio','quantity' => 'Cantidad','bool' => 'Aplica','Code_Account' => 'Cuenta Gasto','status' => 'Estado'));
		 	$ocdetails->fk_relation('Product_Name','id_req_detail','t_d_requisition_detail','id_req_detail','id_product','t_d_product','id_product','name_product');
		 	$ocdetails->fk_relation('Code_Account','id_account_fund','t_r_account_fund','id_account_fund','id_account','t_d_account','id_account','code_account');
		 	$ocdetails->fields('quantity,amount,id_account_fund');
		 	$ocdetails->columns('Product_Name,quantity,amount,Code_Account,Subtotal,status');
		 	$ocdetails->subselect('Subtotal','{quantity}*{amount}');
		 	$ocdetails->sum('Subtotal');
		 	$ocdetails->set_attr('id_account_fund',array('id'=>'id_cuenta'));
		 	$ocdetails->hide_button('add,remove');
		 	$ocdetails->create_action('Habilitar', 'activa_action'); // llamado a activa_action() en functions.php
    		$ocdetails->create_action('Inhabilitar', 'inactiva_action');
    		$ocdetails->button('#', 'Inhabilitado', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
				        array(  // set action vars to the button
				            'data-task' => 'action',
				            'data-action' => 'Habilitar',
				            'data-primary' => '{id_budget_detail}'),
				        array(  // set condition ( when button must be shown)
				            'status',
				            '!=',
				            '1')
				    );
   			 $ocdetails->button('#', 'Habilitado', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', 
		   			 	array(
					        'data-task' => 'action',
					        'data-action' => 'Inhabilitar',
					        'data-primary' => '{id_budget_detail}'), 
		   			 	array(
					        'status',
					        '=',
					        '1'));
		 $this->template->write('content', $xcrud);
		 $this->template->render();
	}

	public function comparar_montos(){
		$parametros['monto'] = $_POST['monto'];
		$parametros['orden'] = $_POST['orden'];
		$parametros['cheque'] = $_POST['cheque'];

		$this->tesoreriaModel->comparar_montos($parametros);
	}

	public function calcular_iva(){
		$parametros['id_iva'] = $_POST['id_iva'];
		$parametros['base_imponible'] = $_POST['base_imponible'];
		$parametros['id_retencion'] = $_POST['id_retencion'];
		$parametros['sermat'] = $_POST['sermat'];
		$parametros['islr'] = $_POST['islr'];

		$this->tesoreriaModel->calcular_iva($parametros);
	}

	public function listar_ordenes(){
		$this->tesoreriaModel->listar_ordenes();
	}

	public function listar_islr(){
		$this->tesoreriaModel->listar_islr();
	}
}
