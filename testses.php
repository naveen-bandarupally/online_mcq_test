<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = test_input($_POST["id"]);
        $_SESSION['tid'] = $tid;
        echo $tid;
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