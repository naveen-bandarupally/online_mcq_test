<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = $_SESSION['tid'];
        $id = test_input($_POST["id"]);
        $q = "delete from questions where tid = '$tid' and qno = $id";
        $e = mysqli_query($con,$q);
        $q1 = "select noq from tests where tid = '$tid'";
        $e1 = mysqli_query($con,$q1);
        $r1 = mysqli_fetch_assoc($e1);
        $c = $r1['noq'];
        $i=$id;
        $j = $i+1;
        while($i < $c)
        {
            $q2 = "update questions set qno = $i where tid = '$tid' and qno = $j";
            $e2 = mysqli_query($con,$q2);
            $i++;
            $j++;
        }
        $q3 = "update tests set noq = noq-1 where tid = '$tid'";
        $e3 = mysqli_query($con,$q3);
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