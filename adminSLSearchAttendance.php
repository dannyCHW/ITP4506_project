<?php 
require_once('connectDB.php');

$theDate = $_POST['theDate'];
$classID = $_POST['classID'];

$sql = "";

if($classID == "*"){
    $sql = "SELECT * FROM attanence WHERE attanence_date = '$theDate' ORDER BY classID";
} else {
    $sql = "SELECT * FROM attanence WHERE attanence_date = '$theDate' AND classID = '$classID' ORDER BY studentID";
}

    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->attanenceID = $row["attanenceID"];
        $myObj->attanence_status = $row["attanence_status"];
        $myObj->attanence_date	= $row["attanence_date"];
        $myObj->updateTime	= $row["updateTime"];
        $myObj->classID	= $row["classID"];
        $myObj->studentID	= $row["studentID"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;
?>