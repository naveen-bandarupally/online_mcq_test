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
                            <form class='ubt form-horizontal' id='".$i."'>
                                <div class='form-group'>
                                    <label class='col-sm-2 control-label'>Question ".$i."</label>
                                    <div class='col-sm-8'>
                                        <textarea class='form-control' id='".$i."q' row='8' required>".$qes."</textarea>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-2'></div>
                                    <div class='col-sm-4'>
                                        <div class='form-group'>
                                            <label class='col-sm-3 control-label'>Option A</label>
                                            <div class='col-sm-7'>
                                                <textarea class='form-control' id='".$i."o1' row='8' required>".$opt1."</textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class='form-group'>
                                            <label class='col-sm-3 control-label'>Option B</label>
                                            <div class='col-sm-7'>
                                                <textarea class='form-control' id='".$i."o2' row='8' required>".$opt2."</textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-2'></div>
                                    <div class='col-sm-4'>
                                        <div class='form-group'>
                                            <label class='col-sm-3 control-label'>Option C</label>
                                            <div class='col-sm-7'>
                                                <textarea class='form-control' id='".$i."o3' row='8' required>".$opt3."</textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class='form-group'>
                                            <label class='col-sm-3 control-label'>Option D</label>
                                            <div class='col-sm-7'>
                                                <textarea class='form-control' id='".$i."o4' row='8' required>".$opt4."</textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div><br><br>
                                <div class='row'>
                                    <div class='col-sm-2'></div>
                                    <div class='col-sm-4'>
                                        <div class='form-group' id='haserrscode'>
                                            <label class='col-sm-3 control-label'>Answer</label>
                                            <div class='col-sm-7'>
                                                <select class='form-control' id='".$i."ans' required>
                                                    <option disabled>SELECT ANSWER</option>";
                                            if($ans=='a')
                                            {
                                                echo "<option selected value='a'>A</option>
                                                        <option value='b'>B</option>
                                                        <option value='c'>C</option>
                                                        <option value='d'>D</option>";
                                            }
                                            else if($ans=='b')
                                            {
                                                echo "<option value='a'>A</option>
                                                        <option selected value='b'>B</option>
                                                        <option value='c'>C</option>
                                                        <option value='d'>D</option>";
                                            }
                                            else if($ans=='c')
                                            {
                                                echo "<option value='a'>A</option>
                                                        <option value='b'>B</option>
                                                        <option selected value='c'>C</option>
                                                        <option value='d'>D</option>";
                                            }
                                            else if($ans=='d')
                                            {
                                                echo "<option value='a'>A</option>
                                                        <option value='b'>B</option>
                                                        <option value='c'>C</option>
                                                        <option selected value='d'>D</option>";
                                            }
                                            echo "</select>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'></div>
                                    <div class='col-sm-2'></div>
                                </div><br>
                                <div class='row'><center>
                                    <div class='form-group'>
                                        <div class='col-sm-12'><button type='submit' class='btn btn-success btn-lg'>UPDATE</button></div>
                                    </div></center>
                                </div><br><hr><br>
                            </form>
                        </div>";
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