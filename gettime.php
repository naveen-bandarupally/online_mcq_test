<?php
 
include 'connectdb.php';

    if($con)
    {
        $regid = test_input($_POST["regid"]);
        $type = test_input($_POST["type"]);
        if($type==1)
        {
            $q = "select sh as cnt from submittime where regid = '$regid' ";
        }
        else if($type==2)
        {
            $q = "select sm as cnt from submittime where regid = '$regid' ";
        }
        else if($type==3)
        {
            $q = "select ss as cnt from submittime where regid = '$regid' ";
        }
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $c = $r["cnt"];
            echo $c;
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