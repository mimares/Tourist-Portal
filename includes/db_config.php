<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "touristportal";
$connect = mysqli_connect($host,$username,$password,$database);
if(!$connect){
    header("Location: error.php");
    die();
}