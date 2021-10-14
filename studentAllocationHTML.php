<html>

<head>


  <title>Allication Record</title>
  <?php include 'studentCheckSession.php'; ?>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="viewport" content="height=device-height,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/allocation.css">


  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
  $(document).ready(function(){
    var allocationRecord = "<?php
          require_once('connectDB.php');
          $studentID = $_SESSION['studentID'];
          $sql = "SELECT * FROM allocation where studentID = '$studentID' ORDER BY classID DESC";
          $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
          while($rc = mysqli_fetch_array($rs)){
              $classID = $rc['classID'];
              $sql2 = "SELECT * FROM class where classID = '$classID' ";
              $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
              while($rc2 = mysqli_fetch_array($rs2)){
                $teacherID = $rc2['teacherID'];
                $sql3 = "SELECT * FROM teacher where teacherID = '$teacherID'";
                $rs3 = mysqli_query($conn, $sql3)or die(mysqli_error($conn));
                while($rc3 = mysqli_fetch_array($rs3)){
                  echo"<tr><td>".$rc['classID']."</td><td>".$rc2['classCode']."</td><td>".$rc2['schoolYear']."</td><td>".$rc3['teacherName']."</td><td>"."Current Class"."</td></tr>";
              }
            }
            /* search in recprd database*/
            $sql4 = "SELECT * FROM classrecord where rclassID = '$classID' ";
            $rs4 = mysqli_query($conn, $sql4)or die(mysqli_error($conn));
            while($rc4 = mysqli_fetch_array($rs4)){
              $teacherID = $rc4['rTeacherID'];
              $sql5 = "SELECT * FROM teacher where teacherID = '$teacherID'";
              $rs5 = mysqli_query($conn, $sql5)or die(mysqli_error($conn));
              while($rc3 = mysqli_fetch_array($rs3)){
                echo"<tr><td>".$rc['classID']."</td><td>".$rc4['rClassCode']."</td><td>".$rc2['rSchoolYear']."</td><td>".$rc5['teacherName']."</td><td>"."Previous Class"."</td></tr>";
              }
            }
            /* stop in here */
          }
      ?>";

      $('#tableCss').append(allocationRecord);
  });
  </script>
  </head>

  <body>
      <?php include 'studentMenuBar.html'; ?>
      <center class="background">
        <div class="topicDiv">
          <h3>Allocation Record</h3>
        </div>
        <div class="body">
          <table class="tableCss" id="tableCss">
            <tr class="firstRow"><th>Class ID</th><th>Class Code</th><th>Year</th><th>Teacher Name</th><th>Status</th></tr>
          </table>
        </div>
      </center>
  </body>
  </html>
