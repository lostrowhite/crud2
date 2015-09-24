<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");
} 
		
		require('clases/cliente.class.php');
		$objCliente=new Cliente;
		$consulta = $objCliente->montoprestamos();
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
            	<tr align="left" class="head">
                    <th>Préstamo</th>
                    <th>Monto Mínimo</th>
                    <th>Monto Máximo</th>
                </tr>
            </thead>
            <tbody>
            	<?php
				while($row = mysql_fetch_array($consulta))
				{
					$id = $row['id'];
					?>
					<tr >
                        <td><div class="text1" id="id-<?php echo $id ?>"><?php 
						if ($row['id_tp']=='1'){
							echo "Motor-Gasoil";
						}elseif($row['id_tp']=='2'){
							echo "Motor-Gasolina";
						}elseif($row['id_tp']=='3'){
							echo "Personal";
								}
								?></div></td>
                        <td><div class="text1" id="montomi-<?php echo $id ?>"><?php echo $row['montomi']?></div></td>
                        <td><div class="text1" id="montoma-<?php echo $id ?>"><?php echo $row['montoma']?></div></td>
                    </tr>
					<?php
				}
				 ?>
                 					<tr>
					  <td colspan="4"><div class="field2" align="center">
     	</b></em></a>
      </div></td>
			    </tr>
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