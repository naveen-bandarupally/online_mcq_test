<?php
 session_start();
include 'connectdb.php';

    if($con)
    {
        $id = test_input($_POST["id"]);
        $tid = $_SESSION['stid'];
        $q = "update enrolls set status = 2 where rollno = '$id' and tid = '$tid'";
        $e = mysqli_query($con,$q);
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