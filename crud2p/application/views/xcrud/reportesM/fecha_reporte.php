
   <script type="text/javascript">
	jQuery(document).ready(function(){
		var report = $("input[name=primary]").val();
		var pathname = window.location.pathname; // Returns path only
		var url      = window.location.href;
		
		var n = pathname.replace('/inicio',"");
	
		$('#form1').attr('action', n+'/reportesm/generarReporte');
		$('#tipo_reporte').attr('value', report);
	 jQuery("#add").click(function(){
				
                var fechai=jQuery("#fechai").val();
                var fechaif=jQuery("#fechaf").val();
                if(fechai==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque fecha de inicio','error');
                    jQuery("#fechai").focus();
                    return false;
                }
                if(fechaf==''){
                    Xcrud.show_message('.xcrud-ajax','Coloque fecha final','error');
                    jQuery("#fechaf").focus();
                    return false;
                }
         
         var datos=jQuery('#tablitadiv :input').serialize();
  	 jQuery.ajax({url:"reportesm/generarReporte",type:'POST',encoding:"UTF-8",data:{
  	 		Report:report,
  	 		Datos:datos
  	 	},
  	 	success:function(result){
			
  	 		if(result==2)
				Xcrud.show_message('.xcrud-ajax','Nombre de Usuario Ya Existe!','error')
                        
                        if(result==1){
                                Xcrud.show_message('.xcrud-ajax','Usuario Editado Correctamente!','success')
                                
                            }
                            

		    }});
                
		return false;
	  });
});

</script>
<h2>
	CARGAR TXT
	<small></small>
	<span class="xcrud-toggle-show xcrud-toggle-up">
			<i class="glyphicon glyphicon-chevron-up"></i>
	</span>
</h2>
<div class="xcrud-top-actions">

</div>
	<div class='xcrud-view'>
		<div class="xcrud-tabs xcrud-tabs-ui ui-tabs ui-widget ui-widget-content ui-corner-all">
			<ul class="nav nav-tabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
				<li class="active ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabid_24ag0l" aria-labelledby="ui-id-1" aria-selected="true">
				<a id="ui-id-1" class="active ui-tabs-anchor" href="#tabid_aemq41" role="presentation" tabindex="-1">Reporte</a>
				</li>
			</ul>
			<div id='tablitadiv' class='tab-content'>
				<table class="table table-striped" width="30%" border="0" cellspacing="0" id="tablita">
					<th colspan='2' align='center'>
							Rango de Fecha del Reporte

					</th>
					<tr>
						<td>
							
								
								<form action="" method="post" id="form1" target='_blank'>
								<div id='tablitadiv'>
									Fecha Inicial:
									<input type="text" name="fechai" id='fechai' placeholder='Año-Mes-Dia' >
									Fecha Final:
									<input type="text" name="fechaf" id='fechaf' placeholder='Año-Mes-Dia' >
									<br>
									Fondo:
									<select name="tipof" id="tipof" >
						            <option value="" selected="selected">Seleccione--</option>
						            <option value="11">11</option>
						            <option value="12">12</option>
						            <option value="21">21</option>
						            <option value="14">14</option>
						            <option value="24">24</option>
						            </select>
									ACCION ESPECIFICA:
									<select name="tipopr" id="tipopr" >
						            <option value="" selected="selected">Seleccione--</option>
						            <option value="PR71">PR71</option>
						            <option value="PR72">PR72</option>
						            <option value="PR73">PR73</option>
						            <option value="PR74">PR74</option>
						            <option value="PR75">PR75</option>
						            <option value="PR76">PR76</option>
						            <option value="B00024685">B00024685</option>
						            <option value="B00024684">B00024684</option>
						            </select>
								</div>
								<div>
									<input type='hidden' id='tipo_reporte' name='Report'>
									<input type='submit' value='Generar Reporte'>
								</div>
								</form>
						</td>
						
					</tr>
				</table>

			</div>
		</div>
	</div>

    
</form>  