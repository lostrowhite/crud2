
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller{ 
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
            $this->load->library('session');
            $this->load->model('session_model');
            $this->load->model('tutorial_model');
            $this->load->library('email');
        }
    public function index(){
        if( $this->session->userdata('logged_in') )
            redirect('inicio');
        else{
            $data['title']='Inicio';
            $data['main_content']='index/registration_view';
            $this->load->view($this->config->item('template_path') . 'login', $data);
        }
    }

    public function login(){
        $login = $this->input->post('login');
        $password = md5($this->input->post('password'));
        $result = $this->tutorial_model->login($login,$password);
        if($result){
            $this->session->set_userdata('user', $login);
            $this->session->set_userdata('pass', $password);

            redirect('/inicio', 'refresh');
        }else{
            echo "incorrecto";
            redirect('', 'refresh');
        }
    }

    public function logout(){
       if($this->session->userdata('logged_in')){
           $insert = array("user_id_reg" => $this->session->userdata('id'),
                           "action_date"=> NULL,
                            "id_action" =>"2",
                            "action_detail" =>"usuario saliendo",);
            $this->db->insert('t_d_audit',$insert);

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
       }else
            redirect('/inicio', 'refresh');
    }

    function recovery(){
        if($this->session_model->verificar_usuario($_POST['email'])){
            $data = $this->session_model->verificar_usuario($_POST['email']);
            $adm = $this->session_model->listar_admins();
            
            $this->email->from('no-responder@ucv-deu.com', 'SIG-DEU');
            $this->email->to($adm['email']); 

            $this->email->subject('Solicitud de Contraseña');
            $this->email->message('El usuario: ' . $data['usuario']  . ', de nombre: ' . $data['nombre'] . ' ' . $data['apellido'] . ', 
                                    ha realizado una solicitud de cambio de contraseña.');  

            if($this->email->send())
                echo "sent";
            else
                echo "error";
        }else
            echo "no-existe";
    }

    function password_change(){
        if($this->session_model->verificar_usuario($_POST['email'])){
            $data = $this->session_model->verificar_usuario($_POST['email']);
            $this->email->from('no-responder@ucv-deu.com', 'SIG-DEU');
            $this->email->to($_POST['email']); 

            $this->email->subject('Cambio de Contraseña');
            $this->email->message('Estimado(a) usuario(a): ' . $data['usuario']  . ', de nombre: ' . $data['nombre'] . ' ' . $data['apellido'] . ', 
                                    su nueva contraseña para acceder al SIG-DEU es la siguiente: ' . $_POST['passw'] .' 
                                    Se le recomienda guardarla en un lugar seguro.');  

            if($this->email->send())
                echo "sent";
            else
                echo "error";
        }else
            echo "no-existe";
    }
}
?>