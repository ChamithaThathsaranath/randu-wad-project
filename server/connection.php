<?php
$dbServerName="localhost";
$dbUserName="root";
$dbPassword="1597";
$dbName="phpProject";

$connect=mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

if(!$connect){

    die("connection failed : ".mysqli_connect_error());
}

?>