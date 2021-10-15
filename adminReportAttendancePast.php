<?php 
require_once('connectDB.php');

$sql = "SELECT * FROM attanencerecord ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->attanenceID = $row["rAttanenceID"];
        $myObj->attanence_status = $row["rAttanence_status"];
        $myObj->attanence_date	= $row["rAttanence_date"];
        $myObj->updateTime	= $row["rUpdateTime"];
        $myObj->classID	= $row["rClassID"];
        $myObj->studentID	= $row["rStudentID"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;
?>