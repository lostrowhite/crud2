	function ConsultaDatos(){
		jQuery.ajax({
			url: 'lista.php',
			cache: false,
			type: "GET",
			success: function(datos){
				jQuery("#tabla").html(datos);
			}
		});
	}
	
    function ConsultaDatossub(){
		jQuery.ajax({
			url: 'listasub.php',
			cache: false,
			type: "GET",
			success: function(datos){
				jQuery("#tablasub").html(datos);
			}
		});
	}
	
	function EliminarDato(cliente_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatos(){
		var nombre = jQuery('#nombre').attr('value');
		var direccion = jQuery('#direccion').attr('value'); 
		var telefono = jQuery("#telefono").attr("value");
		var correo = jQuery("#correo").attr("value");

		jQuery.ajax({
			url: 'nuevo.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo,
			success: function(datos){
				ConsultaDatos();
				alert(datos);
				jQuery("#for").hide();
				jQuery("#tabla").show();
			}
		});
		return false;
	}
		function GrabarDatossub(){
		var nombre = jQuery('#nombre').attr('value');
		var direccion = jQuery('#direccion').attr('value'); 
		var telefono = jQuery("#telefono").attr("value");
		var correo = jQuery("#correo").attr("value");

		jQuery.ajax({
			url: 'nuevosub.php',
			type: "POST",
			data: "submit=&nombre="+nombre+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo,
			success: function(datos){
				ConsultaDatossub();
				alert(datos);
				jQuery("#forsub").hide();
				jQuery("#tablasub").show();
			}
		});
		return false;
	}

	function Cancelar(){
		jQuery("#for").hide();
		jQuery("#tabla").show();
		return false;
	}
		function Cancelarsub(){
		jQuery("#forsub").hide();
		jQuery("#tablasub").show();
		return false;
	}