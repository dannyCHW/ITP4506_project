<?php

require_once('connectDB.php');
$username = $_POST['userName'];
$newPwd = $_POST['newPassword'];
$stuInfo = $_POST['stuInfo'];

  $sql = "UPDATE student set studentPassword = '$newPwd' , studentInfo  = '$stuInfo'where studentUsername = '$username'";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  echo "<script type='text/javascript'>
  alert('Your password has been changed, please login again.');
  </script>";


?>
