<?php
  require_once('connectDB.php');

  $topic = $_POST['topic'];
  $contents = $_POST['contents'];
  $day = date("Y-m-d");

  $sql = "SELECT * FROM class ";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  while ($row = mysqli_fetch_assoc($rs)){
    $target = $row['classID'];
    $sql2 = "INSERT INTO board values('','$topic','$contents','999','$target','$day')";
    $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
      while ($row2 = mysqli_fetch_assoc($rs2)){
        echo "SSSSS";
      }
  }
?>
