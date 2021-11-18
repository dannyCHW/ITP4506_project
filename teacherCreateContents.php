<?php
  require_once('connectDB.php');

  $topic = $_POST['topic'];
  $contents = $_POST['contents'];
  $classCode = $_POST['classID'];
  $teacherID = $_POST['teacherID'];
  $day = date("Y-m-d");

  $sqltest = "SELECT * FROM class where classCode='$classCode'";
  $rstest = mysqli_query($conn, $sqltest)or die(mysqli_error($conn));
  while($rctest = mysqli_fetch_array($rstest)){
    $classID = $rctest['classID'];
  }

  $sql = "INSERT INTO board values('','$topic','$contents','$teacherID','$classID','$day')";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));


?>
