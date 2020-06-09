<?php

include 'connectdb.php';

    if($con)
    {
        $type = test_input($_POST["type"]);
        $q="";
        $rollno="";
        $mailid="";
        $phone="";
        if($type==1)
        {
            $rollno = test_input($_POST["rollno"]);
            $q = "select count(rollno) as cnt from registrations where rollno = '$rollno' ";
        }
        else if($type==2)
        {
            $mailid = test_input($_POST["mailid"]);
            $q = "select count(mailid) as cnt from registrations where mailid = '$mailid'";
        }
        else if($type==3)
        {
            $phone = test_input($_POST["phone"]);
            $q = "select count(phone) as cnt from registrations where phone = '$phone' ";
        }
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $c = $r["cnt"];
        if($c>0)
            echo false;
        else
            echo true;
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