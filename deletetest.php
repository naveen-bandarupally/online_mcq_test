<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $id = test_input($_POST["id"]);
        $q = "delete from questions where tid = '$id' ";
        $e = mysqli_query($con,$q);
        $q1 = "delete from tests where tid = '$id'";
        $e1 = mysqli_query($con,$q1);
    }
    else
    {
        echo "Error occured while connecting to databse";
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>