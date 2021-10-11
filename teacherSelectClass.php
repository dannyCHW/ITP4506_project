<?php

require_once('connectDB.php');
$searchStuID = $_POST['searchStu'];

  session_start();
  $_SESSION['searchByClassID'] = $searchStuID;

  echo "<script type='text/javascript'>
    window.location.href = 'teacherStudentListHTML.php';
  </script>";

?>
