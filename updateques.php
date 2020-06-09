<?php
include 'connectdb.php';
session_start();
    if($con)
    {
        $tid = $_SESSION['tid'];
        $id = test_input($_POST["id"]);
        $ques = test_input($_POST["ques"]);
        $opt1 = test_input($_POST["opt1"]);
        $opt2 = test_input($_POST["opt2"]);
        $opt3 = test_input($_POST["opt3"]);
        $opt4 = test_input($_POST["opt4"]);
        $ans = test_input($_POST["ans"]);
        $q = "update questions set question = '$ques',opta = '$opt1',optb = '$opt2',optc = '$opt3',optd = '$opt4',answer = '$ans' where tid = '$tid' COLLATE latin1_general_cs and qno = $id";
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