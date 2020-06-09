<?php
session_start();
include 'connectdb.php';
    if($con)
    {
        $ret = true;
        $type = test_input($_POST["type"]);
        $uid = test_input($_POST["uid"]);
        $q = "select count(userid) as cnt from admin where userid = '$uid' ";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $c = $r['cnt'];
        if($c > 0 && $type==2)
        {
            $pwd = test_input($_POST['pwd']);
            $q1 = "select count(userid) as cnt from admin where userid = '$uid' and password = '$pwd' ";
            $e1 = mysqli_query($con,$q1);
            $r1 = mysqli_fetch_assoc($e1);
            $c1 = $r1['cnt'];
            if($c1 == 0)
                $ret = false;
            else
            {
                $_SESSION['admlogin']=$uid;
            }
        }
        else if($c == 0 && $type==1)
            $ret = false;
        echo $ret;
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