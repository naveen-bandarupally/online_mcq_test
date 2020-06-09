<?php
session_start();
include 'connectdb.php';

    if($con)
    {
        $type = test_input($_POST["type"]);
        $tno = test_input($_POST["tno"]);
        $_SESSION['tid'] = $tno;
        $rno="";
        $mid="";
        $pno="";
        if($type==1)
        {
            $rno = test_input($_POST["rno"]);
            $_SESSION["rollno"] = $rno;
            $_SESSION["login"]="yes";
        }
        else if($type==2)
        {
            $mid = test_input($_POST["mid"]);
            $_SESSION["mailid"] = $mid;
            $_SESSION["login"]="yes";
            $q = "select rollno from registrations where mailid = '$mid'";
            $e = mysqli_query($con,$q);
            $r = mysqli_fetch_assoc($e);
            $rno = $r['rollno'];
        }
        else if($type==3)
        {
            $pno = test_input($_POST["pno"]);
            $_SESSION["phnno"] = $pno;
            $_SESSION["login"]="yes";
            $q = "select rollno from registrations where phone = $pno";
            $e = mysqli_query($con,$q);
            $r = mysqli_fetch_assoc($e);
            $rno = $r['rollno'];
        }
        $_SESSION["rollno"] = $rno;
        $q0 = "select name from registrations where rollno = '$rno'";
        $e0 = mysqli_query($con,$q0);
        $r0 = mysqli_fetch_assoc($e0);
        $_SESSION['name'] = $r0['name'];
        $q1 = "select count(rollno) as cnt from enrolls where rollno = '$rno' and tid = '$tno'";
        $e1 = mysqli_query($con,$q1);
        $r1 = mysqli_fetch_assoc($e1);
        $c = $r1['cnt'];
        $status = 0;
        if($c==1)
        {
            $q5 = "select status from enrolls where rollno = '$rno' and tid = '$tno'";
            $e5 = mysqli_query($con,$q5);
            $r5 = mysqli_fetch_assoc($e5);
            $status = $r5['status'];
        }
        if($c==0 || $status==2)
        {
            if($status==0)
            {
                $q2 = "insert into enrolls(rollno,tid,status) values('$rno','$tno',1)";
                $e2 = mysqli_query($con,$q2);
            }
            else if($status == 2)
            {
                $q2 = "update enrolls set status = 1 where rollno = '$rno' and tid = '$tno'";
                $e2 = mysqli_query($con,$q2);
            }
            $q4 = "select regid from enrolls where rollno = '$rno' and tid = '$tno'";
            $e4 = mysqli_query($con,$q4);
            $r4 = mysqli_fetch_assoc($e4);
            $regid = $r4['regid'];
            $_SESSION['regid'] = $regid;
            $_SESSION['test']="yes";
            $q3 = "select noq from tests where tid = '$tno'";
            $e3 = mysqli_query($con,$q3);
            $r3 = mysqli_fetch_assoc($e3);
            $qc = $r3['noq'];
            $_SESSION['noq'] = $qc;
            if($status==0)
            {
                $q7 = "select mh,mm,ms from tests where tid = '$tno'";
                $e7 = mysqli_query($con,$q7);
                $r7 = mysqli_fetch_assoc($e7);
                $h = $r7['mh'];
                $m = $r7['mm'];
                $s = $r7['ms'];
                $q6 = "insert into submittime values('$regid','$h','$m','$s')";
                $e6 = mysqli_query($con,$q6);
                if($qc > 0)
                {
                    $i=1;
                    $q4="";
                    while($i<$qc)
                    {
                        $q4 .= "insert into attempts values('$regid','$i',0,0,'');";
                        $i++;
                    }
                    $q4 .= "insert into attempts values('$regid','$i',0,0,'')";
                    $e4 = mysqli_multi_query($con,$q4);
                }
            }
            echo true;
        }
        else
        {
            echo false;
        }
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