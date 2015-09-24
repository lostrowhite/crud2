<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Presupuesto extends CI_Controller{	

public function __construct()
    {
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
public function partidas()
	{
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Partidas');
		 $xcrud->table('t_d_account');
		 $xcrud->label(array('id_account' => 'Id','code' => 'Código','name' => 'Nombre'));
		 $this->template->write('content', $xcrud);
		 $this->template->render();
		}
public function iva()
	{
		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Porcentajes de Iva');
		 $xcrud->table('t_n_iva');
		 $xcrud->label(array('iva' => 'Porcentaje de Iva'));
		 $this->session->set_userdata(array('xcrud_sess'=>Xcrud::export_session()));
		 $this->template->write('content', $xcrud);
		 $this->template->render();
		}
public function ordenpdf(){
				
				$cabezal=$this->comprasmodel->getCabezal($_GET['id']);
				$productos=$this->comprasmodel->getProductos($_GET['id']);
				
				if($productos==null){
					 echo '<script>alert("Esta orden no tiene productos asignados");</script>';
				}
				else{
				$fecha=$this->tutorial_model->get_time()->CURRENT_DATE;
				$firmas=$this->tutorial_model->getFirmas();
				$data = array(
						'cabezal'=>$cabezal,
						'productos'=>$productos,
						'fecha'=>$fecha,
						'firmas'=>$firmas
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
    
}
public function orden(){
	$orden = Xcrud::get_instance();
	$orden->table('t_d_purchase_order');
	$orden->table_name('Ordenes de Compra ó Servicio');
	$orden->default_tab('Orden de Compra');
	$orden->label(array('date_or' => 'Fecha','id_purchase_order' => 'N°','id_iva' => 'IVA','id_base_budget' => 'Presupuesto Base','id_beneficiary' => 'Beneficiario', 'id_po_status' => 'Estatus'));
	$orden->relation('id_iva','t_n_iva','id_iva','iva');
	$orden->relation('id_beneficiary','t_d_beneficiary','id_beneficiary','name');
	$orden->relation('id_po_status','t_n_purchase_order_status','id_po_status','status');
	$query = $this->db->query('SELECT id_purchase_order FROM t_d_purchase_order Order BY id_purchase_order desc');
	$row = $query->row();

	$identificador = (empty($row->id_purchase_order)) ? 1 : $row->id_purchase_order  + 1;

	$orden->pass_default('id_purchase_order',$identificador);
	$orden->pass_default('date_or', $this->tutorial_model->get_time()->CURRENT_DATE);
	$orden->set_attr('date_or',array('id'=>'fecha'));
	$orden->set_attr('id_purchase_order',array('id'=>'depto'));
	$orden->set_attr('id_base_budget',array('id'=>'presupuesto'));
	$orden->fields('id_purchase_order, date_or, id_beneficiary, id_base_budget, id_iva');
	$orden->columns('id_purchase_order, date_or, id_beneficiary, id_base_budget, id_iva, id_po_status');
	$orden->readonly('id_purchase_order, date_or');
	$orden->create_action('Comprometer', 'comprometer'); // llamado a activa_action() en functions.php
	$orden->create_action('Cancelar', 'cancelar');
	$orden->hide_button('remove');
	$orden->order_by('id_purchase_order', 'desc');
	$orden->button(base_url().'presupuesto/ordenpdf/?id={id_purchase_order}','Generar PDF','fa fa-file-pdf-o','',
		            array('target'=>'_blank', 'id'=>'BotonPDF', 'value'=>'{id_purchase_order}'));
	$orden->button('#', 'Cancelar', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
		        	array('data-task' => 'action', 'data-action' => 'Cancelar', 'data-primary' => '{id_purchase_order}'),
		        	array('id_po_status', '=', '2')
		        );
	$orden->button('#', 'Comprometer', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', 
				 	array('data-task' => 'action', 'data-action' => 'Comprometer', 'data-primary' => '{id_purchase_order}'), 
				 	array('id_po_status', '=', '1')
				 );

	$ocdetails = $orden->nested_table('Detalle Orden','id_base_budget','t_d_base_budget_detail','id_base_budget'); // 2nd level
	$ocdetails->table_name('Detalle de Orden');
	$ocdetails->default_tab('Detalle de Orden');
	$ocdetails->label(array('Product_Name' => 'Producto','amount' => 'Precio','quantity' => 'Cantidad','bool' => 'Aplica','Code_Account' => 'Cuenta Gasto','id_bb_status' => 'Estado','id_account_fund' => 'Cuenta Fondo'));
	$ocdetails->relation('id_bb_status', 't_n_base_budget_status', 'id_bb_status', 'name');
	$ocdetails->fk_relation('Product_Name','id_req_detail','t_d_requisition_detail','id_req_detail','id_product','t_d_product','id_product','name_product');
	$ocdetails->fk_relation('Code_Account','id_account_fund','t_r_account_fund','id_account_fund','id_account','t_d_account','id_account','code_account');
	$ocdetails->fields('Product_Name,quantity,amount,subtotal');
	$ocdetails->columns('Product_Name,quantity,amount,Code_Account,subtotal,id_bb_status');
	$ocdetails->subselect('Subtotal','{quantity}*{amount}');
	$ocdetails->set_attr('subtotal',array('id'=>'id_subtotal'));
	$ocdetails->sum('Subtotal');
	$ocdetails->hide_button('add,remove,save_new');
	$ocdetails->create_action('Habilitar', 'activa_action'); // llamado a activa_action() en functions.php
	$ocdetails->create_action('Inhabilitar', 'inactiva_action');
	$ocdetails->button('#', 'Inhabilitado', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
		        array('data-task' => 'action', 'data-action' => 'Habilitar', 'data-primary' => '{id_budget_detail}'),
		        array('id_bb_status', '=', '1')
		    );
	$ocdetails->button('#', 'Habilitado', 'icon-checkmark glyphicon glyphicon-ok', 'xcrud-action', 
			 	array('data-task' => 'action', 'data-action' => 'Inhabilitar', 'data-primary' => '{id_budget_detail}'), 
			 	array('id_bb_status', '=', '2')
			);
	// $ocdetails->where('id_bb_status =', 1);
	$ocacdetails = $ocdetails->nested_table('Detalle Cuenta Gasto','id_budget_detail','t_d_base_budget_account','id_budget_detail'); // 3nd level
	$ocacdetails->table_name('Detalle de Cuenta Gasto');
	$ocacdetails->default_tab('Detalle de Cuenta Gasto');
	$ocacdetails->label(array('id_account_fund' => 'Cuenta Gasto','amount' => 'Monto','id_budget_detail' => 'Subtotal','fund' => 'Fondo'));
	$ocacdetails->set_attr('id_account_fund',array('id'=>'id_cuenta'));
	$ocacdetails->set_attr('fund',array('id'=>'id_fondo'));
	$ocacdetails->set_attr('t_d_base_budget_detail.subtotal',array('id'=>'id_subtotald'));
	$ocacdetails->relation('id_budget_detail', 't_d_base_budget_detail', 'id_budget_detail','subtotal');
	$ocacdetails->columns('id_account_fund,fund,amount,id_budget_detail');
	$ocacdetails->fields('id_account_fund,fund,amount,id_budget_detail');
	$this->template->write('content', $orden);
	$this->template->render();
}

	public function compromisos(){
	 	$xcrud = Xcrud::get_instance();
	    $xcrud->table('t_d_base_budget_detail');
	    $xcrud->table_name('Compromisos Presupuestarios');
	    // $xcrud->fk_relation('Purchase_base','id_base_budget','t_d_base_budget','id_base_budget','id_base_budget','t_d_base_budget','id_base_budget','name_product');
	    $xcrud->join('id_base_budget','t_d_purchase_order','id_base_budget');
	    $xcrud->where("t_d_purchase_order.status = 1 OR t_d_purchase_order.status = 3");
		$this->template->write('content', $xcrud);
		$this->template->render();
  	}

  	public function disponibilidad(){
  		$disponibilidad = Xcrud::get_instance();
	    $disponibilidad->table('t_r_account_fund');
	    $disponibilidad->table_name('Disponibilidad Presupuestaria');
	    $disponibilidad->join('id_account', 't_d_account', 'id_account');
	    $disponibilidad->join('id_fund', 't_d_fund', 'id_fund');
	    $disponibilidad->join('id_dept', 't_d_department', 'id_dept');
	    $disponibilidad->join('t_d_department.id_program', 't_d_program', 'id_program');
	    $disponibilidad->columns('t_d_program.cod_program,t_d_department.code_dept,t_d_account.code_account, t_d_account.name_account, t_d_fund.id_fund, Trimestre I, Comprometido I, Trimestre II, Comprometido II, Trimestre III, Comprometido III,
	    	Trimestre IV, Comprometido IV, amount, Comprometido Total, Disponible Total');
	    $disponibilidad->subselect('Comprometido Total', '{Comprometido I} + {Comprometido II} + {Comprometido III} + {Comprometido IV}');
	    $disponibilidad->subselect('Disponible Total', '{amount} - {Comprometido Total}');
	    $disponibilidad->subselect('Trimestre I', '{amount} / 4');
	    $disponibilidad->subselect('Trimestre II', '({amount} / 4) + ({Trimestre I} - {Comprometido I})');
	    $disponibilidad->subselect('Trimestre III', '({amount} / 4) + ({Trimestre II} - {Comprometido II})');
	    $disponibilidad->subselect('Trimestre IV', '({amount} / 4) + ({Trimestre III} - {Comprometido III})');
	    $disponibilidad->subselect('Comprometido I', 'SELECT IFNULL(sum(BBD.subtotal), 0)
												      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
												      WHERE PO.id_base_budget = BBD.id_base_budget 
												      AND PO.id_po_status >= 2
												      AND BBD.id_account_fund = {id_account_fund}
												      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-01-01") AND CONCAT(YEAR(PO.date_or), "-03-31")');
	    $disponibilidad->subselect('Comprometido II', 'SELECT IFNULL(sum(BBD.subtotal), 0)
												      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
												      WHERE PO.id_base_budget = BBD.id_base_budget 
												      AND PO.id_po_status >= 2
												      AND BBD.id_account_fund = {id_account_fund}
												      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-04-01") AND CONCAT(YEAR(PO.date_or), "-06-30")');
	    $disponibilidad->subselect('Comprometido III', 'SELECT IFNULL(sum(BBD.subtotal), 0)
												      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
												      WHERE PO.id_base_budget = BBD.id_base_budget 
												      AND PO.id_po_status >= 2
												      AND BBD.id_account_fund = {id_account_fund}
												      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-07-01") AND CONCAT(YEAR(PO.date_or), "-10-30")');
	    $disponibilidad->subselect('Comprometido IV', 'SELECT IFNULL(sum(BBD.subtotal), 0)
												      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
												      WHERE PO.id_base_budget = BBD.id_base_budget 
												      AND PO.id_po_status >= 2
												      AND BBD.id_account_fund = {id_account_fund}
												      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-11-01") AND CONCAT(YEAR(PO.date_or), "-12-31")');
	    $disponibilidad->change_type('Comprometido Total, amount, Disponible Total, Trimestre I, Trimestre II, Trimestre III, Trimestre IV, Comprometido I, Comprometido II, Comprometido III, Comprometido IV', 'price', '0', array('prefix'=>'Bsf. '));
	    $disponibilidad->order_by('Comprometido Total', 'DESC');
	    $disponibilidad->label(array(
	    							't_d_account.name_account' 		=> 'Nombre de Cuenta',
	    							't_d_account.code_account' 		=> 'Cuenta', 
	    							't_d_fund.id_fund' 				=> 'Fondo',
	    							't_d_department.code_dept'		=> 'Unidad',
	    							't_d_program.cod_program'		=> 'Programa',
	    							'amount' 						=> 'Asignado Total',
	    							't_d_purchase_order.date_or' 	=> 'Fecha'
	    						));
	    $disponibilidad->unset_add();
    	$disponibilidad->unset_edit();
    	$disponibilidad->unset_remove();
		$this->template->write('content', $disponibilidad);
		$this->template->render();
  	}
  	public function disponibilidadindividual(){
  		$disponibilidad = Xcrud::get_instance();
	    $disponibilidad->table('t_r_account_fund');
	    $disponibilidad->table_name('Disponibilidad Presupuestaria Individual');
	    $disponibilidad->join('id_account', 't_d_account', 'id_account');
	    $disponibilidad->join('id_fund', 't_d_fund', 'id_fund');
	    $disponibilidad->join('id_dept', 't_d_department', 'id_dept');
	    $disponibilidad->join('t_d_department.id_program', 't_d_program', 'id_program');
	    $disponibilidad->columns('t_d_program.cod_program,t_d_department.code_dept,t_d_account.code_account, t_d_account.name_account, t_d_fund.id_fund, amount, Comprometido');
	   	$disponibilidad->subselect('Comprometido', 'SELECT t_d_base_budget_detail.subtotal
											 FROM t_d_purchase_order, t_d_base_budget_detail
											 WHERE t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget 
											 AND t_d_purchase_order.`status` = 1
											 AND t_d_base_budget_detail.id_account_fund = {id_account_fund}
	    						');
	    $disponibilidad->label(array(
	    							't_d_account.name_account' => 'Nombre de Cuenta',
	    							't_d_account.code_account' => 'Cuenta', 
	    							't_d_fund.id_fund' => 'Fondo',
	    							't_d_department.code_dept'=> 'Unidad',
	    							't_d_program.cod_program'=> 'Programa',
	    							'amount' => 'Asignado	'
	    						));
	    // $disponibilidad->order_by('Comprometido', 'DESC');
	    $disponibilidad->unset_add();
    	$disponibilidad->unset_edit();
    	$disponibilidad->unset_remove();
		$this->template->write('content', $disponibilidad);
		$this->template->render();
  	}
}
