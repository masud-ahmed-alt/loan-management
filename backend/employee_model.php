<?php
session_start();
require_once '../config/db.php';

$sqlEmp = "SELECT * FROM `authenticate_user` as au INNER JOIN `employee` as em WHERE `au`.`au_id`=`em`.`auth_id` AND em.status=1";
$sql  = $conn->prepare($sqlEmp);
$sql->execute();
echo json_encode($sql->fetchAll());