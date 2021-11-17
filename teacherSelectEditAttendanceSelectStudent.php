<?php

require_once('connectDB.php');

    session_start();

    $selectStudentID = $_POST['searchStudentID'];

    $_SESSION['selectEditAttendanceStudentID'] = $selectStudentID;

    echo "<script type='text/javascript'>
    window.location.href = 'teacherFinalEditAttendaceHTML.php';
    </script>";

?>
