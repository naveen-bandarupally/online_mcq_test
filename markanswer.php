<?php

include 'connectdb.php';

    if($con)
    {
        $regid = test_input($_POST["regid"]);
        $qno = test_input($_POST["qno"]);
        $opt = test_input($_POST["opt"]);
        $q = "update attempts set answer = '$opt' where regid = $regid and qno = $qno";
        $e = mysqli_query($con,$q);
        if($e)
            echo true;
        else
            echo false;
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