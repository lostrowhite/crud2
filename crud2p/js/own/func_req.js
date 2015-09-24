	jQuery(document).ready(function(){	

  jQuery('#id_r').combogrid({
    panelWidth:700,
    idField:'id_r',
    textField:'id_r',
	url: '../../index.php/procesos/requisiciones_combo',
    fitColumns:true,
	required:true,
 	mode:'remote',
    columns:[[
 {field:'n_r',title:'N°req',width:10},
   {field:'id_p',title:'PR',width:30},
   {field:'unidad',title:'Unidad',width:30},
   {field:'desc',title:'Descripcion',width:30},
   {field:'cantidad',title:'Cantidad',width:30}
    ]],
		  onSelect:function(){
		 var g = jQuery('#id_r').combogrid('grid');	// get datagrid object
		 var r = g.datagrid('getSelected');	// get the selected row
		//Funcion DOM
		var oIdm = $('#cant_act').val();
		var sum = parseInt(oIdm) +1;
		$('#cant_act').val(sum);
		$("#tblacti").append('<tr id="xcrud-row xcrud-row-' + oIdm + '" class="xcrud-row xcrud-row-' + oIdm + '" ><td class="xcrud-current xcrud-num"><input type="text" size="9" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + r.n_r + '" disabled="disabled"/></td><td><input type="text" size="10" id="fon_' + oIdm + '" name="canth_' + oIdm + '" value="' + r.cantidad + '" onkeyup="suma();Matriz();"/></td><td class="xcrud-current xcrud-num"><input type="text" size="17" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + r.desc + '" disabled="disabled"/></td><td class="xcrud-current xcrud-num"><input type="text" size="18" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + r.unidad + '" disabled="disabled"/></td><td><input type="text" class="preci" size="10" id="fon_' + oIdm + '" name="precrm_' + oIdm + '" value="0.00" onkeyup="suma();Matriz();" /></td><td><input type="text" class="totalp" size="10" id="totalp' + oIdm + '" name="totalp' + oIdm + '" disabled="disabled"/></td><td><a class="xcrud-action btn btn-small btn-default btn-danger" title="Remover" href="#" data-primary="1" data-task="remove" onclick="if(confirm(\'Realmente desea eliminar este repuesto?\')){eliminarFilanuevo(' + oIdm + ');}"><i class="glyphicon glyphicon-remove"></i></a><input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" /></td></tr>');
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