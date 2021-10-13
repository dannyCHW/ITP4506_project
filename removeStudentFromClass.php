<?php

require_once('connectDB.php');

    session_start();

    $studentID = $_SESSION['searchByClassID'];
    $classID = $_SESSION['searchByClassID'];

    $sql = "DELETE FROM allocation WHERE classID = '$classID' AND studentID ='$studentID'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
        echo "<script type='text/javascript'>
        window.location.href = 'teacherStudentListHTML.php';
        </script>";



?>
