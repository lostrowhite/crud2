   <script type="text/javascript">
	jQuery(document).ready(function(){	
	 jQuery("#add").click(function(){
		 var msg = confirm(String.fromCharCode(191)+"Seguro desea almacenar este presupuesto?")
	  	var data=jQuery("#OcultoDatoTabla").val();
		if ( msg ) {
  	 jQuery.ajax({url:"../index.php/procesos/addpb",type:'POST',data:{OcultoDatoTabla:data},success:function(result){
		   alert('Listo');
		    }});
		}
		return false;
	  });
	jQuery('#beneficiario').combogrid({
    panelWidth:700,
    url: '../index.php/procesos/beneficiario',
    idField:'nombre',
    textField:'nombre',
    mode:'remote',
    fitColumns:true,
	required:true,
    columns:[[
 {field:'rif',title:'RIF',width:35},
 {field:'nombre',title:'Nombre',width:60},
 {field:'direccion',title:'Dirección',width:70},
 {field:'telefono',title:'Telefono',width:40},
 {field:'correo',title:'Correo',width:40}
    ]],
  onSelect:function(){
		 var g = jQuery('#beneficiario').combogrid('grid');	// get datagrid object
		 var r = g.datagrid('getSelected');	// get the selected row
         jQuery('#rif').val(r.rif);
		  jQuery('#direccion').val(r.direccion);
		  jQuery('#tlf').val(r.telefono);
    }
    });
  jQuery('#id_p').combogrid({
    panelWidth:700,
    idField:'id_p',
    textField:'id_p',
	url: '../index.php/procesos/presupuestos_base',
    fitColumns:true,
	required:true,
 	mode:'remote',
    columns:[[
 {field:'id_pb',title:'N°Pb',width:10},
   {field:'cantidad',title:'Cantidad',width:30},
   {field:'descripcion',title:'Descripcion',width:60},
   {field:'costo',title:'Precio',width:30}
    ]],
		  onSelect:function(){
		 var g = jQuery('#id_p').combogrid('grid');	// get datagrid object
		 var r = g.datagrid('getSelected');	// get the selected row
		//Funcion DOM
		var oIdm = $('#cant_act').val();
		var sum = parseInt(oIdm) +1;
		$('#cant_act').val(sum);
$("#tblacti").append
('<tr id="xcrud-row xcrud-row-' + oIdm + '" class="xcrud-row xcrud-row-' + oIdm + '" ><td class="xcrud-current xcrud-num"><input type="text" size="12" id="des_' + oIdm + '" name="des_' + oIdm + '" value="' + r.descripcion + '" disabled="disabled"/></td><td><input type="text" size="5" id="canth_' + oIdm + '" name="canth_' + oIdm + '" value="' + r.cantidad + '" onkeyup="suma();Matriz();"/></td><td class="xcrud-current xcrud-num"><input type="text" size="10" id="uni_' + oIdm + '" name="uni_' + oIdm + '" value="' + r.unidad + '" disabled="disabled"/></td><td class="xcrud-current xcrud-num"><input type="text" size="10" id="cta_' + oIdm + '" name="cta_' + oIdm + '" value="" /></td><td class="xcrud-current xcrud-num"><input type="text" size="4" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="" class="fondo" disabled="disabled"/></td><td class="xcrud-current xcrud-num "><input class="preci" type="text" size="10" id="cost_' + oIdm + '"  name="cost_' + oIdm + '" value="' + r.costo + '" disabled="disabled"/></td><td><input type="text" size="10" id="subtotal_' + oIdm + '" name="subtotal_' + oIdm + '" value="" class="totalp" /></td><td><input type="text" size="10" id="dispon_' + oIdm + '" name="dispon_' + oIdm + '" class="dispon" disabled="disabled"/></td><td><a class="xcrud-action btn btn-small btn-default btn-danger" title="Remover" href="#" data-primary="1" data-task="remove" onclick="if(confirm(\'Realmente desea eliminar este registro?\')){eliminarFilanuevo(' + oIdm + ');}"><i class="glyphicon glyphicon-remove"></i></a><input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" /></td></tr>');
    suma();
	Matriz();
jQuery('[name^=cta_]').each(function(x){
	jQuery('[name^=cta_]').eq(x).combogrid({
    panelWidth:700,
    url: '../index.php/procesos/partidas_combo',
    idField:'partida',
    textField:'partida',
    mode:'remote',
    fitColumns:true,
	required:true,
    columns:[[
 {field:'id_d',title:'ID_D',width:10},
 	{field:'fondo',title:'Fondo',width:10},
   {field:'partida',title:'Partida',width:40},
    {field:'nombre',title:'Nombre',width:100}

    ]],
onSelect: function(index,row){
jQuery('.cuenta').eq(x).val(row.partida); 
jQuery('.fondo').eq(x).val(row.fondo); 
jQuery('.dispon').eq(x).val(row.fondo); 
Matriz(); // the product's description
}
    });
	});
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
for (var j=0;j<6;j++){
if (j==5){
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value;
}else{
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value + '|';
}
}
textos2 = textos2 + ';';
}
document.getElementById("OcultoDatoTabla").value = textos2;
} 
function grid(){
	jQuery('[name^=cta_]').each(function(x){
	jQuery('[name^=cta_]').eq(x).combogrid({
    panelWidth:700,
    url: 'index.php/procesos/partidas_combo',
    idField:'partida',
    textField:'partida',
    mode:'remote',
    fitColumns:true,
	required:true,
    columns:[[
 {field:'id_d',title:'ID_D',width:60},
   {field:'partida',title:'Partida',width:40},
    {field:'nombre',title:'Nombre',width:100}
    ]],
onSelect: function(index,row){
jQuery('.cuenta').eq(x).val(row.partida);  // the product's description
}
    });
	});
	}
function guarda(){
	alert("Prueba");
	
	}
</script>
<form action="" method="post" id="form1">
<div class="xcrud-top-actions">
    <?php echo $this->render_button('return','list','','btn btn-warning') ?>
    <button class="btn btn-success xcrud-action nuevo" id="add">Crear Orden</button>
</div>
        <p align="center">&nbsp;</p>
        <table id="presupuesto" class="table table-striped" width="100%" border="0">
          <tr>
            <td class="details-label">Beneficiario: </td>
            <td><input name="beneficiario" type="text" id="beneficiario" value="" size="30" /></td>
            <td class="details-label">RIF:</td>
            <td><input name="rif" type="text" class="xcrud-input form-control" id="rif" value=""size="16" readonly="readonly" /></td>
          </tr>
          <tr>
            <td class="details-label">Dirección: </td>
            <td><input class="xcrud-input form-control" name="direccion" type="text" id="direccion" value="" size="60" readonly="readonly" /></td>
            <td class="details-label">Tlf:</td>
            <td><input name="tlf" type="text" class="xcrud-input form-control" id="tlf" value=""size="16" readonly="readonly" /></td>
          </tr>
          <tr>
            <td width="19%" class="details-label">Orden de Compra N°:            </td>
            <td width="21%"><input class="xcrud-input form-control" name="n_pb" type="text" id="n_pb" value="" size="10" readonly="readonly" /></td>
            <td width="18%" class="details-label">Fecha:</td>
            <td width="42%"><input name="fecha" type="text" class="xcrud-input form-control" id="fecha" value="<?php echo date('d-m-Y'); ?>"size="16" readonly="readonly" /></td>
          </tr>
          <tr>
            <td colspan="4" class="details-label">Seleccione un producto para incluir en la Orden de Compra: <br />              
              <input type="text" id="id_p" name="id_p" size="80" />
           </td>
          </tr>
          <tr>
            <td colspan="4"><input name="OcultoDatoTabla" id="OcultoDatoTabla" type="hidden" ></td>
          </tr>
        </table> 
        <div class="xcrud-list-container">
      <table class="xcrud-list table table-striped table-hover table-bordered" width="100%" border="1" cellspacing="0" id="tablita">
        <thead>
        <tr class="xcrud-th">
          <th class="xcrud-column xcrud-action">Descripcion
            <input type="hidden" id="num_act" name="num_act" value="0" />
            <input type="hidden" id="cant_act" name="cant_act" value="0" /></th>
          <th class="xcrud-column xcrud-action" width="69">Cantidad<br /></th>
          <th class="xcrud-column xcrud-action" width="110">Unidad</th>
          <th class="xcrud-column xcrud-action" width="171">Cuenta Gasto<br /></th>
          <th class="xcrud-column xcrud-action" width="102">Fondo</th>
          <th class="xcrud-column xcrud-action" width="136">Precio P.R.M.C.I</th>
          <th class="xcrud-column xcrud-action" width="86">Sub-Total<br /></th>
          <th class="xcrud-column xcrud-action" width="141">Disponibilidad</th>
          <th class="xcrud-column xcrud-action" width="72"><br /></th>
          </tr>
        <thead>
  </table>
  </div>
  <div class="xcrud-list-container">
  <table class="xcrud-list table table-striped table-hover table-bordered" border="0" id="tblacti" width="800" align="left" >
  <tbody>
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