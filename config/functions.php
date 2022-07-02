<?php

require '../config/db.php';


// function for getting data 
function getSql($con, $query)
{
    $sql = $con->prepare($query);
    if ($sql->execute()) {
        $data = $sql->fetchAll();
        echo json_encode($data);
    } else {
        echo json_encode('Something wrong');
    }
}



