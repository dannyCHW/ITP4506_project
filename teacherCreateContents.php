<?php
  require_once('connectDB.php');

  $topic = $_POST['topic'];
  $contents = $_POST['contents'];
  $classID = $_POST['classID'];
  $teacherID = $_POST['teacherID'];
  $day = date("Y-m-d");

  $sql = "INSERT INTO board values('','$topic','$contents','$teacherID','$classID','$day')";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));


?>
