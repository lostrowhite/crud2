<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class session_model extends CI_Model{
 
public function __construct()
    {
        parent::__construct();
         $this->load->database();
    }
function login($login,$password){

        $this->db->select('t_d_user.id_user, t_d_user.first_name, t_d_user.username, t_d_user.first_name,t_d_user.email, t_d_department.name, t_d_department.id_dept');
        $this->db->from('t_d_user');
        $this->db->join('t_d_department', 't_d_department.id_dept = t_d_user.id_department');
        $this->db->where("t_d_user.username = '$login' AND t_d_user.password = '$password'");
        $query = $this->db->get();

        if($query->num_rows() > 0){
         	foreach($query->result() as $rows){
                $newdata = array(
                        'id'           => $rows->id_user,
                        'nombre'       => $rows->first_name,
                        'login'        => $rows->username,
                        'email'        => $rows->email,
                        'id_dept'      => $rows->id_dept,
                        'departamento' => $rows->name,
                        'logged_in'    => TRUE
                   );
			}
            $this->session->set_userdata($newdata);
             $insert = array("user_id_reg" => $newdata['id'],
                            "action_date"=> NULL,
                            "id_action" =>"1",
                            "action_detail" =>"usuario registrado",);
            $this->db->insert('t_d_audit',$insert);

           return true;            
		}return false;
    }

	public function isLogged(){
        // Comprobamos si existe la variable de sesión username. 
        // En caso de no existir, le impediremos el paso a la página para usuarios registrados
        if(isset($this->session->userdata['login']))
            return true;
        else
           return false;
    }

    public function verificar_usuario($email){
        $this->db->select('t_d_user.first_name, t_d_user.last_name, t_d_user.username');
        $this->db->from('t_d_user');
        $this->db->where("t_d_user.email = '$email'");
        $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $rows){
                $data = array(
                    'usuario' => $rows->username,
                    'nombre' => $rows->first_name,
                    'apellido' => $rows->last_name
                    );
            }
           return $data;            
        }return false;
    }

    public function listar_admins(){
        $this->db->select('t_d_user.first_name, t_d_user.last_name, t_d_user.email');
        $this->db->from('t_d_user');
        $this->db->join('t_r_user_privilege', 't_r_user_privilege.id_user = t_d_user.id_user');
        $this->db->where("t_r_user_privilege.id_privilege = 3");
        
        $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $rows){
                $data = array(
                    'usuario' => $rows->username,
                    'nombre' => $rows->first_name,
                    'apellido' => $rows->last_name,
                    'email' => $rows->email
                    );
            }
           return $data;            
        }return false;
    }
}
?>