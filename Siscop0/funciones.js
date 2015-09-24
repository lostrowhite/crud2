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
	ayuda["HELP"]="Como puede apreciar aparecera un mensaje igual a este.";
	ayuda["FechaInicio"]="Debe seleccionar la fecha de inicio del Proyecto. OBLIGATORIO";
	ayuda["FechaFinal"]="Debe seleccionar la fecha de culminación del Proyecto. OBLIGATORIO";
	ayuda["Coordinacion"]="Elija el Nombre de la Coordinación ó Dirección a la cual pertenece el Proyecto.";
	ayuda["Accion"]="Ingrese el nombre de la Acción Especifica.";
	ayuda["Coordinador"]="Seleccione ó agregue el nombre del Coordinador del Proyecto.";
	ayuda["PR"]="Elija el PR que esta empleando.";
	ayuda["SubPrograma"]="Ingresa el Nombre del Sub-Programa. OBLIGATORIO";
	ayuda["Subcoordinador"]="Seleccione ó agregue el nombre del Sub-Coordinador del Sub-Programa.";
	ayuda["Area"]="Debe Seleccionar al menos un area de conocimiento.";
	ayuda["Facultad/Escuela/Dependencia"]="Seleccione las Facultades, Escuelas y Dependencias involucradas en el Sub-Programa.";
	ayuda["Personal UCV /NOUCV"]="Indique la cantidad de personal UCV y NO UCV involucrados.";
	ayuda["Estados/Municipios/Parroquias"]="Seleccione el lugar donde se ejecuta el Sub-Programa.";
	ayuda["Beneficiario"]="Indique el numero de población beneficiada con el Sub-Programa.";
	ayuda["Directa"]="Indique la población directa, (UCV y/o NO UCV) a la cual fue dirigido el Sub-Programa.";
	ayuda["Pasantes"]="Ayudantia(Pasante que ocupa actividades eminentemente administrativas.";
	ayuda["Indirecta"]="Especifique la cantidad y de donde proviene la población(UCV y/o NO UCV) a la cual fue dirigido el Sub-Programa.";
	ayuda["Publica"]="Especificar si es Docente, Pasante o Persona Natural. EJEMPLO: N° de Personas: '5', Empresa: UCV(Pasante) ";
	ayuda["Privada"]="Especificar si es Docente, Pasante o Persona Natural. EJEMPLO: N° de Personas: '10', Empresa: Ejemplo(Docente) ";
	ayuda["Reseña"]="De una breve Reseña historica del Sub-Programa.";
	ayuda["Accion"]="Especifique las actividades realizadas en el Sub-Programa.";
	ayuda["DOFA"]="Ingrese en la matriz DOFA, las Debilidades, Fortalezas, Amenazas y Oportunidades que obtuvo el Sub-Programa.";
	ayuda["Comentario"]="Ingresa tus comentarios. De 5 a 500 caracteres. OBLIGATORIO";
	
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
}

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
}

function limpiaForm()
{
	for(i=0; i<=4; i++)
	{
		form.elements[i].className=claseNormal;
	}
	document.getElementById("inputComentario").className=claseNormal;
}

function campoError(campo)
{
	campo.className=claseError;
	error=1;
}

function ocultaMensaje()
{
	divTransparente.style.display="none";
}

function muestraMensaje(mensaje)
{
	divMensaje.innerHTML=mensaje;
	divTransparente.style.display="block";
}

function eliminaEspacios(cadena)
{
	// Funcion para eliminar espacios delante y detras de cada cadena
	while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
	while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
	return cadena;
}

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
}

function vacio(q) {  
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false 
		
}  

function validaForm()

 {
	 if( vacio(document.formulario.fechai.value) == false )
	 {
       alert("Tiene que Seleccionar la Fecha de Inicio de la Acción")
       document.formulario.fechai.focus()
	return 0;   
	}
	 if (vacio(document.formulario.fechafinal.value) == false)
	 {
       alert("Tiene que Seleccionar la Fecha de Culminación de la Acción")
       document.formulario.fechafinal.focus()
	return 0;
	}
	var coo = document.getElementById("coordinacion");
var cooSeleccionado = coo.selectedIndex;
var cooSeleccionada = coo.options[cooSeleccionado];
var cootxtSeleccionado = cooSeleccionada.text;

    if (cooSeleccionada.value==1)
	 {
        alert("Seleccione una Coordinación")
	return 0;
	}
	if (vacio(document.formulario.nombre_accion.value) == false)
	 {
       alert("Debe indicar el nombre de la Acción Específica")
       document.formulario.nombre_accion.focus()
	return 0;
    	}
	var cor = document.getElementById("lista");
var corSeleccionado = cor.selectedIndex;
var corSeleccionada = cor.options[corSeleccionado];
var cortxtSeleccionado = corSeleccionada.text;

    if (corSeleccionada.value==1)
	 {
        alert("Seleccione un Coordinador")
	return 0;
	}
	var pro = document.getElementById("pro");
var proSeleccionado = pro.selectedIndex;
var proSeleccionada = pro.options[proSeleccionado];
var protxtSeleccionado = proSeleccionada.text;

    if (proSeleccionada.value==1)
	 {
        alert("Seleccione el PR utilizado")
	return 0;
	}
	if (vacio(document.formulario.nombre_sub.value) == false)
	 {
       alert("Tiene que Escribir el Nombre del Sub Programa")
       document.formulario.nombre_sub.focus()
	return 0;
	}
		var subco = document.getElementById("listasub");
var subcoSeleccionado = subco.selectedIndex;
var subcoSeleccionada = subco.options[subcoSeleccionado];
var subcotxtSeleccionado = subcoSeleccionada.text;

    if (subcoSeleccionada.value==1)
	 {
        alert("Seleccione el Sub-Coordinador")
	return 0;
	}
	var area = document.getElementById("area[]");
var areaSeleccionado = area.selectedIndex;
var areaSeleccionada = area.options[areaSeleccionado];
var areatxtSeleccionado = areaSeleccionada.text;

    if (areaSeleccionada.value==1)
	 {
        alert("Seleccione al menos un area de conocimiento")
	return 0;
	}
	
	var chks = document.getElementsByName('personal[]');
         var flag=0;                     
         for (var i = 0; i < chks.length; i++) 
         {         
            if (vacio(chks[i].value)!= false) 
                 { 
                flag=1;
               } 
        } 
          if (flag==0)
            {
        alert("Debe indicar al menos alguna cantidad de Personal Involucrado");
		chks[0].focus();
		return false;
             }
	var chks = document.getElementsByName('poblacion[]');
         var flag=0;                     
         for (var i = 0; i < chks.length; i++) 
         {         
            if (vacio(chks[i].value)!= false) 
                 { 
                flag=1;
               } 
        } 
          if (flag==0)
            {
        alert("Debe indicar al menos alguna cantidad de Población");
		chks[0].focus();
        return false;
             }
	
	if (document.formulario.publica_n.value.length==0)
	 {
       alert("Debe Escribir el numero de Personas de la empresa Pública")
       document.formulario.publica_n.focus()
	return 0;
    	}
			if (document.formulario.publica_nom.value.length==0)
	 {
       alert("Debe Escribir el nombre de la Institución Pública")
       document.formulario.publica_nom.focus()
	return 0;
    	}
		if (document.formulario.privada_n.value.length==0)
	 {
       alert("Debe Escribir el numero de Personas de la empresa Privada")
       document.formulario.privada_n.focus()
	return 0;
    	}
			if (document.formulario.privada_nom.value.length==0)
	 {
       alert("Debe Escribir el Nombre de la Intitución Privadas")
       document.formulario.privada_nom.focus()
	return 0;
	 }
 var chks = document.getElementsByName('poblacion[]');
        var total = 0;
        for(var i = 0; i < chks.length; i++) {
            var valor = parseInt(chks[i].value);
            if(isNaN(valor) == false) {
                total += parseInt(chks[i].value);
            }
        }
	  if( vacio(document.formulario.resena.value) == false )
	 {
       alert("Debe indicar la Reseña Historica")
       document.formulario.resena.focus()
	return 0;   }

			 if( vacio(document.formulario.fortalezas.value) == false )
	 {
       alert("Debe indicar las fortalezas")
       document.formulario.fortalezas.focus()
	return 0;   }
			 if( vacio(document.formulario.debilidades.value) == false )
	 {
       alert("Debe indicar las Debilidades")
       document.formulario.debilidades.focus()
	return 0;   }
			 if( vacio(document.formulario.oportunidades.value) == false )
	 {
       alert("Debe indicar las Oportunidades")
       document.formulario.oportunidades.focus()
	return 0;   }
		 if( vacio(document.formulario.amenazas.value) == false )
	 {
       alert("Debe indicar las Amenazas")
       document.formulario.amenazas.focus()
	return 0;   }
	{
var sum = 0;
$('[name^=onumpub]').each(function() {
    sum += parseFloat($(this).val());
});
var sum1 = 0;
$('[name^=numprio_]').each(function() {
    sum1 += parseFloat($(this).val());
});
suma = sum +sum1;
}


	if (suma != total)
	{
	alert("La población Directa debe ser igual a la población Indirecta");
	return 0;
	}
		else
	
	{
    document.formulario.submit();
	} 
 }

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

     function comprobar() {
        var chks = document.getElementsByName('poblacion[]');
        var total = 0;
        for(var i = 0; i < chks.length; i++) {
            var valor = parseInt(chks[i].value);
            if(isNaN(valor) == false) {
                total += parseInt(chks[i].value);
            }
        }
        alert("la suma es, " + total);
    }
	
	
function datosTextos() {
var textos = '';
for (var i=1;i<document.getElementById('tblfac').rows.length;i++){
for (var j=0;j<3;j++){
if (j==2){
textos = textos + document.getElementById('tblfac').rows[i].cells[j].childNodes[0].value;
}else{
textos = textos + document.getElementById('tblfac').rows[i].cells[j].childNodes[0].value + '/';
}
}
textos = textos + ';';
}
document.getElementById("OcultoDatoTabla").value = textos;
}


function datosTextos1() {
var textos1 = '';
for (var i=1;i<document.getElementById('tbledo').rows.length;i++){
for (var j=0;j<3;j++){
if (j==2){
textos1 = textos1 + document.getElementById('tbledo').rows[i].cells[j].childNodes[0].value;
}else{
textos1 = textos1 + document.getElementById('tbledo').rows[i].cells[j].childNodes[0].value + '/';
}
}
textos1 = textos1 + ';';
}
document.getElementById( "OcultoDatoTabla1").value = textos1;
}


function datosTextos2() {
var textos2 = '';
for (var i=1;i<document.getElementById('tblpub').rows.length;i++){
for (var j=0;j<2;j++){
if (j==1){
textos2 = textos2 + document.getElementById('tblpub').rows[i].cells[j].childNodes[0].value;
}else{
textos2 = textos2 + document.getElementById('tblpub').rows[i].cells[j].childNodes[0].value + '/';
}
}
textos2 = textos2 + ';';
}
document.getElementById("OcultoDatoTabla2").value = textos2;
}


function datosTextos3() {
var textos3 = '';
for (var i=1;i<document.getElementById('tblpri').rows.length;i++){
for (var j=0;j<2;j++){
if (j==1){
textos3 = textos3 + document.getElementById('tblpri').rows[i].cells[j].childNodes[0].value;
}else{
textos3 = textos3 + document.getElementById('tblpri').rows[i].cells[j].childNodes[0].value + '/';
}
}
textos3 = textos3 + ';';
}
document.getElementById("OcultoDatoTabla3").value = textos3;
}

function datosTextos4() {
var textos4 = '';
for (var i=1;i<document.getElementById('tblaccion').rows.length;i++){
for (var j=0;j<2;j++){
if (j==1){
textos4 = textos4 + document.getElementById('tblaccion').rows[i].cells[j].childNodes[0].value;
}else{
textos4 = textos4 + document.getElementById('tblaccion').rows[i].cells[j].childNodes[0].value + '/';
}
}
textos4 = textos4 + ';';
}
document.getElementById("OcultoDatoTabla4").value = textos4;
}


	function facultades(obj){
		obj.value = parseInt(obj.value) + 1;
		var oIdf = obj.value;
		var facultad = document.getElementById("cmbfacultad");
		var escuela = document.getElementById("cmbescuela");
		var dep = document.getElementById("dep_inv");
		
		var strHtml3 = '<input type="text" id="hdndep_' + oIdf + '" name="hdndep_' + oIdf + '" value="' + dep.value + '" disabled="disabled"/>' ;
		var strHtml4 = '<input type="text" id="hdnfacultad_' + oIdf + '" name="hdnfacultad_' + oIdf + '" value="' + facultad.value + '" disabled="disabled"/>' ;
		var strHtml5 = '<input type="text" size="40" id="hdnescuela_' + oIdf + '" name="hdnescuela_' + oIdf+ '" value="' + escuela.value + '" disabled="disabled"/>' ;
    		var strHtml6 = '<img src="images/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar esta opcion?\')){eliminarFilafac(' + oIdf + ');}"/>';
    		strHtml6 += '<input type="hidden" id="fach_' + oIdf +'" name="fach1_" value="' + oIdf + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalle_" + oIdf;
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetall_" + oIdf;	
		objTd3.innerHTML = strHtml4;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalle_" + oIdf;	
		objTd4.innerHTML = strHtml5;
		var objTd5 = document.createElement("td");
		objTd5.id = "tdDetalle_" + oIdf;	
		objTd5.innerHTML = strHtml3;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalle_" + oIdf;	
		objTd6.innerHTML = strHtml6;

		
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd5);
		objTr.appendChild(objTd6);
		

		var objTbody = document.getElementById("tblfac");
		objTbody.appendChild(objTr);
		return false;	//evita que haya un submit por equivocacion.
	}
	function eliminarFilafac(oIdf){
		var objHijo = document.getElementById('rowDetalle_' + oIdf);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		datosTextos();
		return false;
	}
	
	;
function estados(obj){
		obj.value = parseInt(obj.value) + 1;
		var oIde = obj.value;
		var estados = document.getElementById("cmbestados");
		var municipios = document.getElementById("cmbmunicipios");
		var parroquias = document.getElementById("cmbparroquias");
		
		var strHtml3 = '<input type="text" id="hdnparroquias_' + oIde + '" name="hdnparroquias_' + oIde + '" value="' + parroquias.value + '" disabled="disabled"/>' ;
		var strHtml4 = '<input type="text" id="hdnestados_' + oIde + '" name="hdnestados_' + oIde + '" value="' + estados.value + '" disabled="disabled"/>' ;
		var strHtml5 = '<input type="text" id="hdnmunicipios_' + oIde + '" name="hdnmunicipios_' + oIde + '" value="' + municipios.value + '" disabled="disabled"/>' ;
    		var strHtml6 = '<img src="images/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar esta opcion?\')){eliminarFilaes(' + oIde + ');}"/>';
    		strHtml6 += '<input type="hidden" id="esth1_' + oIde +'" name="esth1_" value="' + oIde + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalle1_" + oIde;
		var objTd3 = document.createElement("td");
		objTd3.id = "tdDetalle1_" + oIde;	
		objTd3.innerHTML = strHtml4;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalle2_" + oIde;	
		objTd4.innerHTML = strHtml5;
		var objTd5 = document.createElement("td");
		objTd5.id = "tdDetalle3_" + oIde;	
		objTd5.innerHTML = strHtml3;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalle4_" + oIde;	
		objTd6.innerHTML = strHtml6;

		
		objTr.appendChild(objTd3);
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd5);
		objTr.appendChild(objTd6);

		var objTbody = document.getElementById("tbledo");
		objTbody.appendChild(objTr);
		return false;	//evita que haya un submit por equivocacion.
	}
	function eliminarFilaes(oIde){
		var objHijo = document.getElementById('rowDetalle1_' + oIde);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		datosTextos1();
		return false;
	}
	;

function publica(obj){
		obj.value = parseInt(obj.value) + 1;
		var oIdp = obj.value;
		var nompub = document.getElementById("publica_nom").value;
		var numpub = document.getElementById("publica_n").value;

	
		var strHtml4 = '<input type="text" id="onompub' + oIdp + '" name="onompub' + oIdp + '" value="' + nompub + '" disabled="disabled"/>' ;
		var strHtml5 = '<input type="text" id="onumpub' + oIdp + '" name="onumpub' + oIdp + '" value="' + numpub + '" disabled="disabled"/>' ;
    		var strHtml6 = '<img src="images/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar esta opcion?\')){eliminarFilapub(' + oIdp + ');}"/>';
    		strHtml6 += '<input type="hidden" id="hdnpub_' + oIdp +'" name="hdnpub_" value="' + oIdp + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalle2_" + oIdp;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalle5_" + oIdp;	
		objTd4.innerHTML = strHtml4;
		var objTd5 = document.createElement("td");
		objTd5.id = "tdDetalle6_" + oIdp;	
		objTd5.innerHTML = strHtml5;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalle7_" + oIdp;	
		objTd6.innerHTML = strHtml6;

		objTr.appendChild(objTd4);
		objTr.appendChild(objTd5);
		objTr.appendChild(objTd6);

		var objTbody = document.getElementById("tblpub");
		objTbody.appendChild(objTr);
		return false;	//evita que haya un submit por equivocacion.


	}
	function eliminarFilapub(oIdp){
		var objHijo = document.getElementById('rowDetalle2_' + oIdp);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		datosTextos2();
		return false;
	}
	;
	
function privada(obj){
		obj.value = parseInt(obj.value) + 1;
		var oIdi = obj.value;
		var nompri = document.getElementById("privada_nom");
		var numpri = document.getElementById("privada_n");
		
	
		var strHtml4 =  '<input type="text" id="nomprio_' + oIdi + '" name="nomprio_' + oIdi + '" value="' + nompri.value + '" disabled="disabled"/>' ;
		var strHtml5 =  '<input type="text" id="numprio_' + oIdi + '" name="numprio_' + oIdi + '" value="' + numpri.value + '" disabled="disabled"/>' ;
    		var strHtml6 = '<img src="images/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar esta opcion?\')){eliminarFilapri(' + oIdi + ');}"/>';
    		strHtml6 += '<input type="hidden" id="hdnpri_' + oIdi +'" name="hdnpri" value="' + oIdi + '" />';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalle3_" + oIdi;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalle8_" + oIdi;	
		objTd4.innerHTML = strHtml4;
		var objTd5 = document.createElement("td");
		objTd5.id = "tdDetalle9_" + oIdi;	
		objTd5.innerHTML = strHtml5;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalle10_" + oIdi;	
		objTd6.innerHTML = strHtml6;

		
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd5);
		objTr.appendChild(objTd6);

		var objTbody = document.getElementById("tblpri");
		objTbody.appendChild(objTr);
		return false;	//evita que haya un submit por equivocacion.
	}
	function eliminarFilapri(oIdi){
		var objHijo = document.getElementById('rowDetalle3_' + oIdi);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		datosTextos3();
		return false;
	}
	;

function otra(obj){
		obj.value = parseInt(obj.value) + 1;
		var oIda = obj.value;
		var acc = document.getElementById("accion");
		var stt = document.getElementById("estatus");
		
	
		var strHtml4 = '<input type="text" id="acco_' + oIda + '" name="acco_' + oIda + '" value="' + acc.value + '" disabled="disabled"/>' ;
		var strHtml5 = '<input type="text" id="stto_' + oIda + '" name="stto_' + oIda + '" value="' + stt.value + '" disabled="disabled"/>' ;
    		var strHtml6 = '<img src="images/delete.png" width="16" height="16" alt="Eliminar" onclick="if(confirm(\'Realmente desea eliminar esta opcion?\')){eliminarFilaacc(' + oIda + ');}"/>';
		var objTr = document.createElement("tr");
		objTr.id = "rowDetalle4_" + oIda;
		var objTd4 = document.createElement("td");
		objTd4.id = "tdDetalle11_" + oIda;	
		objTd4.innerHTML = strHtml4;
		var objTd5 = document.createElement("td");
		objTd5.id = "tdDetalle12_" + oIda;	
		objTd5.innerHTML = strHtml5;
		var objTd6 = document.createElement("td");
		objTd6.id = "tdDetalle13_" + oIda;	
		objTd6.innerHTML = strHtml6;

		
		objTr.appendChild(objTd4);
		objTr.appendChild(objTd5);
		objTr.appendChild(objTd6);

		var objTbody = document.getElementById("tblaccion");
		objTbody.appendChild(objTr);
		return false;	//evita que haya un submit por equivocacion.
	}
	function eliminarFilaacc(oIda){
		var objHijo = document.getElementById('rowDetalle4_' + oIda);
		var objPadre = objHijo.parentNode;
		objPadre.removeChild(objHijo);
		datosTextos4();
		return false;
	}
	;