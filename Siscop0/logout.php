<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:sec1.php");
} else {
session_unset();
session_destroy();
header("location:paneln.php");
}
?>
