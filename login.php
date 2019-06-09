
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

            <form action = "includes/login.inc.php" method = "POST">
                <label>Username </label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password </label><input type = "password" name = "password" class = "box" /><br/><br />
                <input  type = "submit" name="submit" class = "btn btn-submit" value = " Login "/><br />
                <div>
                    <?php
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == 'true')
                        echo 'Your password or username is incorrect';
                        if($_GET['error'] == 'fatal')
                            echo 'Oops something went wrong...';
                    }
                    ?>
                </div>
            </form>
    </div>

</div>

</body>
</html>