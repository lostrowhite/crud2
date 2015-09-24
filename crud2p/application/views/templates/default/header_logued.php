<!DOCTYPE HTML>
<html>
<head>
<!-- Favicon -->
<link rel="icon" href="<?php echo base_url(); ?>images/logo.png" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/logo.png" type="image/x-icon" />
<!-- Favicon -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap_3/css/bootstrap.min.css">

<style type="text/css">
	#main-menu {
		margin:0 auto 0 auto;
		width:1260px;
	}
	#main-menu ul {
		width:12em; /* fixed width only please - you can use the "subMenusMinWidth"/"subMenusMaxWidth" script options to override this if you like */
	}
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap_3/js/bootstrap.js"></script>
<script type="text/javascript">
  $(document).ready(function(){ 
    var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
    $.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the Bootstrap functionality
    jQuery('ul.dropdown-menu li').attr("data-toggle","modal");
    jQuery('ul.dropdown-menu li').attr("data-target",".bs-example-modal-lg");
    jQuery('ul.dropdown-menu li').click(function(e) {
      var url = jQuery(this).attr("id");
      jQuery("#relleno").load(url);
    });
    var id=jQuery('#hid_user').val();                 
    $('.btnn').attr("data-toggle","modal");
    $('.btnn').attr("data-target",".bs-example-modal-lg");
    $('.btnn').click(function(e) {
      var url = $(this).attr("id");

      $("#relleno").load(url,{id_user:id});
    });
  });
 </script>
<title><?php echo $title; ?></title>

<div id="fondo">
  <div id="wrapper">
  
    <div class="header1">
        <div class="header_resize1">
          <input type='hidden' value="<?php echo $this->session->userdata('id'); ?>" id="hid_user">
          <div class="logo">
            <div class="titulo"><span><img src="<?php echo base_url(); ?>images/logo.png" width="72" height="81" /></span><span>SISTEMA INTEGRADO DE GESTIÓN </span>. sis-deu</div>
          </div>

      </div>
     
</head>

<div class="container contenedor">
  <div class="col-xs-3 pull-right">
  <div id="foto">
   <img src="images/deu.png" width="340px" height="340px" style='opacity: 0.2;filter: alpha(opacity=40); /* For IE8 and earlier */'>
   </div>
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        Bienvenido/a
      </div>
      <div class="panel-body text-center">
        Nombres: <span class="glyphicon glyphicon-user"></span> 
        <span class="btnn btn-link" id="<?php echo base_url(); ?>usuarios/editar" >
          <a href="#" ><?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido'); ?></a>
        </span><br><br>
        <?php echo anchor('session/logout','<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</button>'); ?>
      </div>
    </div>
    
  </div>


  <!-- menú -->
  <?php include 'menu.php'; ?>