
   <script type="text/javascript">
	jQuery(document).ready(function(){
  	 jQuery.ajax({url:"http://rncenlinea.snc.gob.ve/reportes/buscar?p=1&search=RIF",type:'POST',data:{
  	 		texto:'J295437870',
  	 		authenticity_token:'521836462d576069cd18d6e7f94884e987771340'
  	 	},
  	 	success:function(result){
  	 		alert(result);
                            

		    }});


         var id=jQuery("input[name=primary]").val();
         var appen ='';
	 jQuery("#add").click(function(){
                var username=jQuery("#username").val();
                var pass=jQuery("#password").val();
                var firstn=jQuery("#first_name").val();
                var lastn=jQuery("#last_name").val();
                var opciones=jQuery('#my-select').val();
                var opcionesdept=jQuery('#id_department').val();
                var correo=jQuery('#email').val();
                
                if(username==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque nombre de usuario','error');
                    jQuery("#username").focus();
                    return false;
                }
                if(pass==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque nuevamente la contraseña','error');
                    jQuery("#password").focus();
                    return false;
                }
                if(firstn==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque Nombre','error');
                    jQuery("#first_name").focus();
                    return false;
                }
                if(lastn==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque Apellido','error');
                    jQuery("#last_name").focus();
                    return false;
                }
                if(correo==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque Correo','error');
                    jQuery("#email").focus();
                    return false;
                }
                if(opciones==null){
                    Xcrud.show_message('.xcrud-ajax','Seleccione al menos un privilegio','error');
                    return false;
                }
                if(opcionesdept==-1){
                    Xcrud.show_message('.xcrud-ajax','Seleccione al menos un departamento','error');
                    return false;
                }
            
         var datos=jQuery('#tablitadiv :input').serialize();
         
  	 jQuery.ajax({url:"usuarios/edituser",type:'POST',encoding:"UTF-8",data:{
  	 		Opciones:opciones,
  	 		Datos:datos,
                        Id:id
  	 	},
  	 	success:function(result){
  	 		if(result==2)
				Xcrud.show_message('.xcrud-ajax','Nombre de Usuario Ya Existe!','error');
            if(result==1){
            	$('#form1').css('opacity', '0.5');
              	// Enviar por correo la contraseña al usuario
	            $.post('session/password_change', { email:correo.toLowerCase(),passw:pass.toLowerCase() }, 
            	function(data){
            		if(data.indexOf('sent') != -1)
                  		Xcrud.show_message('.xcrud-ajax','Usuario Editado Correctamente! Su contraseña se ha enviado a su correo.','success');
                    else
                  		Xcrud.show_message('.xcrud-ajax','Usuario Editado Correctamente! No se pudo enviar la contraseña.','success');
            		$('#form1').css('opacity', '1');
            	});
            }
        }});
                
		return false;
	  });
         
	 jQuery.post('usuarios/permisosEdit',{ id: id },function(respuesta){
		var res = jQuery.parseJSON(respuesta);
		
		$.each(res,function(i,o){
			appen += '<option selected=selected value="'+o.id_privilege+'">'+o.name+'</option>';
		});

		
                jQuery.post('usuarios/permisosEditSelect',{ id: id },function(respuesta){
                       var res = jQuery.parseJSON(respuesta);
                       
                       $.each(res,function(i,o){
                           
                               appen += '<option value="'+o.id_privilege+'">'+o.name+'</option>';
                       });
                        $('#my-select').append(appen);
                        
                        jQuery('#my-select').multiSelect({
                        selectableHeader: "<div class='custom-header'>Privilegios a Elegir</div>",
                        selectionHeader: "<div class='custom-header'>Privilegios Elegidos</div>",
                          });
                });
                //alert(appen);
                
        });
	 jQuery.post('usuarios/traedept',function(respuesta){
		var res = jQuery.parseJSON(respuesta);
		var appendi='';
		$.each(res,function(i,o){
			appendi += '<option value="'+o.id_dept+'">'+o.name_dept+'</option>';
		});

		jQuery('#id_department').append(appendi);

		
	 });
	 jQuery.post('usuarios/obtenerDatos',{ id: id },function(respuesta){
		var res = jQuery.parseJSON(respuesta);
		var appen ='';
		$.each(res,function(i,o){
                        if(i!='password'){
                            jQuery("#"+i).val(o);}
                        if(i=='id_department'){
							var ale ='#id_department option[value='+o+']';
							
                            jQuery('#id_department option[value="'+o+'"]').attr('selected', 'selected');
							
			}
		});


	
	 });
 
            



});

</script>
<form action="" method="post" id="form1">
<h2>
	Usuarios - Editar
	<small></small>
	<span class="xcrud-toggle-show xcrud-toggle-up">
			<i class="glyphicon glyphicon-chevron-up"></i>
	</span>
</h2>
<div class="xcrud-top-actions">
    <?php echo $this->render_button('return','list','','btn btn-warning') ?>
    <button class="btn btn-success xcrud-action nuevo" id="add">Editar</button>
</div>
	<div class='xcrud-view'>
		<div class="xcrud-tabs xcrud-tabs-ui ui-tabs ui-widget ui-widget-content ui-corner-all">
			<ul class="nav nav-tabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
				<li class="active ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabid_24ag0l" aria-labelledby="ui-id-1" aria-selected="true">
				<a id="ui-id-1" class="active ui-tabs-anchor" href="#tabid_aemq41" role="presentation" tabindex="-1">Usuarios</a>
				</li>
			</ul>
			<div id='tablitadiv' class='tab-content'>
				<table class="table table-striped" width="30%" border="0" cellspacing="0" id="tablita">
					<th colspan='2' align='center'>
							Crear Nuevo Usuario

					</th>

						<tr>
							<td class='details-label'>
								Nombre de Usuario:
							</td>
							<td>
								 <input type='text' class="xcrud-input form-control" id='username' name='username'>
							</td>
						</tr>
						<tr>
							<td class='details-label'>
								Clave:
							</td>
							<td>
								 <input type='password' class="xcrud-input form-control" id='password' name='password'>
							</td>
						</tr>
						<tr>
							<td class='details-label'>
								Nombre: 
							</td>
							<td>
								<input type='text' class="xcrud-input form-control" id='first_name' name='first_name'>
							</td>
						</tr>
						<tr>
							<td class='details-label'>
								Apellido: 
							</td>
							<td>
								<input type='test' class="xcrud-input form-control" id='last_name' name='last_name'>
							</td>
						</tr>
						<tr>
							<td class='details-label'>
								Correo: 
							</td>
							<td>
								<input type='text' class="xcrud-input form-control" id='email' name='email'>
							</td>
						</tr>
						<tr>
							<td class='details-label'>
								Departamento:
							</td>
							<td>
								<select id='id_department' class="xcrud-input form-control form-control" data-type="select" name='id_department'>
									<option value='-1' selected='selected' >Seleccione un departamento</option>
								</select>
							</td>
						</tr>
						<tr>
							<th  class='details-label' align='center' colspan='2'>
								Privilegios de Acceso
							</th>
						</tr>
						<tr>
							<td align='center' colspan='2'>
								<select class='formuser' multiple="multiple" id="my-select" name="my-select[]">
								</select>
							</td>

						</tr>
				</table>

			</div>
		</div>
	</div>

    
</form>  
