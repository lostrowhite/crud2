
    <script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap_3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
    <script>
  $(document).ready(function(){
    $('.close').click(function(){ $('.alert-sesion').hide(); });
    $('#loguear').click(function(event){ 
      event.preventDefault();
      $('.formito').css({ 'opacity':'0.5' });
      $.post('session/login', 
        { login:$('#u').val(),password:$('#p').val() }, 
        function(data){ 
          if(data.indexOf('incorrecto') != -1){
            $('.alert-sesion').fadeIn();
            setTimeout(function() { $('.alert-sesion').fadeOut(); }, 3000);
            $('.formito').css({ 'opacity':'1' });
          }else
            $('form').submit();
        });
    });
    $('#send-recu').click(function(){
      if($('#email-recu').val() != ''){
        $('#forgot').css('opacity', '0.5');
        $.post('session/recovery', { email:$('#email-recu').val() }, 
          function(data){ 
            if(data.indexOf('sent') != -1){
              $('#email-recu').val('');
              $('.alert-succ').fadeIn().html('<i class="fa fa-success">¡Nueva contraseña solicitada exitosamente!</i>');
              setTimeout(function() { $('.alert-succ').fadeOut(); }, 3000);
              
            }else if(data.indexOf('error') != -1){
              $('#email-recu').focus();
              $('.alert-recu').fadeIn().html('<i class="fa fa-warning">Debe estar conectado a internet...</i>');
              setTimeout(function() { $('.alert-recu').fadeOut(); }, 3000);
            }else{
              $('#email-recu').focus();
              $('.alert-recu').fadeIn().html('<i class="fa fa-warning">Correo electrónico inválido</i>');
              setTimeout(function() { $('.alert-recu').fadeOut(); }, 3000);
            }
            $('#forgot').css('opacity', '1');
          });
      }else{
        $('#forgot').css('opacity', '1');
        $('#email-recu').focus();
        $('.alert-recu').fadeIn().html('<i class="fa fa-warning">Debe ingresar un correo electrónico</i>');
        setTimeout(function() { $('.alert-recu').fadeOut(); }, 3000);
      }
    });
    $('#email-recu').keydown(function(event){
      if(event.keyCode == 13){
        if($('#email-recu').val() != ''){
          $('#forgot').css('opacity', '0.5');
          $.post('session/recovery', { email:$('#email-recu').val() }, 
            function(data){ 
              if(data.indexOf('sent') != -1){
                $('#email-recu').val('');
                $('.alert-succ').fadeIn().html('<i class="fa fa-success">¡Nueva contraseña solicitada exitosamente!</i>');
                setTimeout(function() { $('.alert-succ').fadeOut(); }, 3000);
                
              }else if(data.indexOf('error') != -1){
                $('#email-recu').focus();
                $('.alert-recu').fadeIn().html('<i class="fa fa-warning">Debe estar conectado a internet...</i>');
                setTimeout(function() { $('.alert-recu').fadeOut(); }, 3000);
              }else{
                $('#email-recu').focus();
                $('.alert-recu').fadeIn().html('<i class="fa fa-warning">Correo electrónico inválido</i>');
                setTimeout(function() { $('.alert-recu').fadeOut(); }, 3000);
              }
              $('#forgot').css('opacity', '1');
            });
        }else{
          $('#forgot').css('opacity', '1');
          $('#email-recu').focus();
          $('.alert-recu').fadeIn().html('<i class="fa fa-warning">Debe ingresar un correo electrónico</i>');
          setTimeout(function() { $('.alert-recu').fadeOut(); }, 3000);
        }
      }
    });
  });
</script>
  </body>
</html>
