<?php
 
include 'connectdb.php';

    if($con)
    {
        $h = test_input($_POST["h"]);
        $m = test_input($_POST["m"]);
        $s = test_input($_POST["s"]);
        $regid = test_input($_POST["regid"]);
        $q = "update submittime set sh = $h, sm = $m, ss = $s where regid = $regid";
        $e = mysqli_query($con,$q);
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