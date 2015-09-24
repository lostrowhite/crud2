
<link rel="stylesheet" href="js/ea/themes/bootstrap/easyui.css">
<!-- <link rel="stylesheet" href="application/xcrud/css/stylesheet.css"> -->
<script src="application/xcrud/scripts/script.js"></script>
<style>
	.combo{ 
    width: 100% !important; 
    height: 35px !important;
    border-radius: 5px !important;
}
.searchbox{ 
    width: 600px !important; 
    height: 35px !important;
    border-radius: 5px !important;
}
.searchbox-text{
    height: 20px !important;
    padding: 0px !important;
    padding-top: 4px !important;
    padding-left: 10px !important;
}
.combo-text{
    height: 20px !important;
    padding: 0px !important;
    padding-top: 4px !important;
    padding-left: 14px !important;
    width: 100% !important;
}
.validatebox-text{
    height: 33px !important;
    border-radius: 5px !important;
}
.combo-arrow{
    height: 32px !important;
    position: absolute;
    margin-left: -18px;
}
</style>
<?php echo $this->render_table_name($mode); ?>
<div class="xcrud-top-actions btn-group">
    <?php 
    echo $this->render_button('save_return','save','list','btn btn-primary','','create,edit');
    echo $this->render_button('save_new','save','create','btn btn-default','','create,edit');
    echo $this->render_button('save_edit','save','edit','btn btn-default','','create,edit');
    echo $this->render_button('return','list','','btn btn-warning'); ?>
</div>
<div class="xcrud-view">
<?php echo $mode == 'view' ? $this->render_fields_list($mode,array('tag'=>'table','class'=>'table')) : $this->render_fields_list($mode,'div','div','label','div'); ?>
<div display='none'id="cargar-rif" class="xcrud-overlay"></div>
</div>
<div class="xcrud-nav">
    <?php echo $this->render_benchmark(); ?>
</div>
