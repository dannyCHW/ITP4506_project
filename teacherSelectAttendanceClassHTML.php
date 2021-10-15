<html>
<head>
  <style>
  #reportBtn{
    background-color: #4CAF50;
    color: white;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
    opacity: 0.9;
    border-radius: 12px;
    height:50px;
    margin-top: 70px;
    font-size: 20px;
  }
  #reportBtn:hover {
    opacity: 1;
  }
  #backPaeggBtn{
    background-color: #e07722;
    color: white;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 80%;
    opacity: 0.9;
    border-radius: 12px;
    height:50px;
    margin-bottom: 30px;
    font-weight: bold;
    font-size:20px;
  }
  #backPaeggBtn:hover {
    opacity: 1;
  }

  </style>
  <?php include 'teacherCheckSession.php'; ?>
    <title>Attendance Student List</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/teacherClass.css">

  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>


  <script type="text/javascript">
      function exportToExcel(){
        document.getElementById("reportTable").hidden = false;
      var downloadurl;
      var dataFileType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById('reportTable');
      var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
      // Specify file name
      filename = 'StudentDetails.xls';
      // Create download link element
      downloadurl = document.createElement("a");
      document.body.appendChild(downloadurl);
      if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTMLData], {
          type: dataFileType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
      }else{
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
        // Setting the file name
        downloadurl.download = filename;
        //triggering the function
        downloadurl.click();
      }
      document.getElementById("reportTable").hidden = true;
    }
  </script>


  <script type="text/javascript" language="javascript">
  $(document).ready(function(){

    var varStudentList = "<?php
          require_once('connectDB.php');
          $selectClassID = $_SESSION['rAttendanceClass'];
          $sql = "SELECT * FROM allocation where classID = '$selectClassID' ";
          $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
          while($rc = mysqli_fetch_array($rs)){
              $searchStudent = $rc['studentID'];
              $sql2 = "SELECT * FROM student where studentID = '$searchStudent'";
              $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
              while($rc2 = mysqli_fetch_array($rs2)){
                $rate = 100 ;
                $numerator = 0 ;
                $denominator = 0;
                $percent =100;
                $sql3 = "SELECT * FROM attanence where studentID = '$searchStudent' AND classID = '$selectClassID'";
                $rs3 = mysqli_query($conn, $sql3)or die(mysqli_error($conn));
                while($rc3 = mysqli_fetch_array($rs3)){
                  $denominator +=1 ;
                  if($rc3['attanence_status'] == "onTime" || $rc3['attanence_status'] == "sickLeave"){
                    $numerator+=1;
                  }else if($rc3['attanence_status'] == "late"){
                    $numerator+=0.5;
                  }else{
                    $numerator+=0;
                  }
                }
                if($denominator == 0 || $numerator == 0){
                  $rate = 0;
                }else{
                $rate = $numerator * $percent / $denominator;
                }
                if($rate<70){
                echo"<tr style='background-color:	#CD5C5C'><td>".$rc2['studentID']."</td><td>".$rc2['studentName']."</td><td>".$rate."%</td></tr>";
                }else{
                echo"<tr><td>".$rc2['studentID']."</td><td>".$rc2['studentName']."</td><td>".$rate."%</td></tr>";
                }
              }
          }
      ?>";

      $('#studentShowList').append(varStudentList);

      var reportList = "<?php
      require_once('connectDB.php');
      $selectClassID = $_SESSION['rAttendanceClass'];
      $sql6 = "SELECT * FROM attanence where classID = '$selectClassID' ";
      $rs6 = mysqli_query($conn, $sql6)or die(mysqli_error($conn));
      while($rc6 = mysqli_fetch_array($rs6)){
        $searchStudent = $rc6['studentID'];
        $sql7 = "SELECT * FROM student where studentID = '$searchStudent'";
        $rs7 = mysqli_query($conn, $sql7)or die(mysqli_error($conn));
        while($rc7 = mysqli_fetch_array($rs7)){
            echo"<tr><td>".$rc6['attanence_date']."</td><td>".$rc7['studentName']."</td><td>".$rc6['attanence_status']."</td></tr>";
        }
      }
      ?>";

      $('#reportTable').append(reportList);


      $("#backPaeggBtn").click(function(){
          window.location.replace("teacherCheckAttendanceHTML.php");
      });

      /* */

      $("#studentShowList tr:not(:first-child)").click(function(){
        var selectStuID = $(this).find('td:first').text();
        $("#searchStudentID").val(selectStuID);
        var selectStuName = $(this).find('td:eq(1)').text();
        $("#searchStudentName").val(selectStuName);
        $("form[name='teacherSelectStudent']").submit();
      });

    });
  </script>
</head>
<body>
<?php include 'teacherMenuBar.html'; ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<div class="canvas">
  <div class="head" style="height:80px;">
    <h3 id="topic"> Class Attendance</h3>
  </div>
  <center class="divTable"  >
    <button id="backPaeggBtn">Back To Class List</button>

    <table class="classTable" id="studentShowList" name="studentShowList">
      <tr class="firstRow"><th>Student ID</th><th>Student Name</th><th>Student Attendance Rate</th></tr>
    </table>
    <button id="reportBtn" onclick="exportToExcel()">Generation Report</button>

    <table id="reportTable" hidden>
      <tr class="firstRow"><th>Date</th><th>Student Name</th><th>Status</th></tr>
    </table>


  </center>
  <form id="teacherSelectStudent" method="POST" action="teacherAttendanceSingleStudent.php" name="teacherSelectStudent"hidden>
    <input type="text" name="searchStudentID" id="searchStudentID"/>
    <input type="text" name="searchStudentName" id="searchStudentName"/>
  </form>

</div>
</body>
</html>
