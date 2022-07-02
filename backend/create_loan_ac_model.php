<?php
session_start();
require_once '../config/db.php';

$cname = $_POST['cname'];
$fname = $_POST['fname'];
$adds = $_POST['adds'];
$phone = $_POST['phone'];
$pin = $_POST['pin'];
$bankac = $_POST['bankac'];
$ifsc = $_POST['ifsc'];
$voter = $_POST['voter'];
$pan = $_POST['pan'];
$loanac = $_POST['loanac'];
$l_amt = $_POST['l_amt'];
$interest = $_POST['interest'];
$i_amt = $_POST['i_amt'];
$t_amt = $_POST['t_amount'];
$month = $_POST['month'];
$schdl = $_POST['schdl'];
$emi_amt = $_POST['emi_amt'];
$no_emi = $_POST['no_emi'];
$s_date = $_POST['s_date'];
$e_date = $_POST['e_date'];
$rmrk = $_POST['rmrk'];

$sqlget = "SELECT *  FROM `customer` 
            WHERE `cname`='$cname' AND `father`='$fname' AND `adds` ='$adds' AND `phone` = '$phone' AND `pin` = '$pin' AND `bank_ac_no`='$bankac' AND `ifsc` = '$ifsc'";


$getCus = $conn->prepare($sqlget);



if ($getCus->execute()) {

    if ($getCus->rowCount() == 0) {
        // status: 0->deleted amd 1-exists 
        $insertsql = "INSERT INTO `customer`(`cname`, `father`, `adds`, `phone`, `pin`, `bank_ac_no`, `ifsc`, `status`) 
                                    VALUES ('$cname','$fname','$adds','$phone','$pin','$bankac','$ifsc','1')";

        $insertCus = $conn->prepare($insertsql);

        $sqlLoan = "SELECT * FROM `loan_ac` WHERE `loan_ac_no`='$loanac'";
        $getLoan = $conn->prepare($sqlLoan);
        $getLoan->execute();
        if ($getLoan->rowCount() == 0) {

            /*loan activity notes 
            0-> pending
            1->Active 
            2-> closed */

            $insertCus->execute();
            $lastId = $conn->lastInsertId();
            $insertLoanQue = "INSERT INTO `loan_ac`(`loan_ac_no`, `loan_amount`, `interest_rate`, `interest_amount`, `total_amount`, 
                                            `emi_amount`, `no_of_month`, `no_emi`, `emi_schedule`, `start_date`, `end_date`, `no_emi_left`, `remarks`, `status`, `activity`, `customer_id`) 
                                                    VALUES ('$loanac','$l_amt','$interest','$i_amt','$t_amt','$emi_amt','$month','$no_emi','$schdl',
                                                        '$s_date','$e_date','$no_emi','$rmrk','1','0','$lastId')";
            $insertLoan = $conn->prepare($insertLoanQue);
            if ($insertLoan->execute()) {
                echo "Customer added successfully!";
            } else {
                echo "Something went wrong! Please try again";
            }
        } else {
            echo "Loan Account Already Exists!";
        }
    } else {
        echo "Customer Already Exists!";
    }
} else {
    echo "Error";
}
