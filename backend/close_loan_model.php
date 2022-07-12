<?php
session_start();
require_once '../config/db.php';


$id = $_POST['id'];

$sqlGet = "SELECT `activity`, `loan_id`, `no_emi_left` FROM `loan_ac` as loan INNER JOIN `customer` as cus WHERE loan.`customer_id`=cus.`cid` AND cus.`cid`='$id'";
$sql = $conn->prepare($sqlGet);
$sql->execute();
$activity = $sql->fetch();
$loan_id =  $activity[1];
$emi = $activity[2];
if ($activity[0] == 2) {
    echo "Application Already Closed!";
} else if ($activity[0] == 3) {
    echo 'Account Already Rejected!';
} else if ($activity[2] >0) {
    echo $emi.' nos. emi left. Clear All EMIs then close account';
} else {
    $sqlUpRej = "UPDATE `loan_ac` SET `activity`='2' WHERE `loan_id` ='$loan_id'";
    $sqlRej = $conn->prepare($sqlUpRej);
    if ($sqlRej->execute()) {
        echo "Loan Closed";
    } else {
        echo "Something went wrong!";
    }
}
