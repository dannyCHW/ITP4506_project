<?php
  require_once('connectDB.php');

  $selectClass = $_POST['id'];

    $sql = "SELECT * FROM allocation WHERE classID='$selectClass'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    $row_cnt = mysqli_num_rows($rs);
    $avg = $row_cnt /2 ;
    while($rc = mysqli_fetch_array($rs)){

    }


  echo $avg;

?>
