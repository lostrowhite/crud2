<?php
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

function eliminar_usuarios($primary,$xcrud){
    
    $db = Xcrud_db::get_instance();

   
     // ****  ELIMINCION DEL BUDGET_DETAIL
    $query3 = 'delete FROM t_r_user_privilege WHERE id_user ='.$primary;
    $db->query($query3);
    //////////////////
    
     // ****  ELIMINCION DEL REQUISITION_DETAIL
    $query2 = 'delete FROM t_d_user WHERE id_user ='.$primary;
    $db->query($query2);
   
function refresh($postdata,$xcrud){
}
function insertar_bene($postdata,$xcrud){
        var_dump($postdata);exit;
}

function exception_example($postdata,$primary,$xcrud){
    $xcrud->set_exception('ban_reason','Lol!','error');
    $postdata->set('ban_reason','lalala');
}

function requisition_detail($postdata,$xcrud){
    $postdata->set('id_req_detail', $postdata->get('id_r'));
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud){
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud){
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if($ext != 'pdf' && $field == 'uploads.simple_upload'){
        unlink($file_path);
        $xcrud->set_exception('simple_upload','This is not PDF','error');
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
function eliminar($primary,$xcrud){
    
    $db = Xcrud_db::get_instance();

   
     // ****  ELIMINCION DEL BUDGET_DETAIL
    $query3 = 'delete FROM t_d_base_budget_detail WHERE id_req_detail ='.$primary;
    $db->query($query3);
    //////////////////
    
     // ****  ELIMINCION DEL REQUISITION_DETAIL
    $query2 = 'delete FROM t_d_requisition_detail WHERE id_req_detail ='.$primary;
    $db->query($query2);
   

}

function insert_base_budget_detail($postdata,$xcrud){
    
    $db = Xcrud_db::get_instance();

    $query = 'INSERT INTO t_d_base_budget_detail (id_req_detail) VALUES ('$postdata->get('id_req_detail')')';

    $db->query($query);
    /////////////////
   

}
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
function date_example($postdata,$primary,$xcrud){
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime',$created);
}