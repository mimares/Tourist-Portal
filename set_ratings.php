<?php
require_once 'includes/db_config.php';
header("Content-Type: application/json");
$id = mysqli_real_escape_string($connect,$_POST['id']);
$rating = mysqli_real_escape_string($connect,$_POST['rating']);
$userId = $_SESSION['id'];

$sql = "SELECT id FROM tour_user_rating WHERE id_tour = $id AND id_user = $userId";
$query = mysqli_query($connect,$sql);
$result = mysqli_num_rows($query);
if($result > 0) {
    echo json_encode('error');
    exit;
}

$sql = "INSERT INTO tour_user_rating(id_tour,id_user) VALUES ($id,$userId)";
$query = mysqli_query($connect,$sql);

$sql = "SELECT id_tour, rating,rating_count FROM tour WHERE id_tour = $id;";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_assoc($query);

$ratingCount = (int)$result['rating_count'] +1;
$newRating = (double)$result['rating'] + (double)$rating;

$sql = "UPDATE tour SET rating = $newRating, rating_count =$ratingCount WHERE id_tour = $id;";
$query = mysqli_query($connect,$sql);
if($query) {
    echo json_encode('success');
    exit;
}

