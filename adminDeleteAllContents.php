<?php
require_once('connectDB.php');
  $sql = "DELETE FROM board";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  while($rc = mysqli_fetch_array($rs)){
  }
?>
