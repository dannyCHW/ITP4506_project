<?php
    require_once('connectDB.php');
    session_start();
    $selectedMonth = $_POST['text'];
    $studentID = $_SESSION['studentID'];
    $sql = "SELECT classID FROM allocation where studentID = '$studentID' ";
    $rs= mysqli_query($conn, $sql)or die(mysqli_error($conn));
    while($rc = mysqli_fetch_array($rs)){
          $classID = $rc['classID'];
          $sql2 = "SELECT * FROM class where classID = '$classID'";
          $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
          while($rc2 = mysqli_fetch_array($rs2)){
              $currentClassID = $rc2['classID'];
          }
      }
    $sql5 = "SELECT *  FROM attanence where MONTH(attanence_date) = '$selectedMonth' AND classID = '$currentClassID' AND studentID ='$studentID'";
    $rs5= mysqli_query($conn, $sql5)or die(mysqli_error($conn));
    while($rc5 = mysqli_fetch_array($rs5)){
      if($rc5['attanence_status']=="absent"){
        echo"<tr style='background-color:red'><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
      }elseif($rc5['attanence_status']=="late"){
        echo"<tr style='background-color:#BDB76B'><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
      }else if($rc5['attanence_status']=="sickLeave"){
        echo"<tr style='background-color:blue'><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
      }
      else{
        echo"<tr><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
      }
    }
?>
