<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';

$aid = $_POST['aid'];
$aname = $_POST['aname'];
$aphone = $_POST['aphone'];
$aemail = $_POST['aemail'];
$aadds = $_POST['aadds'];
$auid = $_POST['auid'];

$sql = "UPDATE `agent` SET `name`='$aname',`phone`='$aphone',`email`='$aemail',`adds`='$aadds' WHERE `aid`='$aid'";
$sql1 = "UPDATE `authenticate_user` SET `username`='$aemail' WHERE `au_id`='$auid'";
updateData($conn, $sql);
updateData($conn, $sql1);
