<?php
require "../includes/db_config.php";
if (isset($_SESSION['isAdmin'])) {
    if($_SESSION['isAdmin'] == 0) {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}

if(isset($_POST['update'])) {

    $id = mysqli_real_escape_string ($connect, $_POST['id']);
    $sql = "SELECT * FROM tour WHERE id_tour = $id";
    $query = mysqli_query ($connect, $sql);
    $result = mysqli_fetch_assoc ($query);
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
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Insert Tour</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"/>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap-multiselect.css" type="text/css"/>
</head>

     <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <form method="post" action="insert_tour.php" enctype="multipart/form-data" class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="title"><br>
                    <label for="date">Date</label>
                    <input type="datetime-local" name="date" id="date" class="form-control" value="2019-06-06T12:12:12"><br>
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
                    <button class="btn btn-primary btn-block mt-3" type="submit" name="insertData">Insert</button>
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
}
if(isset($_POST['updateData'])) {

    $title = mysqli_real_escape_string ($connect,$_POST['title']);
    $date = mysqli_real_escape_string ($connect,$_POST['date']);
    $id = mysqli_real_escape_string ($connect,$_POST['id_tour']);
    $location = $_POST['multiselect'];
    $sql = "DELETE FROM tour_location WHERE id_tour = $id";
    $query = mysqli_query($connect,$sql);

    $sql = "UPDATE tour SET title_t = '$title',date_t = '$date' WHERE id_location = $id;";
    $query = mysqli_query($connect,$sql);

    foreach ($location as $key => $value) {
        $sql = "INSERT INTO tour_location(id_tour,id_location) VALUES($id,$value)";
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


} else if(isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $sql = "SELECT id_tour_location FROM tour_location WHERE id_tour = $id";
    $query = mysqli_query($connect,$sql);
    $results=mysqli_fetch_all($query,MYSQLI_ASSOC);
    foreach ($results as $result){
        $idTour = $result['id_tour_location'];
        $sql="DELETE FROM tour_location WHERE id_tour_location = $idTour";
        $query= mysqli_query($connect,$sql);
    }
    //var_dump($id);die;
    $sql = "UPDATE tour SET is_deleted = 1 WHERE id_tour = $id;";
    $query = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) < 1) {
        header("Location: index.php?error=errorQuery&submit=list");
        exit();
    }
    header("Location: index.php?error=success&submit=list");
    exit();
}
