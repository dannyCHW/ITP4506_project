<?php

require_once('connectDB.php');

$classCode = $_POST['code'];
$year = $_POST['year'];
$classInfo = $_POST['classInfo'];
$time = date('Y-m-d');
session_start();
$teacherID = $_SESSION['teacherID'];

$sql = "INSERT INTO class  VALUES ('','$classInfo','$classCode','$year','$teacherID','$time');";


  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

  echo "<script type='text/javascript'>
  window.location.href = 'teacherCreateClassHTML.php';
  </script>";


?>
