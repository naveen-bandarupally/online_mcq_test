<?php

include 'connectdb.php';

    if($con)
    {
        $tid = test_input($_POST["tid"]);
        $qno = test_input($_POST["qno"]);
        $regid = test_input($_POST["regid"]);
        $q = "select question,opta,optb,optc,optd,answer from questions where tid = '$tid' and qno = $qno";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $qes = $r["question"];
        $opta = $r["opta"];
        $optb = $r["optb"];
        $optc = $r["optc"];
        $optd = $r["optd"];
        $oopt = $r["answer"];
        $q1 = "select answer,mark from attempts where regid = $regid and qno = $qno";
        $e1 = mysqli_query($con,$q1);
        $r1 = mysqli_fetch_assoc($e1);
        $opt = $r1["answer"];
        $mark = $r1["mark"];
        echo "<div class='headbar'>
                        <div class='cqno'>q.no.</div>
                        <div class='qnocircle'><span id='qno'>$qno</span></div>";
        if($mark==1)
        {
            echo "<div class='mark d' id='mark'>unmark</div>
                    </div>";
        }
        else
        {
            echo "<div class='mark' id='mark'>mark</div>
                    </div>";
        }
        echo "<div class='question' id='$qno'><pre>".$qes."</pre></div>";
        echo "
            <div class='answers'>
                <div class='row'>
                    <div class='col-sm-6 option'>";
        if($opt=='a')
        {
            echo "<div class='opt a' id='a'><span class='optcard'><pre>".$opta."</pre></span></div>
                    </div>";
        }
        else
        {
            echo "<div class='opt' id='a'><span class='optcard'><pre>".$opta."</pre></span></div>
                    </div>";
        }
                    echo "<div class='col-sm-6 option'>";
        if($opt=='b')
        {
            echo "<div class='opt a' id='b'><span class='optcard'><pre>".$optb."</pre></span></div>
                    </div>";
        }
        else
        {
            echo "<div class='opt' id='b'><span class='optcard'><pre>".$optb."</pre></span></div>
                </div>";
        }
               echo "</div><br>
                <div class='row'>
                    <div class='col-sm-6 option'>";
        if($opt=='c')
        {
            echo "<div class='opt a' id='c'><span class='optcard'><pre>".$optc."</pre></span></div>
                    </div>";
        }
        else
        {
            echo "<div class='opt' id='c'><span class='optcard'><pre>".$optc."</pre></span></div>
                    </div>";
        }
                   echo "<div class='col-sm-6 option'>";
        if($opt=='d')
        {
            echo "<div class='opt a' id='d'><span class='optcard'><pre>".$optd."</pre></span></div>
                    </div>";
        }
        else
        {
            echo "<div class='opt' id='d'><span class='optcard'><pre>".$optd."</pre></span></div>
                    </div>";
        }
        echo "</div><br>
            </div>
            ";
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