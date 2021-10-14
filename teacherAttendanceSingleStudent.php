<?php

require_once('connectDB.php');

    session_start();

    $selectStudentID = $_POST['searchStudentID'];
    $selectStudentName = $_POST['searchStudentName'];

    $_SESSION['searchStudentAttendanceName'] = $selectStudentName;
    $_SESSION['searchStudentAttendanceID'] = $selectStudentID;


    echo "<script type='text/javascript'>
    window.location.href = 'teacherAttendanceSingleStudentHTML.php';
    </script>";

?>
