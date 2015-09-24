$(document).ready(function(){

var q= $('#id_subtotal').val();
$('#id_subtotald').val(q);

    $('.precio_pb, .cantidad_pb').keyup(function() {
        subtotal_pb();
    });
    function subtotal_pb(){
    $('.id_subtotal').val(($('.precio_pb').val()*$('.cantidad_pb').val()).toFixed(2));
    }
    // $('#depto, #fecha, #total, #noPermitir').mousedown(function(){ return false; }).keydown(function(event){ return false; });
    $('#depto, #fecha, #total, #noPermitir, #subtotal_pb, #id_subtotald, #usuario, .inhab')
        .css({ 'cursor':'not-allowed' })
        .mousedown(function(){ return false; }).keydown(function(event){ return false; });

    // jQuery('#name,#rif,#rnc_code,#status,#address,#tlf,#email,#create_date,#due_date,#bancoEmisor,#chk_amount').mousedown(function(){ return false; }).keydown(function(event){ return false; });
    jQuery('#name,#rif,#rnc_code,#status,#address,#tlf,#email,#create_date,#due_date,#bancoEmisor,#chk_amount, #id_subtotald')
        .css({ 'cursor':'not-allowed' })
        .mousedown(function(){ return false; }).keydown(function(event){ return false; });

 jQuery('#id_pb').combogrid({
    panelWidth:545,
    idField:'id_req_detail',
    textField:'name_product',
    url: 'procesos/traeprueba',
    mode:'remote',
    columns:[[
 {field:'id_requisition',title:'N°req',width:45},
{field:'name_unit',title:'Unidad',width:160},
{field:'name_product',title:'Detalle',width:160},
{field:'quantity',title:'Cantidad',width:160}
    ]],
  onSelect:function(){
         var g = jQuery('#id_pb').combogrid('grid');    // get datagrid object
         var r = g.datagrid('getSelected'); // get the selected row
        $('#id_pb').val(r.id_req_detail);
        $('#cantidad_pb').val(r.quantity);
        subtotal_pb();
    }
    });
 // if(jQuery('#rif')){
 //     //alert('hola');
 //     var ap='<table class="table table-striped"><tbody><tr><td style="width: 26% !important;"class="details-label">INTRODUZCA RIF</td><td><input type="text" class="xcrud-input form-control" data-type="text" id="searchRif"></td></tr></tbody></table>';
 //     jQuery('.xcrud-view').append(ap);
 //     jQuery('#name,#rif,#rnc_code,#status,#address,#tlf,#email,#create_date,#due_date').mousedown(function(){ return false; }).keydown(function(event){ return false; });
    // jQuery('#name,#rif,#rnc_code,#status,#address,#tlf,#email,#create_date,#due_date').css({ 'cursor':'not-allowed' });

 // }
jQuery('#rif').searchbox({
searcher:function(value){
                jQuery('#cargar-rif').show();
                

                if(value==0){
                    jQuery('#cargar-rif').hide();
                    alert("Debe introducir primero un RIF");
                }else{
                        
                        var rif =value.toUpperCase();
                        rif = rif.replace(/^\s+/,'').replace(/\s+$/,'');
                        //alert(rif);
                        jQuery.ajax({url:'usuarios/sncVerificar',type:'POST',data:{ id: value },success:function(respuesta){
                            jQuery('#cargar-rif').hide();
                            var pos=respuesta.indexOf('}');
                            respuesta=respuesta.substr(0,pos+1);
                            var res = jQuery.parseJSON(respuesta);
                            if(res.existe=='S'){
                                var pos=res.estadoEmpre.indexOf('NO REGISTRADA');
                                var pos2=res.estadoEmpre.indexOf('SUSPENDIDA');
                                if(pos!=-1){
                                    alert(res.estadoEmpre);
                                }
                                else if(pos2!=-1){
                                    alert(res.estadoEmpre);
                                }
                                else{

                                jQuery('#name').val(res.nomfis);
                                jQuery('#rif').val(res.rif);
                                $('#rif').val(res.rif);
                                jQuery('#rnc_code').val(res.rnc);
                                jQuery('#status').val(res.estadoEmpre);
                                jQuery('#address').val(res.direc1);
                                jQuery('#tlf').val(res.telefono);
                                jQuery('#email').val(res.email);
                                res.creacionrnc=res.creacionrnc.replace('-','/');
                                res.creacionrnc=res.creacionrnc.replace('-','/');
                                res.vencernc=res.vencernc.replace('-','/');
                                res.vencernc=res.vencernc.replace('-','/');
                                jQuery('#create_date').val(res.creacionrnc);
                                jQuery('#due_date').val(res.vencernc);
                                }
                            }
                            else{
                                alert('Empresa No Registrada');
                            }
                         }});

                }
},
});
 jQuery('#id_cuenta').combogrid({
    panelWidth:700,
    idField:'id_account_fund',
    textField:'code_account',
    url: 'procesos/account_fund',
    mode:'remote',
    columns:[[
 {field:'code_account',title:'N° Cuenta',width:100},
{field:'name_account',title:'Nombre de Cuenta',width:300},
{field:'id_fund',title:'Fondo',width:50},
{field:'code_dept',title:'Unidad Ejecutora',width:80},
{field:'amount',title:'Monto',width:160}
    ]],
onSelect:function(){
         var g = jQuery('#id_cuenta').combogrid('grid');    // get datagrid object
         var r = g.datagrid('getSelected'); // get the selected row
        $('#id_cuenta').val(r.id_account_fund);
        $('#id_fondo').val(r.id_fund);
    }
    });
jQuery('#presupuesto').combogrid({
    panelWidth:500,
    idField:'id_base_budget',
    textField:'id_base_budget',
    url: 'procesos/base_budget',
    mode:'remote',
    columns:[[
 {field:'id_base_budget',title:'N° Presupuesto Base',width:150},
{field:'total',title:'Monto Total',width:150},
{field:'date',title:'Fecha',width:200}
    ]],
onSelect:function(){
         var g = jQuery('#presupuesto').combogrid('grid');  // get datagrid object
         var r = g.datagrid('getSelected'); // get the selected row
        $('#presupuesto').val(r.id_base_budget);
    }
    });

    jQuery('#id_orden').combogrid({
        panelWidth:606,
        idField:'id_purchase_order',
        textField:'id_purchase_order',
        url: 'tesoreria/listar_ordenes',
        mode:'remote',
        columns:[[
            {field:'id_purchase_order',title:'Orden',width:50},
            {field:'name',title:'Beneficiario',width:300},
            {field:'date_or',title:'Fecha',width:150},
            {field:'id_base_budget',title:'PB',width:80}
        ]],
        onSelect:function(){
             var g = jQuery('#id_orden').combogrid('grid');  // get datagrid object
             var r = g.datagrid('getSelected'); // get the selected row
            $('#id_orden').val(r.id_purchase_order);
        }
    });
    $('#monto_factura').keyup(function(){
        $.post('tesoreria/comparar_montos', { monto:$('#monto_factura').val(),orden:$('#id_orden').val(),cheque:$('#id_sol_cheque').val() }, function(data){
            if(data.indexOf('1') != -1){
                $('#monto_factura').css({ 'background':'rgba(215, 44, 44, 0.8)' });
                $('.botones').click(function(){ $('#monto_factura').focus(); return false; });
            }else{
                $('#monto_factura').css({ 'background':'#fff' });
                $('.botones').unbind('click');
            }
        });
    });

    jQuery('#islr, #islr2').combogrid({
        panelWidth:606,
        idField:'id_islr',
        textField:'deductible',
        url: 'tesoreria/listar_islr',
        mode:'remote',
        columns:[[
            {field:'name_islr',title:'Nombre',width:200},
            {field:'name',title:'Beneficiario',width:80},
            {field:'deductible',title:'Deducible',width:65},
            {field:'percentage',title:'%',width:30}
        ]],
        onSelect:function(){

        }
    });




  jQuery('#sermat').combogrid({
    panelWidth:606,
    idField:'id_sermat',
    textField:'percentage',
    url:'tesoreria/obtenerSermat',
    mode:'remote',
    columns:[[
        {field:'id_sermat',title:'N° SERMAT',width:202},
        {field:'percentage',title:'Porcentaje a Retener %',width:202},
        {field:'amount',title:'Precio Unidad Tributaria',width:202}
            ]],
                onSelect:function(){
                     var g = jQuery('#sermat').combogrid('grid');  // get datagrid object
                     var r = g.datagrid('getSelected'); // get the selected row
                     var monto_cheque = jQuery('#chk_amount').val();
                     var monto_sermat = monto_cheque * r.percentage;
                    jQuery('#ser_amount').val(monto_sermat.toFixed(2));
                    }
            });
    var porcentaje = jQuery('#sermat option:selected').text();
    var monto_cheque = jQuery('#chk_amount').val();
    var monto_sermat = monto_cheque * porcentaje;
    jQuery('#ser_amount').val(monto_sermat.toFixed(2));


    var req=document.getElementById('id_req');
    if(req!=null){
     jQuery.ajax({url:"compras/ultimo_id",type:'POST',encoding:"UTF-8",
        success:function(result){
         
            result=result.replace('"','');
            result=result.replace('"','');
            result=result;
            jQuery('#id_req').val(result);
                            

            }});

    }

    var req_depto=document.getElementById('id_depto');
    if(req_depto!=null){
     jQuery.ajax({url:"compras/ultimo_id_depto",type:'POST',encoding:"UTF-8",
        success:function(result){
            result=result.replace('"','');
            result=result.replace('"','');
            result=result;
            jQuery('#id_depto').val(result);
                            

            }});

    }
});