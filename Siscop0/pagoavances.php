<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->pagoavances();

$anos = array(
			"2012"=>"2012",
			"2013"=>"2013",
			"2014"=>"2014",
			"2015"=>"2015",
			"2016"=>"2016",
			"2017"=>"2017",
			"2018"=>"2018",
			"2019"=>"2019"
		 );
$meses = array(
			"1"=>"Enero",
			"2"=>"Febrero",
			"3"=>"Marzo",
			"4"=>"Abril",
			"5"=>"Mayo",
			"6"=>"Junio",
			"7"=>"Julio",
			"8"=>"Agosto",
			"9"=>"Septiembre",
			"10"=>"Octubre",
			"11"=>"Noviembre",
			"12"=>"Diciembre"
		 );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, #header .row-2 ul li a, .extra img, #search-form a, #search-form a em, #login-form .field1 a, #login-form .field1 a em, #login-form .field1 a b');
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page6">
<div id="main">
<!-- HEADER -->
  <div id="header1">
                <div id="content1">
     <div class="indent">
    <fieldset id="content">
<form id="form1">
  <table width="400" border="0" align="center" id="table">
            <thead>
            <tr class="head">
                    <th colspan="4">Para editar haga click en el campo</th>
                </tr>
            	<tr class="head">
                    <th>ID</th>
                    <th>Monto</th>
                    <th>Mes</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
            	<?php
				while($row = mysql_fetch_array($consulta))
				{
					$id = $row['id'];
					?>
					<tr >
                        <td ><div class="text" id="id-<?php echo $id ?>"><?php echo $row['id']?></div></td>
                        <td><div class="text" id="monto-<?php echo $id ?>"><?php echo $row['monto']?></div></td>
                        <td><div class="meses" id="meses-<?php echo $id ?>"><?php echo $meses[$row['mes']]?></div></td>
                        <td><div class="anos" id="anos-<?php echo $id ?>"><?php echo $anos[$row['ano']]?></div></td>
                    </tr>
					<?php
				}
				 ?>
            </tbody>
        </table>
</form>
    </fieldset>
     </div>     
  </div>
    <div id="footer1">
      <div class="footer-nav">
      </div>
    </div>
</div>
<!-- FOOTER -->
</div>
<script type="text/javascript">
Cufon.now();
</script>
</body>
</html>