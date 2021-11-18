<?php
require_once('connectDB.php');

session_start();
$classID = $_POST['classID'];
$teacherID = $_SESSION['teacherID'];

$sql = "SELECT attanenceID, attanence_status, attanence_date, fileName, studentName 
FROM attanence, student 
WHERE student.studentID = attanence.studentID
AND attanence.attanence_status = 'SickLeave'
AND classID = '$classID'";

$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$arr = (array) null;

while ($row = mysqli_fetch_assoc($rs)) {

    $myObj = new stdClass();
    $myObj->attanenceID = $row["attanenceID"];
    $myObj->attanence_status = $row["attanence_status"];
    $myObj->attanence_date = $row["attanence_date"];
    $myObj->fileName = $row["fileName"];
    $myObj->studentName = $row["studentName"];

    array_push($arr, $myObj);
}

$myJson = json_encode($arr);
echo $myJson;
?>