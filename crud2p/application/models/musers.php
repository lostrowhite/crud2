<?php

class mUsers extends CI_Model {
    
    public function create() {
        $data = array(
            'nombre'  => $this->input->post( 'cName', true ),
            'email' => $this->input->post( 'cEmail', true )
        );
        
        $this->db->insert( 'users', $data );
    	return $this->db->insert_id();
    }
    
    public function getById( $id ) {
        $id = intval( $id );
        
        $query = $this->db->where( 'id_user', $id )->limit( 1 )->get( 't_d_user' );
        
        if( $query->num_rows() > 0 ) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    public function getAll() {
        //get all records from users table
        $query = $this->db->get( 't_n_privilege' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    public function getAllPermisos($id) {
        //get all records from users table
        $this->db->select( 't_n_main_menu.id_main_menu,
                            t_n_main_menu.description,
                            t_n_main_menu.active' );
		$this->db->distinct();
        $this->db->from('t_n_main_menu');
        $this->db->join('t_n_secondary_menu ','t_n_secondary_menu.id_main_menu = t_n_main_menu.id_main_menu');
        $this->db->join('t_r_menu_privilege','t_r_menu_privilege.id_secondary_menu = t_n_secondary_menu.id_secondary_menu');
        $this->db->join('t_r_user_privilege','t_r_menu_privilege.id_privilege = t_r_user_privilege.id_privilege');
        $this->db->where('id_user',$id);
        $this->db->order_by('t_n_main_menu.id_main_menu','asc');
        $query=$this->db->get();

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
    public function getAllPermisosSec($id,$user) {
        //get all records from users table
        $this->db->select( 't_n_secondary_menu.id_secondary_menu,
								t_n_secondary_menu.description,
								t_n_secondary_menu.id_main_menu,
								t_n_secondary_menu.active,
								t_n_secondary_menu.controller' );
		$this->db->distinct();
        $this->db->from('t_n_secondary_menu');
        $this->db->join('t_r_menu_privilege','t_r_menu_privilege.id_secondary_menu = t_n_secondary_menu.id_secondary_menu');
        $this->db->join('t_r_user_privilege','t_r_menu_privilege.id_privilege = t_r_user_privilege.id_privilege');
        $this->db->where('t_n_secondary_menu.id_main_menu',$id);
		$this->db->where('id_user',$user);
        $this->db->order_by('t_n_secondary_menu.description','asc');
        $query=$this->db->get();
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
	public function getPermisosNivel($controller,$user){
       $this->db->select('t_n_level_privilege.description');    
	   $this->db->from('t_n_secondary_menu');
	   $this->db->join('t_r_menu_privilege', 't_r_menu_privilege.id_secondary_menu = t_n_secondary_menu.id_secondary_menu');
	   $this->db->join('t_r_level_privilege', 't_r_level_privilege.id_r_menu_privilege = t_r_menu_privilege.id_priv_menu');
	   $this->db->join('t_n_level_privilege', 't_r_level_privilege.id_level_privilege = t_n_level_privilege.id_level_privilege');
	   $this->db->join('t_r_user_privilege', 't_r_menu_privilege.id_privilege = t_r_user_privilege.id_privilege');
       $this->db->where('t_n_secondary_menu.controller',$controller);
	   $this->db->where('t_r_user_privilege.id_user',$user);
		
		$query = $this->db->get();
        
        if( $query->num_rows() > 0 ) {
            foreach($query->result() as $permiso){
				$permisos[]=$permiso->description;
			}
			return $permisos;
        } else {
            return array();
        }
	
	}
    public function getPermisoAdmin($controller,$user){
       $this->db->select('t_d_user.id_user,
                            t_n_privilege.id_privilege,
                            t_n_privilege.`name`');    
       $this->db->from('t_d_user');
       $this->db->join('t_r_user_privilege', 't_r_user_privilege.id_user = t_d_user.id_user');
       $this->db->join('t_n_privilege', 't_r_user_privilege.id_privilege = t_n_privilege.id_privilege');
       $this->db->where('t_n_privilege.id_privilege','12');
       $this->db->where('t_d_user.id_user',$user);
        
        $query = $this->db->get();
        
        if( $query->num_rows() > 0 ) {
            foreach($query->result() as $permiso){
                $permisos[]=$permiso->description;
            }
            return $permisos;
        } else {
            return array();
        }
    
    }
    public function getEdit($id) {
        //get all records from users table
        $this->db->select('t_n_privilege.id_privilege,
                           t_n_privilege.`name`');    
	   $this->db->from('t_n_privilege');
	   $this->db->join('t_r_user_privilege', 't_r_user_privilege.id_privilege = t_n_privilege.id_privilege');
	   $this->db->join('t_d_user', 't_r_user_privilege.id_user = t_d_user.id_user');
       $this->db->where('t_d_user.id_user',$id);
	$query = $this->db->get();
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function getEditSelect($id) {
        
        $query=$this->db->query("SELECT
                            t_n_privilege.id_privilege,
                            t_n_privilege.`name`
                            FROM
                            t_n_privilege
                            WHERE
                            id_privilege not in (SELECT
                            t_n_privilege.id_privilege
                            FROM
                            t_n_privilege
                            INNER JOIN t_r_user_privilege ON t_r_user_privilege.id_privilege = t_n_privilege.id_privilege
                            INNER JOIN t_d_user ON t_r_user_privilege.id_user = t_d_user.id_user
                            WHERE
                            t_d_user.id_user='".$id."')");

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }//end getAll
    public function update() {
        $data = array(
            'nombre' => $this->input->post( 'nombre', true ),
            'email' => $this->input->post( 'email', true )
        );
        
        $this->db->update( 'usuarios', $data, array( 'id' => $this->input->post( 'id', true ) ) );
    }
    
    public function delete( $id ) {
        /*
        * Any non-digit character will be excluded after passing $id
        * from intval function. This is dofor sety reason.
        */
        $id = intval( $id );
        
        $this->db->delete( 'users', array( 'id' => $id ) );
    } //end delete



    public function addUserPrivi( $datos='' ) {
        $data='';
        $datosSeparados=explode('&', $datos['Datos']);
        foreach ($datosSeparados as $dato) {

            $datoSeparado=explode('=', $dato);
            $opc=strripos($datoSeparado[0],'my-select');
           
            if($datoSeparado[0]!='password' And $opc!==0)
                $data[$datoSeparado[0]]=urldecode($datoSeparado[1]);

            if($datoSeparado[0]=='password' And $opc!==0)
                $data[$datoSeparado[0]]=md5($datoSeparado[1]);
            


        }

        $query = $this->db->where( 'username', $data['username'] )->limit( 1 )->get( 't_d_user' );
		$queryY = $this->db->where( 'email', $data['email'] )->limit( 1 )->get( 't_d_user' );
        if($query->row()==false){
			if($queryY->row()==false){
					//var_dump($data);exit;
					$this->db->insert('t_d_user',$data);
				
					$valor=$this->db->insert_id();
					

					foreach ($datos['Opciones'] as $privilegio) {
						$privi=array(
							'id_user'=>$valor,
							'id_privilege'=>$privilegio,
						);
					$this->db->insert('t_r_user_privilege',$privi);
					
					
					}
					echo 1;exit;
			}
			else{
				echo 3;exit;
			}
        }
            
        else{
            echo 2;exit;
        }

    } 
    public function editUserPrivi( $datos='' ) {
        $data='';

        $datosSeparados=explode('&', $datos['Datos']);
        foreach ($datosSeparados as $dato) {

            $datoSeparado=explode('=', $dato);
            $opc=strripos($datoSeparado[0],'my-select');

            if($datoSeparado[0]!='password' And $opc!==0)
                $data[$datoSeparado[0]]=urldecode($datoSeparado[1]);

            if($datoSeparado[0]=='password' And $opc!==0)
                $data[$datoSeparado[0]]=md5($datoSeparado[1]);


        }
        
           
            $this->db->where('id_user',$datos['Id']);
            $this->db->update('t_d_user',$data);
        
            $valor=$this->db->insert_id();
            

            foreach ($datos['Opciones'] as $privilegio) {
                $privi=array(
                    'id_user'=>$datos['Id'],
                    'id_privilege'=>$privilegio,
                );
            $privilegios = $this->db->where( array('id_user' => $datos['Id'],'id_privilege'=>$privilegio) )->limit( 1 )->get( 't_r_user_privilege' );
                if($privilegios->row()==false){
                    $this->db->insert('t_r_user_privilege',$privi);
                }
            }
            $privilegiosGuardados=$this->getEdit($datos['Id']);
            foreach ($privilegiosGuardados as $p){
                $match=  in_array($p->id_privilege, $datos['Opciones']);
                if($match==false){
                    $this->db->where(array('id_user' => $datos['Id'],'id_privilege'=>$p->id_privilege));
                    $this->db->delete('t_r_user_privilege');
                }
            }
            echo 1;exit;


    } 
} 
