<?php
require('clases/configrestore.php');
$file = isset($_FILES["c_ruta"]["name"]) ? "backup/".$_FILES["c_ruta"]["name"] : NULL;  
$newImport=new backup_restore('localhost','users','root','','*',$file);
if(isset($_REQUEST['restore'])){
//call of restore function
$message=$newImport -> restore ();
echo $message;
}
?>