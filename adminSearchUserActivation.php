<?php 
require_once('connectDB.php');

$is = $_POST['users'];
$id = $_POST['userID'];
$able = $_POST['able'];

if ($is == "admin"){

    //UPDATE table_name
    //SET column1 = value1, column2 = value2, ...
    //WHERE condition;

    $sql = "UPDATE admin SET adminActivation = $able WHERE adminID = $id";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($able == 1){
        echo "This account is now disabled.";
    } else {
        echo "This account is now enabled.";
    }

} else if ($is == "teacher"){

    $sql = "UPDATE teacher SET teacherActivation = $able WHERE teacherID = $id";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($able == 1){
        echo "This account is now disabled.";
    } else {
        echo "This account is now enabled.";
    }

} else {

    $sql = "UPDATE student SET studentActivation = $able WHERE studentID = $id";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($able == 1){
        echo "This account is now disabled.";
    } else {
        echo "This account is now enabled.";
    }

}

?>