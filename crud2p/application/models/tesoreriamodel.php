<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TesoreriaModel extends CI_Model{
 
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
	public function datosChequeNiveluno($cheque){
		$datos=$this->db->query("SELECT
							t_d_beneficiary.name,
							t_d_beneficiary.rif,
							t_d_check_request.id_check_request,
							t_d_beneficiary.id_beneficiary,
							t_d_fund.id_fund_type,
							t_d_check_request.concept,
							t_d_purchase_order.subtotal
							FROM
							t_d_check_request
							INNER JOIN t_r_check_pb ON t_r_check_pb.id_check_request = t_d_check_request.id_check_request
							INNER JOIN t_d_purchase_order ON t_r_check_pb.id_pb = t_d_purchase_order.id_purchase_order
							INNER JOIN t_d_beneficiary ON t_d_purchase_order.id_beneficiary = t_d_beneficiary.id_beneficiary
							INNER JOIN t_d_base_budget ON t_d_purchase_order.id_base_budget = t_d_base_budget.id_base_budget
							INNER JOIN t_d_base_budget_detail ON t_d_base_budget_detail.id_base_budget = t_d_base_budget.id_base_budget
							INNER JOIN t_r_account_fund ON t_d_base_budget_detail.id_account_fund = t_r_account_fund.id_account_fund
							INNER JOIN t_d_fund ON t_r_account_fund.id_fund = t_d_fund.id_fund
							WHERE
							t_d_check_request.id_check_request=".$cheque."
							GROUP BY
							t_d_beneficiary.name,
							t_d_beneficiary.rif,
							t_d_check_request.id_check_request,
							t_d_beneficiary.id_beneficiary,
							t_d_fund.id_fund_type
							ORDER BY
							t_d_fund.id_fund_type")->result_array();
		$rep=0;
		foreach($datos as $dato){
				$reporte[$rep]['bene']=$dato['name'];
				$reporte[$rep]['rif']=$dato['rif'];
				$reporte[$rep]['concepto']=$dato['concept'];
				$reporte[$rep]['monto']=$dato['subtotal'];
				$reporte[$rep]['montoletras']='';
				
				$cuentas=$this->datosChequeNiveldos($dato['id_beneficiary'],$cheque,$dato['id_fund_type']);
				
				$acc=0;
				foreach($cuentas as $cuenta){
				
					$reporte[$rep]['cuentas'][$acc]['unidad']=$cuenta['code_dept'];
					$reporte[$rep]['cuentas'][$acc]['program']=$cuenta['cod_program'];
					$reporte[$rep]['cuentas'][$acc]['fondo']=$cuenta['id_fund'];
					$reporte[$rep]['cuentas'][$acc]['cuenta']=$cuenta['code_account'];
					$reporte[$rep]['cuentas'][$acc]['monto']=$cuenta['monto'];
					$acc++;
				}
		
			$rep++;
		}
		return $reporte;
	
	
	
	}
	public function datosChequeNiveldos($beneficiario,$cheque,$fondo){
		$datos=$this->db->query("SELECT
									t_d_check_request.id_check_request,
									t_d_department.code_dept,
									t_d_program.cod_program,
									t_d_fund.id_fund_type,
									t_d_account.code_account,
									sum(t_d_base_budget_detail.subtotal) as monto,
									t_d_fund.id_fund
									FROM
									t_d_check_request
									INNER JOIN t_r_check_pb ON t_r_check_pb.id_check_request = t_d_check_request.id_check_request
									INNER JOIN t_d_purchase_order ON t_r_check_pb.id_pb = t_d_purchase_order.id_purchase_order
									INNER JOIN t_d_base_budget ON t_d_purchase_order.id_base_budget = t_d_base_budget.id_base_budget
									INNER JOIN t_d_base_budget_detail ON t_d_base_budget_detail.id_base_budget = t_d_base_budget.id_base_budget
									INNER JOIN t_d_requisition_detail ON t_d_base_budget_detail.id_req_detail = t_d_requisition_detail.id_req_detail
									INNER JOIN t_d_requisition ON t_d_requisition_detail.id_requisition = t_d_requisition.id_requisition
									INNER JOIN t_d_department ON t_d_requisition.id_dept = t_d_department.id_dept
									INNER JOIN t_d_program ON t_d_department.id_program = t_d_program.id_program
									INNER JOIN t_r_account_fund ON t_d_base_budget_detail.id_account_fund = t_r_account_fund.id_account_fund
									INNER JOIN t_d_fund ON t_r_account_fund.id_fund = t_d_fund.id_fund
									INNER JOIN t_d_account ON t_r_account_fund.id_account = t_d_account.id_account
									WHERE
									t_d_check_request.id_check_request=".$cheque." AND
									t_d_base_budget_detail.id_bb_status='2' AND
									t_d_purchase_order.id_beneficiary=".$beneficiario." and
									t_d_fund.id_fund_type=".$fondo."
									GROUP BY
									t_d_check_request.id_check_request,
									t_d_department.code_dept,
									t_d_program.cod_program,
									t_d_fund.id_fund_type,
									t_d_account.code_account
									ORDER BY
									t_d_account.code_account")->result_array();
			return $datos;
		
	
	}
	function calcular_iva($parametros){
		$this->db->select('iva');
		$this->db->from('t_n_iva');
		$this->db->where('id_iva', $parametros['id_iva']);

		$iva = $this->db->get();
		$iva = $iva->result_array();
		$iva = ($iva[0]['iva'] / 100) + 1;

		$this->db->select('percentage_retention');
		$this->db->from('t_d_retention');
		$this->db->where('id_retention', $parametros['id_retencion']);
		
		$retencion = $this->db->get();
		$retencion = $retencion->result_array();
		$retencion = $retencion[0]['percentage_retention'] / 100;

		$this->db->select('(S.percentage * UT.amount) as monto');
		$this->db->from('t_d_sermat as S');
		$this->db->join('t_d_tributary_unity as UT','S.id_tributary_unity = UT.id_tributary_unity');
		$this->db->where('id_sermat', $parametros['sermat']);
		
		$monto_sermat = $this->db->get();
		$monto_sermat = $monto_sermat->result_array();
		$monto_sermat = $monto_sermat[0]['monto'];

		$this->db->select('min_amount, base, percentage, deductible, amount');
		$this->db->from('t_d_type_islr');
		$this->db->where('id_islr_type', $parametros['islr']);

		$islr = $this->db->get();
		$islr = $islr->result_array();

		$base_imponible = $parametros['base_imponible'] / $iva;
		$monto_iva = $parametros['base_imponible'] - $base_imponible;
		$monto_retencion = $monto_iva * $retencion;
		$timbre = (($base_imponible - $monto_sermat) >= 0) ? $base_imponible / 1000 : 0;

		$base = $islr[0]['base'] / 100;
		$tarifa = $islr[0]['percentage'] / 100;
		$monto_min = $islr[0]['min_amount'];
		$monto = $islr[0]['amount'];
		$sustraendo = $islr[0]['deductible'];

		if($monto == 'TODO PAGO'){ // no residente, no domiciliada
			if($base == 'MSR'){ // si se calcula por MSR
				$msr = $base_imponible / $iva;
				$islr_retenido = $msr * $tarifa;
			}else if($tarifa == 'TARIFA Nº 2'){ // si se calcula por TARIFA Nº 2
				$this->db->select('amount');
				$this->db->from('t_d_tributary_unity');
				$this->db->order_by('id_tributary_unity', 'DESC');
				$this->db->limit(1);
				
				$ut = $this->db->get();
				$ut = $ut->result_array();
				$ut = $ut[0]['amount'];
				$monto_pagado1 = $ut * 2000;
				$monto_pagado2 = $ut * 3000;
				$monto_pagado3 = $ut * 3001;

				if(($parametros['base_imponible'] >= $ut) && ($parametros['base_imponible'] <= $monto_pagado1))
					$tarifaN = 15 / 100;
				else if(($parametros['base_imponible'] >= $ut) && ($parametros['base_imponible'] <= $monto_pagado2))
					$tarifaN = 22 / 100;
				else if(($parametros['base_imponible'] >= $ut) && ($parametros['base_imponible'] <= $monto_pagado3))
					$tarifaN = 34 / 100;

				$islr_retenido = $base_imponible * $base * $tarifaN;
			}else
				$islr_retenido = $base_imponible * $base * $tarifa;
		}else if($sustraendo > 0){ // residente
			if(($parametros['base_imponible'] >= $monto_min) || ($monto_min == 'TODO PAGO'))
				$islr_retenido = $base_imponible * $base - $sustraendo;
		}else // domiciliada
			$islr_retenido = $base_imponible * $base * $tarifa;

		$data['base_imponible'] =  number_format($base_imponible, 2, '.', '');
		$data['islr_retenido'] =  number_format($islr_retenido, 2, '.', '');
		$data['iva'] =  number_format($monto_iva, 2, '.', '');
		$data['retencion'] =  number_format($monto_retencion, 2, '.', '');
		$data['iva_pay'] =  number_format($monto_iva - $monto_retencion, 2, '.', '');
		$data['timbre'] =  number_format($timbre, 2, '.', '');
		$data['total_pay'] =  number_format($base_imponible + $data['iva_pay'] - $timbre - $islr_retenido, 2, '.', '');

		echo json_encode($data);
	}

	public function comparar_montos($parametros){
		$this->db->select('subtotal');
		$this->db->from('t_d_purchase_order');
		$this->db->where('id_purchase_order', $parametros['orden']);
		
		$subtotal_orden = $this->db->get();
		$subtotal_orden = $subtotal_orden->result_array();
		$subtotal_orden = $subtotal_orden[0]['subtotal'];//Lo coloque asi ya que no estaba funcionando no se si porque lo estaba corriendo en linux. Cesar

		$this->db->select('sum(invoice_amount)');
		$this->db->from('t_d_invoice');
		$this->db->where('id_check_request', $parametros['cheque']);
		$subtotal_factura = $this->db->get();

		$subFactura=$subtotal_factura->result_array();
		$subFactura=$subFactura[0]['sum(invoice_amount)'];//Lo coloque asi ya que no estaba funcionando no se si porque lo estaba corriendo en linux. Cesar

		$subtotal_factura = ($subtotal_factura->num_rows() > 0) ? $subFactura + $parametros['monto'] : $parametros['monto'];

		if($subtotal_factura > $subtotal_orden)
			echo '1';
		else
			echo '0';
	}

	public function listar_ordenes(){
		$this->db->select('*');
		$this->db->from('t_d_purchase_order');
		$this->db->where('t_d_purchase_order.id_po_status', 2);
		$this->db->join('t_d_beneficiary','t_d_purchase_order.id_beneficiary = t_d_beneficiary.id_beneficiary');

		$query = $this->db->get();
    
      	if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $result[]= $row;
            }echo json_encode($result);
        }
	}

	public function listar_islr(){
		// $this->db->select('*');
		// $this->db->from('t_d_islr');
		// $this->db->join('t_d_type_islr','t_d_type_islr.id_islr = t_d_islr.id_islr');
		// $this->db->where('t_d_type_islr.id_type_beneficiary', 't_n_type_beneficiary.id_type_beneficiary');
		// $query = $this->db->get();

		$query = $this->db->query("
								SELECT * 
								FROM t_d_islr
								INNER JOIN t_d_type_islr ON t_d_type_islr.id_islr = t_d_islr.id_islr, t_n_type_beneficiary
								WHERE t_d_type_islr.id_type_beneficiary = t_n_type_beneficiary.id_type_beneficiary
								ORDER BY t_d_islr.id_islr ASC
							");

    
      	if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $result[]= $row;
            }
        }echo json_encode($result);
	}
}
?>