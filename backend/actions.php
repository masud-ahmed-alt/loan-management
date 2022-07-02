<?php
session_start();
require_once '../config/db.php';


// code for edit fine master 
if (isset($_POST['edit_fine'])) {
    echo "Edit";
}



// code for delete fine master 
else if ($_POST['del']) {
    $fid = $_POST['fid'];
    $fineDel = "UPDATE `fine_master` SET `status`='0' WHERE `fid` = '$fid'";
    deleteFunc($conn, $fineDel);
}
else if ($_POST['active']) {
   $loan_ac = $_POST['loan_ac'];
   $sql = "UPDATE `loan_ac` SET `activity`='1' WHERE `loan_ac_no`='$loan_ac'";
   editFunc($conn, $sql);
}





// function delete touple 
function deleteFunc($co, $query)
{
    $sqlUp = $co->prepare($query);
    if ($sqlUp->execute())
        echo "Deleted Successfull";
    else
        echo "Something wents wrong";
}

// function for set loan activity 
function editFunc($co, $query)
{
    $sqlEd = $co->prepare($query);
    $sqlEd->execute();
  
}


