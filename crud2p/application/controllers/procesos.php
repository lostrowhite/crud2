<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procesos extends CI_Controller{	

    public function __construct()
    {
        parent::__construct();
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
 		$this->load->helper('url');
        /* ------------------ */ 
        $this->load->library('grocery_CRUD');
		$this->load->model('tutorial_model');
    }
	function index() {
        if( $this->session->userdata('isLoggedIn') ) {
            redirect('/nave/show_main');
        } else {
            $this->show_login(false);
        }
    }

    function sub_type_beneficiary(){
        $subtipo['id'] = ($this->uri->segment(3, 0) == 'natural') ? 2 : 3;
        $subtipo['signo'] = ($this->uri->segment(3, 0) == 'natural') ? '<=' : '>=';

        $q = isset($_POST['q']) ? strval($_POST['q']) : '';

        $this->db->select('*');    
        $this->db->from('t_r_full_type_benef');
        $this->db->join('t_n_type_beneficiary', 't_r_full_type_benef.id_type = t_n_type_beneficiary.id_type_beneficiary');
        $this->db->join('t_n_sub_type', 't_r_full_type_benef.id_sub_type = t_n_sub_type.id_sub_type');
        $this->db->where('t_r_full_type_benef.id_full_type ' . $subtipo['signo'], $subtipo['id']);
        $query = $this->db->get();

                
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $result[]= $row;
            }
        }echo json_encode($result);
    }

    function islr_factura(){

        $search = isset($_POST['q']) ? strval($_POST['q']) : '';

        $qu = $this->db->query('SELECT TI.id_islr_type, TB.name, ST.name_sub, TI.min_amount, TI.base, TI.percentage, TI.deductible, 
                                        TI.amount, I.name_islr
                                FROM t_r_full_type_benef AS FT
                                INNER JOIN t_n_type_beneficiary AS TB ON FT.id_type = TB.id_type_beneficiary
                                INNER JOIN t_n_sub_type AS ST ON FT.id_sub_type = ST.id_sub_type, t_d_type_islr AS TI 
                                INNER JOIN t_d_islr AS I ON TI.id_islr = I.id_islr
                                WHERE TI.id_type_beneficiary = FT.id_full_type
                                AND I.name_islr LIKE "%' . $search . '%"
                                ORDER BY TB.name ASC');
        
        if($qu->num_rows() > 0){
            foreach ($qu->result_array() as $row){
                $result[]= $row;
            }
        }echo json_encode($result);
    }

public function getbudgetbase(){
	echo json_encode( $this->tutorial_model->getidpb() );
    }
public function ajax_datatable()
    {
        $result = $this->tutorial_model->get_table();
 
        $retval = array(
            "iTotalRecords" => $iTotalRecords,
            "iTotalDisplayRecords" => $iTotalDisplayRecords,
            "aaData" => array()
        );
 
        foreach($result as $row)
        {
            array_push($json["aaData"],array(
                $row->field,
                $row->field2,
                $row->field3
            ));
        }
 
        header("Content-type: application/json");
        echo json_encode($json);
    }
   public function getTable()
    {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id_p', 'id_d', 'id_u');
        
        // DB table to use
        $sTable = 'presupuesto';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $rResult = $this->db->get($sTable);
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }
    
            $output['aaData'][] = $row;
        }
    
        echo json_encode($output);
    }
public function datatable()
    {
        $this->datatables->select('id_r,id_dep,id_p,Total')
        ->add_column('Accion', get_buttons('$1'),'id_r')
        ->from('req');
        
        echo $this->datatables->generate();
    }
public function procesar()
    {
        $this->datatables->select('id_r,id_dep,id_p,Total')
        ->add_column('Accion', get_buttons('$1'),'id_r')
        ->from('req');
        
        echo $this->datatables->generate();
    }
public function read() {
		echo json_encode( $this->tutorial_model->getAll() );
	}
public function partidas() {
		echo json_encode( $this->tutorial_model->getPartidas() );
	}
public function lee_req() {
		echo json_encode( $this->tutorial_model->getReq() );
	}
public function lee_pb() {
		echo json_encode( $this->tutorial_model->getPb() );
	}
public function lee_cta() {
		echo json_encode( $this->tutorial_model->getCta() );
	}
public function lee_det() {
	if( isset( $id ) )
		echo json_encode( $this->tutorial_model->getDet($id) );
	}
public function ajaxold()
    {
        if($buscar = $this->input->get('term'))
        {
            $this->db->select('id_d, cuenta_gasto as value');
            $this->db->like('cuenta_gasto', $buscar); 
            $query=$this->db->get('cuentas');
            if($query->num_rows() > 0)
            {
                foreach ($query->result_array() as $row)
                {
                    $result[]= $row;
                }
            }
            echo json_encode($result);
        }
    }
public function partidas_combo()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
     
    $rs = mysql_query("select * from cuentas1 where id_d like '%$q%' or partida like '%$q%'");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
	}
public function partidas_compromisos()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
     
    $rs = mysql_query("select * from presupuesto where id_d like '%$q%' or id_pr like '%$q%'");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
	}
public function traeprueba()
    {	
	$q = isset($_POST['q']) ? strval($_POST['q']) : '';
	$this->db->select('*');    
	$this->db->from('t_d_requisition_detail');
	$this->db->join('t_d_product', 't_d_requisition_detail.id_product = t_d_product.id_product');
	$this->db->join('t_d_requisition', 't_d_requisition_detail.id_requisition = t_d_requisition.id_requisition');
	$this->db->join('t_d_department', 't_d_requisition.id_dept = t_d_department.id_dept');
	$this->db->join('t_n_measure_unit', 't_d_requisition_detail.id_measure = t_n_measure_unit.id_measure');
    $this->db->where('t_d_requisition_detail.id_req_status', 2);
	$this->db->like( 'name_product', $q );
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
public function account_fund()
    {   
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
    $this->db->select('*');    
    $this->db->from('t_r_account_fund');
    $this->db->join('t_d_fund', 't_r_account_fund.id_fund = t_d_fund.id_fund');
    $this->db->join('t_d_department', 't_r_account_fund.id_dept = t_d_department.id_dept');
    $this->db->join('t_d_account', 't_r_account_fund.id_account = t_d_account.id_account');
    $this->db->like( 't_d_account.code_account', $q );
     $this->db->or_like( 't_d_account.name_account', $q );
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
public function base_budget()
    {   
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
    $this->db->select('*');    
    $this->db->from('t_d_base_budget');
    $this->db->where('status', 0);
    $this->db->like( 'id_base_budget', $q );

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

public function requisiciones_combo()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
    $rs = mysql_query(" SELECT dre.*,re.*, dep.*, producto.* FROM t_d_requisition AS re, t_d_department AS dep, t_d_product AS producto, t_d_requisition_detail AS dre
WHERE dre.id_requisition = re.id_requisition AND dre.id_product = producto.id_product AND dre.id_product = de.id_product");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
	}
public function presupuestos_base()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
     
    $rs = mysql_query("select * from pre_ba_det  where descripcion like '%$q%'");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
	}
public function unidad()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
     
    $rs = mysql_query("select * from unidad where id_n like '%$q%' or codigo like '%$q%'");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
    }
public function fondo()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
     
    $rs = mysql_query("select * from fondos where id_f like '%$q%' or nombre like '%$q%'");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
    }
public function beneficiario()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
     
    $rs = mysql_query("select * from beneficiario where rif like '%$q%' or nombre like '%$q%'");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
    }
public function npb()
    {
     
    $rs = mysql_query("select id from pre_ba order by desc");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo $rows;
    }
public function adduni() {
		if( !empty( $_POST ) ) {
			 echo  $this->tutorial_model->anade();
			//echo 'Partida Cargada Correctamente';
		}
	}
public function addpre() {
		if( !empty( $_POST ) ) {
			 echo  $this->tutorial_model->create();
			//echo 'Partida Cargada Correctamente';
		}
	}
public function addpb() {
	$dom = $_POST['OcultoDatoTabla'];
	$n_pb = $_POST['n_pb'];
	$total = $_POST['tfactura'];
	$fecha = date('Y/m/d');
    $partes = explode(";",$dom); 
    array_pop($partes);
    $pb = mysql_query("insert into t_d_base_budget (id_base_budget,total,date) values('$n_pb','$total','$fecha')");
    for($i=0;$i<=(count($partes)-1);$i++){
    $subpartes = explode("|",($partes[$i]));	
	$rs = mysql_query("insert into 	t_d_base_budget_detail (id_base_budget,id_requisition_detail,quantity,amount) values('$n_pb','$subpartes[0]','$subpartes[1]','$subpartes[2]')")		;
		}	
	if ($pb AND $rs){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>die (mysql_error())));
	}

	}
public function addpar() {
		if( !empty( $_POST ) ) {
			 echo  $this->tutorial_model->createpar();
			//echo 'Partida Cargada Correctamente';
		}
	}
public function adduni3() {
		 {
        if(!isset($_POST))   
            show_404();
        
        if($this->tutorial_model->anade())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Error al grabar partida'));
    }
}
public function edita($id=null)
    {
        if(!isset($_POST))   
            show_404();
        
        if($this->tutorial_model->editapartida($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Error al editar partida'));
    }
 public function eliminapar()
    {
        if(!isset($_POST))   
            show_404();
        
        $id = intval(addslashes($_POST['id']));
        if($this->tutorial_model->eliminapartida($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Error al eliminar partida'));
    }
public function adduni2() {

	$partida = $_POST['partida'];
	$unidad = $_POST['unidad'];
	$monto = $_POST['monto'];
	
	$rs = mysql_query("insert into presupuesto(id_d,id_u,monto) values('$partida','$unidad','$monto')");
	if ($rs){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Some errors occured.'));
	}
		}
public function edita_partida() {
        $data = array(
            'fondo' => $this->input->post( 'fondoe', true ),
			'partida' => $this->input->post( 'partidae', true ),
            'nombre' => $this->input->post( 'nombree', true )
        );
        
        $this->db->update( 'cuentas1', $data, array( 'id_d' => $this->input->post( 'id', true ) ) );
    }
public function edita_asigna() {
         $data = array(
			'asignado' => $this->input->post( 'value', true )
        );
        
        $this->db->update( 'req_det', $data, array( 'id_r' => $this->input->post( 'pk', true ) ) );
    }
public function edita_cuenta() {
         $data = array(
			'ctagto' => $this->input->post( 'value', true )
        );
        
        $this->db->update( 'req_det', $data, array( 'id_r' => $this->input->post( 'pk', true ) ) );
    }
public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->tutorial_model->getById( $id ) );
	}
public function getDetPb( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->tutorial_model->getDetPb1( $id ) );
	}
public function getPieza( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->tutorial_model->getPieza( $id ) );
	}
public function getPartida( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->tutorial_model->getPartida( $id ) );
	}
public function deletepar( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id no proporcionado.';
			return;
		}
		
		$this->tutorial_model->deletepar( $id );
		echo 'Partida Eliminada Satisfactoriamente';
	}
public function employees()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('employees');
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
    function _example_output($output = null)
 
    {
        $this->load->view('ejemplo',$output);    
    }  

public function administracion()
	{
		try{
			/* Creamos el objeto */
			$crud = new grocery_CRUD();

			/* Seleccionamos el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionmos el nombre de la tabla de nuestra base de datos*/
			$crud->set_table('productos');

			/* Le asignamos un nombre */
			$crud->set_subject('Productos');

			/* Asignamos el idioma español */
			$crud->set_language('spanish');

			/* Aqui le decimos a grocery que estos campos son obligatorios */
			$crud->required_fields(
				'id',
				'nombre', 
				'descripcion', 
				'precio_venta', 
				'existencia'
			);
			/* Aqui le indicamos que campos deseamos mostrar */
			$crud->columns(
				'id',
				'proveedor',
				'nombre',
				'descripcion', 
				'precio_compra', 
				'precio_venta', 
				'existencia'
			);
			$crud->callback_add_field('phone',array($this,'add_field_callback_1'));
    		$crud->callback_add_field('state',array($this,'add_field_callback_2'));
			/* Generamos la tabla */
			$output = $crud->render();
			$output->main_content='administracion';
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$data['title']='Gestionar';
			$data['main_content']='administracion';
			$output->data=$data;
			$this->load->view('main_template',$output);	
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

public function cuentas()
	{
		try{
			/* Creamos el objeto */
			$crud = new grocery_CRUD();

			/* Seleccionamos el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionmos el nombre de la tabla de nuestra base de datos*/
			$crud->set_table('cuentas');

			/* Le asignamos un nombre */
			$crud->set_subject('Cuentas');

			/* Asignamos el idioma español */
			$crud->set_language('spanish');

			/* Aqui le decimos a grocery que estos campos son obligatorios */
			$crud->required_fields(
				'unidad', 
				'division', 
				'categoria', 
				'descripcion_categorias',
				'fuente', 
				'cuenta_gasto', 
				'descripcion_cuenta', 
				'monto', 
				'tipo_proyecto', 
				'tipo_financiamiento', 
				'fal_dep', 
				'orden'
			);
			/* Aqui le indicamos que campos deseamos mostrar */
			$crud->columns(
				'unidad', 
				'division', 
				'categoria', 
				'descripcion_categorias',
				'fuente', 
				'cuenta_gasto', 
				'descripcion_cuenta', 
				'monto', 
				'tipo_proyecto', 
				'tipo_financiamiento', 
				'fal_dep', 
				'orden'
			);
			$crud->callback_add_field('phone',array($this,'add_field_callback_1'));
    		$crud->callback_add_field('state',array($this,'add_field_callback_2'));
			$crud->field_type('status','dropdown',
            array('1' => 'active', '2' => 'private','3' => 'spam' , '4' => 'deleted'));
			/* Generamos la tabla */
			$output = $crud->render();
			$output->main_content='cuentas';
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$data['title']='Gestionar';
			$data['main_content']='cuentas';
			$output->data=$data;
			$this->load->view('main_template',$output);		
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
public function add_field_callback_1()
	{
    return '+30 <input type="text" maxlength="50" value="" name="phone" style="width:462px">';
	}
 
public function add_field_callback_2()
	{
    return '<input type="text" maxlength="50" value="" name="state" style="width:400px"> ( for U.S. only )';
	}
	public function insertar(){

		$persona = array(
			'nombre' => $this->input->post('nombre'),
			'edad' => $this->input->post('edad'),
			'email' => $this->input->post('email'),
			'pais' => $this->input->post('pais')
			);

		$this->load->model('tutorial_model');
		if ( $this->tutorial_model->insertar_persona($persona) )
			redirect('tutorial');	 
	}

public function actualizar(){
		$persona = array(
			'nombre' => $this->input->post('nombre'),
			'edad' => $this->input->post('edad'),
			'email' => $this->input->post('email'),
			'pais' => $this->input->post('pais')
			);
		$id = $this->input->post('id');

		$this->load->model('tutorial_model');
		if( $this->tutorial_model->actualiza_persona($id, $persona) )
			redirect('tutorial');		
	}

public function eliminar(){
		$id = $this->uri->segment(3);
		$this->load->model('tutorial_model');
		if( $this->tutorial_model->eliminar_persona($id) )
			redirect('tutorial');
	}

public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean|callback_check_user_ci');
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user_model->add_user();
			$this->thank();
		}
	}
public function check_user_ci()
	{
		$usr=$this->input->post('user_name');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
		{
			$this->form_validation->set_message('check_user', 'User Name already exit.');
			return false;
		}
		else
		{
			return true;
		}
	}

public function check_user()
	{
		$usr=$this->input->post('name');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
        {
			echo "false";
			
        }
        else{
			
			echo "true";
        }
	}
}