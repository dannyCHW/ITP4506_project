<?php
  require_once('connectDB.php');
  session_start();
  $studentID = $_POST['saveID'];
  $selectClassID = $_SESSION['searchByClassID'];
  $date = date("Y-m-d");

  $sql = "INSERT INTO allocation VALUES ($selectClassID,$studentID,'$date')";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

  echo "<script type='text/javascript'>
  window.location.href = 'addStudentClassHTML.php';
  </script>";
 ?>
