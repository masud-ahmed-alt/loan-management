<?php

require_once '../config/db.php';
session_start();

$username = $_POST['username'];
$name = $_POST['fullname'];
$adds = $_POST['adds'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = md5($_POST['password']);

$sqlAuth = "SELECT * FROM `authenticate_user` WHERE `username` ='$username' ";
$sql = $conn->prepare($sqlAuth);
$sql->execute();
if ($sql->rowCount() == 0) {
    $sqlEmp = "SELECT * FROM `employee` WHERE `name`='$name' AND `phone`='$phone' AND `email`='$email' ";
    $emp = $conn->prepare($sqlEmp);
    $emp->execute();
    if ($emp->rowCount() == 0) {

        $sqlAuthAdd = "INSERT INTO `authenticate_user` (`username`, `password`, `user_roll`, `session_id`) 
                                                VALUES ('$username','$pass','master_employee','00000')";

        $auth = $conn->prepare($sqlAuthAdd);
        if ($auth->execute()) {

            $lastId = $conn->lastInsertId();
            $sqlEmpAdd = "INSERT INTO `employee`(`auth_id`, `name`, `adds`, `phone`, `email`, `is_active`, `pro_image`, `status`) 
                                            VALUES ('$lastId','$name','$adds','$phone','$email','0','NA','1')";

            $add = $conn->prepare($sqlEmpAdd);
            if ($add->execute()) {
                echo 100;
            } else {
                echo "Something wents wrong";
            }
        } else {
            echo "Something wents wrong";
        }
    } else {
        echo "User Already Exists!";
    }
} else {
    echo "User Already Exists!";
}
