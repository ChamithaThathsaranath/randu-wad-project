<?php 
#this is how logout button work
session_start();
session_destroy();


header("location:login.php");



?>
