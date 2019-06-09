<?php

include("db_config.php");
session_start();
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$username';";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


    if(!password_verify($password,$row['password']) or $count < 1) {
        header('Location: ../login.php?error=true');
        exit;

    }

    $_SESSION['username'] = $row['username'];
    header('Location: ../index.php');
    exit;
} else {

    header('Location: ../login.php?error=fatal');
    exit;
}