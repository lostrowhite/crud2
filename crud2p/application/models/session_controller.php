
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class session_controller extends CI_Controller{ 

public function __construct()
    {
        parent::__construct();
        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
        $this->load->library('grocery_CRUD');
        $this->load->library('Template');
        $this->load->model('session_model');
    }
public function index(){
        if( $this->session->userdata('isLoggedIn') ) {
            redirect('/main/show_main');
        } else {
        $data['title']='Inicio';
        $data['main_content']='registration_view';
        $this->load->view('main_templatei',$data);
        }
        }

    public function welcome(){
        $logged = $this->session_model->isLogged();
           if($logged == TRUE)
            {
            $data['title']='Area de Usuarios';
            $data['main_content']='menu';
            $data['session'] = $this->session->userdata('user');
            $this->load->view('main_template',$data);
            }
            else
            {
            //si no tiene permiso, abrimos el formulario para loguearse
             $data['title']='Inicio';
             $data['main_content']='registration_view';
             $this->load->view('main_templatei',$data);
            }
    }
    
    public function login(){
        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));
        $result = $this->session_model->login($login,$password);
        if($result){
            $this->session->set_userdata('user', $login);
            $this->session->set_userdata('pass', $password);
            redirect('/session_controller/welcome', 'refresh');
        }else
            redirect('', 'refresh');
    }

    public function logout(){
        /////////////////////////// salida del sistema
        $insert = array("user_id_reg" => $this->session->userdata('id'),
                            "action_date"=> NULL,
                            "id_action" =>"2",
                            "action_detail" =>"usuario saliendo",);
            $this->db->insert('t_d_audit',$insert);
        
            /////////////////////////////////
        $newdata = array(
                'id'           => '',
                'nombre'       => '',
                'login'        => '',
                'email'        => '',
                'id_dept'      => '',
                'departamento' => '',
                'logged_in'    => false
        );
        $this->session->set_userdata($newdata);
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }
}

?>