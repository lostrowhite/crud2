<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION["usuario"])){
header("location:index.php");}
require('clases/configrestore.php');
$file = isset($_FILES["c_ruta"]["name"]) ? "backup/".$_FILES["c_ruta"]["name"] : NULL;  
$newImport=new backup_restore('localhost','exten','root','','*',$file);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>SIS-COP | Cooperativa de Transportes Roosevelt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<script type="text/javascript" src="js/func.js"></script>
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_400.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_BT_700.font.js" type="text/javascript"></script>
<script src="js/NewsGoth_Dm_BT_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
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
<!-- HEADER --><!-- CONTENT -->
  <div id="content1">
	  <div class="indent">
      
<form name="form1" id="form1" method='post' action="rbackup.php" enctype="multipart/form-data">
<table width="50%" border="1" align="center">
<tr>
  <td width="47%" align="center" id="rbackup">
<input class="field2" type="submit" name="restore" value="Restaurar Backup" />
  </td>
<td width="53%" align="center" id="sbackup"><input type="file" name="c_ruta" id="c_ruta" /></td>
</tr>
<tr>
  <td colspan="2" align="center"></td>
  </tr>
<tr>
  <td colspan="2" align="center">
    <div class="field2">
     <?php if(isset($_REQUEST['restore'])){ 
//call of restore function
$message=$newImport -> restore ();
echo $message;
}
?>
      </div></td>
</tr>
</table></form>
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