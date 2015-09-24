<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comprasmodel extends CI_Model{
	
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

    function get_ult_id_depto(){
        $this->db->select_max('id_base_budget');
        $query = $this->db->get('t_d_base_budget');
        $row = $query->row_array();

        return $row['id_base_budget'];
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
    public function getProductos($id){
    	$this->db->select( 't_d_product.part_number,
                            t_d_product.name_product,
                            t_d_requisition_detail.quantity,
                            t_d_base_budget_detail.amount,
                            t_d_account.code_account,
                            t_d_account.name_account,
                            t_d_fund.id_fund as fund,
                            t_d_program.cod_program,
                            t_d_department.code_dept' );
        $this->db->from('t_d_purchase_order');
        $this->db->join('t_d_base_budget','t_d_purchase_order.id_base_budget = t_d_base_budget.id_base_budget');
        $this->db->join('t_d_base_budget_detail','t_d_base_budget_detail.id_base_budget = t_d_base_budget.id_base_budget');
        $this->db->join('t_d_requisition_detail','t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail');
        $this->db->join('t_d_product','t_d_requisition_detail.id_product = t_d_product.id_product');
        $this->db->join('t_r_account_fund','t_d_base_budget_detail.id_account_fund = t_r_account_fund.id_account_fund');
        $this->db->join('t_d_account','t_r_account_fund.id_account = t_d_account.id_account');
        $this->db->join('t_d_fund','t_r_account_fund.id_fund = t_d_fund.id_fund');
        $this->db->join('t_d_department','t_r_account_fund.id_dept = t_d_department.id_dept');
        $this->db->join('t_d_program','t_d_department.id_program = t_d_program.id_program');
        $this->db->where('t_d_purchase_order.id_purchase_order',$id);
        $this->db->order_by('t_d_product.name_product','asc');
        $query=$this->db->get();

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }

    }

    public function getCabezal($id){
    	$this->db->select( 't_d_beneficiary.`name`,
							t_d_beneficiary.rif,
							t_d_beneficiary.address,
							t_d_beneficiary.tlf,
							t_n_iva.iva,
							t_d_purchase_order.id_purchase_order');
        $this->db->from('t_d_purchase_order');
        $this->db->join('t_d_beneficiary ','t_d_purchase_order.id_beneficiary = t_d_beneficiary.id_beneficiary');
        $this->db->join('t_n_iva','t_d_purchase_order.id_iva = t_n_iva.id_iva');
        $this->db->where('t_d_purchase_order.id_purchase_order',$id);
        $query=$this->db->get();

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }

    }
    public function getReq($id){
        $this->db->select("t_n_measure_unit.name_unit,
                            t_d_requisition_detail.quantity,
                            t_d_requisition.date,
                            t_d_product.name_product,
                            t_d_requisition.id_requisition AS mes,
                            t_d_department.name_dept,
                            t_d_program.cod_program");
        $this->db->from('t_d_requisition');
        $this->db->join('t_d_requisition_detail','t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition');
        $this->db->join('t_n_measure_unit','t_d_requisition_detail.id_measure = t_n_measure_unit.id_measure');
        $this->db->join('t_d_product','t_d_requisition_detail.id_product = t_d_product.id_product');
        $this->db->join('t_d_department','t_d_requisition.id_dept = t_d_department.id_dept');
        $this->db->join('t_d_program','t_d_department.id_program = t_d_program.id_program');
        $this->db->where('t_d_requisition.id_requisition',$id);
        $query=$this->db->get();

        foreach ($query->result() as $result) {
            $result->mes=$this->mesLetra($result->date);
        }


        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }

    }
    public function getPreBase($id){
        $this->db->select("t_d_base_budget.id_base_budget,
                            t_d_product.name_product,
                            t_d_product.part_number,
                            t_d_department.name_dept,
                            t_d_department.code_dept,
                            t_d_base_budget_detail.amount,
                            t_d_base_budget_detail.quantity");
        $this->db->from('t_d_base_budget');
        $this->db->join('t_d_base_budget_detail','t_d_base_budget_detail.id_base_budget = t_d_base_budget.id_base_budget');
        $this->db->join('t_d_requisition_detail','t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail');
        $this->db->join('t_d_requisition','t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition');
        $this->db->join('t_d_department','t_d_requisition.id_dept = t_d_department.id_dept');
        $this->db->join('t_d_product','t_d_requisition_detail.id_product = t_d_product.id_product');
        $this->db->where('t_d_base_budget.id_base_budget',$id);
        $query=$this->db->get();

        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }

    }
public function mesLetra($fecha){
        $fechaDiv=explode('-', $fecha);
        switch ($fechaDiv[1]) {
            case 1:
                $mes='ENERO';
                break;
            case 2:
                $mes='FEBRERO';
                break;
            case 3:
                $mes='MARZO';
                break;
            case 4:
                $mes='ABRIL';
                break;
            case 5:
                $mes='MAYO';
                break;
            case 6:
                $mes='JUNIO';
                break;
            case 7:
                $mes='JULIO';
                break;
            case 8:
                $mes='AGOSTO';
                break;
            case 9:
                $mes='SEPTIEMBRE';
                break;
            case 10:
                $mes='OCTUBRE';
                break;
            case 11:
                $mes='NOVIEMBRE';
                break;
            case 12:
                $mes='DICIEMBRE';
                break;
        }
        return $mes;
    }
}