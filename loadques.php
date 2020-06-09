<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = $_SESSION['tid'];
        $i=1;
        $q1 = "select question,opta,optb,optc,optd,answer from questions where tid = '$tid'";
        $e1 = mysqli_query($con,$q1);
        $c = mysqli_num_rows($e1);
        $i=1;
        if($c > 0)
        {
            while($r1 = mysqli_fetch_assoc($e1))
            {
                $qes = $r1['question'];
                $opt1 = $r1['opta'];
                $opt2 = $r1['optb'];
                $opt3 = $r1['optc'];
                $opt4 = $r1['optd'];
                $ans = $r1['answer'];
                echo "<div class='row'>
    <div class='col-sm-2'>Question ".$i."</div>
    <div class='col-sm-8'><pre>".$qes."</pre></div>
    <div class='col-sm-2'></div>
</div>
<div class='row'>
<div class='col-sm-2'></div>
    <div class='col-sm-4'>
        <div class='col-sm-3'>Option A</div>
        <div class='col-sm-7'><pre>".$opt1."</pre></div>
        <div class='col-sm-2'></div>
    </div>
    <div class='col-sm-4'>
        <div class='col-sm-3'>Option B</div>
        <div class='col-sm-7'><pre>".$opt2."</pre></div>
        <div class='col-sm-2'></div>
    </div>
</div>
<div class='row'>
<div class='col-sm-2'></div>
    <div class='col-sm-4'>
        <div class='col-sm-3'>Option C</div>
        <div class='col-sm-7'><pre>".$opt3."</pre></div>
        <div class='col-sm-2'></div>
    </div>
    <div class='col-sm-4'>
        <div class='col-sm-3'>Option D</div>
        <div class='col-sm-7'><pre>".$opt4."</pre></div>
        <div class='col-sm-2'></div>
    </div>
</div>
<div class='row'>
    <div class='col-sm-2'></div>
    <div class='col-sm-4'>
        <div class='col-sm-3'>Answer</div>
        <div class='col-sm-7'><pre>".$ans."</pre></div>
        <div class='col-sm-2'></div>
    </div>
</div>
<div class='row'><center><br>
    <div class='col-sm-12'></div>
        <button type='button' id='".$i."' class='qbt btn btn-danger btn-lg'>DELETE</button>
    </div></center>
</div><br><hr><br>";
                $i++;
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