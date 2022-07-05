<?php
session_start();
require_once '../config/db.php';
require_once '../config/functions.php';


// code for edit fine master 
if (isset($_POST['edit_fine'])) {
    echo "Edit";
}



// code for delete fine master 
else if ($_POST['del']) {
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
    deleteFunc($conn,$sql);
}





