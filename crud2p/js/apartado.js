var readUrl   = 'index.php/tutorial/read',
    updateUrl = 'index.php/tutorial/edita_presu',
    delUrl    = 'index.php/tutorial/delete',
    delHref,
    updateHref,
    updateId,
	dataTable;

$.noConflict();
jQuery( document ).ready(function( $ ) {
// Code that uses jQuery's $ can follow here.
});
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
     //SEGUNDO PROCESO PARA EDITAR EL REGISTRO
    $( '#updateDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Editar': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: updateHref,
                    type: 'POST',
                    data: $( '#updateDialog form' ).serialize(),
                    
                    success: function( response ) {
                        
                        $( '#msgDialog > p' ).html( 'Partida Editada Correctamente' );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Procesado' ).dialog( 'open' );
                        
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        //--- update row in table with new values ---
                        var partida = $( 'tr#' + updateId + ' td' )[ 0 ];
                        var unidad = $( 'tr#' + updateId + ' td' )[ 1 ];
						var montos = $( 'tr#' + updateId + ' td' )[ 2 ];
                        
						var par =  jQuery('.par').combogrid('getValue');
						var uni =  jQuery('.uni').combogrid('getValue');
						
                        $( partida ).html(par);
                        $( unidad ).html(uni);
						$( montos ).html( $( '#montoe' ).val() );
                        
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancelar': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
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
    //PRIMER PROCESO PARA EDITAR EL REGISTRO
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/tutorial/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
				jQuery('.par').combogrid('setValue', response.id_d);
                jQuery('.uni').combogrid('setValue', response.id_u);
				$( '#montoe' ).val( response.monto );
				
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#id' ).val( updateId );
                $( '#updateDialog' ).dialog( 'open' );
				            }
        });
        
        return false;
    }); //end update delegate
	
	
  //PRIMER PROCESO PARA ELIMINAR EL REGISTRO   
    $( '#records' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
        
        $( '#delConfDialog' ).dialog( 'open' );
        
        return false;
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#add form' ).validate({
        rules: {
            id_d: { required: true },
            id_u: { required: true},
			monto: { required: true}
			
        },
        
        /*
        //uncomment this block of code if you want to display custom messages
        messages: {
            cName: { required: "Name is required." },
            cEmail: {
                required: "Email is required.",
                email: "Please enter valid email address."
            }
        },
        */
        
        submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/tutorial/addpre',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'Partida Agregada Correctamente' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Procesado' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $(':input','#add')
  					.not(':button, :submit, :reset, :hidden')
  					.val('')
  					.removeAttr('checked')
  					.removeAttr('selected');
					  //$( '#add form input' ).val( '' );
                    
                   //refresh list of users by reading it
    			readUsers();
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
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
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