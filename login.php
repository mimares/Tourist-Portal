
<html>

<head>
    <title>Login Page</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body bgcolor = "#FFFFFF">
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    <form action = "includes/login.inc.php" method = "POST">
                        <label>Username </label><input type = "text" name = "username" class = "form-control"/>
                        <label>Password </label><input type = "password" name = "password" class = "form-control" />
                        <button  type = "submit" name="submit" class = "btn btn-primary btn-block mt-3"><i class="fa fa-sign-in"></i> Login</button>
                        <div>
                            <?php
                            if(isset($_GET['error'])) {
                                if($_GET['error'] == 'true')
                                    echo '<p class="text-danger text-center">Your password or username is incorrect</p>';
                                if($_GET['error'] == 'fatal')
                                    echo '<p class="text-danger text-center">Oops something went wrong...</p>';
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>