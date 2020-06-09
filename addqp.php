<?php
 
include 'connectdb.php';

    if($con)
    {
        $tid = test_input($_POST["tid"]);
        $scode = test_input($_POST["scode"]);
        $h = test_input($_POST["h"]);
        $m = test_input($_POST["m"]);
        $s = test_input($_POST["s"]);
        $q = "insert into tests values('$tid','$scode',0,$h,$m,$s)";
        $e = mysqli_query($con,$q);
        if($e)
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