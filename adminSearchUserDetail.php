<?php 
require_once('connectDB.php');

$is = $_POST['users'];
$uName = $_POST['userName'];

if ($is == "admin"){

    $sql = "SELECT * FROM admin WHERE adminUsername = '$uName'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $rc = mysqli_fetch_assoc($rs);
    // //$arr = (array) null;

         $myObj = new stdClass();
        $myObj->adminID = $rc["adminID"];
        $myObj->adminName = $rc["adminName"];
        $myObj->adminUsername = $rc["adminUsername"];
        $myObj->adminPassword = $rc["adminPassword"];

    //     //array_push($arr, $myObj);  

    $myJson = json_encode($myObj);
    echo $myJson;

} else if ($is == "teacher"){

    $sql = "SELECT * FROM teacher ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->teacherID = $row["teacherID"];
        $myObj->teacherName = $row["teacherName"];
        $myObj->teacherUsername = $row["teacherUsername"];
        $myObj->teacherPassword = $row["teacherPassword"];
        $myObj->teacherInfo = $row["teacherInfo"];  

        array_push($arr, $myObj);
        
    }
    
        $myJson = json_encode($arr);
        echo $myJson;

} else {

    $sql = "SELECT * FROM student ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){

        $myObj = new stdClass();
        $myObj->studentID = $row["studentID"];
        $myObj->studentName = $row["studentName"];
        $myObj->studentUsername = $row["studentUsername"];
        $myObj->studentPassword = $row["studentPassword"];
        $myObj->studentInfo = $row["studentInfo"];  

        array_push($arr, $myObj);
        
    }
    
        $myJson = json_encode($arr);
        echo $myJson;
}

?>