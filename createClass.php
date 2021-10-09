<?php

require_once('connectDB.php');
$className = $_POST['className'];
$classCode = $_POST['code'];
$year = $_POST['year'];
$classInfo = $_POST['classInfo'];
session_start();
$teacherID = $_SESSION['teacherID'];
/*  change to insert
  $sql = "UPDATE teacher set teacherPassword = '$newPwd' , teacherInfo  = '$teacherInfo' where teacherUsername = '$username'";
*/

  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  session_start();

  echo "<script type='text/javascript'>
  window.location.href = 'teacherCreateClassHTML.php';
  </script>";


?>
