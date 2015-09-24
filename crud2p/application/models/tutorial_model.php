<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Tutorial_model extends CI_Model{
 
public function __construct()
    {
        parent::__construct();
		 $this->load->database();
		 $this->load->helper('xcrud');
    }
public function get_table()
    {
        $this->db->select('presupuesto.*');
        $this->db->like('table.field',$this->input->post('sSearch'));
        $this->db->where('table.field2',$this->input->post('field2'));
        $this->db->limit(
            $this->input->post('iDisplayLength'),
            $this->input->post('iDisplayStart')
        );
        $query = $this->db->get('presupuesto');
        return $query->result();
    }    
public function anade()
    {
        return $this->db->insert('presupuesto',array(
            'id_d'=>$this->input->post('id_d',true),
            'id_u'=>$this->input->post('id_u',true),
            'monto'=>$this->input->post('monto',true)
        ));
    }
public function getAll() {
        //get all records from users table
        $query = $this->db->get( 'presupuesto' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
public function getnpb() {
	
		$this->db->select('pre_ba.id');
        $query = $this->db->get('pre_ba');
 		if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }
public function getidpb() {
	
		$this->db->select('t_d_base_budget.id_base_budget');
		$this->db->order_by("id_base_budget", "desc"); 
        $query = $this->db->get('t_d_base_budget');
 		if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }	
	
	 //end getAll
public function getPartidas() {
        //get all records from partidas table
        $query = $this->db->get( 'cuentas1' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getPartidas
public function getPar($id) {
	    $id = intval( $id );
        
        $query = $this->db->where( 'id_p', $id )->limit( 1 )->get( 'presupuesto' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    } //end getAll
public function getFirmas(){
        $this->db->select('t_d_user.first_name,
                            t_d_user.last_name,
                            t_n_privilege.`name`');
        $this->db->from('t_d_user');
        $this->db->join('t_r_user_privilege', 't_r_user_privilege.id_user = t_d_user.id_user');
        $this->db->join('t_n_privilege', 't_r_user_privilege.id_privilege = t_n_privilege.id_privilege');
        $this->db->where("status = '1'");

        $query = $this->db->get();

        foreach ($query->result() as $fila) {
            $resultado[$fila->name]=$fila;
        }


        if( $query->num_rows() > 0 ) {
            return $resultado;
        } else {
            return array();
        }
}

public function getPartida($id) {
	    $id = intval( $id );
        
        $query = $this->db->where( 'id_d', $id )->limit( 1 )->get( 'cuentas1' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    } //end getAll
public function getReq() {
        //get all records from users table
        $query = $this->db->get( 'req' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
public function getPb() {
        //get all records from users table
        $query = $this->db->get( 'pre_ba' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
public function getCta() {
        //get all records from users table
        $query = $this->db->get( 'cuentas1' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
public function create() {
    $data = array(
        'id_d'  => $this->input->post( 'id_d', true ),
        'id_u' => $this->input->post( 'id_u', true ),
		'id_f' => $this->input->post( 'id_f', true ),
		'id_pr' => $this->input->post( 'pr', true ),
		'monto' => $this->input->post( 'monto', true )
    );
 
    $this->db->insert('presupuesto', $data );
    return $this->db->insert_id();
	}
public function pb() {
    $data2 = $this->input->post('OcultoDatoTabla');
	$n_pb = $this->input->post('n_pb');
    $partes = explode(";",$data2); 
    array_pop($partes);
    for($i=0;$i<=(count($partes)-1);$i++){
        $subpartes = explode("|",($partes[$i]));	
		$data = array(
        'id_pb'  => $n_pb,
		'n_r'  => $subpartes[0],
		'cantidad'  => $subpartes[1],
		'descripcion'  => $subpartes[2],
		'unidad'  => $subpartes[3],
		'ctagto'  => $subpartes[4],
		'costo'  => $subpartes[5]
    );
	$this->db->insert('pre_ba', $data);
    return;
}
	}
public function createpar() {
    $data = array(
        'fondo'  => $this->input->post( 'fondo', true ),
        'partida' => $this->input->post( 'partida', true ),
		'nombre' => $this->input->post( 'nombre', true )
    );
 
    $this->db->insert('cuentas1', $data );
    return $this->db->insert_id();
	}
public function editapartida($id)
    {
        $this->db->where('id_p', $id);
        return $this->db->update('presupuesto',array(
            'id_d'=>$this->input->post('id_de',true),
            'id_u'=>$this->input->post('id_ue',true),
            'monto'=>$this->input->post('montoe',true)
        ));
    }
public function editaasigna($id)
    {
        $this->db->where('id_p', $id);
        return $this->db->update('presupuesto',array(
            'id_d'=>$this->input->post('id_de',true),
            'id_u'=>$this->input->post('id_ue',true),
            'monto'=>$this->input->post('montoe',true)
        ));
    }
public function eliminapartida($id)
    {
        return $this->db->delete('presupuesto', array('id' => $id)); 
    }
public function crear() {

        $data = array(
            'id_d'  => $this->input->post( 'partida', true ),
            'id_u' => $this->input->post( 'unidad', true ),
			'monto' => $this->input->post( 'monto', true )
        );
		if ( $this->db->insert( 'presupuesto', $data )){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
    }
 public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'presupuesto', array( 'id_p' => $id ) );
    } //end delete
public function deletepar( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is done for security reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'cuentas1', array( 'id_d' => $id ) );
    } //end delete
public function getById( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'n_r', $id )->limit( 10)->get( 'req_det' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }
public function getDetPb( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id_pb', $id )->limit( 10)->get( 'pre_ba_det' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }	
public function getDetPb1( $id ) {
	$id = intval( $id );
		$this->db->select('*,SUM(cantidad) AS total');                                
$query = $this->db->where( 'id_pb', $id )->group_by('descripcion')->get( 'pre_ba_det' );
  if($query->num_rows() > 0){
    return $query->result();
  }else{
 		return array();
	}
}
public function getPieza( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id_r', $id )->limit( 10)->get( 'req_det' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

	function login($login,$password){

        $this->db->select('t_d_user.id_user, t_d_user.first_name, t_d_user.last_name,t_d_user.username, t_d_user.first_name,t_d_user.email, t_d_department.name_dept, t_d_department.id_dept');
        $this->db->from('t_d_user');
        $this->db->join('t_d_department', 't_d_department.id_dept = t_d_user.id_department');
        $this->db->where("t_d_user.username = '$login' AND t_d_user.password = '$password'");
        $query = $this->db->get();

        if($query->num_rows() > 0){
         	foreach($query->result() as $rows){
                $newdata = array(
                        'id'           => $rows->id_user,
                        'nombre'       => $rows->first_name,
                        'apellido'     => $rows->last_name,
                        'login'        => $rows->username,
                        'email'        => $rows->email,
                        'id_dept'      => $rows->id_dept,
                        'departamento' => $rows->name_dept,
                        'logged_in'    => TRUE
                   );
			}

            $this->db->select('t_n_privilege.id_privilege,t_n_privilege.name');
            $this->db->from('t_n_privilege');
            $this->db->join('t_r_user_privilege','t_r_user_privilege.id_privilege = t_n_privilege.id_privilege');
            $this->db->join('t_d_user','t_r_user_privilege.id_user = t_d_user.id_user');
            $this->db->where("t_d_user.username = '$login'");
            $permisos =$this->db->get();
            if($permisos->num_rows() > 0){
                foreach ($permisos->result() as $permiso) {
                    $newdata['permisos']=array(
                            'id'=> $permiso->id_privilege
                        );
                }

            }
            //var_dump($newdata);exit;
	           
            $this->db->select('action_date');
            $this->db->from('t_d_audit');
            $this->db->where('user_id_reg = ' . $newdata['id']);
            $ultima_sesion =$this->db->get();
            if($ultima_sesion->num_rows() > 0){
                foreach ($ultima_sesion->result() as $ult) {
                    $newdata['ult_sesion']=array(
                            'date' => $ult->action_date
                        );
                }

            }


			$xcrud = Xcrud::get_instance();
			$_SESSION['userRE']=$newdata;
            $this->session->set_userdata($newdata);
            $insert = array("user_id_reg" => $newdata['id'],
                            "action_date"=> NULL,
                            "id_action" =>"1",);
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
	public function insertar_persona($persona){

		if ( $this->db->insert('usuarios', $persona) )
			return true;		
		else
			return false;

	}

	public function leer_persona(){

		$this->db->order_by('id DESC');

		$query = $this->db->get('usuarios');

		return $query->result();
	}

	public function traer_persona($id){

		$this->db->where('id', $id);

		$query = $this->db->get('usuarioss');

		return $query->row();
	}

	public function actualiza_persona($id, $persona){

		$this->db->where('id', $id);

		if( $this->db->update('usuarios', $persona) )
			return true;		
		else
			return false;
		
	}

	public function eliminar_persona($id){

		$this->db->where('id', $id);

		if( $this->db->delete('usuarios') )
			return true;		
		else
			return false;		
		
	}

    public function get_time($type = null){
        if(!$type || $type == 'current_date')
            $query = $this->db->query('SELECT CURRENT_DATE');
        else if($type == 'now')
            $query = $this->db->query('SELECT now()');

        $fecha=$query->result();
    
        return $fecha[0];
    }

    
}