<?php

require_once '../config/db.php';
session_start();



$username = $_POST['username'];
$pass = md5($_POST['password']);

$query = "SELECT * FROM `authenticate_user` WHERE  `username`='$username' AND `password` = '$pass' AND `status` = '1' ";

$sql = $conn->prepare($query);

$sql->execute();

if ($count = $sql->rowCount() == 1) {
    echo json_encode($sql->fetch()); //login success
    $_SESSION['user'] = getAllData($conn, $query);
} else {
    echo 101; //incorrect credentials
}


function getAllData($conn, $sqli)
{
    $data = $conn->prepare($sqli);
    $data->execute();
    return $data->fetchAll();
}
