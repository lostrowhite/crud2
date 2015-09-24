<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportesmnuevo extends CI_Controller{	

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
    }
    
	public function transacciones(){
			 $xcrud = Xcrud::get_instance();
			 $xcrud->table_name('Transacciones');
			 $xcrud->table('t_d_transaction');
			 
			 //$xcrud->label(array('t_d_report_id' => 'Id','description' => 'Descripcion'));
			 $this->template->write('content', $xcrud);
			 $this->template->render();

	}

}
