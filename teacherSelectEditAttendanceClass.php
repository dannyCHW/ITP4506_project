<?php

require_once('connectDB.php');

$searchByClass = $_POST['searchClass'];

  session_start();
  $_SESSION['editAttendanceClassID'] = $searchByClass;

  echo "<script type='text/javascript'>
    window.location.href = 'teacherSelectEditAttendanceStudentListHTML.php';
  </script>";

?>
