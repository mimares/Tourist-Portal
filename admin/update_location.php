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
    $sql = "SELECT * FROM location WHERE id_location = $id;";
    $query = mysqli_query ($connect, $sql);
    $result = mysqli_fetch_assoc ($query);
    ?>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4 offset-2">
                <img class="img-fluid" src="../assets/images/<?= $result['pic_l']?>" alt=\"$altName[0]\" width="332" height="500">
            </div>
            <div class="col-sm-4">
                <form method="post" action="update_location.php" enctype="multipart/form-data" class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= $result['title_l'] ?>"><br>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="<?= $result['description_l'] ?>"><br>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="picture" id="picture">
                        <label class="custom-file-label" for="picture">Choose Picture</label>
                    </div>
                    <input type="hidden" name="id" value="<?=$result['id_location']?>">
                    <button class="btn btn-primary btn-block mt-3" type="submit" name="updateData">Insert</button>
                </form>
            </div>
        </div>
    </div>
    <?php
}

if(isset($_POST['updateData'])) {

    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $id = mysqli_real_escape_string($connect, $_POST['id']);

    $picture = $_FILES['picture'];
    $pictureName = $_FILES['picture']['name'];
    $pictureTmp = $_FILES['picture']['tmp_name'];

    if ($pictureTmp != '') {

        $pictureDestination = "../assets/images/" . $pictureName;
        $upload = move_uploaded_file($pictureTmp, $pictureDestination);

        if (!$upload) {
            header("Location: index.php?error=errorUpload&submit=list");
            exit();
        }
        $sql = "UPDATE location SET title_l = '$title',description_l = '$description',pic_l = '$pictureName' WHERE id_location = $id;";
    } else {
        $sql = "UPDATE location SET title_l = '$title',description_l = '$description' WHERE id_location = $id;";
    }


    $query = mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) < 1) {
        header("Location: index.php?error=errorQuery&submit=list");
        exit();
    }

    header("Location: index.php?error=success&submit=list");
    exit();

}
else if(isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    $sql = "DELETE FROM location WHERE id_location = $id;";
    $query = mysqli_query($connect, $sql);
    if (mysqli_affected_rows($connect) < 1) {
        header("Location: index.php?error=errorQuery&submit=list");
        exit();
    }
    header("Location: index.php?error=success&submit=list");
    exit();
}
