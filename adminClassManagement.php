<?php 
require_once('connectDB.php');

$status = $_POST['status'];

if($status == 'nonVerify'){

    $sql = "SELECT * FROM class WHERE classStatus = 'nonVerify' ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->classID = $row["classID"];
        $myObj->classCode = $row["classCode"];
        $myObj->schoolYear = $row["schoolYear"];
        $myObj->classInfo = $row["classInfo"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;

} else if ($status == 'active'){

    $sql = "SELECT * FROM class WHERE classStatus = 'active' ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->classID = $row["classID"];
        $myObj->classCode = $row["classCode"];
        $myObj->schoolYear = $row["schoolYear"];
        $myObj->classInfo = $row["classInfo"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;
    
}
?>