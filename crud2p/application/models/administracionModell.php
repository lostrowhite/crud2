<?php 
class AdministracionModel extends CI_Model{
	public function __construct(){
        parent::__construct();
		 $this->load->database();
    }

    public function get_all_products(){
    	$q = isset($_POST['q']) ? strval($_POST['q']) : '';
		$this->db->select('*');    
		$this->db->from('t_d_product');
		$this->db->like( 'name_product', $q );
		$query = $this->db->get();
	
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
		    	$result[]= $row;
			}
		}echo json_encode($result);
	}
}
?>