<?php 
require_once('connectDB.php');

$is = $_POST['is'];

if ($is == "admin"){

    $sql = "SELECT adminID, adminName, adminActivation FROM admin ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->adminID = $row["adminID"];
        $myObj->adminName = $row["adminName"];
        $myObj->adminActivation	= $row["adminActivation"];

        array_push($arr, $myObj);  
    }
    
    $myJson = json_encode($arr);
        echo $myJson;

} else if ($is == "teacher"){

    $sql = "SELECT teacherID, teacherName, teacherActivation FROM teacher ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->teacherID = $row["teacherID"];
        $myObj->teacherName = $row["teacherName"];
        $myObj->teacherActivation = $row["teacherActivation"];

        array_push($arr, $myObj);
        
    }
    
        $myJson = json_encode($arr);
        echo $myJson;

} else {

    $sql = "SELECT studentID, studentName, studentActivation FROM student ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->studentID = $row["studentID"];
        $myObj->studentName = $row["studentName"];
        $myObj->studentActivation = $row["studentActivation"];

        array_push($arr, $myObj);
        
    }
    
        $myJson = json_encode($arr);
        echo $myJson;
}
