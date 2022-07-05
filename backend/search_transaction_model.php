<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';

$loan_id = $_POST['loan_id'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];


$sqlCollect = "SELECT * FROM `collect_emi` WHERE `collection_date` BETWEEN '$startdate' AND '$enddate' AND `loan_id`='$loan_id'  ORDER BY `collection_date` DESC";
getSql($conn, $sqlCollect);







