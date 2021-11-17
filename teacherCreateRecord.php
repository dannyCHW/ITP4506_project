<?php
  require_once('connectDB.php');

  $classID = $_POST['id'];
  $day = $_POST['day'];
  $stuID = $_POST['stuID'];
  $status = $_POST['status'];

  $sql = "SELECT * FROM attanence WHERE classID='$classID' AND attanence_date='$day' AND studentID='$stuID'";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  if(mysqli_num_rows($rs) > 0){
    echo "wrong";
  }
  else{
    $sql2="INSERT INTO attanence values('','$status','$day','','$classID','$stuID')";
    $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
  }

?>
