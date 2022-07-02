<?php
session_start();
require_once '../config/db.php';

$cid = $_GET['cid'];
$sqlCus = "SELECT * FROM `customer` as cus INNER JOIN `loan_ac` as loan WHERE cus.cid=loan.customer_id AND cus.cid='$cid'";
$cus = $conn->prepare($sqlCus);

if ($cus->execute()) {
    echo json_encode($data = $cus->fetch());
} else {
    echo "Something wrong!";
}
