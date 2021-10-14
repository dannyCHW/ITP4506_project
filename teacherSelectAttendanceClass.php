<?php

require_once('connectDB.php');
$searchByClass = $_POST['searchClass'];

  session_start();
  $_SESSION['rAttendanceClass'] = $searchByClass;

  echo "<script type='text/javascript'>
    window.location.href = 'teacherSelectAttendanceClassHTML.php';
  </script>";

?>
