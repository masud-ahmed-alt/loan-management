<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';


$currPass = md5($_POST['currPass']);
$newPass = md5($_POST['newPass']);
$authId = $_POST['au_id'];

$getPass = "SELECT * FROM `authenticate_user` WHERE `au_id`='$authId' AND `password`='$currPass'";
$sqlUpPass = $conn->prepare($getPass);
$sqlUpPass->execute();

if ($sqlUpPass->rowCount() == 1) {
    $upPass = "UPDATE `authenticate_user` SET `password`='$newPass' WHERE `au_id`='$authId'";
    $sql = $conn->prepare($upPass);

    if ($sql->execute())
        echo 'Password Changed';
    else
        echo 'Something went wrong';
} else
    echo "Current Password doesn't match";
