<?php
session_start();
require_once '../config/db.php';

$fine_name = $_POST['fine_name'];
$percentage = $_POST['percentage'];
$fine_desc = $_POST['fine_desc'];


$sqlfineget = "SELECT * FROM `fine_master` WHERE `fine_name` ='$fine_name' AND `fine_percent`='$percentage' AND `description`='$fine_desc'";

$fine = $conn->prepare($sqlfineget);
$fine->execute();

if($fine->rowCount()==0){
    $sqlfineinsert = "INSERT INTO `fine_master`(`fine_name`, `fine_percent`, `description`, `status`) 
                                        VALUES ('$fine_name','$percentage','$fine_desc','1')";
    
    $fineIns = $conn->prepare($sqlfineinsert);
    if($fineIns->execute()){
        echo "Fine master added";
    }else{
        echo "Something wents wrong!";
    }
}else{
    echo "Already Exists!";
}