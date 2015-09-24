<?php echo $this->render_table_name($mode); ?>
<div class="xcrud-top-actions btn-group">

    <?php echo $this->render_button('save_edit','save','edit','btn btn-default','','create,edit') ?>

</div>
<div class="xcrud-view">
<?php echo $this->render_fields_list($mode); ?>
</div>
<div class="xcrud-nav">
    <?php echo $this->render_benchmark(); ?>
</div>
