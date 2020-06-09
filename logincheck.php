<?php

include 'connectdb.php';

    if($con)
    {
        $tno = test_input($_POST["tno"]);
        $scode = test_input($_POST["scode"]);
        $q = "select count(tid) as cnt from tests where tid = '$tno' and scode = '$scode' ";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $c = $r["cnt"];
        if($c>0)
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