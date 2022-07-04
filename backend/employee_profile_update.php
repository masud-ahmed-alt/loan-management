<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';

$eid = $_POST['eid'];
$ename = $_POST['ename'];
$ephone = $_POST['ephone'];
$eemail = $_POST['eemail'];
$eadds = $_POST['eadds'];

$sql = "UPDATE `employee` SET `name`='$ename',`adds`='$eadds',`phone`='$ephone',`email`='$eemail' WHERE `eid`='$eid'";
updateData($conn,$sql);
