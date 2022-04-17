<?php
require_once "./config.php";

if(!isset($_SESSION["userid"])){
    header("location: ". BURL);
    exit();
}else{
    session_unset();
    session_destroy();
    
    header("location:". BURL);
    exit();
}