<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = $_SESSION['tid'];
        $qes = test_input($_POST["qes"]);
        $opt1 = test_input($_POST["opt1"]);
        $opt2 = test_input($_POST["opt2"]);
        $opt3 = test_input($_POST["opt3"]);
        $opt4 = test_input($_POST["opt4"]);
        $ans = test_input($_POST["ans"]);
        $q = "select count(tid) as cnt from questions where tid = '$tid' ";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $c = $r['cnt'];
        $c++;
        $q1 = "insert into questions values('$tid',$c,'$qes','$opt1','$opt2','$opt3','$opt4','$ans')";
        $e1 = mysqli_query($con,$q1);
        $q2 = "update tests set noq = $c where tid = '$tid' ";
        $e2 = mysqli_query($con,$q2);
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