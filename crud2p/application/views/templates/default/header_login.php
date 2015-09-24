<!DOCTYPE HTML>
<html>
<head>
<!-- Favicon -->
<link rel="icon" href="<?php echo base_url(); ?>images/logo.png" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/logo.png" type="image/x-icon" />
<!-- Favicon -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap_3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/arial.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/cuf_run.js"></script>

<title><?php echo $title; ?></title>

   <!-- fondo o color debajo de la sombra -->
  <div id="fondo">
  
   <!-- hoja de fondo con sombra -->
  <div id="wrapper">
  
   <!--  -->
  <div class="header">
  
   <!-- -->
  <div class="header_resize">
    
      <!-- logo del nombre del sistema -->
      <div class="logo">
      <div class="titulo">  
      <span>
      <img src="<?php echo base_url(); ?>images/logo.png" width="72" height="81" /></span>
      <span>SISTEMA INTEGRADO DE GESTIÓN </span>. sis-deu

        </div>  <!-- fin div titulo -->
          </div>  <!-- fin div logo  -->
          
     <?php echo form_open("session/login"); ?>
        
  <form id="login">
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6 text-center formito">
        <form class="form-signin" role="form" action="hola/login" method="post" id="doLog">
          <h2 class="form-signin-heading">Inicio de sesión</h2>
          <div class="input-group">
            <input type="text" class="form-control text-center" name="login" placeholder="Usuario" required="" autofocus="" autocomplete="off" id="u">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
          </div>
          <div class="input-group">
            <input type="password" class="form-control text-center" name="password" placeholder="Contraseña"  autocomplete="off" id="p">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
          </div>
          <label class="checkbox pull-left">
            <input type="checkbox" value="remember-me"> Recuerdame
          </label>
          <button id="loguear" class="btn btn-lg btn-success btn-block" type="submit">Acceder</button>
        </form>
      </div>
      <div class="col-xs-6 alert alert-danger session-error">
        <button type="button" class="close"><span class="glyphicon glyphicon-remove-sign"></span></button>
        <h4>¡Datos incorrectos!</h4>
        Los datos ingresados para el inicio de sesión son incorrectos
      </div>
    </div>
  </form>
     </div>    

<?php echo form_close(); ?>
</head>
<script src="<?= base_url(); ?>js/jquery-1.11.0.js"></script>
<script src="<?= base_url(); ?>bootstrap_3/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('.close').click(function(){ $('.alert').hide(); });
    $('#loguear').click(function(event){ 
      event.preventDefault();
      $('.formito').css({ 'opacity':'0.5' });
      $.post('session/login', 
        { login:$('#u').val(),password:$('#p').val() }, 
        function(data){ 
          if(data.indexOf('incorrecto') != -1){
            $('.alert').fadeIn();
            setTimeout(function() { $('.alert').fadeOut(); }, 3000);
          }else
            $('form').submit();
        });
      $('.formito').css({ 'opacity':'1' });
    });
  });
</script>


<!-- Noticias -->

 <div id="caja_desplegable">
<div class="container">
  <div class="col-xs-10" style="margin-top: 25px;">
 
    <div class="panel panel-primary">
      <div class="panel-heading">
        NOTICIAS DE LA DIRECCIÓN DE EXTENSIÓN
      </div>
      <div class="panel-body">
      <div id="uno" class="seccion">
 <h4><span class="glyphicon glyphicon-th-large"></span><a href="#uno">  Nuevo Sistema Automatizado</a></h4>
 <div>
  <p class="texto"> Esta es la informacion de la caja numero 1 
 comprobando como funciona la caja desplegable  comprobando como funciona la caja desplegable  comprobando como funciona la caja desplegable </p>
    </div>
 </div>
 
<div id="dos" class="seccion">
 <h4><span class="glyphicon glyphicon-th-large"></span><a href="#dos">  Generar Nuevos Usuarios</a></h4>
 <div>
  <p class="texto"> Esta es la informacion de la caja numero 1 
 comprobando como funciona la caja desplegable  comprobando como funciona la caja desplegable  comprobando como funciona la caja desplegable </p>
   </div>
    </div>
    
  <div id="tres" class="seccion">
 <h4><span class="glyphicon glyphicon-th-large"></span><a href="#tres">  Informacion extra</a></h4>
 <div>
  <p class="texto"> Esta es la informacion de la caja numero 1 
 comprobando como funciona la caja desplegable  comprobando como funciona la caja desplegable  comprobando como funciona la caja desplegable </p>
   </div>
    </div>
    

      </div>
    </div>
  </div>
</div>  
</div>