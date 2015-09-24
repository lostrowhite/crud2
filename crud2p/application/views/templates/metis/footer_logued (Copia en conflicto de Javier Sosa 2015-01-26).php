
<body class="  ">
    <div class="bg-dark dk" id="wrap" style="min-height: 629px;">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="inicio" class="navbar-brand">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="images/logo.png" style="width:50px;height:50px;">
              </a> 
            </header>
            <div class="topnav">
              <!-- <div class="btn-group">
                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a href="login.html" data-toggle="tooltip" data-original-title="Cerrar Sesión" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a> 
              </div> -->
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Pantalla Completa" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a> 
                <a href="session/logout" data-toggle="tooltip" data-original-title="Cerrar Sesión" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a> 
                <a data-placement="bottom" data-original-title="Mostrar / Ocultar Panel Izquierdo" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                  <i class="fa fa-bars"></i>
                </a> 
                <a data-placement="bottom" data-original-title="Mostrar / Ocultar Panel Derecho" data-toggle="tooltip" class="btn btn-default btn-sm toggle-right"> <span class="glyphicon glyphicon-comment"></span>  </a> 
              </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <!-- .nav -->
                <span style="color: rgba(0, 183, 75, 0.9);font-size: xx-large;margin-left: 20px;">Sistema Integrado De Gestión. SIS-DEU</span>
              <!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
          <div class="search-bar">
            <form class="main-search" action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Búsqueda ...">
                <span class="input-group-btn">
            <button class="btn btn-primary btn-sm text-muted" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span> 
              </div>
            </form><!-- /.main-search -->
          </div><!-- /.search-bar -->
          <div class="main-bar">
            <ol class="breadcrumb" style="background: rgba(232, 236, 232, 0.1);position: absolute;font-size: 16px;">
              <li><a href="inicio"><i class="fa fa-home indicator" style="cursor:pointer"></i></a></li>
            </ol>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->
      </div><!-- /#top -->
      <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="images/logo.png" style="width:74px;height:74px;">
              <span class="label label-danger user-label">16</span> 
            </a> 
            <div class="media-body">
			  <input type='hidden' value="<?php echo $this->session->userdata('id'); ?>" id="hid_user">
              <h5 class="media-heading"><?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido'); ?></h5>
              <ul class="list-unstyled user-info">
                <li class="loadToContainerr" id="<?php echo base_url(); ?>usuarios/editar">
                  <i class="fa fa-user"></i>
                  <a href="javascript:;"><?php echo $this->session->userdata('login') ?></a>
                </li>
                <li>Última visita:
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small> 
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <?php $permisos=$this->session->userdata('permisos'); ?>
        <ul id="menu" class="bg-blue dker" style="min-height: 17px;margin-bottom:48px;">
          <li class="nav-header">Menú</li>
          <li class="nav-divider"></li>
          <li>
            <a href="inicio">
              <i class="fa fa-home"></i>
              <span class="link-title">INICIO</span> 
            </a> 
          </li>
        <?php foreach($menu as $menuTop): ?>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span class="link-title"><?php echo $menuTop['menu_principal']->description;?></span> 
              <span class="fa arrow"></span> 
            </a>
            <ul>
          <?php foreach($menuTop['menu_secundario'] as $menuBottom): ?>
              <li class="loadToContainer" id="<?php echo base_url().$menuBottom->controller?>">
                <a href="javascript:;">
                  <i class="fa fa-angle-right"></i>&nbsp; <?php echo $menuBottom->description; ?></a> 
              </li>
          <?php endforeach; ?>
            </ul>
          <li>
        <?php endforeach; ?>
          <li class="nav-divider"></li>
          <li>
            <a href="session/logout">
              <i class="fa fa-sign-out"></i>
              <span class="link-title">CERRAR SESIÓN</span> 
            </a> 
          </li>
        </ul>
        <!-- /#menu -->

      </div><!-- /#left -->
      <div id="content" style="padding: 0 !important;margin-bottom: 6%;">
        <div class="outer">
        <!-- Container -->
          <div class="inner bg-light lter container" style="width: 100%;padding: 0;">
            <div class="col-lg-12">
            </div>
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Warning!</strong>  Best check yo self, you're not looking too good.
        </div>

        <!-- .well well-small -->
        <div class="well well-small dark">
          <ul class="list-unstyled">
            <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> 
            </li>
            <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> 
            </li>
            <li>Popularity <span class="dynamicbar pull-right">Loading..</span> 
            </li>
            <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> 
            </li>
          </ul>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <button class="btn btn-block">Default</button>
          <button class="btn btn-primary btn-block">Primary</button>
          <button class="btn btn-info btn-block">Info</button>
          <button class="btn btn-success btn-block">Success</button>
          <button class="btn btn-danger btn-block">Danger</button>
          <button class="btn btn-warning btn-block">Warning</button>
          <button class="btn btn-inverse btn-block">Inverse</button>
          <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
          <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
          <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
          <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
          <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
          <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-info" style="width: 20%"></div>
          </div>
          <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-success" style="width: 40%"></div>
          </div>
          <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
          </div>
          <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
          </div>
        </div>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p>2014 &copy;  Manuel Gil, Cesar Franco, Mikael Mijares, Luis Pino</p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    <!--jQuery 2.1.1 -->
    <script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>

    <!--Bootstrap -->
    <script src="<?php echo base_url(); ?>bootstrap_3/js/bootstrap.min.js"></script>

    <!-- Screenfull -->
    <script src="<?php echo base_url(); ?>js/lib/screenfull.js"></script>

    <!-- Metis core scripts -->
    <script src="<?php echo base_url(); ?>js/metis/core.js"></script>

    <!-- Metis demo scripts -->
    <script src="<?php echo base_url(); ?>js/metis/app.min.js"></script>
    <script src="<?php echo base_url(); ?>js/metis/style-switcher.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        // Cargar al container
        $('.loadToContainer').click(function(e){
          $('.control').val($(this).attr('id'));
          $('.container').html('<img src="images/loader3.gif" class="loader" style="margin: 10% 0 10% 48%;height: 50px;">');
          $('.container').load($(this).attr('id'));

          $('#menu').find('.active').removeAttr('class');
          $(this).parent().parent().attr('class', 'active');

          $('.breadcrumb').html('<li><a href="inicio"><i class="fa fa-home indicator" style="cursor:pointer"></i>&nbsp;</a></li><li><a href="javascript:;">&nbsp;' + $('.active').find('.link-title').html() + '&nbsp;</a></li><li class="active">' + $(this).children().html().toString().replace('fa fa-angle-right', '').replace('&nbsp;','') + '</li>');
        });
        $('.loadToContainerr').click(function(e){
          $(".container").html('<img src="images/loader3.gif" class="loader" style="margin:200px;margin-bottom:150px;margin-left:400px;width:200px;height:200px">');
          var id=jQuery('#hid_user').val();  
          $(".container").load($(this).attr('id'),{id_user:id});

          $('#menu').find('.active').removeAttr('class');
          $(this).parent().parent().attr('class', 'active');

          $('.breadcrumb').html('<li><a href="inicio"><i class="fa fa-home indicator" style="cursor:pointer"></i>&nbsp;</a></li><li><a href="javascript:;">&nbsp;' + $('.active').find('.link-title').html() + '&nbsp;</a></li><li class="active">' + $(this).children().html().toString().replace('fa fa-angle-right', '').replace('&nbsp;','') + '</li>');
        });
      });

      $(document).keydown(function(e){
        if(e.keyCode == 116){
          e.preventDefault();
          if($('.control').val() != ''){
            $('.container').html('<img src="images/loader3.gif" class="loader" style="margin: 10% 0 10% 48%;height: 50px;">');
            $('.container').load($('.control').val());
          }
        }
      });
    </script>
<input type="hidden" class="control" value="">
  </body>
</html>