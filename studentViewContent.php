<?php
  require_once('connectDB.php');

  $topic = $_POST['topic'];
  $day = $_POST['day'];

  $sql = "SELECT * FROM board WHERE topicName='$topic' AND day='$day'";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

  while ($row = mysqli_fetch_assoc($rs)){
    echo $row['contents'];
  }
?>
