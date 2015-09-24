<?php
function check_request($postdata, $primary, $xcrud){
    $db = Xcrud_db::get_instance();
    // Obtengo el id presupuesto base y el del beneficiario
    $db->query('SELECT id_base_budget, id_beneficiary FROM t_d_purchase_order WHERE id_purchase_order = ' . $postdata->get('id_purchase_order'));
    $result = $db->row();
    // Obtengo el tipo de beneficiario
    $db->query('SELECT id_type FROM t_d_beneficiary WHERE id_beneficiary = ' . $result['id_beneficiary']);
    $result2 = $db->row();
    // Obtengo el id_islr a usarse
    $db->query('SELECT id_islr FROM t_d_type_islr WHERE id_type_beneficiary = ' . $result2['id_type']);
    $result2 = $db->row();
    // Obtengo el subtotal usando el id del pb obtenido de ingresos propios
    $db->query('SELECT sum(subtotal) FROM t_d_base_budget_detail as bbd, t_r_account_fund as af, t_d_fund as f
                WHERE bbd.id_base_budget = ' . $result['id_base_budget'] . '
                AND bbd.id_account_fund = af.id_account_fund
                AND af.id_fund = f.id_fund
                AND f.id_fund_type = 1
            ');
    // Inserto el valor de ingresos propios si existe
    $subtotal_ingresos_propios = $db->row();
    if(!empty($subtotal_ingresos_propios['sum(subtotal)'])){
        $db->query('INSERT INTO t_d_check_issued(id_check_request, amount, date, type, id_islr) 
            VALUES(' . $primary . ', ' . $subtotal_ingresos_propios['sum(subtotal)'] . ', CURRENT_DATE, 1, ' . $result2['id_islr'] . ')');
    }
    // Obtengo el subtotal usando el id del pb obtenido de ingresos ordinarios
    $db->query('SELECT sum(subtotal) FROM t_d_base_budget_detail as bbd, t_r_account_fund as af, t_d_fund as f
                WHERE bbd.id_base_budget = ' . $result['id_base_budget'] . '
                AND bbd.id_account_fund = af.id_account_fund
                AND af.id_fund = f.id_fund
                AND f.id_fund_type = 2
            ');
    // Inserto el valor de ingresos ordinarios si existe
    $subtotal_ingresos_ordinarios = $db->row();
    if(!empty($subtotal_ingresos_ordinarios['sum(subtotal)'])){
        $db->query('INSERT INTO t_d_check_issued(id_check_request, amount, date, type, id_islr) 
            VALUES(' . $primary . ', ' . $subtotal_ingresos_ordinarios['sum(subtotal)'] . ', CURRENT_DATE, 2, ' . $result2['id_islr'] . ')');
    }
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

function activa_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_base_budget_detail SET `id_bb_status` = 2 WHERE id_budget_detail = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}
function inactiva_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_base_budget_detail SET `id_bb_status` = 1 WHERE id_budget_detail = ' . (int)$xcrud->get('primary');
        $db->query($query);
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
				$query = 'UPDATE t_d_purchase_order SET `id_po_status` = \'2\' WHERE id_purchase_order = ' . (int)$xcrud->get('primary');
				$db->query($query);
			}
		}
}
function cancelar($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE t_d_purchase_order SET `id_po_status` = \'3\' WHERE id_purchase_order = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
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
    //  // ****  ELIMINCION DEL BUDGET_DETAIL
    $query3 = 'DELETE from t_d_base_budget_detail WHERE id_req_detail ='.(int)$xcrud->get('primary');
    $db->query($query3);
    //////////////////
    
     // ****  ELIMINCION DEL REQUISITION_DETAIL
 $query2 = 'DELETE from t_d_requisition_detail WHERE id_req_detail ='.(int)$xcrud->get('primary');
 $db->query($query2);

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



