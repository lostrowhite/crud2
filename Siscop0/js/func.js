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
//Código para colocar 
//los indicadores de miles mientras se escribe
//script por tunait!
function puntitos(donde,caracter){
	pat = /[\*,\+,\(,\),\?,\,$,\[,\],\^]/
	valor = donde.value
	largo = valor.length
	crtr = true
	if(isNaN(caracter) || pat.test(caracter) == true){
		if (pat.test(caracter)==true){ 
			caracter = '\ ' + caracter
		}
		carcter = new RegExp(caracter,"g")
		valor = valor.replace(carcter,"")
		donde.value = valor
		crtr = false
	}
	else{
		var nums = new Array()
		cont = 0
		for(m=0;m<largo;m++){
			if(valor.charAt(m) == "." || valor.charAt(m) == " ")
				{continue;}
			else{
				nums[cont] = valor.charAt(m)
				cont++
			}
		}
	}
	var cad1="",cad2="",tres=0
	if(largo > 3 && crtr == true){
		for (k=nums.length-1;k>=0;k--){
			cad1 = nums[k]
			cad2 = cad1 + cad2
			tres++
			if((tres%3) == 0){
				if(k!=0){
					cad2 = "." + cad2
				}
			}
		}
		donde.value = cad2
	}
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


function EliminarSocio(cliente_id,nsocio){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Socio?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarsocio.php',
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
	
function Editavehiculo(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Socio?")
		if ( msg ) {
			jQuery.ajax({
				url: 'evhiculo.php',
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
	
function AnularSocio(id_s,nsocio){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este socio?")
		if ( msg ) {
			jQuery.ajax({
				url: 'anularsocio.php',
				type: "GET",
				data: "submit=&id_s="+id_s+"+&nsocio="+nsocio,
				success: function(datos){
					alert(datos);
					verlistado();
					//jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Anular Socio
	
	
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
	} //Eliminar Vehículo
function AnularVehiculo(cliente_id,nsocio,placa){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Veh\u00edculo?")
		if ( msg ) {
			jQuery.ajax({
				url: 'anularvehiculo.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&nsocio="+nsocio+"+&placa="+placa,
				success: function(datos){
					alert(datos);
					verlistado()
					//jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Vehículo
	
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
	
	function AnularAvance(id_a,nsocio,navance){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este avance?")
		if ( msg ) {
			jQuery.ajax({
				url: 'anularavance.php',
				type: "GET",
				data: "submit=&id_a="+id_a+"+&nsocio="+nsocio+"+&navance="+navance,
				success: function(datos){
					alert(datos);
					veravances()
					//jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Alunar Avance
	
	
function EliminarUsuario(cliente_id,user){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este Usuario?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarusuarios.php',
				type: "GET",
				data: "submit=&id="+cliente_id+"+&user="+user,
				
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Usuario
	function EliminarProveedor(id_proveedor,proveedor){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este proveedor?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarproveedor.php',
				type: "GET",
				data: "submit=&id_proveedor="+id_proveedor+"+&proveedor="+proveedor,
				
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+id_proveedor).remove();
				}
			});
		}
		return false;
	} //Eliminar Proveedor


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
	
function EliminarRepuesto(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar este repuesto del inventario?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarrepuesto.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Repuesto de Inventario

function AnularFactura(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea anular esta factura?")
		if ( msg ) {
			jQuery.ajax({
				url: 'anularfactura.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					verlistado();
					//jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Anular Factura de Venta


function EliminarFacturaIn(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar \u00e9sta factura de compra?")
		if ( msg ) {
			jQuery.ajax({
				url: 'eliminarfacturain.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Factura de Compra

function AnularFacturaIn(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea anular esta factura de compra?")
		if ( msg ) {
			jQuery.ajax({
				url: 'anularfacturain.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					verlistado();
					//jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Eliminar Factura de Compra

function MostrarFactura(cliente_id){
		var msg = confirm(String.fromCharCode(191)+"Desea eliminar mostrar ésta factura?")
		if ( msg ) {
			jQuery.ajax({
				url: 'rfactura.php',
				type: "GET",
				data: "id="+cliente_id,
				success: function(datos){
					alert(datos);
					//jQuery("#fila-"+cliente_id).remove();
				}
			});
		}
		return false;
	} //Mostrar Factura de Venta


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
function imprimir_socio(id_s)
{ 
  
  var url = "isocio.php?id_s="+id_s;

   if (!document.images) {
     msg = "Su browser no es compatible con este sistema.";
     msg = msg + "Use Netscapte o Internet Explorer 4.0 o superior";
     window.alert(msg); return;
    }
  
  win=window.open(url,"imprimir socio","resizable=no,scrollbars=yes,width=930,height=800");
}

function imprimir_factura(id_facv,c_socio,nfactura,c_fechaf)
{ 
var msg = confirm(String.fromCharCode(191)+"Desea imprimir la factura no fiscal?")
if (msg){
  var url = "rfactura.php?id_facv="+id_facv+"&c_socio="+c_socio+"&nfactura="+nfactura+"&c_fechaf="+c_fechaf;
   if (!document.images) {
     msg = "Su browser no es compatible con este sistema.";
     msg = msg + "Use Netscapte o Internet Explorer 4.0 o superior";
     window.alert(msg); return;
    }
  
  win=window.open(url,"imprimir socio","resizable=no,scrollbars=yes,width=930,height=800");
}
}

function imprimir_fiscal(id_fv,c_socio,nfactura,c_fechaf)
{ 
  var url = "rfacturaf.php?id_fv="+id_fv+"&c_socio="+c_socio+"&nfactura="+nfactura+"&c_fechaf="+c_fechaf;

   if (!document.images) {
     msg = "Su browser no es compatible con este sistema.";
     msg = msg + "Use Netscapte o Internet Explorer 4.0 o superior";
     window.alert(msg); return;
    }
  
  win=window.open(url,"imprimir socio","resizable=no,scrollbars=yes,width=930,height=800");
}

function imprimir_facturainv(id_f,id_proveedor,nfactura,fechafac)
{ 
  var url = "rfacturainv.php?id_f="+id_f+"&id_proveedor="+id_proveedor+"&nfactura="+nfactura+"&fechafac="+fechafac;

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

function Matriz(){
var textos2 = '';
for (var i=0;i<document.getElementById('tblacti').rows.length;i++){
for (var j=0;j<6;j++){
if (j==5){
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value;
}else{
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value + '|';
}
}
textos2 = textos2 + ';';
}
document.getElementById("OcultoDatoTabla").value = textos2;
} //Matriz 
//Funcion para facturas    *************************************

function cuenta(esto){
		var co = esto.value;
		if (res.cantidad < esto){
			alert("Disculpe!. La cantidad es mayor a la disponibilidad");
			return false;
			}
			}
function facturar(obj,id_r){
		obj.value =parseInt(obj.value) +1;
		var oIdm = obj.value;
        $.post('piezas.php?id_r='+id_r,function(respuesta){
		res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
		var id = res.id_r;
		var pieza = res.pieza;
		var cantidad = res.cantidad;
		var descripcion = res.descripcion;
		var precio = res.costo;
		if (res.cantidad==0){
			alert("Disculpe!. No hay disponibilidad del producto seleccionado");
			return false;
			}
var idh = '<input type="text" style="visibility:hidden" size="4" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + id + '" disabled="disabled"/>' ;
var piezah = '<input type="text" size="15" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + pieza + '" disabled="disabled"/>' ;
var cantidadh = '<input type="text" class="validate[required,custom[onlyNumberSp]] text-input" size="6" id="par_' + oIdm + '" name="canth_' + oIdm + '" value="' + 1 + '" enabled="enabled" onkeyup="suma();Matriz();"/>' ;
var disponih = '<input type="hidden" size="2" id="dis_' + oIdm + '" name="disph_' + oIdm + '" value="' + cantidad + '" enabled="enabled"/>' ;
var descripcionh = '<textarea id="des_' + oIdm + '" name="des' + oIdm + '" disabled="disabled" size="10"/>' + descripcion +'</textarea>' ;
var precioh = '<input type="text" class="preci" size="10" id="cos' + oIdm + '" name="cos' + oIdm + '" value="' + precio + '" />' ;
var totalp = '<input type="text" class="totalp" size="10" id="totalp' + oIdm + '" name="totalp' + oIdm + '" disabled="disabled"/>' ;
var del = '<div align="center" class="field2"><input type="button" id="eliminar" name="Eliminar" value="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este repuesto?\')){eliminarFilanuevo(' + oIdm + ');}"/></div>';
		del += '<input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalletr_" + oIdm;
		objTr.name = "fila" + oIdm;
		var objTd1 = document.createElement("td");
		objTd1.id = "tdDetalletd1_" + oIdm;	
		objTd1.innerHTML = piezah;
		var objTd2 = document.createElement("td");
		objTd2.id = "tdDetalletd2_" + oIdm;	
		objTd2.innerHTML = cantidadh;
		var objTd9 = document.createElement("td");
		objTd9.id = "tdDetalletd9_" + oIdm;	
		objTd9.innerHTML = disponih;
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetalletd3_" + oIdm;	
		objTd3.innerHTML = descripcionh;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalletd4_" + oIdm;	
		objTd4.innerHTML = precioh;
		var objTd8 = document.createElement("td");
		objTd8.id = "tdDetalletd8_" + oIdm;	
		objTd8.innerHTML = totalp;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalletd6_" + oIdm;	
		objTd6.innerHTML = del;
		var objTd7 = document.createElement("td");
		objTd7.id = "tdDetalletd1_" + oIdm;	
		objTd7.innerHTML = idh;

		objTr.appendChild(objTd1);
		objTr.appendChild(objTd2);
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd8);
		objTr.appendChild(objTd7);
		objTr.appendChild(objTd6);
		objTr.appendChild(objTd9);

		var objTbody = document.getElementById("tblacti");
		objTbody.appendChild(objTr);
		suma();
		Matriz();
		$(document).trigger('close.facebox')
		return false;	//evita que haya un submit por equivocacion.

		 });
	} //Cargar fuente, partidas.
	//Eliminar fila de la fatura 
function eliminarFilanuevo(oIdm){
		var objHijo = document.getElementById('rowDetalletr_' + oIdm);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		suma();
	Matriz();
		return false;
	} 	 //Elimina fila de Nuevo

function suma()
				{
					
					var sum=0, ivap = $('#iva').val()/100;
					$('[name^=canth]').each(function(x){
					sum += $('[name^=canth]').eq(x).val() * $('.preci').eq(x).val();
					if(parseInt($('[name^=canth]').eq(x).val()) > parseInt($('[name^=disph]').eq(x).val()) ){
						alert("Disculpe!. La Cantidad es mayor a la disponibilidad");
						$('[name^=canth]').eq(x).val('');
						suma();
						}
				$(".totalp").eq(x).val(($('[name^=canth]').eq(x).val() * $('.preci').eq(x).val()).toFixed(2));
					});
					iva = (sum) * (ivap);
					$("#tfacturasin").val((sum).toFixed(2));
					$("#ivaf").val((iva).toFixed(2));
					$("#tfactura").val((sum + iva).toFixed(2));
				}
function Matrizi(){
var textos2 = '';
for (var i=0;i<document.getElementById('tblacti').rows.length;i++){
for (var j=0;j<6;j++){
if (j==5){
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value;
}else{
textos2 = textos2 + document.getElementById('tblacti').rows[i].cells[j].childNodes[0].value + '|';
}
}
textos2 = textos2 + ';';
}
document.getElementById("OcultoDatoTabla").value = textos2;
} //Matriz 
function facturari(obj,id_r){
		obj.value =parseInt(obj.value) +1;
		var oIdm = obj.value;
        $.post('piezas.php?id_r='+id_r,function(respuesta){
		res = $.parseJSON(respuesta); // Convertimos nuestra cadena en un objeto JSON
		var id = res.id_r;
		var pieza = res.pieza;
		var cantidad = res.cantidad;
		var descripcion = res.descripcion;
		var precio = res.costo;
var idh = '<input type="text" style="visibility:hidden" size="4" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + id + '" disabled="disabled"/>' ;
var piezah = '<input type="text" size="15" id="fon_' + oIdm + '" name="fon_' + oIdm + '" value="' + pieza + '" disabled="disabled"/>' ;
var cantidadh = '<input type="text" class="validate[required,custom[onlyNumberSp]] text-input" size="6" id="par_' + oIdm + '" name="canth_' + oIdm + '" value="' + 1 + '" enabled="enabled" onkeyup="sumai();Matrizi();"/>' ;
var descripcionh = '<textarea id="des_' + oIdm + '" name="des' + oIdm + '" disabled="disabled" size="10"/>' + descripcion +'</textarea>' ;
var precioh = '<input type="text" class="validate[required,custom[onlyNumberSp]] text-input, preci" size="10" id="cos' + oIdm + '" name="cos' + oIdm + '" value="' + precio + '" onkeyup="sumai();Matrizi();" />' ;
var totalp = '<input type="text" class="totalp" size="10" id="totalp' + oIdm + '" name="totalp' + oIdm + '" disabled="disabled"/>' ;
var del = '<div align="center" class="field2"><input type="button" id="eliminar" name="Eliminar" value="Eliminar" onclick="if(confirm(\'Realmente desea eliminar este repuesto?\')){eliminarFilanuevoi(' + oIdm + ');}"/></div>';
		del += '<input type="hidden" id="nh1_' + oIdm +'" name="nh1_" value="' + oIdm + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalletr_" + oIdm;
		objTr.name = "fila" + oIdm;
		var objTd1 = document.createElement("td");
		objTd1.id = "tdDetalletd1_" + oIdm;	
		objTd1.innerHTML = piezah;
		var objTd2 = document.createElement("td");
		objTd2.id = "tdDetalletd2_" + oIdm;	
		objTd2.innerHTML = cantidadh;
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetalletd3_" + oIdm;	
		objTd3.innerHTML = descripcionh;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalletd4_" + oIdm;	
		objTd4.innerHTML = precioh;
		var objTd8 = document.createElement("td");
		objTd8.id = "tdDetalletd8_" + oIdm;	
		objTd8.innerHTML = totalp;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalletd6_" + oIdm;	
		objTd6.innerHTML = del;
		var objTd7 = document.createElement("td");
		objTd7.id = "tdDetalletd1_" + oIdm;	
		objTd7.innerHTML = idh;

		objTr.appendChild(objTd1);
		objTr.appendChild(objTd2);
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd8);
		objTr.appendChild(objTd7);
		objTr.appendChild(objTd6);

		var objTbody = document.getElementById("tblacti");
		objTbody.appendChild(objTr);
		sumai();
		Matrizi();
		$(document).trigger('close.facebox')
		return false;	//evita que haya un submit por equivocacion.

		 });
	} //Cargar fuente, partidas.
	//Eliminar fila de la fatura 
function eliminarFilanuevoi(oIdm){
		var objHijo = document.getElementById('rowDetalletr_' + oIdm);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		sumai();
	Matrizii();
		return false;
	} 	 //Elimina fila de Nuevo

function sumai()
				{
					
					var sum=0, ivap = $('#iva').val()/100;
					$('[name^=canth]').each(function(x){
					sum += $('[name^=canth]').eq(x).val() * $('.preci').eq(x).val();
				$(".totalp").eq(x).val(($('[name^=canth]').eq(x).val() * $('.preci').eq(x).val()).toFixed(2));
					});
					iva = (sum) * (ivap);
					$("#tfacturasin").val((sum).toFixed(2));
					$("#ivaf").val((iva).toFixed(2));
					$("#tfactura").val((sum + iva).toFixed(2));
				}