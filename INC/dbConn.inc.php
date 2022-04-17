<?php 

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "picnic_system";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection faild" . mysqli_connect_error());
}