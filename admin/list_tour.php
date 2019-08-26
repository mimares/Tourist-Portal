<?php
require "../includes/db_config.php";
if (isset($_SESSION['isAdmin'])) {
    if($_SESSION['isAdmin'] == 0) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
$sql = "SELECT * FROM tour WHERE is_deleted = 0";
$query = mysqli_query ($connect,$sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Tours</title>
</head>
<nav class="navbar navbar-expand navbar-dark bg-primary">
    <i class="fa fa-sign"></i><a class="navbar-brand" href="../index.php">Honest Guide Subotica</a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Početna</a>
        </li>
        <li>
            <a class = "nav-link" href="list_tour.php">Tours</a>
        </li>
        <li class="nav-item">
            <a class = "nav-link" href="list_location.php">Locations</a>
        </li>
        <li>
            <a class = "nav-link" href="list_event.php">Events</a>
        </li>
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Insert
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="insert_event.php">Event</a>
                    <a class="dropdown-item" href="insert_location.php">Location</a>
                    <a class="dropdown-item" href="insert_tour.php">Tour<a>
                </div>
            </div>
        </li>
    </ul>
</nav>
<div class="container mt-5">
    <?php
    $results = mysqli_fetch_all($query,MYSQLI_ASSOC);

    foreach($results as $result) {

        $sql = "SELECT * FROM tour_location tl JOIN location l ON tl.id_location = l.id_location WHERE id_tour = {$result['id_tour']}";
        $query = mysqli_query($connect,$sql);
        $locations = mysqli_fetch_all($query,MYSQLI_ASSOC);

        echo"
     <div class=\"row\">
        <div class=\"col-sm-4 col-md-12 col-lg-4\">
            <form method=\"post\" action=\"update_tour.php\">
        </div>";
        echo '<div class="col-sm-12"></div>';
        echo '<form method="post" action="update_tour.php">';

        foreach ($locations as $location) {
            echo "<div class=\"col-sm-4 col-md-12 col-lg-4\">
                <img src='../assets/images/{$location['pic_l']}' width=\"332\" height=\"500\">
            </div>
            ";

        }
        echo "
        <div class=\"col-sm-8 col-md-6 col-lg-8\">
                <strong>Title: </strong>{$result['title_t']}<br>
                <strong>Date: </strong>{$result['date_t']}<br>
                
                <input type=\"hidden\" name=\"id\" value=\"{$result['id_tour']}\" >
                <button class=\"btn btn-primary mt-3\"  name=\"delete\" value='delete'>DELETE</button>
          </form>
        </div>
     </div>
    
     <hr>
";
    }
    ?>
</div>
