<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() { // Equivalente a $(document).ready();
     
        $("#soc").change(function(event) {
            var id = $("#soc").find(':selected').val();
            $.post('socios.php?id='+id,function(respuesta){
				 alert(respuesta);
                // Esta consulta nos traería un array de este tipo
                // { meta: "meta 1", valores: [ {valor: 1}, {valor: 2}, {valor: 3}]}
                res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
                alert(res.nsocio);
            });
        });
     
     
    });
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label for="nuevo"></label>
  <input type="text" name="nuevo" id="nuevo" />
  <input type="text" name="nuevo2" id="nuevo2" />
</form>
<?php
      require('clases/cliente.class.php');
    $objCliente = new Cliente;
    $consulta = $objCliente->mostrar_socios(); ?>        
        <select name="soc" id="soc">
          <option value="0">Seleccione--</option>
     <?php

    while ($resultado = mysql_fetch_array($consulta)){

          echo "<option value='".$resultado['id']."'> ".$resultado['nsocio']."</option>";

    }

?>
</select>
</body>
</html>