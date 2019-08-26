<?php
require_once 'includes/db_config.php';

$sql = "SELECT id_tour,rating,rating_count FROM tour";
$query = mysqli_query($connect,$sql);
$results = mysqli_fetch_all($query,MYSQLI_ASSOC);
$data = [];
foreach ($results as $result) {
    if($result['rating'] == 0) {
        continue;
    }
    $data[] = [
        'tour_id' => $result['id_tour'],
        'rating' => (string)((double)$result['rating']/(double)$result['rating_count'])
    ];
}
header("Content-Type: application/json");
echo json_encode($data);
