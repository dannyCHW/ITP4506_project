<?php 
require_once('connectDB.php');

$is = $_POST['is'];

if ($is == "admin"){

    $sql = "SELECT adminID, adminName FROM admin ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->adminID = $row["adminID"];
        $myObj->adminName = $row["adminName"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;

} else if ($is == "teacher"){

    $sql = "SELECT teacherID, teacherName FROM teacher ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->teacherID = $row["teacherID"];
        $myObj->teacherName = $row["teacherName"];

        array_push($arr, $myObj);
        
    }
    
        $myJson = json_encode($arr);
        echo $myJson;

} else {

    $sql = "SELECT studentID, studentName FROM student ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->studentID = $row["studentID"];
        $myObj->studentName = $row["studentName"];

        array_push($arr, $myObj);
        
    }
    
        $myJson = json_encode($arr);
        echo $myJson;
}
    

?>