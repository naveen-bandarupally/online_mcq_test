<?php
 
include 'connectdb.php';

    if($con)
    {
        $regid = test_input($_POST["regid"]);
        $cid = test_input($_POST["cid"]);
        $q = "update attempts set view = 1 where regid = $regid and qno = $cid";
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