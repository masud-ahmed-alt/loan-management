<?php
session_start();
require_once '../config/db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comm = $_POST['commission'];
$adds = $_POST['adds'];
$pan = $_POST['pancard'];
$voter = $_POST['voter'];
$pass = md5($_POST['password']);
$userroll = "master_agent";

$sess = $_SESSION['user'];

$getsql = "SELECT * FROM `authenticate_user` JOIN `agent` WHERE `name`='$name' AND `phone`='$phone' AND `email`='$email' 
                                                AND `comm_per`='$comm' AND `pan_card`='$pan' AND `voter_id`='$voter' ";

$getAgent = $conn->prepare($getsql);


if ($getAgent->execute()) {
    // echo $getAgent->rowCount();
    if ($getAgent->rowCount() == 0) {

        $sqlAuth = "INSERT INTO `authenticate_user`(`username`, `password`, `user_roll`, `session_id`) 
                                                VALUES ('$email','$pass','$userroll','$sess')";
        $insertAuth = $conn->prepare($sqlAuth);


        if ($insertAuth->execute()) {
            $last_id = $conn->lastInsertId();

            // is_active: 0-> deactive and 1-> active 
            // status: 0->deleted amd 1-exists

            $insertsql = "INSERT INTO `agent`(`name`, `auth_id`, `phone`, `email`, `comm_per`, `adds`, `is_active`, `voter_id`, `pan_card`, `status`) 
                                        VALUES ('$name','$last_id', '$phone','$email','$comm','$adds','0','$voter','$pan','1')";

            $insertAgent = $conn->prepare($insertsql);

            if ($insertAgent->execute()) {
                echo "Agent added successfully!";
            } else {
                echo "Something went wrong : ";
            }
        } else {
            echo "Error in insert to authenticate_user";
        }
    } else {
        echo "Agent Already Exists!";
    }
} else {
    echo "Error";
    
}
