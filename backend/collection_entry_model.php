<?php
session_start();
require_once '../config/db.php';


$acc = $_POST['accno'];
$loan_id = $_POST['loan_id'];
$emiamt = $_POST['emiamt'];
$fineamt = $_POST['fineamt'];
$tamt = $_POST['tamt'];
$user = $_SESSION['user'][0][0];
$cus_id = $_POST['cus_id'];


$sqlCollect = "INSERT INTO `collect_emi`(`fine_amount`, `emi_amount`, `total_amount`, `collected_by`, `loan_id`, `customer_id`) 
                                VALUES ('$fineamt','$emiamt','$tamt','$user','$loan_id','$cus_id')";

$sql = $conn->prepare($sqlCollect);
if($sql->execute()){

    $sqlGetLoan = "SELECT `no_emi_left` FROM `loan_ac` WHERE loan_id='$loan_id'";

    $getEmi = $conn->prepare($sqlGetLoan);
    $getEmi ->execute();
    $data = $getEmi->fetch();
    $emi = $data['no_emi_left'];
    $emi = $emi-1;

    $sqlUpLoan = "UPDATE `loan_ac` SET `no_emi_left`='$emi' WHERE loan_id='$loan_id'";
    $sqlUpdate = $conn->prepare($sqlUpLoan);
    if($sqlUpdate ->execute()){
        echo 'Collection Entry Success';
    }

}else{
    echo 'Something wrong';
}





