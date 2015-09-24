
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
				<a id="ui-id-1" class="active ui-tabs-anchor" href="#tabid_aemq41" role="presentation" tabindex="-1">TXT</a>
				</li>
			</ul>
			<div id='tablitadiv' class='tab-content'>
				<table class="table table-striped" width="30%" border="0" cellspacing="0" id="tablita">
					<th colspan='2' align='center'>
							CARGAR TXT

					</th>
					<tr>
						<td>
							
								<?php $attributes = array('target' => '_blank'); ?>
								<?php echo $error;?>
								<?php echo form_open_multipart('reportesm/upload_file',$attributes);?>
									Select file to upload:
									<input type="file" name="fileToUpload" id="fileToUpload">
									<input type="submit" value="Cargar Archivo" name="submit">
						</td>
						
					</tr>
				</table>

			</div>
		</div>
	</div>

    
</form>  