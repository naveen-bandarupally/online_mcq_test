<?php

include 'connectdb.php';

    if($con)
    {
        $tid = test_input($_POST["tid"]);
        $regid = test_input($_POST["regid"]);
        $q = "select noq from tests where tid = '$tid'";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $count = $r["noq"];
        for($i=1;$i<=$count;$i++)
        {
            $id = "q".$i;
            $q1 = "select view,mark,answer from attempts where regid = $regid and qno = $i";
            $e1 = mysqli_query($con,$q1);
            $r1 = mysqli_fetch_assoc($e1);
            $ans = $r1["answer"];
            $view = $r1["view"];
            $mark = $r1["mark"];
            if($mark==1)
            {
                echo "
                    <div class='col-sm-1 circleout'><div class='circlein d' id='$id'><span class='number'>$i</span></div></div>
                    ";
            }
            else if($ans!="")
            {
                echo "
                    <div class='col-sm-1 circleout'><div class='circlein a' id='$id'><span class='number'>$i</span></div></div>
                    ";
            }
            else if($view==1)
            {
                echo "
                    <div class='col-sm-1 circleout'><div class='circlein c' id='$id'><span class='number'>$i</span></div></div>
                    ";
            }
            else
            {
                echo "
                    <div class='col-sm-1 circleout'><div class='circlein' id='$id'><span class='number'>$i</span></div></div>
                    ";
            }
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