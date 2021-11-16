<?php 
require_once('connectDB.php');

$sql = "SELECT * FROM class";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->classID	= $row["classID"];
        $myObj->classCode	= $row["classCode"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;
?>