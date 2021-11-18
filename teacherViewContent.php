<?php
  require_once('connectDB.php');

  $topic = $_POST['topic'];
  $day = $_POST['day'];
  $tID = $_POST['tID'];

  $sql = "SELECT * FROM board WHERE topicName='$topic' AND day='$day' AND teacherID = '$tID'";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

  while ($row = mysqli_fetch_assoc($rs)){
    echo $row['contents'];
  }
?>
