<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = test_input($_POST["tid"]);
        $_SESSION['stid'] = $tid;
        $q = "select p.rollno,q.name,p.status from enrolls as p,registrations as q where p.rollno = q.rollno and p.tid = '$tid'";
        $e = mysqli_query($con,$q) or die(mysqli_error($con));
        $c = mysqli_num_rows($e);
        if($c == 0)
        {
            echo "<h3>No enrolls yet</h3>";
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
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>";
            while($c > 0)
            {
                $r = mysqli_fetch_assoc($e) or die(mysqli_connect_error($con));
                $rno = $r['rollno'];
                $name = $r['name'];
                $status= $r['status'];
                echo "<tr>
                        <td>".$i."</td>
                        <td>".$rno."</td>
                        <td>".$name."</td>";
                if($status == 3)
                {
                    echo "<td><span class='stat a'>SUBMITTED</span></td>";
                }
                else if($status == 4)
                {
                    echo "<td><span class='stat b'>TIMEOUT</span></td>";
                }
                else if($status == 5 || $status == 6)
                {
                    echo "<td><span class='lock stat c' id = '$rno'>LOCKED</span></td>";
                }
                else if($status == 2)
                {
                    echo "<td><span class='stat d'>UNLOCKED</span></td>";
                }
                else
                {
                    echo "<td><span class='stat e'>WRITING</span></td>";
                }
                echo "</tr>";
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