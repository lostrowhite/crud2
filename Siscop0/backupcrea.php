<?php
require('clases/configbackup.php');
$newImport = new backup_restore ('localhost','exten','root','','*');
if(isset($_REQUEST['backup'])){
//call of backup function
$message=$newImport -> backup ();
echo $message;
}
?>