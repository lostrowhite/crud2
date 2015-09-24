$(document).ready(function(){
 var cont=0;
 var dat=[];//modelo del grid
$('#tt').datagrid('reloadFooter',[  //inicio foter del datagrid
    {cantidad:"SubTotal : ",total: 0},
    {cantidad:"Iva 0% : ",total: 0},
    {cantidad:"Iva 12% : ",total: 0},
    {cantidad:"Descto (%) : ",total: 0},
    {cantidad:"Total : ",total: 0}
]);   

 function Add(){
       
       if(verificarDat()){
            cont++;
             var idprod=  $("#txt_idproducto").val();
            var prod=  $("#txt_nom_producto").val();
            var precio=$("#txt_precio").val();
            precio=parseFloat(precio);
            var canti=$("#txt_cantidad").val();
            canti=parseInt(canti);
            var subt=$("#txt_sub").val();
            subt=parseFloat(subt);
            var tmp_row={
                id:idprod,
                producto:prod,
                precio:precio,
                cantidad:canti,
                total:subt
            };
            dat.push(tmp_row);
            reloadData();
            sumatoria();
       }
        
    }

 function reloadData(){
        var datainfo = {
            "total":0,
            "rows":dat
        };
        $('#tt').datagrid('loadData', datainfo);
    }
 
 function vaciarVector(){
      dat=[];
      cont=0;
      reloadData();
      sumatoria();
  }

 function sumatoria(){//total de footer
        var tl=$("#tt").datagrid('getRows');
        var descto=$("#cmbDescto option:selected").text();
        descto=parseFloat(descto);
        var lng=tl.length;
        var sum=0;
        for(var t=0;t<lng;t++){
            //              var ret=tl[i]['producto'];
            sum=sum+tl[t]['total'];
        }
        $("#txt_temporal").val(sum.toFixed(2));
        var iva=sum*0.12;
//        iva=iva.toFixed(2);
        var toto=sum+iva;
        var tdsct=(descto*sum)/100;
        toto=toto-tdsct;
//        toto=toto.toFixed(2);
        $('#tt').datagrid('reloadFooter',[
           {cantidad:"SubTotal : ",total: sum.toFixed(2)},
           {cantidad:"Iva 0% : ",total: 0},
           {cantidad:"Iva 12% : ",total: iva.toFixed(2)},
           {cantidad:"Descto (%) : ",total: tdsct.toFixed(2)},
           {cantidad:"Total : ",total: toto.toFixed(2)}
        ]);
        $("#save_descto_fact").val(tdsct.toFixed(2));
        $("#iva12_fact").val(iva.toFixed(2));
        $("#total_fact").val(toto.toFixed(2));

     
    }

 function verificarDat(){//tomo el ide del producto
        var row =$('#cmbgridProducto').combogrid('grid').datagrid('getSelected');
        var lon=dat.length;
        var aux=0;
        for(var tk=0;tk<lon;tk++){
            if(dat[tk].id==row.id_producto){
                aux++;
            break;
            }
        }
        if(aux>0)return false;
        else return true;
    }
 
 function Delete(){
        var row = $('#tt').datagrid('getSelected'); 
        var index= dat.indexOf(row); // Find the index
       if(index!=-1) dat.splice(index,1); // Remove it if really found!
        reloadData();
        sumatoria();
    }   

//BOX SORTABLE //
		$(".column.half").sortable({
			connectWith: '.column.half',
			handle: '.box-header'
		});
		$(".column.full").sortable({
			connectWith: '.column.full',
			handle: '.box-header'
		});
		$(".box").find(".box-header").prepend('<span class="close"></span>').end();
		$(".box-header .close ").click(function() {
			$(this).parents(".box .box-header").toggleClass("box-header closed").toggleClass("box-header");
			$(this).parents(".box:first").find(".box-content").toggle();
			$(this).parents(".box:first").find(".example").toggle();
		});
   
   //TABS - SORTABLE//
		$(".tabs").tabs();
		$(".tabs.sortable").tabs().find(".ui-tabs-nav").sortable({axis:'x'});
    //DIALOG//
		$('#dialg_msg').dialog({
			autoOpen: false,
			width: 460,
			height: 140,
			modal: true
		});
                
        $('#dial_msg_close').click(function() {
			$('#dialg_msg').dialog('close');
		});    
    
    
$('#cmbgridCliente').combogrid({
            panelWidth:400,
            url: 'CONTROLLER/C_Persona.php?opc=14',
            idField:'id_persona',
            textField:'nom_persona',
            mode:'remote',
            fitColumns:true,
            columns:[[
                {field:'id_persona',title:'Id',width:20},
                {field:'nom_persona',title:'Nombre',align:'right',width:100},
                {field:'ape_persona',title:'Apellido',align:'right',width:100}, 
                {field:'ruc_persona',title:'RUC',align:'right',width:100}

            ]],
            onSelect:function(rowData){
            var row =$('#cmbgridCliente').combogrid('grid').datagrid('getSelected');
               $("#txt_apellidos_fact").val(row.nom_persona+' '+row.ape_persona);
               $("#txt_ruc_fact").val(row.ruc_persona);
               $("#save_id_cliente").val(row.id_persona);
            }
    });
 $('#cmbgridProducto').combogrid({
				panelWidth:800,
				url: 'CONTROLLER/C_Factura.php?opc=6',
				idField:'id_producto',
				textField:'nom_producto',
				mode:'remote',
				fitColumns:true,
				columns:[[
                                    {field:'id_producto',title:'Id',width:20},
                                    {field:'nom_producto',title:'Producto',align:'right',width:150},
                                    {field:'descrip_producto',title:'Descripción',align:'right',width:500}, 
                                    {field:'pvp1_producto',title:'Precio',align:'right',width:60}, 
                                    {field:'stock_producto',title:'Stock',align:'right',width:60}
				]],
                                onSelect:function(rowData){
                                var row =$('#cmbgridProducto').combogrid('grid').datagrid('getSelected');
                                $("#txt_idproducto").val(row.id_producto);
                                $("#txt_nom_producto").val(row.nom_producto);
                                var tot=row.pvp1_producto*1;
                                 $("#txt_precio").val(row.pvp1_producto);
                                 $("#txt_cantidad").val(1);
                                 $("#txt_sub").val(tot);
                                
                                }
			});
     $("#txt_cantidad").keyup(function(){
        var v1= $("#txt_precio").val();
        var v2= $("#txt_cantidad").val();
        var v3=v1*v2;
        $("#txt_sub").val(v3.toFixed(2));
     });
     $("#cmbDescto").change(function(){
         sumatoria();
     });

$('#unirem').combogrid({
            panelWidth:400,
            url: 'division.php',
            idField:'id',
            textField:'nombre',
            mode:'remote',
            fitColumns:true,
            columns:[[
                {field:'nombre',title:'Nombre',width:20}

            ]],
            onSelect:function(rowData){
            var row =$('#cmbgridCliente').combogrid('grid').datagrid('getSelected');
               $("#txt_apellidos_fact").val(row.nom_persona+' '+row.ape_persona);
               $("#txt_ruc_fact").val(row.ruc_persona);
               $("#save_id_cliente").val(row.id_persona);
            }
    });
//validator

var validator_addproducto = $("#frm_AddProducto").validate({ 
        rules: { 
            txt_precio: {
                required: true, 
                number: true
            },
            txt_cantidad: {
                required: true, 
                digits: true
            },
            txt_sub: {
                required: true, 
                number: true
            }
        }, 
        messages: { 
            txt_precio: "Requerido",
            txt_cantidad:"Sólo números",
            txt_sub:"Requerido"
        }, 
        errorPlacement: function(error, element) { 
            if ( element.is(":radio") ) 
                error.appendTo( element.parent().prev() ); 
            else if ( element.is(":checkbox") ) 
                error.appendTo ( element.parent().prev() ); 
            else 
                error.appendTo( element.prev() ); 
        }, 
        submitHandler: function() {        
            Add();

        }, 
        success: function(label) { 
            label.html("&nbsp;").addClass("valid_small"); 
        } 
    });      
    
    
var validator_addFactura = $("#frm_factura").validate({ 
        rules: { 
            txt_apellidos_fact: {
                required: true
            },
            txt_ruc_fact: {
                required: true
            },
            save_obs_fact: {
                required: true, 
               minlength:5
            }
        }, 
        messages: { 
            txt_apellidos_fact: "Requerido",
            txt_ruc_fact:"Requerido",
            save_obs_fact:"Ingrese el concepto de la compra"
        }, 
        errorPlacement: function(error, element) { 
            if ( element.is(":radio") ) 
                error.appendTo( element.parent().prev() ); 
            else if ( element.is(":checkbox") ) 
                error.appendTo ( element.parent().prev() ); 
            else 
                error.appendTo( element.prev() ); 
        }, 
        submitHandler: function() {        
            Factura_Add();
        }, 
        success: function(label) { 
            label.html("&nbsp;").addClass("valid_small"); 
        } 
    });   
    
    
    $("#btn_AddProducto").click(function(){
        $("#frm_AddProducto").submit();

    });
    $("#btn_QuitarProducto").click(function(){
      Delete();
    });
    $("#btn_Factura_New").click(function(){
       vaciarVector();
       $("#frm_factura .form-field").val ("");
    });

    //Nota: Agregar un tiempo adicional, al recibir el return del response.1s es sugerido.
    //Documentación:Nombres que debe tener las cajas de texto para Guardar.
    // save_id_fact  0
    // save_id_empresa  1
    // save_id_cliente  1
    // save_id_vendedor 1
    // save_descto_fact 1
    // save_obs_fact    1
    // iva12_fact       1
    // total_fact       1
    // save_fecemi_fact 0
    // save_estado_fact 0

    function Factura_Add(){
        var frmFactura=$("#frm_factura").serialize(); 
        $.ajax({ 
            type:"POST",
            url:"CONTROLLER/C_Factura.php?opc=1&"+frmFactura,
            data:({Detalle:dat}),
            success:function(response){ 
               $('#dialg_msg').dialog('open');
               $("#msg").text("Los datos se han guardado correctamente.");
            } 
        }); 
    }
    
    $("#btn_Factura_Add").click(function(){
        $("#frm_factura").submit();
    });
    
    $("#btn_Factura_Print").click(function(){
        var fo=getStringParsedToPrint();
        var windowSizeArray = [ "width=200,height=200",
        "width=800,height=600,scrollbars=yes" ];
        var cli= $("#save_id_cliente").val();
        var descu= $("#save_descto_fact").val();
        var iv= $("#iva12_fact").val();
        var to=  $("#total_fact").val();
        var sub=$("#txt_temporal").val();
        var url ="formulario.php";
        var windowName = "popUp";//$(this).attr("name");
        var windowSize = windowSizeArray;
        var param="?&id_cliente="+cli+"&detalle="+fo+"&descu="+descu+"&iva="+iv+"&total="+to+"&subtotal="+sub;
        var win= window.open(url+param, windowName, windowSize);
      
    });

 function getStringParsedToPrint(){
     var lon=dat.length;
     var cade="";
        var aux=0;
        for(var tk=0;tk<lon;tk++){
          cade=cade+dat[tk].id+"|"+dat[tk].cantidad+"-";
        }
        cade=cade.toString().substr(0, cade.length-1);
        return cade;
 }
    //Documentación: Nombres que debe tener las cajas de texto para Actualizar.

    // update_id_fact . 
    // update_id_empresa . 
    // update_id_cliente . 
    // update_id_vendedor . 
    // update_descto_fact . 
    // update_obs_fact . 
    // update_fecemi_fact . 
    // update_estado_fact . 

   

    //Documentación: Nombres que debe tener la caja de texto para Delete.

    // delete_id_fact . 

    $("#btn_Factura_Delete").click(function(){

        //nombre del formulario: frmFactura_Delete 

        var id_fact=$("#delete_id_fact").val();
        var frmFactura="delete_id_fact="+id_fact+"&opc=3"; 
        $.ajax({ 
            type:"POST",
            url:"Controller/C_Factura.php",
            data:frmFactura,
            success:function(response){ 

            } 
        }); 
    });

    
   

});
// JavaScript Document