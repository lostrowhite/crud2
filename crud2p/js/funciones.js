
$(document).ready(function(){
    verlistado()
	verpermisos()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO


})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("listarsocios.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido").html(data);
            });



}
function verpermisos(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber1=Math.random()*11;
            $.post("listarpermisos.php", {
                randomnumber1:randomnumber1
            }, function(data){
              $("#contenido").html(data);
            });



}