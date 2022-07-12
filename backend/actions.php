<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';

// code for delete fine master 
if ($_POST['del']) {
    $fid = $_POST['fid'];
    $fineDel = "UPDATE `fine_master` SET `status`='0' WHERE `fid` = '$fid'";
    deleteFunc($conn, $fineDel);
} else if ($_POST['active']) {
    $loan_ac = $_POST['loan_ac'];
    $sql = "UPDATE `loan_ac` SET `activity`='1' WHERE `loan_ac_no`='$loan_ac'";
    editFunc($conn, $sql);
}

// code for delete employee 
else if ($_POST['delEmp']) {
    $eid = $_POST['id'];
    $sql = "UPDATE `employee` SET `status`='0' WHERE `eid`='$eid'";
    deleteFunc($conn, $sql);
}
// code for active agent 
else if ($_POST['acvAgt']) {
    $aid = $_POST['aid'];
    $sql = "UPDATE `agent` SET `is_active`='1' WHERE `aid`='$aid'";
    editFunc($conn, $sql);
}
// code for deactive agent 
else if ($_POST['dacvAgt']) {
    $aid = $_POST['aid'];
    $sql = "UPDATE `agent` SET `is_active`='0' WHERE `aid`='$aid'";
    editFunc($conn, $sql);
}
else if ($_POST['delAgt']) {
    $aid = $_POST['aid'];
    $sql = "UPDATE `agent` SET `status`='0' WHERE `aid`='$aid'";
    editFunc($conn, $sql);
}

// code for update agent 
else if ($_POST['editAgent']) {
    $aid = $_POST['aid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $comm = $_POST['comm'];
    $adds = $_POST['adds'];

    $sql = "UPDATE `agent` SET `name`='$name',`phone`='$phone',`email`='$email',`comm_per`='$comm',`adds`='$adds' WHERE     `aid` = '$aid'";
    editFunc($conn, $sql);
}
// code for update fine_master 
else if ($_POST['editFine']) {
    $fid = $_POST['fid'];
    $fname = $_POST['fname'];
    $perc = $_POST['perc'];
    $desc = $_POST['desc'];

    $sql = "UPDATE `fine_master` SET `fine_name`='$fname',`fine_percent`='$perc',`description`='$desc' WHERE `fid` = '$fid'";
    editFunc($conn, $sql);
}
