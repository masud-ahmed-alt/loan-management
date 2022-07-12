<?php
session_start();
require_once '../config/db.php';


$id = $_POST['id'];

$sqlGet = "SELECT `activity`, `loan_id` FROM `loan_ac` as loan INNER JOIN `customer` as cus WHERE loan.`customer_id`=cus.`cid` AND cus.`cid`='$id'";
$sql = $conn->prepare($sqlGet);
$sql->execute();
$activity = $sql->fetch();
$loan_id =  $activity[1];
if ($activity[0] == 1) {
    echo "Application Already Accepted!";
} else if ($activity[0] == 2) {
    echo 'Account Already Closed!';
} else if ($activity[0] == 3) {
    echo 'Account Already Rejected!';
} else {
    $sqlUpRej = "UPDATE `loan_ac` SET `activity`='1' WHERE `loan_id` ='$loan_id'";
    $sqlRej = $conn->prepare($sqlUpRej);
    if ($sqlRej->execute()) {
        echo "Loan Application Accepted!";
    } else {
        echo "Something went wrong!";
    }
}
