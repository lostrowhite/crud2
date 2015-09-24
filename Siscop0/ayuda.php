<html>

<head>


<title>TOOLTIP</title>

<style type="text/css">

table tr td{ background-color:yellow;}

.tooltip{ position: absolute; top: 0; left: 0; z-index: 3; display: none; background-color:white; }

</style>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="js/jquery.simpletip-1.3.1.js"></script>

<script type="text/javascript">

$(function(){

$("#fila_1").simpletip('content', {
   stem: 'topLeft',
   hook: { top: 'topLeft', mouse: true },
   offset: [20, 0]
});
});

</script>

</head>

<body>

<table>

<tr>

<th>Nombre</th>

<th>Dirección</th>


</tr>

<tr id="fila_1"><td>Pepe lopez</td><td>c/ el callejon 292</td></tr>

</table>

<div class="tooltip" id="tooltip_1">Tooltip de prueba1<img width="60" height="30" alt="" /></div>

<div class="tooltip" id="tooltip_2">Tooltip de prueba2<img width="60" height="30" alt="" /></div>


</body>

</html>