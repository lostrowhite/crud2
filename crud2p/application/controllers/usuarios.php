<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{	

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



public function permisos()
	{
		echo json_encode( $this->musers->getAll() );
		}
public function permisosTodos()
	{
		$permisos=$this->musers->getAllPermisos();
			foreach ($permisos as $permiso) {
				$permisosSec=$this->musers->getAllPermisosSec($permiso->id_main_menu);
				$permisoFinal[]= array(
						'menu_principal'=>$permiso,
						'menu_secundario'=>$permisosSec
					);
				

			}
			echo json_encode($permisoFinal);
		}
public function permisosSecundarios()
	{

		echo json_encode( $this->musers->getAllPermisosSec($_POST['id']) );
		}
public function permisosEdit()
	{       
                
		echo json_encode( $this->musers->getEdit($_POST['id']) );
		}
public function permisosEditSelect()
	{       
                
		echo json_encode( $this->musers->getEditSelect($_POST['id']) );
		}
public function obtenerDatos()
	{      
		echo json_encode( $this->musers->getById($_POST['id']) );
		}



public function estadoSNC($rif){
		$rif=trim($rif);
		//var_dump($rif);exit;
		$html = file_get_contents("http://rncenlinea.snc.gob.ve/reportes/resultado_busqueda?p=1&rif=$rif&search=RIF");
		
		$inicio = stripos($html,'<a href="/planilla/index');
		if($inicio!=false){
				$fin    = stripos($html,'?anafinan=N&amp;anafinanpub=Y&amp;login=N&amp;mostrar=INF"');
				$cant   = ($fin-25)-$inicio;
				$codigo   = substr($html,(1*$inicio+25),(1*$cant));

				$cuadroResul=stripos($html, '<a href="/planilla');
				$rif=stripos($html, 'J299848140');
				$rif=$rif-$cuadroResul;
				$href=substr($html, $cuadroResul,$rif);
				$url1=stripos($href, '/');
				$url2=stripos($href, '" onclick');
				$url2=$url2-$url1;
				$urlFinal=substr($href, $url1,$url2);
				
				if($cuadroResul!=false){//Obtener Estado de la Empresa
					$paginaCuadro=substr($html, $cuadroResul,813);
					$posicionCeldaEstado=stripos($paginaCuadro, 'EMPRESA');
					$paginaDesdeCeldaEstado=substr($paginaCuadro, $posicionCeldaEstado);
					$posicionCeldaEstadoFinal=stripos($paginaDesdeCeldaEstado, '</td>');
					$resultadoFinal=substr($paginaDesdeCeldaEstado, 0,$posicionCeldaEstadoFinal);
				}

				$html = file_get_contents("http://rncenlinea.snc.gob.ve/planilla/index/$codigo?anafinan=N&anafinanpub=Y&login=N&mostrar=INF");
		}
		
		if($inicio!=false){
			$retorna['existe']='S';
			
			preg_match_all('/class="(fondoP_2|textoP_3)">(?P<cont>.*)<\/td>/',$html,$matches);
			
			$cana=count($matches['cont']);
			
			$valores=array();
			for($i=0;$i<$cana;$i++){
				$matches['cont'][$i]=str_replace('<br>','',$matches['cont'][$i]);
				if($i%2 == 0){
					$valores[$i]=html_entity_decode($matches['cont'][$i],ENT_COMPAT,'UTF-8');
				}else{
					$valores[$i-1]=html_entity_decode($matches['cont'][$i],ENT_COMPAT,'UTF-8');
				}
			}

			 $retorna['rnc']        = $valores[0];
			 $retorna['creacionrnc']= $valores[2];         
			 $retorna['vencernc']   = $valores[4];
			 $retorna['rif']     = $valores[8];
			 $retorna['nomfis']     = $valores[10];
			// //$retorna['tipo']       = ($matches['cont'][13]=='Persona Jur&iacute;dica'?1:'');
			// //$retorna['tipo2']      = $valores[12];
			// //$retorna['contacto']   = $valores[54];
			 $retorna['telefono']   = $valores[56].','.$valores[58].','.$valores[60];
			 $retorna['email']      = $valores[62];
			// //$retorna['url']        = $valores[64];
			 $retorna['direc1']     = html_entity_decode($matches['cont'][116],ENT_COMPAT,'UTF-8');
			// //$retorna['objeto']     = $objeto;
			 $retorna['estadoEmpre']= $resultadoFinal;   
		}else{

			$retorna['existe']='N';
		}

		return $retorna;


}
public function priviMostrar(){

		 $xcrud = Xcrud::get_instance();
		 $xcrud->table_name('Privilegios');
		 $xcrud->default_tab('Menu Principal');
		 $xcrud->table('t_n_privilege');
		 $xcrud->label(array('level' => 'Nivel de Privilegio','name' => 'Descripcion','privmenu'=>'Privilegios por Menu'));
		 
		 $secundary= $xcrud->nested_table('Privilegio','id_privilege','t_r_menu_privilege','id_privilege');
		 $secundary->table_name('Privilegio');
		 $secundary->default_tab('Privilegio');
		 $secundary->label(array('id_secondary_menu' => 'Menu Secundario'));
		 $secundary->columns('id_secondary_menu');
		 $secundary->relation('id_secondary_menu','t_n_secondary_menu','id_secondary_menu','description');
		 $secundary->relation('id_privilege','t_n_privilege','id_privilege','name');
		 $secundary->disabled('id_privilege');
		 $level= $secundary->nested_table('Nivel','id_priv_menu','t_r_level_privilege','id_r_menu_privilege');
		 $level->table_name('Nivel de Acceso');
		
		 $level->relation('id_level_privilege','t_n_level_privilege','id_level_privilege','description');
		 //$level->fk_relation('Product Name','id_req_detail','t_d_requisition_detail','id_req_detail','id_product','t_d_product','id_product',array('name_product'));
		 $level->columns('id_level_privilege');
		 $level->fields('id_level_privilege');
		 $level->label(array('id_level_privilege'=>'Nivel de Acceso'));
		 
		 $xcrud->columns('name');
		 $xcrud->fields('name');

		 $this->template->write('content', $xcrud);
		 $this->template->render();
    
    
}
public function sncVerificar(){
		$rif=$_POST['id'];
		
		echo json_encode($this->estadoSNC($rif));

}
public function adduser()
	{
		if($_POST['Datos']!=''){
				
				$datos=array(
					'Datos'=>$_POST['Datos'],
					'Opciones'=>$_POST['Opciones'],
					);
				//var_dump($datos);exit;
				$this->musers->addUserPrivi($datos);
			}
	}
public function edituser()
	{
		if($_POST['Datos']!=''){
				
				$datos=array(
					'Datos'=>$_POST['Datos'],
					'Opciones'=>$_POST['Opciones'],
                                        'Id'=>$_POST['Id']
					);
                                
				$this->musers->editUserPrivi($datos);
			}
	}
public function adminPrivi(){
	$xcrud =Xcrud::get_instance();
	$xcrud->table_name('Privilegios de Usuario');
	$xcrud->table('t_r_menu_privilege');
	$xcrud->label(array(
			'id_main_menu' => 'Menu Principal',
			'id_privilege' => 'Privilegio'
			));
	$xcrud->relation('id_main_menu','t_n_main_menu','id_main_menu','description');
	$xcrud->relation('id_privilege','t_n_privilege','id_privilege','name');

	$this->template->write('content', $xcrud);
	$this->template->render();
}
public function adminMenu(){
	$xcrud = Xcrud::get_instance();
	$xcrud->table_name('Menu Principal');
	$xcrud->default_tab('Menu Principal');
	$xcrud->table('t_n_main_menu');
	$xcrud->label(array(
			'description'=>'Menu',
			'active'=>'Estado del Menu'
		));
	$xcrud->columns('description,active');
	$xcrud->change_type('active','select','',array('values'=>array('T'=>'Activo','F'=>'Inactivo')));

	$secundary= $xcrud->nested_table('Menu Secundario','id_main_menu','t_n_secondary_menu','id_main_menu');
	$secundary->table_name('Menu Secundario');
	$secundary->label(array(
			'description'=>'Menu',
			'active'=>'Estado del Menu'
		));
	$secundary->relation('id_main_menu','t_n_main_menu','id_main_menu','description');
	$secundary->columns('description,active');
	$secundary->default_tab('Menu Secundario');
	$secundary->change_type('activo','select','',array('values'=>array('T'=>'Activo','F'=>'Inactivo')));

	$this->template->write('content', $xcrud);
	$this->template->render();

}
public function mostrar()
	{        

		$xcrud = Xcrud::get_instance();
		$xcrud->table_name('Usuarios');
		$xcrud->table('t_d_user');
		$xcrud->label(array('id_department'=>'Departamento','first_name' => 'Nombre','last_name' => 'Apellido','email'=>'Correo','username'=>'Nombre de Usuario','id_user'=>'Opciones Especiales'));
		$xcrud->columns('username,first_name,last_name,email,id_department');
		$xcrud->change_type('password','password','md5');
		$xcrud->fields('first_name,last_name,username,password,email,id_user',false,false,'create');
		$xcrud->fields('first_name,last_name,username,password,email,id_user',false,false,'edit');
		$xcrud->relation('id_department','t_d_department','id_dept','name_dept','','','');
        $xcrud->create_action('Asignar', 'asignarf'); // llamado a activa_action() en functions.php
    	$xcrud->create_action('Quitar', 'quitarf');
        $xcrud->button('#', 'Quitar Firma', 'icon-close glyphicon glyphicon-remove', 'xcrud-action',
				        array(  // set action vars to the button
				            'data-task' => 'action',
				            'data-action' => 'Quitar',
				            'data-primary' => '{id_user}'),
				        array(  // set condition ( when button must be shown)
				            'status',
				            '=',
				            '1'));
        $xcrud->button('#', 'Asignar Firma', 'icon-close glyphicon glyphicon-ok', 'xcrud-action',
				        array(  // set action vars to the button
				            'data-task' => 'action',
				            'data-action' => 'Asignar',
				            'data-primary' => '{id_user}'),
				        array(  // set condition ( when button must be shown)
				            'status',
				            '=',
				            '0'));              
		$xcrud->validation_required(array('first_name'=>1,'last_name'=>1,'username'=>1,'password'=>1));
		$xcrud->validation_pattern('username', '[a-zA-Z]{3,14}');

		$xcrud->replace_remove('eliminar_usuarios');
		$xcrud->load_view('create','usuarios/accesos_usuarios.php'); 
		$xcrud->load_view('edit','usuarios/accesos_usuarios_edit.php'); 
        $this->template->write('content', $xcrud);
		$this->template->render();
		}
public function editar()
	{

		$xcrud = Xcrud::get_instance();
		$xcrud->table_name('Usuarios');
		$xcrud->table('t_d_user');
		$xcrud->label(array('id_department'=>'Departamento','first_name' => 'Nombre','last_name' => 'Apellido','email'=>'Correo','username'=>'Nombre de Usuario','id_user'=>'Opciones Especiales'));
		$xcrud->columns('username,first_name,last_name,email,id_department');
		$xcrud->change_type('password','password','md5');
		$xcrud->fields('first_name,last_name,username,password,email,id_department',false,false,'edit');
		$xcrud->relation('id_department','t_d_department','id_dept','name_dept','','','');
		$xcrud->load_view('edit','usuarios/editar_user.php'); 
		//$this->template->write('content', $xcrud);
		
        $this->template->write('content', $xcrud->render('edit',$_POST['id_user']));
		$this->template->render();
		}


public function traedept()
    {	

	$this->db->select('*');    
	$this->db->from('t_d_department');
	$query = $this->db->get();
        
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
