<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soporte extends CI_Controller{ 

    public function __construct(){
		parent::__construct();
		$this->load->dbutil();
    	$this->load->helper('file');
    	$this->load->helper('download');
    	$this->load->library('zip');
    }

    public function index(){

    }

    public function backup(){
    	$this->load->view('soporte/backup');
    }

    public function create_backup(){
    	$preferencias = array(
                'tables'      => array(),  
                'ignore'      => array(),       
                'format'      => 'txt',         
                'filename'    => 'copia_de_seguridad-' . date('d-m-Y') . '.sql',
                'add_drop'    => TRUE,          
                'add_insert'  => TRUE,          
                'newline'     => "\n"           
              );

    	$backup =& $this->dbutil->backup($prefs);
		write_file('./backup/bd/copia_de_seguridad-' . date('d-m-Y') . '.sql', $backup);
    }

    public function download_backup(){
		force_download('copia_de_seguridad-' . date('d-m-Y') . '.sql', $backup);
    }
}
?>