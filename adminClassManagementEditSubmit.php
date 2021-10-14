<?php
require_once('connectDB.php');

$classID = $_POST['classID'];
$classCode = $_POST['classCode'];
$schoolYear = $_POST['schoolYear'];
$classInfo = $_POST['classInfo'];
$teacherID = $_POST['teacherID'];

$sql = "UPDATE class SET classInfo = '$classInfo', classCode = '$classCode', schoolYear = '$schoolYear', teacherID = '$teacherID' WHERE classID = $classID";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

echo "<script type='text/javascript'>
            alert('Updated');
            window.location.href = 'adminClassManagementHTML.php';
            </script>";
?>