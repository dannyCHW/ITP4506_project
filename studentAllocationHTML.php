<html>

<head>
  <style>
    h3{
      color:#504a57;
      margin-top: 30px;
      margin-bottom: 30px;
    }
    </style>

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
          }
          $sql4 = "SELECT * FROM allocationrecord where rStudentID = '$studentID' ORDER BY rClassID DESC";
          $rs4 = mysqli_query($conn, $sql4)or die(mysqli_error($conn));
          while($rc4 = mysqli_fetch_array($rs4)){
              $rclassID = $rc4['rClassID'];
              $sql5 = "SELECT * FROM classrecord where rClassID = '$rclassID' ";
              $rs5 = mysqli_query($conn, $sql5)or die(mysqli_error($conn));
              while($rc5 = mysqli_fetch_array($rs5)){
                $rteacherID = $rc5['rTeacherID'];
                $sql6 = "SELECT * FROM teacher where teacherID = '$rteacherID'";
                $rs6 = mysqli_query($conn, $sql6)or die(mysqli_error($conn));
                while($rc6 = mysqli_fetch_array($rs6)){
                  echo"<tr style='background-color:Tomato'><td>".$rc4['rClassID']."</td><td>".$rc5['rClassCode']."</td><td>".$rc5['rSchoolYear']."</td><td>".$rc6['teacherName']."</td><td>"."Previus Class"."</td></tr>";
                }
              }
          }
          /* stop in here */
      ?>";

      $('#tableCss').append(allocationRecord);
  });
  </script>
  </head>

  <body>
      <?php include 'studentMenuBar.html'; ?>
      <center class="background">
        <div class="">
          <h3>Allocation Record</h3>
        </div>
        <div class="body">
          <table class="tableCss" id="tableCss" style="padding-left:100px;padding-right:100px;">
            <tr class="firstRow"><th>Class ID</th><th>Class Code</th><th>Year</th><th>Teacher Name</th><th>Status</th></tr>
          </table>
        </div>
      </center>
  </body>
  </html>
