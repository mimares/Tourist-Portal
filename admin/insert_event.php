<?php require "../includes/db_config.php" ;
if (isset($_SESSION['isAdmin'])) {
    if($_SESSION['isAdmin'] == 0) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
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
        <title>Admin strana</title>
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
        <div class="row">
            <div class="col-sm-6 offset-3">
                <form method="post" action="insert_event.php" enctype="multipart/form-data" class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required><br>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" required><br>
                    <label>Location</label>
                    <select name="location" class="form-control" required>
                        <option value="">Select Location</option>
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
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control"><br>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="picture" name="picture" required>
                        <label class="custom-file-label"  for="picture">Choose Picture</label>
                    </div>
                    <button class="btn btn-primary btn-block mt-3" type="submit" name="insertData">Insert</button>
                </form>
            </div>
        </div>
    </div>

<?php
if(isset($_POST['insertData'])) {

    $title = mysqli_real_escape_string ($connect,$_POST['title']);
    $description = mysqli_real_escape_string ($connect,$_POST['description']);
    $date = mysqli_real_escape_string ($connect,$_POST['date']);
    $location = mysqli_real_escape_string($connect,$_POST['location']);

    $picture = $_FILES['picture'];
    $pictureName = $_FILES['picture']['name'];
    $pictureTmp = $_FILES['picture']['tmp_name'];
    $pictureSize  = $_FILES['picture']['size'];
    $pictureType = $_FILES['picture']['type'];

    if(empty($title) or empty($description) or empty($date)or empty($picture)){
        header ("Location: index.php?error=empty&submit=insert");
        exit();
    }
    if($pictureSize > 10000000 or $pictureType !== 'image/jpeg'){
        header ("Location: index.php?error=errorImage&submit=insert");
        exit();
    }
    $pictureDestination = "../assets/images/".$pictureName;
    $upload = move_uploaded_file($pictureTmp,$pictureDestination);
    if(!$upload){
        header ("Location: index.php?error=errorUpload&submit=insert");
        exit();
    }
    $sql = "INSERT INTO event(id_location, title_e, description_e, date_e, pic_e) VALUES($location,'$title','$description','$date','$pictureName');";
    $query = mysqli_query ($connect,$sql);

    if(mysqli_affected_rows ($connect) < 1){
        header ("Location: index.php?error=errorQuery&submit=insert");
        exit();
    }

    header ("Location: index.php?error=success&submit=insert");
    exit();

}
