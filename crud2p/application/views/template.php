<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <title>Template</title>
     <?= $_styles ?>
   <?= $_scripts ?> 
   <style type="text/css">
      body {
      background-color: #fff;
      font-family:      Lucida Grande, Verdana, Sans-serif;
      font-size:        12px;
      color:            #000;
      }
      
      #content  {
      border:           #999 1px solid;
      background-color: #fff;
      padding:       20px 20px 12px 20px;
      }
      
      h1 {
      font-weight:      normal;
      font-size:        14px;
      color:            #990000;
      margin:        0 0 4px 0;
      }
      
      a {
         color: #069;
         text-decoration: none;
      }
      a:hover {
         color: #900;
      }
      
      p {
         line-height: 1.55;
      }
   </style>
</head>
<body>
   
   <div id="content">

      <?php echo $content ?>
   </div>
   
<table width="900px" align="center">
	<tr>
<td align="center"><p style='font-size:10'>extenso@ucv.ve | SIS-DEU | © Copyright 2014.</p></td>
	</tr>
	</table>   
</body>
</html>