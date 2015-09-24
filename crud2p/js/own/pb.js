var readUrl   =  'index.php/procesos/lee_pb',
    updateUrl = 'index.php/procesos/edita_presu',
	readDet = 'index.php/procesos/getById/',
    delUrl    = 'index.php/tutorial/delete',
    delHref,
    updateHref,
    updateId, 
	dataTable1,
	dataTable;

$.noConflict();
var asInitVals = new Array();
jQuery( document ).ready(function( $ ) {
});

//Function para añadir productos
function facturar(obj,id_r){
		$('#cant_act').val(obj +1);
		var oIdm = $('#cant_act').val();
		jQuery.post('index.php/procesos/getPieza/' + id_r,function(respuesta){
		var res = jQuery.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
		$.each(res, function (key, value) {
 		 var req = value.n_r;
		  var cant = value.cantidad;
		   var des = value.desc;
		    var uni = value.id_p;



var nreq = '<input type="text" size="10" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + req + '" disabled="disabled"/>' ;
var cantidad = '<input type="text" size="10" id="fon_' + oIdm + '" name="canth_' + oIdm + '" value="' + cant + '" onkeyup="suma();Matriz();"/>' ;
var descripcion = '<input type="text" size="15" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + des + '" disabled="disabled"/>' ;
var unidad = '<input type="text" size="15" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + uni + '" disabled="disabled"/>' ;
var preciorm = '<input type="text" class="preci" size="10" id="fon_' + oIdm + '" name="precrm_' + oIdm + '" value="0.00" onkeyup="suma();Matriz();" />' ;
var subtotal = '<input type="text" class="totalp" size="10" id="totalp' + oIdm + '" name="totalp' + oIdm + '" disabled="disabled"/>' ;
var del = '<div align="center" class="field2"><img src="images/delete.png" width="16" height="16" onclick="if(confirm(\'Realmente desea eliminar este repuesto?\')){eliminarFilanuevo(' + oIdm + ');}"/></div>';
		del += '<input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" />';


		var objTr = document.createElement("tr");
		objTr.id = "rowDetalletr_" + oIdm;
		objTr.name = "fila" + oIdm;
		var objTd1 = document.createElement("td");
		objTd1.id = "tdDetalletd1_" + oIdm;	
		objTd1.innerHTML = nreq;
		objTd1.setAttribute("size","10");
		var objTd2 = document.createElement("td");
		objTd2.id = "tdDetalletd2_" + oIdm;	
		objTd2.innerHTML = cantidad;
		objTd2.setAttribute("size","10");
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetalletd3_" + oIdm;	
		objTd3.innerHTML = descripcion;
		objTd3.setAttribute("size","15");
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalletd4_" + oIdm;	
		objTd4.innerHTML = unidad;
		objTd4.setAttribute("size","15");
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalletd6_" + oIdm;	
		objTd6.innerHTML = preciorm;
		objTd6.setAttribute("size","10");
		var objTd7 = document.createElement("td");
		objTd7.id = "tdDetalletd7_" + oIdm;	
		objTd7.innerHTML = subtotal;
		objTd7.setAttribute("size","10");
		var objTd8 = document.createElement("td");
		objTd8.id = "tdDetalletd8_" + oIdm;	
		objTd8.innerHTML = del;

		objTr.appendChild(objTd1);
		objTr.appendChild(objTd2);
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd6);
		objTr.appendChild(objTd7);
		objTr.appendChild(objTd8);


		var objTbody = document.getElementById("tblacti");
		objTbody.appendChild(objTr);
		suma();
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
jQuery('.cuenta').eq(x).val(row.partida); 
Matriz(); // the product's description
}
    });
	});
		Matriz();
		  $( '#updateDialog1' ).dialog( 'close' );
		return false;	//evita que haya un submit por equivocacion.
		});
		 });
	} //Funcion
function eliminarFilanuevo(oIdm){
		var objHijo = document.getElementById('rowDetalletr_' + oIdm);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		suma();
	Matriz();
		return false;
	} 	 //Elimina fila de Nuevo
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
	} //Grid
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
				} //Suma
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
} //Matriz 

function facturar1(obj,id_r){
		$('#cant_act').val(obj +1);
		var oIdm = $('#cant_act').val();
		jQuery.post('index.php/procesos/getPieza/' + id_r,function(respuesta){
		var res = jQuery.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
		$.each(res, function (key, value) {
 		 var req = value.n_r;
		  var cant = value.cantidad;
		   var des = value.desc;
		    var uni = value.id_p;



var nreq = '<input type="text" size="10" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + req + '" disabled="disabled"/>' ;
var cantidad = '<input type="text" size="10" id="fon_' + oIdm + '" name="canth_' + oIdm + '" value="' + cant + '" onkeyup="suma1();Matriz1();"/>' ;
var descripcion = '<input type="text" size="20" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + des + '" disabled="disabled"/>' ;
var unidad = '<input type="text" size="20" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + uni + '" disabled="disabled"/>' ;
var preciorm = '<input type="text" class="preci" size="10" id="fon_' + oIdm + '" name="precrm_' + oIdm + '" value="0.00" onkeyup="suma1();Matriz1();" />' ;
var subtotal = '<input type="text" class="totalp" size="10" id="totalp' + oIdm + '" name="totalp' + oIdm + '" disabled="disabled"/>' ;
var del = '<div align="center" class="field2"><img src="images/delete.png" width="16" height="16" onclick="if(confirm(\'Realmente desea eliminar este repuesto?\')){eliminarFilanuevo1(' + oIdm + ');}"/></div>';
		del += '<input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" />';


		var objTr = document.createElement("tr");
		objTr.id = "rowDetalletr_" + oIdm;
		objTr.name = "fila" + oIdm;
		var objTd1 = document.createElement("td");
		objTd1.id = "tdDetalletd1_" + oIdm;	
		objTd1.innerHTML = nreq;
		var objTd2 = document.createElement("td");
		objTd2.id = "tdDetalletd2_" + oIdm;	
		objTd2.innerHTML = cantidad;
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetalletd3_" + oIdm;	
		objTd3.innerHTML = descripcion;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalletd4_" + oIdm;	
		objTd4.innerHTML = unidad;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalletd6_" + oIdm;	
		objTd6.innerHTML = preciorm;
		var objTd7 = document.createElement("td");
		objTd7.id = "tdDetalletd7_" + oIdm;	
		objTd7.innerHTML = subtotal;
		var objTd8 = document.createElement("td");
		objTd8.id = "tdDetalletd8_" + oIdm;	
		objTd8.innerHTML = del;

		objTr.appendChild(objTd1);
		objTr.appendChild(objTd2);
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd6);
		objTr.appendChild(objTd7);
		objTr.appendChild(objTd8);


		var objTbody = document.getElementById("tbledit");
		objTbody.appendChild(objTr);
		suma1();
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
jQuery('.cuenta').eq(x).val(row.partida); 
Matriz1(); // the product's description
}
    });
	});
		Matriz1();
		  $( '#updateDialog1' ).dialog( 'close' );
		return false;	//evita que haya un submit por equivocacion.
		});
		 });
	} //Funcion1
function eliminarFilanuevo1(oIdm){
		var objHijo = document.getElementById('rowDetalletr_' + oIdm);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		suma();
	Matriz();
		return false;
	} 	  //Elimina fila de Nuevo1
function grid1(){
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
	} //Grid1
function suma1()
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
				}  //Suma1
function Matriz1(){
var textos2 = '';
for (var i=0;i<document.getElementById('tbledit').rows.length;i++){
for (var j=0;j<6;j++){
if (j==5){
textos2 = textos2 + document.getElementById('tbledit').rows[i].cells[j].childNodes[0].value;
}else{
textos2 = textos2 + document.getElementById('tbledit').rows[i].cells[j].childNodes[0].value + '|';
}
}
textos2 = textos2 + ';';
}
document.getElementById("OcultoDatoTablae").value = textos2;
} //Matriz1 

//TERMINAN LAS FUNCIONES
$( function() {
		 $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    readUsers();
    
    $( '#msgDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    });
 $( '#updateDialog' ).dialog({
   autoOpen: false,
	width:1080,
        buttons: {         
            'Cancelar': function() {
                $( this ).dialog( 'close' );
            }
        },
    }); //end update dialog
 $( '#updateDialog1' ).dialog({
   autoOpen: false,
	width:860,
        buttons: {         
            'Cancelar': function() {
                $( this ).dialog( 'close' );
            }
        },
    }); //end update dialog
 //SEGUNDO PROCESO PARA ELIMINAR EL REGISTRO    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Si': function() {
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                $( this ).dialog( 'close' );
                
                	$.ajax({
                    url: delHref,
                    
                    success: function( response ) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });
                        readUsers();
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog
 
  //PRIMER PROCESO PARA ELIMINAR EL REGISTRO   
 $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'http://localhost/Dropbox/crud2/index.php/procesos/getDetPb/' + updateId,
            dataType: 'json',
            success: function( response ) {
			//append new rows
			$( '#tbledit' ).html( '' );
			$( '#agregarTemplate' ).render( response ).appendTo( "#tbledit" );
 			Matriz1();
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                //--- assign id to hidden field ---
                $( '#id' ).val( updateId );
               $( '#tabs' ).tabs( 'select', 2 );
				            }
        });
        return false;
    }); //end update delegate    
	
//CREAR PB  	
 $( '#presupuesto' ).delegate( 'a.nuevo', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = jQuery('#id_r').combogrid('getValue');
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'http://localhost/Dropbox/crud2/index.php/procesos/getById/' + updateId,
            dataType: 'json',
            success: function( response ) {

 
            //clear old rows (if any)
            $( '#aparta tbody' ).html( '' );
			//append new rows
			$( '#apartaTemplate' ).render( response ).appendTo( "#aparta tbody" );
 
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable1 == 'undefined' )
			dataTable1 = $( '#aparta' ).dataTable({
				"bJQueryUI": true,
			});
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                //--- assign id to hidden field ---
                $( '#id' ).val( updateId );
                $( '#updateDialog1' ).dialog( 'open' );
				            }
        });
        return false;
    }); //end update delegate    

//EDITAR PB  	
 $( '#editar' ).delegate( 'a.edita', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = jQuery('#id_re').combogrid('getValue');
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'http://localhost/Dropbox/crud2/index.php/procesos/getById/' + updateId,
            dataType: 'json',
            success: function( response ) {

 
            //clear old rows (if any)
            $( '#aparta tbody' ).html( '' );
			//append new rows
			$( '#editaTemplate' ).render( response ).appendTo( "#aparta tbody" );

            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                //--- assign id to hidden field ---
                $( '#id' ).val( updateId );
                $( '#updateDialog1' ).dialog( 'open' );
				            }
        });
        return false;
    }); //end update delegate    

$( '#editar' ).delegate( '#cancelar', 'click', function() {
	 $( '#ajaxLoadAni' ).fadeOut( 'slow' );
 $( '#tabs' ).tabs( 'select', 0 );
    });    
    // --- Create Record with Validation ---
    $( '#add form' ).validate({    
			rules: {
            OcultoDatoTabla: { required: true },
			id_r	: { required: true }		
        },

        messages: {
            OcultoDatoTabla: { required: "Debe Seleccionar un producto de alguna Requisición" },
			id_r	: { required: "Seleccione una requisición"  }
        },
        submitHandler: function( form ) {
			alert("Prueba");
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'http://localhost/Dropbox/crud2/index.php/procesos/addpb',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'Presupuesto Base Agregado Correctamente' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Guardado' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $(':input','#add')
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
				   //$( '#add form input' ).val( '' );
                   //refresh list of users by reading it
   				   //dataTable.fnAddData([
				   //	response,
				   //$( '#id_d' ).val(),
				   //$( '#id_u' ).val(),
				   //$( '#monto' ).val(),
//'<a class="updateBtn" href="' + updateUrl + '/' + response + '">Editar</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Eliminar</a>'
			//		]);
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
	//don't forget to fadeOut loading animation
    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
            return false;
        }
    });
    
}); //end document ready


function readUsers() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {

            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_pb;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_pb;
            }
 
            //clear old rows (if any)
            $( '#records tbody' ).html( '' );
 
			//append new rows
			$( '#readTemplate' ).render( response ).appendTo( "#records tbody" );
 
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable == 'undefined' )
			dataTable = $( '#records' ).dataTable({"bJQueryUI": true});
 
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers
    //PRIMER PROCESO PARA EDITAR EL REGISTRO
$( '#otro' ).delegate( 'a.updateBtn', 'click', function() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            $( '#updateDialog' ).dialog( 'open' );
			    $.ajax({
        url: readDet,
        dataType: 'json',
        success: function( response ) {
 
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_r;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_r;
            }
 
            //clear old rows (if any)
            $( '#aparta tbody' ).html( '' );
 
			//append new rows
			$( '#apartaTemplate' ).render( response ).appendTo( "#aparta tbody" );
 
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable1 == 'undefined' )
			dataTable1 = $( '#aparta' ).dataTable({"bJQueryUI": true});
 
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
    }); //end update delegate
	
	
     //SEGUNDO PROCESO PARA EDITAR EL REGISTRO
function readDet() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
    $.ajax({
        url: readDet,
        dataType: 'json',
        success: function( response ) {
 
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_r;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_r;
            }
 
            //clear old rows (if any)
            $( '#aparta tbody' ).html( '' );
 
			//append new rows
			$( '#apartaTemplate' ).render( response ).appendTo( "#aparta tbody" );
 
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable1 == 'undefined' )
			dataTable1 = $( '#aparta' ).dataTable({"bJQueryUI": true});
 
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} 