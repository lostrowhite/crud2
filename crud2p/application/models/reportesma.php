<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Reportesma extends CI_Model{
 
public function __construct()
    {
        parent::__construct();
		 $this->load->database();
		 $this->load->helper('xcrud');
    }
public function verificar($datos)
    {
        $this->db->select('t_d_transaction.*');
        $this->db->where('doc_type',$datos['doc_type']);
		$this->db->where('account',$datos['account']);
		$this->db->where('aux_code',$datos['aux_code']);
		$this->db->where('doc_number',$datos['doc_number']);
		$this->db->where('owe',$datos['owe']);
		$this->db->where('income',$datos['income']);
		$this->db->where('date',$datos['date']);
		$this->db->where('n_trans',$datos['n_trans']);
		

        $query = $this->db->get('t_d_transaction');
        return $query->result();
    }    

public function getCta() {
        //get all records from users table
        $query = $this->db->get( 'cuentas1' );
        
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    } //end getAll
public function insertT($datos) {

		$existe=$this->verificar($datos);
		if($existe==null){
			$this->db->insert('t_d_transaction', $datos);
			return $this->db->insert_id();
			}
		else{
			return null;
		}
	}
public function obtenerFiltro($fondo,$pr){

	if(($fondo==null)&&($pr==null)){
		$filtro="";
		return $filtro;
	
	}
	else if(($fondo!=null)&&($pr==null)){
		$filtro="and fund='".$fondo."'";
		return $filtro;
	
	}
	else if(($fondo==null)&&($pr!=null)){
		$filtro="and aux_code like '%".$pr."%'";
		return $filtro;
	
	}
	else if(($fondo!=null)&&($pr!=null)){
		$filtro="and fund='".$fondo."' and aux_code like '%".$pr."%'";
		return $filtro;
	
	}
	


}
public function reportemayor($fecha,$fondo,$pr) {
		$filtr=$this->obtenerFiltro($fondo,$pr);
		//var_dump($filtr);exit;
        $query=$this->db->query("SELECT
									t_d_account_manual.account_number,
									t_d_account_manual.description,
									t_d_account_manual.total
									FROM
									t_d_transaction
									INNER JOIN t_d_account_manual ON t_d_transaction.account = t_d_account_manual.account_number

									GROUP BY
									t_d_account_manual.account_number,
									t_d_account_manual.description
									ORDER BY
									t_d_account_manual.account_number");
		$cont=0;
		foreach($query->result() as $cuenta){
			//var_dump($cuenta->account_number,$cuenta->description);exit;
			$datos[$cont]['Cuenta']=$cuenta->account_number;
			$datos[$cont]['Descripcion']=$cuenta->description;
			$datos[$cont]['Total']=$cuenta->total;
			
			$queryTotal=$this->db->query("SELECT
											t_d_account_manual.account_number,
											t_d_account_manual.total,
											SUM(t_d_transaction.owe)-sum(t_d_transaction.income) as totall
											FROM
											t_d_account_manual
											INNER JOIN t_d_transaction ON t_d_transaction.account = t_d_account_manual.account_number
											WHERE
											account_number='".$cuenta->account_number."' AND
											date < '".$fecha[0]."'");
			
			if($queryTotal->result()!=null){
					foreach($queryTotal->result() as $resultado){
						
					
							$datos[$cont]['Total']-=$resultado->totall;}
						
					
				
				}
			//var_dump($cuenta->total);
			$queryy=$this->db->query ("SELECT
										
										t_d_transaction.fund,
										t_d_transaction.doc_number,
										concat_ws('-',t_d_transaction.unit,t_d_transaction.aux_code) AS unit,
										t_d_transaction.date,
										t_d_transaction.description,
										sum(t_d_transaction.owe) as owe,
										sum(t_d_transaction.income) as income
										FROM
										t_d_transaction
										where
										account='".$cuenta->account_number."' AND
										date BETWEEN '".$fecha[0]."' AND '".$fecha[1]."'
										".$filtr."
										GROUP BY
										t_d_transaction.fund,
										t_d_transaction.doc_number,
										t_d_transaction.unit,
										t_d_transaction.date,
										t_d_transaction.description,
										t_d_transaction.doc_type
										ORDER BY
										date,doc_number");
			//var_dump($queryy->result());exit;
			foreach($queryy->result() as $cuentaR){
				$datos[$cont]['Resultados'][]= array(
					'fondo' => $cuentaR->fund,
					't_doc' => $cuentaR->doc_number,
					'unidad' => $cuentaR->unit,
					'fecha' => $cuentaR->date,
					'descripcion' => $cuentaR->description,
					'debe' => $cuentaR->owe,
					'haber' => $cuentaR->income
				);
			
			}
		
		$cont++;
		}
		
		return $datos;
	}
	
public function reportebalancecompro($fecha,$fondo,$pr){
		$filtr=$this->obtenerFiltro($fondo,$pr);
	        $querytipos=$this->db->query("SELECT
											t_d_type_account_general.id_type,
											t_d_type_account_general.type
											FROM
											t_d_type_account_general
											INNER JOIN t_d_account_type ON t_d_type_account_general.id_type = t_d_account_type.type
											INNER JOIN t_d_account_manual ON t_d_account_type.account_number = t_d_account_manual.type
											INNER JOIN t_d_transaction ON t_d_transaction.account = t_d_account_manual.account_number
											GROUP BY
											t_d_type_account_general.id_type,
											t_d_type_account_general.type
											order by
											t_d_type_account_general.id_type");
			$cont=0;								
			foreach($querytipos->result() as $tipos){
							$datos[$cont]['CuentaPrincipal']=$tipos->type;
							$datos[$cont]['CuentaPrincipalTipo']=$tipos->id_type;
							$query=$this->db->query("SELECT
										t_d_account_type.account_number,
										t_d_account_type.description
										FROM
										t_d_account_type ,
										t_d_account_manual
										INNER JOIN t_d_transaction ON t_d_transaction.account = t_d_account_manual.account_number
										WHERE
										t_d_account_manual.type=t_d_account_type.account_number and
										t_d_account_type.type='".$tipos->id_type."'
										GROUP BY
										t_d_account_type.account_number,
										t_d_account_type.description
										ORDER BY
										t_d_account_type.account_number");
							$conType=0;
							foreach($query->result() as $tipo){
										$datos[$cont]['CuentaSecundaria'][$conType]['desc']=$tipo->description;
										$datos[$cont]['CuentaSecundaria'][$conType]['type']=$tipo->account_number;
										$queryCuentas=$this->db->query("SELECT
													t_d_account_manual.account_number,
													t_d_account_manual.description,
													t_d_account_manual.total
													FROM
													t_d_transaction
													INNER JOIN t_d_account_manual ON t_d_transaction.account = t_d_account_manual.account_number
													where
													t_d_account_manual.type='".$tipo->account_number."'
													GROUP BY
													t_d_account_manual.account_number,
													t_d_account_manual.description
													ORDER BY
													t_d_account_manual.account_number");
													
										foreach($queryCuentas->result() as $cuenta){
														
														$queryTotal=$this->db->query("SELECT
																						t_d_account_manual.account_number,
																						t_d_account_manual.total,
																						SUM(t_d_transaction.owe)-sum(t_d_transaction.income) as totall
																						FROM
																						t_d_account_manual
																						INNER JOIN t_d_transaction ON t_d_transaction.account = t_d_account_manual.account_number
																						WHERE
																						account_number='".$cuenta->account_number."' AND
																						date < '".$fecha[0]."'");
														
														if($queryTotal->result()!=null){
																foreach($queryTotal->result() as $resultado){
																	$totalN=$resultado->totall;
																}
															
															}
														
														$queryy=$this->db->query ("SELECT
																					cast(sum(t_d_transaction.owe) as DECIMAL(10,2)) as owe,
																					cast(sum(t_d_transaction.income) as DECIMAL(10,2)) as income
																					FROM
																						t_d_transaction
																					where
																					account='".$cuenta->account_number."' AND
																					date BETWEEN '".$fecha[0]."' AND '".$fecha[1]."'
																					".$filtr."
																					ORDER BY
																						date,
																						doc_number");
														//var_dump($queryy->result());exit;
														foreach($queryy->result() as $cuentaR){
															$datos[$cont]['CuentaSecundaria'][$conType]['Resultados'][]= array(
																'acc_number' => $cuenta->account_number,
																'acc_desc' => $cuenta->description,
																'acc_total' => $cuenta->total-$totalN,
																'debe' => $cuentaR->owe,
																'haber' => $cuentaR->income
															);
														
														}
										}
										
							$conType++;
							}
				$cont++;
				}
				return $datos;
	


}

    
}