<script>
  $(document).ready(function(){
    // $('.loadToRepository').click(function(event){ history.pushState({id: 'Gestion Extensión'}, '', $(this).attr('id')); });
    // $('.modal').click(function(){ history.pushState({id: 'Gestion Extensión'}, '', '../inicio'); });
  });
</script>

<?php 
  $permisos=$this->session->userdata('permisos');
?>
<div class="left">
 <script type="text/javascript">
            $(document).ready(function() {
        $('ul.dropdown-menu li').attr("data-toggle","modal");
        $('ul.dropdown-menu li').attr("data-target",".bs-example-modal-lg");
                $('ul.dropdown-menu li').click(function(e) {
                   var url = $(this).attr("id");
            $("#relleno").load(url);
                });
            });
        </script>
<div class="container">
  <div class="col-xs-9">
<?php foreach($menu as $menuTop){ ?>
    <div class="btn-group">
      <!-- <button type="button" style='font-size: 12px !important;'class="btn btn-success"><?php echo $menuTop['menu_principal']->descripcion;?></button>
      <button type="button" style='font-size: 12px !important;' class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button> -->
      <button type="button" style='font-size: 8px !important;'class="btn btn-success dropdown-toggle" data-toggle="dropdown">
        <?php echo $menuTop['menu_principal']->descripcion;?>
        &nbsp;&nbsp;<span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
      <?php foreach($menuTop['menu_secundario'] as $menuBottom){?>
        <li style='font-size: 12px !important;' class="loadToRepository" id="<?php echo base_url().$menuBottom->controlador?>"><a href="#" ><?php echo $menuBottom->descripcion; ?></a></li>
      <?php }?>
      <li class="divider"></li>
      <li><a href="#">Reportes</a></li>
      </ul>
    </div>        

<?php
    }
?>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div id="relleno" class="modal-content">
    </div>
  </div>
</div>
</div>