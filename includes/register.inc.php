<?php

require_once 'db_config.php';

header('Content-Type: application/json');
if(isset($_POST['js'])){

    $data = [
        "username" => mysqli_real_escape_string($connect,trim($_POST['username'])),
        "email" => mysqli_real_escape_string($connect,trim($_POST['email'])),
        "password" => mysqli_real_escape_string($connect,trim($_POST['password']))
    ];

    foreach ($data as $key => $value) {
        if (empty($value)) {
            exit(json_encode(['error' => 'Please fill in all fields']));
        }
    }
    $password = password_hash($data['password'],PASSWORD_DEFAULT);
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
        exit(json_encode(['error' => 'Email is not valid']));
    }


    $sql = "SELECT id FROM user WHERE email = '{$data['email']}';";
    $query = mysqli_query($connect,$sql);
    if($row = mysqli_num_rows($query) > 0) {
        exit(json_encode(['error' => 'You are already registered']));
    }

    $sql = "INSERT INTO user(email,username,password) VALUES('{$data['email']}','{$data['username']}','$password');";
    $query = mysqli_query($connect,$sql);
    if(!mysqli_affected_rows($connect)) {
        exit(json_encode(['error' => 'Oops something went wrong']));
    }

    exit(json_encode(['success' => 'Thank you for registering.']));

} else {

    exit(json_encode(['error' => 'Oops something went wrong']));

}
