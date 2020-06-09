<?php

include 'connectdb.php';

    if($con)
    {
        $rollno = test_input($_POST["rollno"]);
        $name = test_input($_POST["name"]);
        $phn = test_input($_POST["phn"]);
        $mail = test_input($_POST["mail"]);
        $gender = test_input($_POST["gender"]);
        $dept = test_input($_POST["dept"]);
        $year = test_input($_POST["year"]);
        $q = "insert into registrations values('$rollno','$name','$mail','$phn','$gender','$dept','$year')";
        $e = mysqli_query($con,$q) or die(mysqli_error($con));
        if($e)
        {
            echo true;
        }
        else
        {
            echo false;
        }
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