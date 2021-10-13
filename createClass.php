<?php

require_once('connectDB.php');
$className = $_POST['className'];
$classCode = $_POST['code'];
$year = $_POST['year'];
$classInfo = $_POST['classInfo'];
$time = date('Y-m-d');
session_start();
$teacherID = $_SESSION['teacherID'];

$sql = "INSERT INTO class  VALUES ('','$classInfo','$classCode','$year','$teacherID','active','$time');";


  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

  echo "<script type='text/javascript'>
  window.location.href = 'teacherCreateClassHTML.php';
  </script>";


?>
