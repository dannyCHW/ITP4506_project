<?php

require_once('connectDB.php');

    session_start();

    $selectStudentID = $_POST['searchStudentAttenID'];

    $_SESSION['searchStudentAttendanceID'] = $selectStudentID;


    echo "<script type='text/javascript'>
    window.location.href = 'teacherEditStuHTML.php';
    </script>";

?>
