
onload=function() 
{
	cAyuda=document.getElementById("mensajesAyuda");
	cNombre=document.getElementById("ayudaTitulo");
	cTex=document.getElementById("ayudaTexto");
	divTransparente=document.getElementById("transparencia");
	divMensaje=document.getElementById("transparenciaMensaje");
	urlDestino="mail.php";
	claseNormal="input";
	claseError="inputError";
	
	ayuda=new Array();
	ayuda["nombre"]="Indique sus nombres. OBLIGATORIO";
	ayuda["apellido"]="Indique sus apellidos. OBLIGATORIO";
	ayuda["cedula"]="Indique su numero cedula(ej:12345678). OBLIGATORIO";
	ayuda["VencimientoC.I"]="Seleccione la fecha de vencimiento de la ci.OBLIGATORIO";
	ayuda["Ingreso"]="Seleccione la fecha de ingreso a la cooperativa.OBLIGATORIO";
	ayuda["Telefono"]="Indique Telefono local.OBLIGATORIO";
	ayuda["Celular"]="Indique Telefono movil.OBLIGATORIO";
	ayuda["Fecha Nacimiento"]="Seleccione la fecha de nacimiento.OBLIGATORIO";
	ayuda["Nacionalidad"]="Seleccione la nacionalidad.OBLIGATORIO";
	ayuda["Sexo"]="Seleccione Sexo.OBLIGATORIO";
	ayuda["Estado Civil"]="Indique su estado civil.OBLIGATORIO";
	ayuda["Carga Familiar"]="Indique su carga familiar.OBLIGATORIO";
	ayuda["contrato"]="Indique el numero de contrato.OBLIGATORIO";
	ayuda["Ruta"]="Seleccione la ruta.OBLIGATORIO";
	ayuda["SubRuta"]="Seleccione la subruta.OBLIGATORIO";
	ayuda["Beneficiario"]="Especifique el beneficiario.OBLIGATORIO";
	ayuda["N° Licencia"]="Indique el numero de la Licencia.OBLIGATORIO";
	ayuda["Grado"]="Indique el grado de la licencia.OBLIGATORIO";
	ayuda["Vence Licencia"]="Seleccione la fecha de vencimiento de la licencia.BLIGATORIO";
	ayuda["Cuenta Bancaria"]="Indique la cuenta bancaria.OBLIGATORIO";
	ayuda["Certificado Médico"]="Indique el numero del certificado medico.OBLIGATORIO";
	ayuda["Vence Certificado"]="Seleccione la fecha de vencimiento del certficado medico.OBLIGATORIO";
	ayuda["Grupo Sanguineo"]="Indique el grupo sanguineo.OBLIGATORIO";
	ayuda["Correo"]="Indique el correo electronico.OBLIGATORIO";
	ayuda["Direccion"]="Indique la dirección de habitacion.OBLIGATORIO";
	ayuda["Historia"]="Indique la historia del socio.OBLIGATORIO";
	
	
	//form n avance
	ayuda["nombrea"]="Indique la historia del socio.OBLIGATORIO";
	
	preCarga("ok.gif", "loading.gif", "error.gif");
}

function preCarga()
{
	imagenes=new Array();
	for(i=0; i<arguments.length; i++)
	{
		imagenes[i]=document.createElement("img");
		imagenes[i].src=arguments[i];
	}
} //Carga de Contenido

function nuevoAjax()
{ 
	var xmlhttp=false; 
	try 
	{ 
		// No IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 
	return xmlhttp; 
} //AJAX

function CambiarPass(){
		 if(document.frmcambiarpass.password.value != document.frmcambiarpass.password1.value  )
	 {
       alert("Los Password deben ser iguales")
	return 0;   }
		var usuario_id = $('#usuario_id').attr('value');
		var password = $('#password').attr('value');

		$.ajax({
			url: 'cambiar_pass.php',
			type: "POST",
			data: "submit=&password="+password+"&usuario_id="+usuario_id,
			success: function(datos){
				alert(datos);
				ConsultaDatos();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	} //Cambiar Password de Usuario


function EliminarCorr(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este archivo?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarcorr.php',
				type: "GET",
				data: "submit=&id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Socio
	
function EliminarPrestamo(cliente_id,nsocio,expediente){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Préstamo?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarprestamo.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&nsocio="+nsocio+"+&expediente="+expediente,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Prestamo
function EliminarPagos(cliente_id,nsocio,expediente){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Pago?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarpago.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&nsocio="+nsocio+"+&expediente="+expediente,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Socio
function EliminarPermisos(cliente_id,nsocio){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Permiso?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarpermiso.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&nsocio="+nsocio,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Socio
	
function EliminarVehiculo(cliente_id,nsocio,placa){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Vehículo?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarvehiculo.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&nsocio="+nsocio+"+&placa="+placa,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Socio
	
function EliminarAvance(cliente_id,nsocio,navance){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Avance?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminaravance.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&nsocio="+nsocio+"+&navance="+navance,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Avance
	
	
function EliminarSeg(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Dato?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarseg.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Usuario

function EliminarTipoCombustible(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este tipo de combustible?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarcombustible.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Tipo de Combustible

function EliminarRuta(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar esta ruta?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarruta.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Ruta
	
function EliminarUsuario(cliente_id){
		var msg = confirm("Desea eliminar este usuario?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminaruser.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Usuario
	
function ConsultaCoord(){
		jQuery.ajax({
			url: 'lista.php',
			cache: false,
			type: "GET",
			success: function(datos){
				jQuery("#tabla1").html(datos);
			}
		});
	} //Cargar Combo Cordinador 

function limpiaForm()
{
	for(i=0; i<=4; i++)
	{
		form.elements[i].className=claseNormal;
	}
	document.getElementById("inputComentario").className=claseNormal;
} //Limpiar Formulario

function campoError(campo)
{
	campo.className=claseError;
	error=1;
} //Campo Error

function ocultaMensaje()
{
	divTransparente.style.display="none";
} //Oculta Mensaje

function muestraMensaje(mensaje)
{
	divMensaje.innerHTML=mensaje;
	divTransparente.style.display="block";
} //Muestra Mensaje

function eliminaEspacios(cadena)
{
	// Funcion para eliminar espacios delante y detras de cada cadena
	while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
	while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
	return cadena;
} //Elimina Espacios

function validaLongitud(valor, permiteVacio, minimo, maximo)
{
	var cantCar=valor.length;
	if(valor=="")
	{
		if(permiteVacio) return true;
		else return false;
	}
	else
	{
		if(cantCar>=minimo && cantCar<=maximo) return true;
		else return false;
	}
} //Validar Longitud

function vacio(q) {  
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false 
		
} //Validar Campos Vacios

// Mensajes de ayuda

if(navigator.userAgent.indexOf("MSIE")>=0) navegador=0;
else navegador=1;

function colocaAyuda(event)
{
    if(navegador==0)
    {
        var corX=window.event.clientX+document.documentElement.scrollLeft;
        var corY=window.event.clientY+document.documentElement.scrollTop;
    }
    else
    {
        var corX=event.clientX+window.scrollX;
        var corY=event.clientY+window.scrollY;
    }
    cAyuda.style.top=corY+20+"px";
    cAyuda.style.left=corX+15+"px";
}

function ocultaAyuda()
{
    cAyuda.style.display="none";
    if(navegador==0)
    {
        document.detachEvent("onmousemove", colocaAyuda);
        document.detachEvent("onmouseout", ocultaAyuda);
    }
    else
    {
        document.removeEventListener("mousemove", colocaAyuda, true);
        document.removeEventListener("mouseout", ocultaAyuda, true);
    }
}

function muestraAyuda(event, campo)
{
    colocaAyuda(event);

    if(navegador==0)
    {
        document.attachEvent("onmousemove", colocaAyuda);
        document.attachEvent("onmouseout", ocultaAyuda);
    }
    else
    {
        document.addEventListener("mousemove", colocaAyuda, true);
        document.addEventListener("mouseout", ocultaAyuda, true);
    }

    cNombre.innerHTML=campo;
    cTex.innerHTML=ayuda[campo];
    cAyuda.style.display="block";
}
function imprimir_socio(cliente_id)
{ 
  
  var url = "isocio.php?id="+cliente_id;

   if (!document.images) {
     msg = "Su browser no es compatible con este sistema.";
     msg = msg + "Use Netscapte o Internet Explorer 4.0 o superior";
     window.alert(msg); return;
    }
  
  win=window.open(url,"imprimir socio","resizable=no,scrollbars=yes,width=930,height=800");
}

function imprimir_avance(cliente_id)
{ 
  
  var url = "iavance.php?id="+cliente_id;

   if (!document.images) {
     msg = "Su browser no es compatible con este sistema.";
     msg = msg + "Use Netscapte o Internet Explorer 4.0 o superior";
     window.alert(msg); return;
    }
  
  win=window.open(url,"imprimir Avance","resizable=no,scrollbars=yes,width=1024,height=600");
}

function impresion()
{
  if (window.print) {
        window.print();  
     } else {
        var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
        document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
        WebBrowser1.ExecWB(6, 2);//Use a 1 vs. a 2 for a prompting dialog box
        WebBrowser1.outerHTML = "";  
     }
}
function datos()
{
 $(document).ready(function(){

           var element = $("#fondoseg").val().split('/');
			for(var i = 0; i <=(element.length)-2; ++i){
			var final = (element[i]).split('-');
					}

        });
}
function totalseg(){
var ftext = '';
for (var i=0;i<document.getElementById('tblseg').rows.length;i++){
for (var j=0;j<2;j++){
ftext = ftext + document.getElementById('tblseg').rows[i].cells[j].childNodes[0].value + '|';
}
ftext =ftext + '/';
}
document.getElementById("fondoseg").value = ftext;
} //Recoger Fondos

function nseg(obj){
		obj.value =parseInt(obj.value) +1;
		var oIdm = obj.value;
		var nombre = document.getElementById("entregado");
		var nombreSeleccionado = nombre.selectedIndex;
		var nombreSeleccionada = nombre.options[nombreSeleccionado];
		var nom = nombreSeleccionada.text;
		var fecha = document.getElementById("fechaent").value;
var nom = '<input type="text" size="20" id="nom_' + oIdm + '" name="nom_' + oIdm + '" value="' + nom + '" disabled="disabled"/>' ;
var fec = '<input type="text" size="12" id="fec_' + oIdm + '" name="fec' + oIdm + '" value="' + fecha + '" disabled="disabled"/>' ;
var del = '<input type="button" id="eliminar" name="Eliminar" value="Eliminar" class="boton" onclick="if(confirm(\'Realmente desea eliminar este dato?\')){eliminarFilanuevo(' + oIdm + ');}"/>';
		del += '<input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalletr_" + oIdm;
		objTr.name = "fila" + oIdm;
		var objTd2 = document.createElement("td");
		objTd2.id = "tdDetalletd1_" + oIdm;	
		objTd2.innerHTML = nom;
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetalletd2_" + oIdm;	
		objTd3.innerHTML = fec;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalletd3_" + oIdm;	
		objTd4.innerHTML = del;

		objTr.appendChild(objTd2);
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);


		var objTbody = document.getElementById("tblseg");
		objTbody.appendChild(objTr);
		totalseg()
datos();
		return false;	//evita que haya un submit por equivocacion.

	} //Cargar fuente, partidas.
	
function eliminarFilanuevo(oIdm){
		var objHijo = document.getElementById('rowDetalletr_' + oIdm);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
totalseg();
		return false;
	}  //Elimina fila de Nuevo