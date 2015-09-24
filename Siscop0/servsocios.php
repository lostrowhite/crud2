<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script>
function Buscarpre(){              
                                                           
         //hacemos focus al campo de búsqueda
        $("#c_pres").focus();                 
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#c_pres").val();                                                             
              //hace la búsqueda                                                                 
              $.ajax({
                    type: "POST",
                    url: "bprestamo.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='images/ajax-loader.gif' width='48' height='47'  /></p>");
                    },
                    error: function(){
                          alert("Error: Contacte al administrador del sistema");
                    },
                    success: function(data){                                        
                          $("#resultado").empty();
                          $("#resultado").append(data);                                       
                    }
              });                                                              
        }
function Buscarmultas(){                      
         //hacemos focus al campo de búsqueda
        $("#c_multa").focus();                 
              //obtenemos el texto introducido en el campo de búsqueda
              c_multa = $("#c_multa").val();                                                             
              //hace la búsqueda                                                                 
              $.ajax({
                    type: "POST",
                    url: "busmultas.php",
                    data: "c="+c_multa,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado1").html("<p align='center'><img src='images/ajax-loader.gif' width='48' height='47'  /></p>");
                    },
                    error: function(){
                          alert("Error: Contacte al administrador del sistema");
                    },
                    success: function(data){                                                   
                          $("#resultado1").empty();
                          $("#resultado1").append(data);                                       
                    }
              });                                                              
        }
function Buscarrutas(){                      
        //hacemos focus al campo de búsqueda
        $("#c_ruta").focus();                 
              //obtenemos el texto introducido en el campo de búsqueda
              d = $("#c_ruta").val();                                                             
              //hace la búsqueda                                                                 
              $.ajax({
                    type: "POST",
                    url: "busrutas.php",
                    data: "d="+d,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado2").html("<p align='center'><img src='images/ajax-loader.gif' width='48' height='47'  /></p>");
                    },
                    error: function(){
                          alert("Error: Contacte al administrador del sistema");
                    },
                    success: function(data){                                                   
                          $("#resultado2").empty();
                          $("#resultado2").append(data);                                       
                    }
              });                                                              
        }
function Buscarfinanza(){                      
         //hacemos focus al campo de búsqueda
        $("#c_finanza").focus();                 
              //obtenemos el texto introducido en el campo de búsqueda
              e = $("#c_finanza").val();                                                             
              //hace la búsqueda                                                                 
              $.ajax({
                    type: "POST",
                    url: "busfinanzas.php",
                    data: "e="+e,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado3").html("<p align='center'><img src='images/ajax-loader.gif' width='48' height='47'  /></p>");
                    },
                    error: function(){
                          alert("Error: Contacte al administrador del sistema");
                    },
                    success: function(data){                                                   
                          $("#resultado3").empty();
                          $("#resultado3").append(data);                                       
                    }
              });                                                              
        }
	  $('#c_pres').keyup(function(e) {
                     if(e.keyCode == 13) {
                        Buscarpre();
                      }
                  });  
	  $('#c_multa').keyup(function(e) {
                     if(e.keyCode == 13) {
                        Buscarmultas();
                      }
                  }); 
	  $('#c_ruta').keyup(function(e) {
                     if(e.keyCode == 13) {
                        Buscarpre();
                      }
                  }); 
	  $('#c_finanza').keyup(function(e) {
                     if(e.keyCode == 13) {
                        Buscarfinanza();
                      }
                  });     
	function Cancelsoc(){
		$("#formsol").hide();
		$("#tablasol").show();
		return false;
	}

</script>
</head>
<body>
<div id="Tabbedpanelns1" class="Tabbedpanelns">
  <ul class="TabbedpanelnsTabGroup">
    <li class="TabbedpanelnsTab" tabindex="0">Préstamos</li>
    <li class="TabbedpanelnsTab" tabindex="0">Multas</li>
    <li class="TabbedpanelnsTab" tabindex="0">Rutas</li>
    <li class="TabbedpanelnsTab" tabindex="0">Finanzas</li>
  </ul>
  <div class="TabbedpanelnsContentGroup">
    <div class="TabbedpanelnsContent" align="center">Consulta de estado de Préstamos de Socios<br />
      <br />
      Por favor Ingrese N° C.I de Socio a consultar:
      <input type="text" name="c_pres" id="c_pres" />
      <img src="images/buscar.png" width="51" height="51" onclick="Buscarpre();" /><br />
      <div id="resultado"></div>
    </div>
    <div class="TabbedpanelnsContent" align="center">Consulta de estado de Multas de Socios<br />
      <br />
      Por favor Ingrese N° C.I de Socio a consultar:
      <input type="text" name="c_multa" id="c_multa" />
      <img src="images/buscar.png" width="51" height="51" onclick="Buscarmultas();" /><br />
      <div id="resultado1"></div></div>
    <div class="TabbedpanelnsContent" align="center">Consulta de Rutas de Socios<br />
      <br />
      Por favor Ingrese N° C.I de Socio a consultar:
      <input type="text" name="c_ruta" id="c_ruta" />
      <img src="images/buscar.png" width="51" height="51" onclick="Buscarrutas();" /><br />
      <div id="resultado2"></div></div>
    <div class="TabbedpanelnsContent" align="center">Consulta de estado de Finanzas de Socios<br />
      <br />
      Por favor Ingrese N° C.I de Socio a consultar:
      <input type="text" name="c_finanza" id="c_finanza" />
      <img src="images/buscar.png" width="51" height="51" onclick="Buscarfinanza();" /><br />
      <div id="resultado3"></div></div>
  </div>
<form id="form1">
<div align="center" class="field2">
           <dt><dl><input name="Cancelar" value="Cancelar" type="button" onclick="Cancelsoc();" /></dl></dt>
        </div>
</form>
</div>

<script type="text/javascript">
var Tabbedpanelns1 = new Spry.Widget.Tabbedpanelns("Tabbedpanelns1");
</script>
</body>
</html>