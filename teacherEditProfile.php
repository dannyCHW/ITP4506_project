<?php

require_once('connectDB.php');
$username = $_POST['userName'];
$newPwd = $_POST['newPassword'];
$teacherInfo = $_POST['teacherInfo'];

  $sql = "UPDATE teacher set teacherPassword = '$newPwd' , teacherInfo  = '$teacherInfo' where teacherUsername = '$username'";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  session_start();
  $_SESSION['password'] = $newPwd;
  $_SESSION['teacherInfo'] = $teacherInfo;
  echo "<script type='text/javascript'>
  alert('Your password has been changed.');
  window.location.href = 'studentProfileHTML.php';
  </script>";


?>
