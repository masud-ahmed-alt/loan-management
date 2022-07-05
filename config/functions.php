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

// function for update data 
function updateData($con,$query)
{
    $update = $con->prepare($query);
    if ($update->execute()) {
        echo 'Updated successfully';
    } else {
        echo 'Something went wrong!';
    }
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
