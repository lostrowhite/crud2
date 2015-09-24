// JavaScript Document
$(document).ready(function() {
	 
	 // ambos procesaran en save.php
	 
	 // servira para editar los de tipo input text.
     $('.text').editable('save.php');
	 $('.text1').editable('spre.php');
	 
	 // servira para editar el cuadro combinado de paises
	 	 $('.estado').editable('sveh.php', { 
		 data   : " {'Servicio':'Servicio','Inactivo':'Inactivo'}",
		 type   : 'select',
		 submit : 'OK',
	 });
 	 $('.ruta').editable('sveh.php', { 
		 data   : " {'1':'Carmelitas','2':'Chacaito','3':'Previsora'}",
		 type   : 'select',
		 submit : 'OK',
	 });
	 
	 $('.anos').editable('save.php', { 
		 data   : " {'2012':'2012','2013':'2013','2014':'2014', '2015':'2015','2016':'2016','2017':'2017','2018':'2018','2019':'2019'}",
		 type   : 'select',
		 submit : 'OK'
	 });
	 	 $('.meses').editable('save.php', { 
		 data   : " {'1':'Enero','2':'Febrero','3':'Marzo', '4':'Abril','5':'Mayo','6':'Junio','7':'Julio','8':'Agosto','9':'Septiembre','10':'Octubre','11':'Noviembre','12':'Diciembre'}",
		 type   : 'select',
		 submit : 'OK'
	 });
 });
