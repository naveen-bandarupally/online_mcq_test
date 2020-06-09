<?php
 
include 'connectdb.php';

    if($con)
    {
        $tid = test_input($_POST["id"]);
        $q = "select count(tid) as cnt from tests where tid = '$tid' ";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_array($e);
        $c = $r['cnt'];
        if($c > 0)
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