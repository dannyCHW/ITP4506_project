<?php 
require_once('connectDB.php');

$classID = $_POST['classID'];

$sql = "SELECT * FROM class WHERE classID = '$classID'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->classID = $row["classID"];
        $myObj->classCode = $row["classCode"];
        $myObj->schoolYear = $row["schoolYear"];
        $myObj->classInfo = $row["classInfo"];
        $myObj->teacherID = $row["teacherID"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;
?>