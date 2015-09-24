<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Compras extends CI_Model{
	
	public function __construct(){
        parent::__construct();
		 $this->load->database();
    }

    function get_ult_id(){
    	$this->db->select_max('id_requisition');
		$query = $this->db->get('t_d_requisition');
		$row = $query->row_array();

		return $row['id_requisition'];
    }

    function agregar_requisicion($dom, $id_r, $total, $a){
		$fecha = date('Y/m/d');
	    $partes = explode(";",$dom); 
	    array_pop($partes);

	    $data = $arrayName = array('id_requisition' => null,'id_department' => $a,'total' => $total,'date' => $fecha);
	    $q = $this->db->insert('t_d_requisition', $data);

	    // $pb = mysql_query("insert into t_d_requisition values(null, '".$a."', '".$total."','".$fecha."')");
	    
	    for($i=0; $i <= (count($partes)-1); $i++){
		    $subpartes = explode("|",($partes[$i]));
		    $data2 = $arrayName = array('id_req_detail' => null,'id_requisition' => $id_r,'id_product' => $subpartes[0],'id_req_status' => 2,'id_measure' => 0,'quantity' => $subpartes[1]);
		    $q2 = $this->db->insert('t_d_requisition_detail', $data2);
			// $rs = mysql_query("insert into 	t_d_base_requisition_detail values('$n_pb','$subpartes[0]','$subpartes[1]','$subpartes[2]')");
		}	

		if($q AND $q2)
				echo json_encode(array('success'=>true));
			else
				echo json_encode(array('msg'=>die (mysql_error())));
    }
}
