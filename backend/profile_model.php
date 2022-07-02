<?php

require_once '../config/db.php';
session_start();

$auth = $_SESSION['user'][0][0];

$sqlProfile = "SELECT * FROM `authenticate_user` as au INNER JOIN `employee` em WHERE au.au_id=em.auth_id AND em.auth_id = '$auth'";
$sql = $conn->prepare($sqlProfile);
$sql->execute();
$data = $sql->fetch();
echo json_encode($data);