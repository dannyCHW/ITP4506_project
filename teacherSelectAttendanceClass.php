<?php

require_once('connectDB.php');
$searchByClass = $_POST['searchClass'];

  session_start();
  $_SESSION['tAttendanceC;ass'] = $searchByClass;

  echo "<script type='text/javascript'>
    window.location.href = 'teacherSelectAttendanceClassHTML.php';
  </script>";

?>
