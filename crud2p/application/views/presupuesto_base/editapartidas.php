<div class="xcrud">
    <div class="xcrud-container">
        <div class="xcrud-ajax">
        </div>
        <div class="xcrud-overlay"></div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="../../xcrud/themes/js/ea/themes/bootstrap/easyui.css">
   <script type="text/javascript">
	jQuery(document).ready(function(){	
	 jQuery("#add").click(function(){
		 var msg = confirm(String.fromCharCode(191)+"Seguro desea almacenar este presupuesto?")
	  	var data=jQuery("#OcultoDatoTabla").val();
		var n_pb=jQuery("#n_pb").val();
		var tfactura=jQuery("#tfactura").val();
		if ( msg ) {
  	 jQuery.ajax({url:"../procesos/addpb",type:'POST',data:{OcultoDatoTabla:data,n_pb:n_pb,tfactura:tfactura},success:function(result){
		 Xcrud.show_message('.xcrud-ajax','Presupuesto Agregado Correctamente!','success')
		    jQuery(':input','#add')
  					.not(':button, :submit, :reset')
					.not('#n_pb')
					.not('#fecha')
					.val('')
  					.removeAttr('checked')
  					.removeAttr('selected');
					var myNode = document.getElementById("tblacti");
					while (myNode.firstChild) {
   					 myNode.removeChild(myNode.firstChild);
					}
		    }});
		}
		return false;
	  });
	 jQuery.post('../procesos/getbudgetbase',function(respuesta){
		var res = jQuery.parseJSON(respuesta);
		jQuery('#n_pb').val(res.id_base_budget);
	 });
  jQuery('#id_r').combogrid({
    panelWidth:900,
    idField:'id_requisition',
    textField:'id_requisition',
	url: '../procesos/traeprueba',
    fitColumns:true,
	required:true,
 	mode:'remote',
    columns:[[
 {field:'id_requisition',title:'N°req',width:15},
{field:'name_unit',title:'Unidad',width:30},
{field:'name_product',title:'Detalle',width:30},
{field:'quantity',title:'Cantidad',width:30}
    ]],
		  onSelect:function(){
		 var g = jQuery('#id_r').combogrid('grid');	// get datagrid object
		 var r = g.datagrid('getSelected');	// get the selected row
		//Funcion DOM
		var oIdm = $('#cant_act').val();
		var sum = parseInt(oIdm) +1;
		$('#cant_act').val(sum);
		$("#tblacti").append('<tr id="xcrud-row xcrud-row-' + oIdm + '" class="xcrud-row xcrud-row-' + oIdm + '" ><td class="xcrud-current xcrud-num"><input type="hidden" value="' + r.id_requisition + '" disabled="disabled"/>' + r.id_requisition + '</td><td ><input type="text" name="canth' + oIdm + '" size="5" value="' + r.quantity + '" onkeyup="suma();Matriz();"/>' + r.name_unit + '</td><td><input type="text" class="preci" size="10" id="fon_' + oIdm + '" name="precrm_' + oIdm + '" value="0.00" onkeyup="suma();Matriz();" /></td><td class="xcrud-current xcrud-num"><input type="hidden" value="' + r.id_product + '" disabled="disabled"/>' + r.name_product + '</td><td class="xcrud-current xcrud-num">' + r.code_dept + '</td><td><input type="text" class="totalp" size="10" id="totalp' + oIdm + '" name="totalp' + oIdm + '" disabled="disabled"/></td><td><a class="xcrud-action btn btn-small btn-default btn-danger" title="Remover" href="#" data-primary="1" data-task="remove" onclick="if(confirm(\'Realmente desea eliminar este registro?\')){eliminarFilanuevo(' + oIdm + ');}"><i class="glyphicon glyphicon-remove"></i></a><input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" /></td></tr>');
    suma();
	Matriz();
	}
    });
	  });
function eliminarFilanuevo(oIdm){
		var objHijo = document.getElementById('xcrud-row xcrud-row-' + oIdm );
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		suma();
		Matriz();
		return false;
	} 	 //Elimina fila de Nuevo

function suma()
				{
					
					var sum=0, ivap = 12 /100;
					$('[name^=canth]').each(function(x){
					sum += $('[name^=canth]').eq(x).val() * $('.preci').eq(x).val();
				$(".totalp").eq(x).val(($('[name^=canth]').eq(x).val() * $('.preci').eq(x).val()).toFixed(2));
					});
					iva = (sum) * (ivap);
					$("#tfacturasin").val((sum).toFixed(2));
					$("#ivaf").val((iva).toFixed(2));
					$("#tfactura").val((sum + iva).toFixed(2));
				}

function Matriz(){
var textos2 = '';
for (var i=0;i<document.getElementById('tblacti').rows.length;i++){
for (var j=0;j<3;j++){
if (j==2){
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value;
}else{
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value + '|';
}
}
textos2 = textos2 + ';';
}
document.getElementById("OcultoDatoTabla").value = textos2;
}
function guarda(){
	alert("Prueba");
	
	}
</script>
<form action="" method="post" id="form1">
<div class="xcrud-top-actions">
    <?php echo $this->render_button('return','list','','btn btn-warning') ?>
    <button class="btn btn-success xcrud-action nuevo" id="add">Crear Pb</button>
</div>
        <p align="center">&nbsp;</p>
        <table id="presupuesto" class="table table-striped" width="100%" border="0">
          <tr>
            <td width="44%" class="details-label"><?php  echo $this->primary_val; ?>Presupuesto Base N°:            </td>
           <td width="14%">
         <input type="text" class="xcrud-input form-control" name="n_pb" value="" id="n_pb" readonly='readonly' />
      </td>
            <td width="9%" class="details-label">Fecha:</td>
            <td width="43%"><input name="fecha" type="text" class="xcrud-input form-control" id="fecha" value="<?php echo date('d-m-Y'); ?>"size="16" readonly="readonly" /></td>
          </tr>
          <tr>
            <td colspan="4" class="details-label">Seleccione un producto para incluir en el PB: <br />              
              <input type="text"  id="id_r" name="id_r" size="80" />
           </td>
          </tr>
          <tr>
            <td colspan="4"><input name="OcultoDatoTabla" id="OcultoDatoTabla" type="text" ></td>
          </tr>
        </table> 
        <div class="xcrud-list-container">
      <table class="xcrud-list table table-striped table-hover table-bordered" width="100%" border="1" cellspacing="0">
        <thead>
        <tr class="xcrud-th">
          <th class="xcrud-column xcrud-action" width="89">N°Req    
            <input type="hidden" id="num_act" name="num_act" value="0" />
            <input type="hidden" id="cant_act" name="cant_act" value="0" /></th>
          <th class="xcrud-column xcrud-action" width="122">Cantidad<br /></th>
          <th class="xcrud-column xcrud-action" width="115">Precio P.R.M.C.I</th>
          <th class="xcrud-column xcrud-action" width="154">Descripción<br /></th>
          <th class="xcrud-column xcrud-action" width="131">Unidad Ejecutora<br /></th>
          <th class="xcrud-column xcrud-action" width="87">Sub-Total<br /></th>
          <th class="xcrud-column xcrud-action" width="72"><br /></th>
          </tr>
        </thead>
         <tbody id="tblacti">
           <?php echo $this->result_list; ?>
  </tbody>
  </table>
  </div>
  <table class="table table-striped" width="100%" border="0" cellspacing="0" id="tablita">
    <tr>
    <!-- Aqui va el total de la factura -->
     <td width="86%" class="details-label" align="right"><strong>Total Sin IVA 
       :</strong></td>
       <td width="14%">
         <input type="text" class="xcrud-input form-control" name="tfacturasin" id="tfacturasin" readonly='readonly' />
      </td>
      </tr>
      <tr>
      <td class="details-label" align="right" >
<strong>IVA: 12%</strong>: </td>

<td><input type="text" class="xcrud-input form-control" name="ivaf" id="ivaf" readonly='readonly' /></td>
</tr>
<tr>
<td class="details-label" align="right">
      <strong>TOTAL:</strong></td>
      <td>
       <input type="text" class="xcrud-input form-control" readonly='readonly' name="tfactura" id="tfactura" />
      </td>
</tr> 
    </table>       
</form>  