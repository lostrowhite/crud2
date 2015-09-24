var readUrl   = 'index.php/procesos/read',
    updateUrl = 'index.php/procesos/edita_presu',
    delUrl    = 'index.php/procesos/delete',
    delHref,
    updateHref,
    updateId,
	dataTable;

$.noConflict();
var asInitVals = new Array();
jQuery( document ).ready(function( $ ) {
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
						var pr = $( 'tr#' + updateId + ' td' )[ 0 ];
                        var unidad = $( 'tr#' + updateId + ' td' )[ 1 ];
                        var partida =  $( 'tr#' + updateId + ' td' )[ 2 ];
						var fondo =   $( 'tr#' + updateId + ' td' )[ 3 ];
						var montos =  $( 'tr#' + updateId + ' td' )[ 4 ];
                        
						var par =  jQuery('.par').combogrid('getValue');
						var fon =  jQuery('.fon').combogrid('getValue');
						var uni =  jQuery('.uni').combogrid('getValue');
						
						$( pr ).html( $( '#epr' ).val() );
                        $( partida ).html(par);
                        $( unidad ).html(uni);
					    $( fondo ).html(fon);
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
            url: 'index.php/procesos/getPar/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
				$( '#epr' ).val( response.id_pr );
				jQuery('.par').combogrid('setValue', response.id_d);
				jQuery('.fon').combogrid('setValue', response.id_f);
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
            partida: { required: true },
            fecha_c: { required: true},
			monto_c: { required: true}
			
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
                url: 'index.php/procesos/addpre',
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
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_p;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_p;
            }
 
            //clear old rows (if any)
            $( '#records tbody' ).html( '' );
 
			//append new rows
			$( '#readTemplate' ).render( response ).appendTo( "#records tbody" );
 			
			var closePrintView = function(e) {
				if(e.which == 27) {
					printViewClosed(); 
				}
			};
				 
			function printViewClosed() {
				dataTable.fnSetColumnVis(5, true);
				$(window).unbind('keyup', closePrintView);
			}
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable == 'undefined' )
			dataTable = $( '#records' ).dataTable({
				"aaSorting": [[ 0, "desc" ]],
				"bJQueryUI": true,
				"sDom": 'T<"fg-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"fg-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"ip>',
		"oTableTools": {
			"sSwfPath": "TableTools/swf/copy_csv_xls_pdf.swf",
			"aButtons": [
            {
                "sExtends": "copy",
				"sButtonText": "Copiar",
                "mColumns": [1, 2, 3, 4],
				"oSelectorOpts": {
                    page: 'current'
                }
            },
            {
                "sExtends": "xls",
                "mColumns": [1, 2, 3, 4],
				"oSelectorOpts": {
                    page: 'current'
                }
            },
            {
                "sExtends": "pdf",
                "mColumns": [1, 2, 3, 4],
				"oSelectorOpts": {
                    page: 'current'
                },
                    "bFooter": false
            },
            {
                "sExtends": "print",
				"sButtonText": "Imprimir",
                "mColumns": [1, 2, 3, 4],
				"sMessage": 'Click print or cancel <button>Print</button>',
                "fnClick": function (nButton, oConfig, oFlash) {
							dataTable.fnSetColumnVis(5, false);
							$('div.dataTables_scrollHead').show();
							$(window).keyup(function(){
								  dataTable.fnSetColumnVis(5, true);
							});
						}
            },
				]
		},
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			/*
			 * Calculate the total market share for all browsers in this table (ie inc. outside
			 * the pagination)
			 */
			var iTotalMarket = 0;
			for ( var i=0 ; i<aaData.length ; i++ )
			{
				iTotalMarket += aaData[i][4]*1;
			}
			
			/* Calculate the market share for browsers on this page */
			var iPageMarket = 0;
			for ( var i=iStart ; i<iEnd ; i++ )
			{
				iPageMarket += aaData[ aiDisplay[i] ][4]*1;
			}
			
			/* Modify the footer row to match what we want */
			var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = iPageMarket.toFixed(2);
			
		}			
				});
 			$("tfoot input").keyup( function () {
        /* Filter on the column (the index) of this element */
        dataTable.fnFilter( this.value, $("tfoot input").index(this) );
    } );
	$("tfoot input").each( function (i) {
        asInitVals[i] = this.value;
    } );
     
    $("tfoot input").focus( function () {
        if ( this.className == "search_init" )
        {
            this.className = "";
            this.value = "";
        }
    } );
     
    $("tfoot input").blur( function (i) {
        if ( this.value == "" )
        {
            this.className = "search_init";
            this.value = asInitVals[$("tfoot input").index(this)];
        }
    } );
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
	
} // end readUsers

function read11() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
 
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_p;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_p;
            }
 
            //clear old rows (if any)
            $( '#records tbody' ).html( '' );
 
			//append new rows
			$( '#readTemplate' ).render( response ).appendTo( "#records tbody" );
 
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable == 'undefined' )
			dataTable = $( '#records' ).dataTable({
				"aaSorting": [[ 0, "desc" ]],
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"sDom": 'T<"fg-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"fg-toolbar 		                         ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"ip>',
		"oTableTools": {
			"sSwfPath": "TableTools/swf/copy_csv_xls_pdf.swf",
			"aButtons": [
            {
                "sExtends": "copy",
				"sButtonText": "Copiar",
                "mColumns": [1, 2, 3, 4],
				"bFooter": true
            },
            {
                "sExtends": "xls",
                "mColumns": [1, 2, 3, 4],
				"bFooter": true
            },
            {
                "sExtends": "pdf",
                "mColumns": [1, 2, 3, 4],
				"bFooter": true
            },
            {
                "sExtends": "print",
				"sButtonText": "Imprimir",
                "mColumns": [1, 2, 3, 4],
				 "sMessage": "Generated by DataTables"
            },
				]
		},
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			/*
			 * Calculate the total market share for all browsers in this table (ie inc. outside
			 * the pagination)
			 */
			var iTotalMarket = 0;
			for ( var i=0 ; i<aaData.length ; i++ )
			{
				iTotalMarket += aaData[i][4]*1;
			}
			
			/* Calculate the market share for browsers on this page */
			var iPageMarket = 0;
			for ( var i=iStart ; i<iEnd ; i++ )
			{
				iPageMarket += aaData[ aiDisplay[i] ][4]*1;
			}
			
			/* Modify the footer row to match what we want */
			var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = iPageMarket.toFixed(2) +' De ('+ iTotalMarket.toFixed(2) +')';
		}			
				});
 
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers

function read12() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
 
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
 
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id_p;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id_p;
            }
 
            //clear old rows (if any)
            $( '#records tbody' ).html( '' );
 
			//append new rows
			$( '#readTemplate' ).render( response ).appendTo( "#records tbody" );
 
			//apply dataTable to #records table and save its object in dataTable variable
			if( typeof dataTable == 'undefined' )
			dataTable = $( '#records' ).dataTable({
				"aaSorting": [[ 0, "desc" ]],
				"bJQueryUI": true,
				"sDom": 'T<"fg-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"fg-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"ip>',
		"oTableTools": {
			"sSwfPath": "TableTools/swf/copy_csv_xls_pdf.swf",
			"aButtons": [
            {
                "sExtends": "copy",
				"sButtonText": "Copiar",
                "mColumns": [1, 2, 3, 4]
            },
            {
                "sExtends": "xls",
                "mColumns": [1, 2, 3, 4]
            },
            {
                "sExtends": "pdf",
                "mColumns": [1, 2, 3, 4],
            },
            {
                "sExtends": "print",
				"sButtonText": "Imprimir",
                "mColumns": [1, 2, 3, 4],
				 "sMessage": "Generated by DataTables"
            },
				]
		},
			"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			/*
			 * Calculate the total market share for all browsers in this table (ie inc. outside
			 * the pagination)
			 */
			var iTotalMarket = 0;
			for ( var i=0 ; i<aaData.length ; i++ )
			{
				iTotalMarket += aaData[i][4]*1;
			}
			
			/* Calculate the market share for browsers on this page */
			var iPageMarket = 0;
			for ( var i=iStart ; i<iEnd ; i++ )
			{
				iPageMarket += aaData[ aiDisplay[i] ][4]*1;
			}
			
			/* Modify the footer row to match what we want */
			var nCells = nRow.getElementsByTagName('th');
			nCells[1].innerHTML = iPageMarket.toFixed(2) +' De ('+ iTotalMarket.toFixed(2) +')';
		}			
				});
 
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers