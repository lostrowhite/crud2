<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>:: SIG-DEU ::</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/metis/font-awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/metis/main.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/metis/animate.css/animate.min.css">
  </head>
</style>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="<?php echo base_url(); ?>images/logo.png" alt="DEU Logo" width="80" height="80">
      </div>
      <hr>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
          <form class="form-signin formito" role="form" action="<?php echo base_url(); ?>session/login" method="post" id="doLog">
            <p class="text-muted text-center" style="margin-top:-25px;">
              Introduzca su usuario y su contraseña
            </p>
            <input type="text" class="form-control text-center top" name="login" placeholder="Usuario" required="" autofocus="" autocomplete="off" id="u">
            <input type="password" class="form-control text-center bottom" name="password" placeholder="Contraseña"  autocomplete="off" id="p">
            <div class="checkbox">
              <label>
                <input type="checkbox">Recuerdame
              </label>
            </div>
            <button id="loguear" class="btn btn-lg btn-success btn-block" type="submit" style="margin-bottom:-20px">
              Acceder <i class="fa fa-sign-in"></i>
            </button>
            <div class="alert alert-danger text-center alert-sesion" role="alert" style="margin-top:35px;margin-bottom:-20px;display:none;">
              <i class="fa fa-warning"></i> ¡Datos de sesión incorrectos!
            </div>
          </form>
        </div>
        <div id="forgot" class="tab-pane">
            <p class="text-muted text-center">Ingrese el email de su cuenta</p>
            <input type="email" id="email-recu" placeholder="correo@ejemplo.com" class="form-control text-center">
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="button" id="send-recu">Recuperar contraseña</button>
            <div class="alert alert-danger text-center alert-recu" role="alert" style="margin-top:20px;margin-bottom:-20px;display:none;">
              <i class="fa fa-warning"></i>
            </div>
            <div class="alert alert-success text-center alert-succ" role="alert" style="margin-top:20px;margin-bottom:-20px;display:none;">
              <i class="fa fa-warning"></i>
            </div>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Iniciar Sesión</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Olvide la contraseña</a>  </li>
        </ul>
      </div>
    </div>