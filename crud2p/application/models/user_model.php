<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function login($login,$password)
    {
		$this->db->where("login",$login);
        $this->db->where("password",$password);
            
        $query=$this->db->get("usuarios");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->id,
                    	'user_name' 	=> $rows->login,
		                'user_email'    => $rows->email,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
		}
		return false;
    }
	public function add_user()
	{
		$data=array(
			'username'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email_address'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('user',$data);
	}
	public function check_user_exist($usr)
    {
		
        $this->db->where("username",$usr);
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>