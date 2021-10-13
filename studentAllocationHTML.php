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
    var allocaationRecord = "<?php
          require_once('connectDB.php');
          $selectClassID = $_SESSION['studentID'];
          $sql = "SELECT * FROM allocation where studentID = '$selectClassID'";
          $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
          while($rc = mysqli_fetch_array($rs)){
              $classID = $rc['classID'];
              $sql2 = "SELECT * FROM class where classID = '$classID' ORDER BY classID DESC";
              $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
              while($rc2 = mysqli_fetch_array($rs2)){
                $teacherID = $rc2['teacherID'];
                $sql3 = "SELECT * FROM teacher where teacherID = '$teacherID'";
                $rs3 = mysqli_query($conn, $sql3)or die(mysqli_error($conn));
                while($rc3 = mysqli_fetch_array($rs3)){
                  echo"<tr><td>".$rc['classID']."</td><td>".$rc2['classCode']."</td><td>".$rc2['schoolYear']."</td><td>".$rc3['teacherName']."</td><td>".$rc2['classStatus']."</td></tr>";
              }
            }
          }
      ?>";

      $('#tableCss').append(allocaationRecord);
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
