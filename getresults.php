<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = test_input($_POST["tid"]);
        $q = "select r.rollno,t.name,s.sh,s.sm,s.ss,count(p.qno) as cnt from attempts as p,questions as q,submittime as s,enrolls as r,registrations as t where p.qno = q.qno and p.regid = r.regid and p.regid = s.regid and r.rollno = t.rollno and p.answer = q.answer and q.tid = '$tid' and r.tid = '$tid' group by p.regid order by count(p.qno) desc,s.sh desc,s.sm desc,s.ss desc";
        $e = mysqli_query($con,$q) or die(mysqli_error($con));
        $c = mysqli_num_rows($e);
        if($c == 0)
        {
            echo "<h3>No submissions yet</h3>";
        }
        else
        {
            $i = 1;
            echo "<table class='table table-striped'>
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Roll Number</th>
                        <th>Name</th>
                        <th>Remaining Time</th>
                        <th>Marks</th>
                      </tr>
                    </thead>
                    <tbody>";
            while($c > 0)
            {
                $r = mysqli_fetch_assoc($e) or die(mysqli_connect_error($con));
                $rno = $r['rollno'];
                $name = $r['name'];
                $h = $r['sh'];
                $m = $r['sm'];
                $s = $r['ss'];
                $marks = $r['cnt'];
                echo "<tr>
                        <td>".$i."</td>
                        <td>".$rno."</td>
                        <td>".$name."</td>
                        <td>".$h." : ".$m." : ".$s."</td>
                        <td>".$marks."</td>
                      </tr>";
                $i++;
            }
            echo "</tbody>
                    </table>";
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