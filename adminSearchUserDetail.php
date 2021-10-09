<?php 
require_once('connectDB.php');

$is = $_POST['users'];
$uID = $_POST['userID'];

if ($is == "admin"){

    $sql = "SELECT * FROM admin WHERE adminID = '$uID'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rc = mysqli_fetch_assoc($rs);

        $myObj = new stdClass();
        $myObj->adminID = $rc["adminID"];
        $myObj->adminName = $rc["adminName"];
        $myObj->adminUsername = $rc["adminUsername"];
        $myObj->adminPassword = $rc["adminPassword"];  

    $myJson = json_encode($myObj);
    echo $myJson;

} else if ($is == "teacher"){

    $sql = "SELECT * FROM teacher WHERE teacherID = '$uID'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rc = mysqli_fetch_assoc($rs);

        $myObj = new stdClass();
        $myObj->teacherID = $rc["teacherID"];
        $myObj->teacherName = $rc["teacherName"];
        $myObj->teacherUsername = $rc["teacherUsername"];
        $myObj->teacherPassword = $rc["teacherPassword"];
        $myObj->teacherInfo = $rc["teacherInfo"];  
    
        $myJson = json_encode($myObj);
        echo $myJson;

} else {

    $sql = "SELECT * FROM student ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rc = mysqli_fetch_assoc($rs);

        $myObj = new stdClass();
        $myObj->studentID = $rc["studentID"];
        $myObj->studentName = $rc["studentName"];
        $myObj->studentUsername = $rc["studentUsername"];
        $myObj->studentPassword = $rc["studentPassword"];
        $myObj->studentInfo = $rc["studentInfo"];  
    
        $myJson = json_encode($myObj);
        echo $myJson;
}

?>