
<?php if ($this->is_create or $this->is_csv){?>
		<?php echo $this->render_table_name(); ?>

				<div class="xcrud-top-actions">
					<div class="btn-group pull-right">
						<?php echo $this->print_button('btn btn-default','glyphicon glyphicon-print');
						echo $this->csv_button('btn btn-default','glyphicon glyphicon-file'); ?>
					</div>
					<?php echo $this->add_button('btn btn-success','glyphicon glyphicon-plus-sign'); ?>
					<div class="clearfix"></div>
				</div>

				<div class="xcrud-list-container">
				<table class="xcrud-list table table-striped table-hover table-bordered">
					<thead>
						<?php echo $this->render_grid_head('tr', 'th'); ?>
					</thead>
					<tbody>
						<?php echo $this->render_grid_body('tr', 'td'); ?>
					</tbody>
					<tfoot>
						<?php echo $this->render_grid_footer('tr', 'td'); ?>
					</tfoot>
				</table>
				</div>
				<div class="xcrud-nav">
					<?php echo $this->render_limitlist(true); ?>
					<?php echo $this->render_pagination(); ?>
					<?php echo $this->render_search(); ?>
					<?php echo $this->render_benchmark(); ?>
				</div>
<?php } ?>
<?php
	
 if ($this->is_print==='imprime'){?>
 <!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->table_name?></title>
    <style type="text/css">
td{
	font-family:arial;
	text-align: center;
}
th{
	font-weight: bold;

}
.prod{
	text-align: center;

}

.titulo{
	text-align: center;
	font-weight: bold;
	font-style: italic;

}
.tituloP{
	text-align: center;
	font-weight: bold;

}
    </style>
<body>
	<table width='100%'>
		<tr>
			<td rowspan='3'><img src="../../images/ucv.gif" style='height:70px; width:70px;'></td>
			<td align='center'>UNIVERSIDAD CENTRAL DE VENEZUELA</td>
			<td rowspan='3'><img src="../../images/deu.jpg" style='height:70px; width:70px;'></td>
		</tr>
		<tr>
			<td align='center'>DIRECCIÓN DE EXTENSIÓN UNIVERSITARIA</td>
		</tr>
		<tr>
			<td align='center'>RIF: G200000062-7</td>
		</tr>
	</table>
    <h1 align='center'>
        <?php echo $this->table_name?>
    </h1>

    <table align='center' width='95%' border='1' style='border-collapse: collapse;'>
        <thead>
            <?php echo $this->render_grid_head(); ?>
        </thead>
        <tbody>
            <?php echo $this->render_grid_body(); ?>
        </tbody>
        <tfoot>
            <?php echo $this->render_grid_footer(); ?>
        </tfoot>
    </table>
</body>
<?php } ?>

