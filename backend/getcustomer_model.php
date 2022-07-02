<?php
session_start();
require_once '../config/db.php';



$acc = $_POST['accno'];
    $searchQuery = "SELECT * FROM `loan_ac` as loan INNER JOIN `customer` as cus WHERE loan.`customer_id`=cus.`cid` AND loan.`loan_ac_no`='$acc' AND `activity`='1' ";
    $getSql = $conn->prepare($searchQuery);
    if ($getSql->execute()) {
        $data = $getSql->fetch();
        echo json_encode($data);
    }