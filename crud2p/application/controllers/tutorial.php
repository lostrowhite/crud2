<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tutorial extends CI_Controller{	

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
 		$this->load->helper('url');
        /* ------------------ */ 
        $this->load->library('grocery_CRUD');
		$this->load->model('tutorial_model');
    }
		public function index()
	{
		$data['title']='Inicio';
		$data['main_content']='registration_view';
		$this->load->view('main_template',$data);
	}
public function read() {
		echo json_encode( $this->tutorial_model->getAll() );
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
     
    $rs = mysql_query("select * from cuentas where id_d like '%$q%' or cuenta_gasto like '%$q%'");
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
public function edita_presu() {
        $data = array(
            'id_d' => $this->input->post( 'id_d', true ),
            'id_u' => $this->input->post( 'id_u', true ),
			'monto' => $this->input->post( 'monto', true )
        );
        
        $this->db->update( 'presupuesto', $data, array( 'id_p' => $this->input->post( 'id', true ) ) );
    }
public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->tutorial_model->getById( $id ) );
	}
public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id no proporcionado.';
			return;
		}
		
		$this->tutorial_model->delete( $id );
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
public function inicio(){
		$data['title']='Inicio';
		$data['main_content']='registration_view';
		$this->load->view('main_template',$data);
		}
public function presupuesto(){
		$data['title']='Carga de Presupuesto';
		$data['main_content']='home';
		$this->load->view('main_template',$data);
		}
public function easy(){
		$data['title']='Carga de Presupuesto';
		$data['main_content']='easy';
		$this->load->view('main_template',$data);
		}
public function partidas(){
		$data['title']='Carga de Presupuesto';
		$data['main_content']='listapresupuesto';
		$this->load->view('main_template',$data);
		}
	public function acerca(){
		$data['title']='Acerca de';
		$data['main_content']='acerca';
		$this->load->view('main_template',$data);
		}
	public function servicios(){
		$data['title']='Servicios';
		$data['main_content']='servicios';
		$this->load->view('main_template',$data);
		}
	public function tablas(){
		$data['title']='Servicios';
		$data['main_content']='tablas';
		$this->load->view('main_template',$data);
		}
	public function contacto(){
		$data['title']='Contacto';
		$data['main_content']='contacto';
		$this->load->view('main_template',$data);
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
	function add_field_callback_1()
{
    return '+30 <input type="text" maxlength="50" value="" name="phone" style="width:462px">';
}
 
function add_field_callback_2()
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
	function welcome()
	{
		$logged = $this->tutorial_model->isLogged();
		   if($logged == TRUE)
            {
            $data['title']='Area de Usuarios';
			$data['main_content']='menu';
			$this->load->view('main_template',$data);
            }
            else
            {
            //si no tiene permiso, abrimos el formulario para loguearse
            $this->load->view('login');
            }
		

	}
	public function login()
	{
		$login=$this->input->post('login');
		$password=md5($this->input->post('pass'));

		$result=$this->tutorial_model->login($login,$password);
		if($result) $this->welcome();
		else        $this->index();
	}
	function thank()
	{
		$data['title']= 'Thank';
		$this->load->view('header_view',$data);
		$this->load->view('thank_view.php', $data);
		$this->load->view('footer_view',$data);
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
	public function logout()
	{
		$newdata = array(
		'id'   =>'',
		'nombre'  =>'',
		'login'  =>'',
		'email'     => '',
		'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->index();
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