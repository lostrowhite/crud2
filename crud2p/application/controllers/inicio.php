<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('tutorial_model');
        $this->load->model('musers');
    }

    public function index(){
    	// var_dump($this->session->userdata('login'));
    	$logged = $this->tutorial_model->isLogged();
		if($logged){
            $data['title']='Area de Usuarios';
			// $data['main_content']='plantillas/menu';
			$data['menu']=$this->permisosTodos();
			$data['session'] = $this->session->userdata('user');
			$this->load->view($this->config->item('template_path') . 'logued',$data);
        }else{
            //si no tiene permiso, abrimos el formulario para loguearse
             $data['title']='Inicio';
			 // $data['main_content']='index/registration_view';
		     $this->load->view($this->config->item('template_path') . 'login',$data);
        }
    }

    public function permisosTodos(){
		$permisos=$this->musers->getAllPermisos($this->session->userdata('id'));
		foreach ($permisos as $permiso) {
			$permisosSec=$this->musers->getAllPermisosSec($permiso->id_main_menu,$this->session->userdata('id'));
			$permisoFinal[]= array(
					'menu_principal'=>$permiso,
					'menu_secundario'=>$permisosSec
				);
		}
		return $permisoFinal;
	}
}
?>