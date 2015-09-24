<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicadores extends CI_Controller{	

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
public function indicador(){
	 	$xcrud = Xcrud::get_instance();
	    $xcrud->table('indicadores');
	    $xcrud->table_name('Indicadores de Gestion');
	    $xcrud->label(array('id_dept' => 'Departamento','id_type' => 'Tipo','o_e' => 'Objetivo Estrategico',
	    	'n_p' => 'Nombre del Proyecto','i_g_d' => 'Indicadores de Gestión (Des.)','i_g_c' => 'Indicadores de Gestión (Cant.)',
	    	'd_i_d' => 'Definición del Indicador (Des.)','d_i_c' => 'Definición del Indicador (Cant.)','m_o' => 'Modo de Obtención de Datos',
	    	'i_r_f' => 'Indicadores de Resultados /Formula','d_i' => 'Medición del Indicador (Des.)'
	    	));
	    // $xcrud->fk_relation('Purchase_base','id_base_budget','t_d_base_budget','id_base_budget','id_base_budget','t_d_base_budget','id_base_budget','name_product');
		$xcrud->relation('id_dept','t_d_department','id_dept','name_dept');
		$xcrud->relation('id_type','tipo_indicadores','id_type','nombre');
		$this->template->write('content', $xcrud);
		$this->template->render();
  	}
public function tipo_indicador(){
	 	$xcrud = Xcrud::get_instance();
	    $xcrud->table('tipo_indicadores');
	    $xcrud->table_name('Tipo de Indicadores');
	   	$this->template->write('content', $xcrud);
		$this->template->render();
  	}

  	// INDICADORES
  	function activity(){
  		$activity = Xcrud::get_instance();
	    $activity->table('t_n_activity');
	    $activity->table_name('Actividades');

	   	$this->template->write('content', $activity);
		$this->template->render();
  	}

  	function indicators(){
  		// GIP
  		$gip = Xcrud::get_instance();
	    $gip->table('t_r_account_fund');
	    $gip->table_name('GIP');
	    $gip->join('id_account', 't_d_account', 'id_account');
	    $gip->join('id_fund', 't_d_fund', 'id_fund');
	    $gip->join('id_dept', 't_d_department', 'id_dept');
	    $gip->join('t_d_department.id_program', 't_d_program', 'id_program');
	    $gip->columns('t_d_program.cod_program,t_d_department.code_dept,t_d_account.code_account, t_d_account.name_account, t_d_fund.id_fund, Trimestre I, Ejecutado I, % Ejec I, Trimestre II, Ejecutado II, % Ejec II, Trimestre III, Ejecutado III, % Ejec III,
	    	Trimestre IV, Ejecutado IV, % Ejec IV, amount, Ejecutado Total, Disponible Total,Fundamental');
	    $gip->highlight_row('Fundamental', '=', 'Si', 'rgba(59, 126, 255, 0.9)');
	    $gip->subselect('Fundamental', 'SELECT "Si" FROM t_r_program_account WHERE id_program = {t_d_program.id_program} AND id_account = {id_account}');
	    $gip->subselect('Ejecutado Total', 'TRUNCATE(( ({amount} / ({Ejecutado I} + {Ejecutado II} + {Ejecutado III} + {Ejecutado IV})) * 100 ), 2)');
	    $gip->subselect('Disponible Total', '{amount} - {Ejecutado Total}');
	    $gip->subselect('Trimestre I', '{amount} / 4');
	    $gip->subselect('Trimestre II', '({amount} / 4) + ({Trimestre I} - {Ejecutado I})');
	    $gip->subselect('Trimestre III', '({amount} / 4) + ({Trimestre II} - {Ejecutado II})');
	    $gip->subselect('Trimestre IV', '({amount} / 4) + ({Trimestre III} - {Ejecutado III})');
	    $gip->subselect('Ejecutado I', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 3
									      AND BBD.id_bb_status = 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-01-01") AND CONCAT(YEAR(PO.date_or), "-03-31")');
	    $gip->subselect('Ejecutado II', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 3
									      AND BBD.id_bb_status = 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-04-01") AND CONCAT(YEAR(PO.date_or), "-06-30")');
	    $gip->subselect('Ejecutado III', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 3
									      AND BBD.id_bb_status = 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-07-01") AND CONCAT(YEAR(PO.date_or), "-10-30")');
	    $gip->subselect('Ejecutado IV', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 3
									      AND BBD.id_bb_status = 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-11-01") AND CONCAT(YEAR(PO.date_or), "-12-31")');
	    $gip->subselect('% Ejec I', 'TRUNCATE(({Ejecutado I} / {Trimestre I}) * 100, 2)');
	    $gip->subselect('% Ejec II', 'TRUNCATE(({Ejecutado II} / {Trimestre II}) * 100, 2)');
	    $gip->subselect('% Ejec III', 'TRUNCATE(({Ejecutado III} / {Trimestre III}) * 100, 2)');
	    $gip->subselect('% Ejec IV', 'TRUNCATE(({Ejecutado IV} / {Trimestre IV}) * 100, 2)');
	    $gip->change_type('amount, Disponible Total, Trimestre I, Trimestre II, Trimestre III, Trimestre IV, Ejecutado I, Ejecutado II, Ejecutado III, Ejecutado IV', 'price', '0', array('prefix'=>'Bsf. '));
	    $gip->change_type('% Ejec I, % Ejec II, % Ejec III, % Ejec IV, Ejecutado Total', 'price', '0', array('suffix'=>'%'));
	    $gip->order_by('Ejecutado Total', 'DESC');
	    $gip->label(array(
	    							't_d_account.name_account' 		=> 'Nombre de Cuenta',
	    							't_d_account.code_account' 		=> 'Cuenta', 
	    							't_d_fund.id_fund' 				=> 'Fondo',
	    							't_d_department.code_dept'		=> 'Unidad',
	    							't_d_program.cod_program'		=> 'Programa',
	    							'amount' 						=> 'Asignado Total',
	    							't_d_purchase_order.date_or' 	=> 'Fecha'
	    						));
	    $gip->unset_add();
    	$gip->unset_edit();
    	$gip->unset_remove();
    	// $gip->start_minimized(true);

		$this->template->write('content', $gip);

		// REO
		$reo = Xcrud::get_instance();
	    $reo->table('t_d_program');
	    $reo->table_name('REO');
	    $reo->columns('t_d_program.cod_program,Ejecutado I,Actividad Fundamental I,Porcentaje I,Ejecutado II,Actividad Fundamental II,Porcentaje II,Ejecutado III,Actividad Fundamental III,Porcentaje III,Ejecutado IV,Actividad Fundamental IV,Porcentaje IV');
		$reo->subselect('Ejecutado I','SELECT
							IFNULL(
								sum(
									t_d_base_budget_detail.subtotal
								),
								0
							) AS bbd
						FROM
							t_d_purchase_order
						INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
						INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
						INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
						INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
						INNER JOIN t_d_program a ON t_d_department.id_program = a.id_program
						WHERE
							a.id_program = {id_program}
						AND t_d_purchase_order.id_po_status >= 2
						AND t_d_purchase_order.date_or BETWEEN CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-01-01"
						)
						AND CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-03-31"
						)');
		$reo->subselect('Actividad Fundamental I','SELECT
												IFNULL(
													sum(
														t_d_base_budget_detail.subtotal
													),
													0
												) AS bbd
											FROM
											t_d_purchase_order
											INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
											INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
											INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
											INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
											INNER JOIN t_d_program AS a ON t_d_department.id_program = a.id_program
											INNER JOIN t_r_program_account ON t_r_program_account.id_program = a.id_program
											INNER JOIN t_r_account_fund ON t_r_account_fund.id_account = t_r_program_account.id_account AND t_r_account_fund.id_account_fund = t_d_base_budget_detail.id_account_fund
											WHERE
												a.id_program = {id_program}
											AND t_d_purchase_order.id_po_status >= 2
											AND t_d_purchase_order.date_or BETWEEN CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-01-01"
											)
											AND CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-03-31"
											)');
		$reo->subselect('Porcentaje I','TRUNCATE(({Actividad Fundamental I}*100)/{Ejecutado I}, 2)');
		$reo->subselect('Ejecutado II','SELECT
							IFNULL(
								sum(
									t_d_base_budget_detail.subtotal
								),
								0
							) AS bbd
						FROM
							t_d_purchase_order
						INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
						INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
						INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
						INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
						INNER JOIN t_d_program a ON t_d_department.id_program = a.id_program
						WHERE
							a.id_program = {id_program}
						AND t_d_purchase_order.id_po_status >= 2
						AND t_d_purchase_order.date_or BETWEEN CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-04-01"
						)
						AND CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-06-31"
						)');
		$reo->subselect('Actividad Fundamental II','SELECT
												IFNULL(
													sum(
														t_d_base_budget_detail.subtotal
													),
													0
												) AS bbd
											FROM
											t_d_purchase_order
											INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
											INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
											INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
											INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
											INNER JOIN t_d_program AS a ON t_d_department.id_program = a.id_program
											INNER JOIN t_r_program_account ON t_r_program_account.id_program = a.id_program
											INNER JOIN t_r_account_fund ON t_r_account_fund.id_account = t_r_program_account.id_account AND t_r_account_fund.id_account_fund = t_d_base_budget_detail.id_account_fund
											WHERE
												a.id_program = {id_program}
											AND t_d_purchase_order.id_po_status >= 2
											AND t_d_purchase_order.date_or BETWEEN CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-04-01"
											)
											AND CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-06-31"
											)');
		$reo->subselect('Porcentaje II','TRUNCATE(({Actividad Fundamental II}*100)/{Ejecutado II}, 2)');
		$reo->subselect('Ejecutado III','SELECT
							IFNULL(
								sum(
									t_d_base_budget_detail.subtotal
								),
								0
							) AS bbd
						FROM
							t_d_purchase_order
						INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
						INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
						INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
						INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
						INNER JOIN t_d_program a ON t_d_department.id_program = a.id_program
						WHERE
							a.id_program = {id_program}
						AND t_d_purchase_order.id_po_status >= 2
						AND t_d_purchase_order.date_or BETWEEN CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-07-01"
						)
						AND CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-09-31"
						)');
		$reo->subselect('Actividad Fundamental III','SELECT
												IFNULL(
													sum(
														t_d_base_budget_detail.subtotal
													),
													0
												) AS bbd
											FROM
											t_d_purchase_order
											INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
											INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
											INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
											INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
											INNER JOIN t_d_program AS a ON t_d_department.id_program = a.id_program
											INNER JOIN t_r_program_account ON t_r_program_account.id_program = a.id_program
											INNER JOIN t_r_account_fund ON t_r_account_fund.id_account = t_r_program_account.id_account AND t_r_account_fund.id_account_fund = t_d_base_budget_detail.id_account_fund
											WHERE
												a.id_program = {id_program}
											AND t_d_purchase_order.id_po_status >= 2
											AND t_d_purchase_order.date_or BETWEEN CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-07-01"
											)
											AND CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-09-31"
											)');
		$reo->subselect('Porcentaje III','TRUNCATE(({Actividad Fundamental III}*100)/{Ejecutado III}, 2)');
		$reo->subselect('Ejecutado IV','SELECT
							IFNULL(
								sum(
									t_d_base_budget_detail.subtotal
								),
								0
							) AS bbd
						FROM
							t_d_purchase_order
						INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
						INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
						INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
						INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
						INNER JOIN t_d_program a ON t_d_department.id_program = a.id_program
						WHERE
							a.id_program = {id_program}
						AND t_d_purchase_order.id_po_status >= 2
						AND t_d_purchase_order.date_or BETWEEN CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-10-01"
						)
						AND CONCAT(
							YEAR (t_d_purchase_order.date_or),
							"-12-31"
						)');
		$reo->subselect('Actividad Fundamental IV','SELECT
												IFNULL(
													sum(
														t_d_base_budget_detail.subtotal
													),
													0
												) AS bbd
											FROM
											t_d_purchase_order
											INNER JOIN t_d_base_budget_detail ON t_d_purchase_order.id_base_budget = t_d_base_budget_detail.id_base_budget
											INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
											INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
											INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
											INNER JOIN t_d_program AS a ON t_d_department.id_program = a.id_program
											INNER JOIN t_r_program_account ON t_r_program_account.id_program = a.id_program
											INNER JOIN t_r_account_fund ON t_r_account_fund.id_account = t_r_program_account.id_account AND t_r_account_fund.id_account_fund = t_d_base_budget_detail.id_account_fund
											WHERE
												a.id_program = {id_program}
											AND t_d_purchase_order.id_po_status >= 2
											AND t_d_purchase_order.date_or BETWEEN CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-10-01"
											)
											AND CONCAT(
												YEAR (t_d_purchase_order.date_or),
												"-12-31"
											)');
		$reo->subselect('Porcentaje IV','TRUNCATE(({Actividad Fundamental IV}*100)/{Ejecutado IV}, 2)');
		$reo->change_type('Porcentaje I,Porcentaje II,Porcentaje III,Porcentaje IV', 'price', '0', array('suffix'=>'%'));
	    $reo->unset_add();
    	$reo->unset_edit();
    	$reo->unset_remove();

		$this->template->write('content', $reo);

		// IPR
		$ipr = Xcrud::get_instance();
	    $ipr->table('t_r_account_fund');
	    $ipr->table_name('IPR');
	    $ipr->join('id_account', 't_d_account', 'id_account');
	    $ipr->join('id_fund', 't_d_fund', 'id_fund');
	    $ipr->join('id_dept', 't_d_department', 'id_dept');
	    $ipr->join('t_d_department.id_program', 't_d_program', 'id_program');
	    $ipr->columns('t_d_program.cod_program,t_d_department.code_dept,t_d_account.code_account, t_d_account.name_account, t_d_fund.id_fund, Trimestre I, Ejecutado I, % Ejec I, Trimestre II, Ejecutado II, Trimestre III, Ejecutado III,
	    	Trimestre IV, Ejecutado IV, amount, Ejecutado Total, Disponible Total');
	    $ipr->subselect('Ejecutado Total', '{Ejecutado I} + {Ejecutado II} + {Ejecutado III} + {Ejecutado IV}');
	    $ipr->subselect('Disponible Total', '{amount} - {Ejecutado Total}');
	    $ipr->subselect('Trimestre I', '{amount} / 4');
	    $ipr->subselect('Trimestre II', '({amount} / 4) + ({Trimestre I} - {Ejecutado I})');
	    $ipr->subselect('Trimestre III', '({amount} / 4) + ({Trimestre II} - {Ejecutado II})');
	    $ipr->subselect('Trimestre IV', '({amount} / 4) + ({Trimestre III} - {Ejecutado III})');
	    $ipr->subselect('Ejecutado I', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-01-01") AND CONCAT(YEAR(PO.date_or), "-03-31")');
	    $ipr->subselect('Ejecutado II', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-04-01") AND CONCAT(YEAR(PO.date_or), "-06-30")');
	    $ipr->subselect('Ejecutado III', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-07-01") AND CONCAT(YEAR(PO.date_or), "-10-30")');
	    $ipr->subselect('Ejecutado IV', 'SELECT IFNULL(sum(BBD.subtotal), 0)
									      FROM t_d_purchase_order AS PO, t_d_base_budget_detail AS BBD
									      WHERE PO.id_base_budget = BBD.id_base_budget 
									      AND PO.id_po_status >= 2
									      AND BBD.id_account_fund = {id_account_fund}
									      AND PO.date_or BETWEEN CONCAT(YEAR(PO.date_or), "-11-01") AND CONCAT(YEAR(PO.date_or), "-12-31")');
	    $ipr->subselect('% Ejec I', 'TRUNCATE(({Ejecutado I} / {Trimestre I}) * 100, 2)');
	    $ipr->subselect('% Ejec II', 'TRUNCATE(({Ejecutado II} / {Trimestre II}) * 100, 2)');
	    $ipr->subselect('% Ejec III', 'TRUNCATE(({Ejecutado III} / {Trimestre III}) * 100, 2)');
	    $ipr->subselect('% Ejec IV', 'TRUNCATE(({Ejecutado IV} / {Trimestre IV}) * 100, 2)');
	    $ipr->change_type('Ejecutado Total, amount, Disponible Total, Trimestre I, Trimestre II, Trimestre III, Trimestre IV, Ejecutado I, Ejecutado II, Ejecutado III, Ejecutado IV', 'price', '0', array('prefix'=>'Bsf. '));
	    $ipr->change_type('Ejec', 'price', '0', array('suffix'=>'%'));
	    $ipr->order_by('Ejecutado Total', 'DESC');
	    $ipr->label(array(
	    							't_d_account.name_account' 		=> 'Nombre de Cuenta',
	    							't_d_account.code_account' 		=> 'Cuenta', 
	    							't_d_fund.id_fund' 				=> 'Fondo',
	    							't_d_department.code_dept'		=> 'Unidad',
	    							't_d_program.cod_program'		=> 'Programa',
	    							'amount' 						=> 'Asignado Total',
	    							't_d_purchase_order.date_or' 	=> 'Fecha'
	    						));
	    $ipr->unset_add();
    	$ipr->unset_edit();
    	$ipr->unset_remove();

		$this->template->write('content', $ipr);
		$this->template->render();
  	}
}
