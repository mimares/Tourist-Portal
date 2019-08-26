<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" >

</head><!--/head-->

<body>
<div class="center-block">
    <form class="px-4 py-3" action = "includes/login.admin.php" method = "POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control input-group-lg col-lg-4 col-lg-offset-4" name = "username">
        </div>
        <div class="form-group">
            <label for="exampleDropdownFormPassword1">Password</label>
            <input type="password" name="password" class="form-control col-lg-4 " id="exampleDropdownFormPassword1" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
                Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
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
</body>
</html>