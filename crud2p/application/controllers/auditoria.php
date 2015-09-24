<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auditoria extends CI_Controller{	

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

	public function mostrarRegistro(){
		$auditoria = Xcrud::get_instance();
		$auditoria->table_name('Auditoria');
		$auditoria->table('t_d_log');
		$auditoria->label(array('table_name' => 'Nombre de la Tabla','action' => 'Acción Realizada','id_user'=>'Usuario','ip_address'=>'Dirección IP','date'=>'Fecha'));
		$auditoria->column_tooltip('ip_address', '0.0.0.0 Computadora local');
		$auditoria->order_by('id_log', 'desc');
		$auditoria->unset_add();
		$auditoria->unset_edit();
		$auditoria->unset_remove();
		$auditoria->relation('id_user','t_d_user','id_user','username');
		$this->template->write('content', $auditoria);
		$this->template->render();
	}
	public function mostrarRegistroCU(){
		$control = Xcrud::get_instance();
		$control->table_name('Control de Ingreso');
		$control->table('t_d_audit');
		$control->join('id_action', 't_d_action', 'id_action');
		$control->label(array('user_id_reg' => 'Usuario','t_d_action.action_name' => 'Acción','action_date' => 'Fecha y Hora'));
		$control->columns('user_id_reg, t_d_action.action_name, action_date');
		$control->order_by('id_acceso', 'desc');
		$control->unset_add();
		$control->unset_edit();
		$control->unset_remove();
		$control->relation('user_id_reg','t_d_user','id_user','username');
		$this->template->write('content', $control);
		$this->template->render();
	}

}
