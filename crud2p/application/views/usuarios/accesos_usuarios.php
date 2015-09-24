


   <script type="text/javascript">
	jQuery(document).ready(function(){
	 jQuery("#add").click(function(){
                var username=jQuery("#username").val();
                var pass=jQuery("#password").val();
                var firstn=jQuery("#first_name").val();
                var lastn=jQuery("#last_name").val();
                var opciones=jQuery('#my-select').val();
				var dept=jQuery('#id_department').val();

                if(username==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque nombre de usuario','error');
                    jQuery("#username").focus();
                    return false;
                }
                if(pass==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque una contraseña','error');
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
                if(opciones==null){
                    Xcrud.show_message('.xcrud-ajax','Seleccione al menos un privilegio','error');
                    return false;
                }
                if(dept==-1){
                    Xcrud.show_message('.xcrud-ajax','Seleccione un departamento','error');
                    return false;
                }
                    
                
                var msg = confirm(String.fromCharCode(191)+"Seguro desea crear este usuario?")
                var datos=jQuery('#tablitadiv :input').serialize();

                
               
  	 jQuery.ajax({url:"../usuarios/adduser",type:'POST',data:{
  	 		Opciones:opciones,
  	 		Datos:datos
  	 	},
  	 	success:function(result){
			
  	 		if(result==2)
				Xcrud.show_message('.xcrud-ajax','Nombre de Usuario Ya Existe!','error')
                        
                        if(result==1){
                                Xcrud.show_message('.xcrud-ajax','Usuario Agregado Correctamente!','success')
                                jQuery('.formuser,#id_department').val('').removeAttr('checked').removeAttr('selected');
                            }
                            

		    }});
                
		return false;
	  });
	

	 jQuery.post('../usuarios/permisos',function(respuesta){
		var res = jQuery.parseJSON(respuesta);
		var appen ='';
		$.each(res,function(i,o){
			appen += '<option value="'+o.id_privilege+'">'+o.name+'</option>';
		});

		$('#my-select').append(appen);

                jQuery('#my-select').multiSelect({
                      selectableHeader: "<div class='custom-header'>Privilegios a Elegir</div>",
                      selectionHeader: "<div class='custom-header'>Privilegios Elegidos</div>",
                });	
	 });
	 jQuery.post('../usuarios/traedept',function(respuesta){
		var res = jQuery.parseJSON(respuesta);
		var appendi='';
		$.each(res,function(i,o){
			appendi += '<option value="'+o.id_dept+'">'+o.name+'</option>';
		});

		jQuery('#id_department').append(appendi);

	 });


});

</script>
<form action="" method="post" id="form1">
<h2>
	Usuarios - Agregar
	<small></small>
	<span class="xcrud-toggle-show xcrud-toggle-up">
			<i class="glyphicon glyphicon-chevron-up"></i>
	</span>
</h2>
<div class="xcrud-top-actions">
    <?php echo $this->render_button('return','list','','btn btn-warning') ?>
    <button class="btn btn-success xcrud-action nuevo" id="add">Crear Usuario</button>
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
								<select id='id_department' class="xcrud-input form-control form-control" data-type="select">
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
