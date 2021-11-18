 <?php
  require_once('connectDB.php');

  $classCode = $_POST['id'];
  $day = $_POST['day'];
  $stuID = $_POST['stuID'];
  $status = $_POST['status'];

  $sqltest = "SELECT * FROM class where classCode='$classCode'";
  $rstest = mysqli_query($conn, $sqltest)or die(mysqli_error($conn));
  while($rctest = mysqli_fetch_array($rstest)){
    $classID = $rctest['classID'];
  }

  $sql = "SELECT * FROM attanence WHERE classID='$classID' AND attanence_date='$day' AND studentID = '$stuID'";
  $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  if(mysqli_num_rows($rs) > 0){
    echo 3;
  }
  else{
    $sql2="INSERT INTO attanence values('','$status','$day','','$classID','$stuID','')";
    $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
  }

?>
