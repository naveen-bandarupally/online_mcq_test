<?php

include 'connectdb.php';

    if($con)
    {
        $regid = test_input($_POST["regid"]);
        $cid = test_input($_POST["qno"]);
        $q = "select mark from attempts where regid = $regid and qno = $cid";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $mark = $r["mark"];
        if($mark==1)
        {
            $q = "update attempts set mark = 0 where regid = $regid and qno = $cid";
            $e = mysqli_query($con,$q);
            echo true;
        }
        else
        {
            $q = "update attempts set mark = 1 where regid = $regid and qno = $cid";
            $e = mysqli_query($con,$q);
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