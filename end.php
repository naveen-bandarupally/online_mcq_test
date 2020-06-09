<?php
    session_start();
    include 'connectdb.php';

    if($con)
    {
        $rid = $_SESSION['regid'];
        $tid = $_SESSION['tid'];
        $type = $_POST['type'];
        $q = "update enrolls set status = '$type' where regid = '$rid' and tid = '$tid'";
        $e = mysqli_query($con,$q);
    }
    else
    {
        echo "Error occured while connecting to databse";
    }
    session_destroy();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>