<?php
function actualizar_subtotal_po($postdata, $primary_key, $xcrud){
    $db = Xcrud_db::get_instance();
    $db->query('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_bb_status = 2 AND id_base_budget = ' . $postdata->get('id_base_budget'));
    $subtotal = $db->row();
	//var_dump('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_bb_status = 2 AND id_base_budget = ' . $postdata->get('id_base_budget'));exit;
    $db->query('UPDATE t_d_purchase_order SET subtotal = ' . $subtotal['subtotal'] . ' WHERE id_base_budget = ' . $postdata->get('id_base_budget'));
}

function actualizar_subtotal_u($postdata, $primary_key, $xcrud){
    $db = Xcrud_db::get_instance();
    $db->query('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_base_budget = ' . $postdata->get('id_base_budget'));
    $subtotal = $db->row();

    $db->query('UPDATE t_d_base_budget SET total = ' . $subtotal['subtotal'] . ' WHERE id_base_budget = ' . $postdata->get('id_base_budget'));   
    //$db->query('UPDATE t_d_requisition_detail SET id_req_status = 1 WHERE id_req_detail = ' . $postdata['id_req_detail']);
}

function actualizar_subtotal_r($primary_key, $xcrud){
    $db = Xcrud_db::get_instance();

    $db->query('SELECT id_base_budget, subtotal, id_req_detail FROM t_d_base_budget_detail WHERE id_budget_detail = ' . $primary_key);
    $base_budget = $db->row();

    $db->query('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_base_budget = ' . $base_budget['id_base_budget']);
    $subtotal = $db->row();

    $db->query('UPDATE t_d_base_budget SET total = ' . $subtotal['subtotal'] . ' - ' . $base_budget['subtotal'] . ' WHERE id_base_budget = ' . $base_budget['id_base_budget']);
    $db->query('UPDATE t_d_requisition_detail SET id_req_status = 2 WHERE id_req_detail = ' . $base_budget['id_req_detail']);
}

function check_request_insert($postdata, $xcrud){
    $db = Xcrud_db::get_instance();
    $datos= $postdata->to_array();
    //var_dump('insert into t_d_check_request(date) values("'.$datos["t_d_check_request.date"].'")');exit;
    $db->query('insert into t_d_check_request(date) values("'.$datos["t_d_check_request.date"].'")');
    $cheque=$db->insert_id();

    $datos=explode(',',$datos["t_d_check_request.orden_compra"]);
    $ingr_ordinarios=0;
    $ingr_propios=0;
    foreach($datos as $dato){
            $db->query('insert into t_r_check_pb (id_check_request,id_pb) values('.$cheque.','.$dato.')');
            // Obtengo el id presupuesto base y el del beneficiario
            $db->query('SELECT id_base_budget, id_beneficiary FROM t_d_purchase_order WHERE id_purchase_order = ' . $dato);
            $result = $db->row();

            // Obtengo el subtotal usando el id del pb obtenido de ingresos propios
            $db->query('SELECT sum(subtotal) FROM t_d_base_budget_detail as bbd, t_r_account_fund as af, t_d_fund as f
                        WHERE bbd.id_base_budget = ' . $result['id_base_budget'] . '
                        AND bbd.id_bb_status = 2
                        AND bbd.id_account_fund = af.id_account_fund
                        AND af.id_fund = f.id_fund
                        AND f.id_fund_type = 1
                    ');
            // Inserto el valor de ingresos propios si existe
            $subtotal_ingresos_propios = $db->row();
            if(!empty($subtotal_ingresos_propios['sum(subtotal)'])){
                $ingr_propios+=$subtotal_ingresos_propios['sum(subtotal)'];

            }
            // Obtengo el subtotal usando el id del pb obtenido de ingresos ordinarios
            $db->query('SELECT sum(subtotal) FROM t_d_base_budget_detail as bbd, t_r_account_fund as af, t_d_fund as f
                        WHERE bbd.id_base_budget = ' . $result['id_base_budget'] . '
                        AND bbd.id_bb_status = 2
                        AND bbd.id_account_fund = af.id_account_fund
                        AND af.id_fund = f.id_fund
                        AND f.id_fund_type = 2
                    ');
            // Inserto el valor de ingresos ordinarios si existe
            $subtotal_ingresos_ordinarios = $db->row();
            if(!empty($subtotal_ingresos_ordinarios['sum(subtotal)'])){
                $ingr_ordinarios+=$subtotal_ingresos_ordinarios['sum(subtotal)'];
            }
            
            //Cambio la orden de compra a consolidada
                $db->query('update t_d_purchase_order set id_po_status=4 where id_purchase_order='.$dato.'');
        }
        
        if($ingr_propios>0){
                $db->query('INSERT INTO t_d_check_issued(id_check_request, amount, date, type) 
                    VALUES(' . $cheque . ', ' . $ingr_propios . ', CURRENT_DATE, 1)');
                    }
        if($ingr_ordinarios>0){
                $db->query('INSERT INTO t_d_check_issued(id_check_request, amount, date, type) 
                    VALUES(' . $cheque . ', ' . $ingr_ordinarios . ', CURRENT_DATE, 2)');
        }
        
}
function check_request_update($postdata, $primary_key, $xcrud){
    $db = Xcrud_db::get_instance();
    $datos= $postdata->to_array();

    $datos=explode(',',$datos["t_d_check_request.orden_compra"]);
    $ingr_ordinarios=0;
    $ingr_propios=0;
    foreach($datos as $dato){
            $db->query('insert into t_r_check_pb (id_check_request,id_pb) values('.$primary_key.','.$dato.')');
            // Obtengo el id presupuesto base y el del beneficiario
            $db->query('SELECT id_base_budget, id_beneficiary FROM t_d_purchase_order WHERE id_purchase_order = ' . $dato);
            $result = $db->row();

            // Obtengo el subtotal usando el id del pb obtenido de ingresos propios
            $db->query('SELECT sum(subtotal) FROM t_d_base_budget_detail as bbd, t_r_account_fund as af, t_d_fund as f
                        WHERE bbd.id_base_budget = ' . $result['id_base_budget'] . '
                        AND bbd.id_bb_status = 2
                        AND bbd.id_account_fund = af.id_account_fund
                        AND af.id_fund = f.id_fund
                        AND f.id_fund_type = 1
                    ');
            // Inserto el valor de ingresos propios si existe
            $subtotal_ingresos_propios = $db->row();
            if(!empty($subtotal_ingresos_propios['sum(subtotal)'])){
                $ingr_propios+=$subtotal_ingresos_propios['sum(subtotal)'];

            }
            // Obtengo el subtotal usando el id del pb obtenido de ingresos ordinarios
            $db->query('SELECT sum(subtotal) FROM t_d_base_budget_detail as bbd, t_r_account_fund as af, t_d_fund as f
                        WHERE bbd.id_base_budget = ' . $result['id_base_budget'] . '
                        AND bbd.id_bb_status = 2
                        AND bbd.id_account_fund = af.id_account_fund
                        AND af.id_fund = f.id_fund
                        AND f.id_fund_type = 2
                    ');
            // Inserto el valor de ingresos ordinarios si existe
            $subtotal_ingresos_ordinarios = $db->row();
            if(!empty($subtotal_ingresos_ordinarios['sum(subtotal)'])){
                $ingr_ordinarios+=$subtotal_ingresos_ordinarios['sum(subtotal)'];
            }
            
            //Cambio la orden de compra a consolidada
                $db->query('update t_d_purchase_order set id_po_status=4 where id_purchase_order='.$dato.'');
        }
        
        if($ingr_propios>0){
				
                $db->query('select amount from t_d_check_issued 
                            where id_check_request=' . $primary_key . ' AND
                            type=1');
                $montoip=$db->row();
				if($montoip==null){
				    $db->query('INSERT INTO t_d_check_issued(id_check_request, amount, date, type) 
								VALUES(' . $primary_key . ', ' . $ingr_propios . ', CURRENT_DATE, 1)');
				}else{
                $ingr_propios+=$montoip['amount'];
                $db->query('update t_d_check_issued set amount=' . $ingr_propios . ' where id_check_request=' . $primary_key . ' AND
                            type=1');}
                    }
        if($ingr_ordinarios>0){
                $montoio=$db->query('select amount from t_d_check_issued 
                            where   id_check_request=' . $primary_key . ' AND
                            type=2');
                $montoio=$db->row();
				if($montoio==null){
				    $db->query('INSERT INTO t_d_check_issued(id_check_request, amount, date, type) 
								VALUES(' . $primary_key . ', ' . $ingr_ordinarios . ', CURRENT_DATE, 2)');
				}else{
                $ingr_ordinarios+=$montoio['amount'];
                $db->query('update t_d_check_issued set amount=' . $ingr_ordinarios . ' where id_check_request=' . $primary_key . ' AND
                            type=2');}
        }
        
}

function add_invoice($postdata, $xcrud){
    $db = Xcrud_db::get_instance();
    $db->query('INSERT INTO t_d_invoice(id_check_request, id_islr, invoice_number, control_number, date, iva_amount, invoice_amount, 
                                        id_retention, iva_retained, iva_pay, total_pay, id_iva, taxable_base, tax_stamp, id_sermat, islr_retained) 
                VALUES(' . $postdata->get("id_check_request") . ', ' . $postdata->get("id_islr") . ', "' . $postdata->get("invoice_number") . '", 
                    "' . $postdata->get("control_number") . '",' . $postdata->get("date") . ', ' . $postdata->get("iva_amount") . ',
                    ' . $postdata->get("invoice_amount") . ',' . $postdata->get("id_retention") . ',' . $postdata->get("iva_retained") . ',
                    ' . $postdata->get("iva_pay") . ',' . $postdata->get("total_pay") . ',' . $postdata->get("id_iva") . '
                    ,' . $postdata->get("taxable_base") . ',' . $postdata->get("tax_stamp") . ',' . $postdata->get("id_sermat") . '
                    ,' . $postdata->get("islr_retained") . ')');
}
function drop_invoice($primary_key, $xcrud){
    $db = Xcrud_db::get_instance();
    $db->query('DELETE FROM t_d_invoice WHERE id_invoice = ' . $primary_key);
}
function add_islr($postdata, $xcrud){
    $tarifa = (strtoupper($postdata->get("percentage")) == 'TARIFA') ? 'TARIFA Nº 2' : $postdata->get("percentage");
    $monto = (strtoupper($postdata->get("amount")) == 'TODO') ? 'TODO PAGO' : $postdata->get("amount");
    $monto_min = (strtoupper($postdata->get("min_amount")) == 'TODO') ? 'TODO PAGO' : $postdata->get("min_amount");

    $db = Xcrud_db::get_instance();
    $db->query('INSERT INTO t_d_type_islr 
                VALUES(null, ' . $postdata->get("id_islr") . ', ' . $postdata->get("id_type_beneficiary") . ', 
                    "' . $monto_min . '", "' . strtoupper($postdata->get("base")) . '", "' . $tarifa . '", 
                    ' . $postdata->get("deductible") . ', "' . $monto . '")');
}
function remove_islr($primary_key, $xcrud){
    $db = Xcrud_db::get_instance();
    $db->query('DELETE FROM t_d_type_islr WHERE id_islr_type = ' . $primary_key);
}

function publish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}
function unpublish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function activa_action($xcrud){
    if ($xcrud->get('primary')){   
        // Comprometo el bb_detail
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_base_budget_detail SET `id_bb_status` = 2 WHERE id_budget_detail = ' . (int)$xcrud->get('primary');
        $db->query($query);

        // Actualizo el subtotal de la po
        $db->query('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_bb_status = 2 AND id_base_budget = ' . $xcrud->get('base_budget'));
        $subtotal = $db->row();
        $db->query('UPDATE t_d_purchase_order SET subtotal = ' . $subtotal['subtotal'] . ' WHERE id_base_budget = ' . $xcrud->get('base_budget'));
    }
}
function inactiva_action($xcrud){
    if ($xcrud->get('primary')){
        // Comprometo el bb_detail
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_base_budget_detail SET `id_bb_status` = 1 WHERE id_budget_detail = ' . (int)$xcrud->get('primary');
        $db->query($query);

        // Actualizo el subtotal de la po
        $db->query('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_bb_status = 2 AND id_base_budget = ' . $xcrud->get('base_budget'));
        $subtotal = $db->row();
        $db->query('UPDATE t_d_purchase_order SET subtotal = ' . $subtotal['subtotal'] . ' WHERE id_base_budget = ' . $xcrud->get('base_budget'));
    }
}

function comprometer($xcrud)
{
	
		$db = Xcrud_db::get_instance();
		$query = "SELECT
					t_d_purchase_order.id_purchase_order,
					t_d_purchase_order.date_or,
					t_d_base_budget_detail.id_account_fund
					FROM
					t_d_purchase_order
					INNER JOIN t_d_base_budget ON t_d_purchase_order.id_base_budget = t_d_base_budget.id_base_budget
					INNER JOIN t_d_base_budget_detail ON t_d_base_budget_detail.id_base_budget = t_d_base_budget.id_base_budget
					WHERE
					t_d_base_budget_detail.id_account_fund<>'' and
					t_d_purchase_order.id_purchase_order=" . (int)$xcrud->get('primary');
	
		$db->query($query);
		if($db->result()==null){
			$xcrud->set_exception('password','Esta orden de compra no tiene al menos una cuenta de gasto asignada');
			
		}
		else{
			if ($xcrud->get('primary'))
			{
				$db = Xcrud_db::get_instance();
				$query = 'UPDATE t_d_purchase_order SET `id_po_status` = \'3\' WHERE id_purchase_order = ' . (int)$xcrud->get('primary');
				$db->query($query);
			}
		}

        if($xcrud->get('status') == 1){
            $db->query('UPDATE t_d_base_budget SET status = 1 WHERE id_base_budget = ' . $xcrud->get('base_budget'));
			$db->query('UPDATE t_d_base_budget_detail SET id_bb_status = 2 WHERE id_base_budget = ' . $xcrud->get('base_budget'));

			$db->query('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_bb_status = 2 AND id_base_budget = ' . $xcrud->get('base_budget'));
			$subtotal = $db->row();
			//var_dump('SELECT IFNULL(SUM(subtotal), 0) as subtotal FROM t_d_base_budget_detail WHERE id_bb_status = 2 AND id_base_budget = ' . $postdata->get('id_base_budget'));exit;
			$db->query('UPDATE t_d_purchase_order SET subtotal = ' . $subtotal['subtotal'] . ' WHERE id_base_budget = ' . $xcrud->get('base_budget'));
			}
}
function cancelar($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_purchase_order SET `id_po_status` = \'2\' WHERE id_purchase_order = ' . (int)$xcrud->get('primary');
        $db->query($query);

        $db->query('UPDATE t_d_base_budget SET `status` = \'0\' WHERE id_base_budget = ' . $xcrud->get('base_budget'));
        $db->query('UPDATE t_d_base_budget_detail SET `id_bb_status` = \'1\' WHERE id_base_budget = ' . $xcrud->get('base_budget'));
    }
}
function insertarPresuAsigActual($postdata, $xcrud){


                $account=$postdata->get('id_account');
                $fund=$postdata->get('id_fund');
                $budget=$postdata->get('id_budget');
                $amount=$postdata->get('amount');
                $dept=$postdata->get('id_dept');


                $db = Xcrud_db::get_instance();
                $query = "insert into t_r_account_fund (id_account, id_fund, id_budget, amount, id_dept)
                            values('".$account."','".$fund."','".$budget."','".$amount."','".$dept."')";
                $db->query($query);
        

}
function asignarf($xcrud){

    if($xcrud->get('primary')){
                $db = Xcrud_db::get_instance();
                $query = "SELECT
                            t_d_user.username,
                            t_n_privilege.id_privilege,
                            t_n_privilege.name
                            FROM
                            t_d_user
                            INNER JOIN t_r_user_privilege ON t_r_user_privilege.id_user = t_d_user.id_user
                            INNER JOIN t_n_privilege ON t_r_user_privilege.id_privilege = t_n_privilege.id_privilege
                            where t_d_user.id_user=".(int)$xcrud->get('primary')."";
                $db->query($query);
                $resultado = $db->result();
                if($resultado!=null){


                                $query = "update t_d_user
                                            INNER JOIN t_r_user_privilege ON t_r_user_privilege.id_user = t_d_user.id_user
                                            INNER JOIN t_n_privilege ON t_r_user_privilege.id_privilege = t_n_privilege.id_privilege
                                             set `status`='0'
                                            where t_n_privilege.id_privilege='".$resultado[0]['id_privilege']."'
                                            AND
                                            t_d_user.id_user<>'".(int)$xcrud->get('primary')."'";
                                $db->query($query);

                                $query = "update t_d_user
                                             set `status`='1'
                                            where
                                            t_d_user.id_user='".(int)$xcrud->get('primary')."'"; 
                                $db->query($query);
                                }
                        }

    }

function quitarf($xcrud){
        if($xcrud->get('primary')){
                $db = Xcrud_db::get_instance();
                $query = "update t_d_user
                             set `status`='0'
                            where
                            t_d_user.id_user='".(int)$xcrud->get('primary')."'"; 
                $db->query($query);
        }



}



function eliminar_usuarios($primary,$xcrud){
    
    $db = Xcrud_db::get_instance();

   
     // ****  ELIMINCION DEL BUDGET_DETAIL
    $query3 = 'delete FROM t_r_user_privilege WHERE id_user ='.$primary;
    $db->query($query3);
    //////////////////
    
     // ****  ELIMINCION DEL REQUISITION_DETAIL
    $query2 = 'delete FROM t_d_user WHERE id_user ='.$primary;
    $db->query($query2);
}
   
function refresh($postdata,$xcrud){
}
function insertar_bene($postdata,$xcrud){
        var_dump($postdata);exit;
}
function exception_example($postdata, $primary, $xcrud)
{
    $xcrud->set_exception('ban_reason', 'Lol!', 'error');
    $postdata->set('ban_reason', 'lalala');
}
function requisition_detail($postdata,$xcrud){
    $postdata->set('id_req_detail', $postdata->get('id_r'));
}
function test_column_callback($value, $fieldname, $primary, $row, $xcrud)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}
    function nice_input($value, $field, $priimary_key, $list, $xcrud)
    {
    return '<div class="input-prepend input-append">'
    . '<span class="add-on">$</span>'
    . '<input type="text" name="'.$xcrud->fieldname_encode($fieldname).'" value="'.$value.'" class="xcrud-input" />'
    . '<span class="add-on">.00</span>'
        . '</div>';
    }
function remove_replacer($primary_key, $xcrud){

    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $db->query('DELETE from t_r_account_fund WHERE id_account_fund ='.(int)$xcrud->get('primary'));
    }
       
}
function remove_disabled($postdata, $xcrud){

   echo "<script>alert();
   $(document).ready(function(){
$('input[type=text], input[type=date], select').removeAttr('disabled');
});</script>";
       
}
function eliminar_detalle_req($primary_key,$xcrud){
    
    $db = Xcrud_db::get_instance();

    $db->query('SELECT id_requisition FROM t_d_requisition_detail WHERE id_req_detail = ' . (int)$xcrud->get('primary'));
    $id_requisition = $db->row();
    
     // ****  ELIMINCION DEL REQUISITION_DETAIL
    $db->query('DELETE from t_d_requisition_detail WHERE id_req_detail ='.(int)$xcrud->get('primary'));

    $db->query('UPDATE t_d_requisition 
                SET total = (SELECT sum(quantity) 
                             FROM t_d_requisition_detail 
                             WHERE id_requisition = ' . $id_requisition['id_requisition'] . ') 
                WHERE id_requisition = ' . $id_requisition['id_requisition']);
}
function actualizar_total_req($postdata, $primary_key, $xcrud){
    $db = Xcrud_db::get_instance();
    $db->query('UPDATE t_d_requisition 
                SET total = (SELECT sum(quantity) 
                             FROM t_d_requisition_detail 
                             WHERE id_requisition = ' . $postdata->get('id_requisition') . ') 
                WHERE id_requisition = ' . $postdata->get('id_requisition'));
}

function eliminar_detalle_base_budget($primary_key,$xcrud){
    
    $db = Xcrud_db::get_instance();
    //  // ****  ELIMINCION DEL BUDGET_DETAIL
    $query3 = 'DELETE from t_d_base_budget_detail WHERE id_budget_detail ='.(int)$xcrud->get('primary');
    $db->query($query3);
    //////////////////
    
 //     // ****  ELIMINCION DEL REQUISITION_DETAIL
 // $query2 = 'DELETE from t_d_requisition_detail WHERE id_req_detail ='.(int)$xcrud->get('primary');
 // $db->query($query2);

}
function change_req_status($primary_key,$xcrud){
   
   if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_requisition_detail SET `id_req_status` = \'2\' WHERE id_req_detail = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }

}
// function insert_base_budget_detail($postdata,$xcrud){
    
//     $db = Xcrud_db::get_instance();

//     $query = 'INSERT INTO t_d_base_budget_detail (id_req_detail) VALUES ('$postdata->get('id_req_detail')')';

//     $db->query($query);
//     /////////////////
   

// }
function add_requisition($data, $xcrud){
    var_dump($data);
    // $db->("INSERT INTO t_d_requisition(id_dept, date) VALUES(" . $data . ", '" . $data . "')");
}

function editando($xcrud){
    echo "<script>alert();</script>";
} 

function add_user_icon($value, $fieldname, $primary_key, $row, $xcrud){
     $query = 'SELECT * FROM t_d_base_budget_detail WHERE id_base_budget = ' . (int)$xcrud->get('primary');
     $db->query($query);
    return '<i class="icon-user"></i>' . $row;
}
function date_example($postdata, $primary, $xcrud)
{
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime', $created);
}

function movetop($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}



