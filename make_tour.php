<?php require "includes/db_config.php" ?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Insert Tour</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" type="text/css"/>
</head>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <form method="post" enctype="multipart/form-data" class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="title"><br>
                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" class="form-control" value="2019-06-06T12:12"><br>
                <select id="location" name="multiselect[]" class="form-control" multiple="multiple">
                    <?php
                    if(!isset($_POST['insertData'])) {
                        $sql = "SELECT * FROM location";
                        $query = mysqli_query($connect, $sql);
                        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($results as $result) {
                            echo "<option value=\"{$result['id_location']}\">{$result['title_l']}</option>";
                        }
                    }
                    ?>
                </select>
                <input id="private_tour" type="checkbox" name="private_tour"><label for="private_tour">Private Tour</label>
                <button class="btn btn-primary btn-block mt-3" type="submit" name="insertData">Insert</button>
                <a href="index.php">Back</a>
            </form>
        </div>
    </div>
</div>

<script>
    $('#location').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        buttonWidth: '100%'
    });
</script>

<?php
if(isset($_POST['insertData'])) {


    $title = mysqli_real_escape_string ($connect,$_POST['title']);
    $date = mysqli_real_escape_string ($connect,$_POST['date']);
    $isPrivate = boolval(mysqli_real_escape_string($connect,$_POST['private_tour'])) ? 1 : 0;
    $id = $_SESSION['id'];
    $location = $_POST['multiselect'];
    $sql = "INSERT INTO tour(id_user, title_t, date_t, is_private) VALUES($id,'$title','$date','$isPrivate');";
    $query = mysqli_query ($connect,$sql);


    $sql = "SELECT id_tour FROM tour ORDER BY id_tour DESC LIMIT 1";
    $query = mysqli_query($connect,$sql);
    $lastId = mysqli_fetch_assoc($query)['id_tour'];


    foreach ($location as $key => $value) {
        $sql = "INSERT INTO tour_location(id_tour,id_location) VALUES($lastId,$value)";
        $query = mysqli_query($connect,$sql);
    }



    if(empty($title) or empty($date)){
        header ("Location: index.php?error=empty&submit=insert");
        exit();
    }



    if(mysqli_affected_rows ($connect) < 1){
        header ("Location: index.php?error=errorQuery&submit=insert");
        exit();
    }

    header ("Location: index.php?error=success&submit=insert");
    exit();

}

