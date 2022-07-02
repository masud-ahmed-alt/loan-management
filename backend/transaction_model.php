<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';

$loan_id = $_POST['loan_id'];
$sqlCollect = "SELECT * FROM `collect_emi` WHERE `loan_id` = '$loan_id' ORDER BY  `collection_date` DESC";
getSql($conn, $sqlCollect);
