<?php

require_once '../config/db.php';
session_start();

$auth = $_SESSION['user'][0][0];

$sqlProfile = "SELECT * FROM `authenticate_user` as au INNER JOIN `agent` as ag WHERE au.au_id=ag.auth_id AND ag.auth_id='$auth'";
$sql = $conn->prepare($sqlProfile);
$sql->execute();
$data = $sql->fetch();
echo json_encode($data);