<?php
include("includes/db_config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($database,$_POST['username']);
    $mypassword = mysqli_real_escape_string($database,$_POST['password']);

    $sql = "SELECT id FROM user WHERE username = '$myusername' and passcode = '$mypassword'";
    $result = mysqli_query($database,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        session_register("myusername");
        $_SESSION['login_user'] = $myusername;

        header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>

<head>
    <title>Login Page</title>
    <link href="css/responsive.css" rel="stylesheet">
    <style type = "text/css">
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }
        label {
            font-weight:bold;
            width:100px;
            font-size:14px;
        }
        .box {
            border:#666666 solid 1px;
        }
    </style>

</head>

<body bgcolor = "#FFFFFF">

<div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#5F9EA0; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <label>Username </label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password </label><input type = "password" name = "password" class = "box" /><br/><br />
                <input  type = "submit" name="submit" class = "btn btn-submit" value = " Login "/><br />
            </form>
    </div>

</div>

</body>
</html>