<?php 
require_once('connectDB.php');

session_start();
$stuID = $_SESSION['studentID'];

$sql = "SELECT * FROM attanence WHERE attanence_status = 'SickLeave' AND studentID = '$stuID'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->attanence_status = $row["attanence_status"];
        $myObj->attanence_date   = $row["attanence_date"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
    echo $myJson;
?>