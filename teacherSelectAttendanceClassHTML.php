
<html>
<head>
  <?php include 'teacherCheckSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/teacherClass.css">

  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
  $(document).ready(function(){
    var teacherID =  "<?php echo $_SESSION['searchByClassID'] ?>";

    var varStudentList = "<?php
          require_once('connectDB.php');
          $selectClassID = $_SESSION['searchByClassID'];
          $sql = "SELECT * FROM allocation where classID = '$selectClassID' ";
          $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
          while($rc = mysqli_fetch_array($rs)){
              $searchStudent = $rc['studentID'];
              $sql2 = "SELECT * FROM student where studentID = '$searchStudent'";
              $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
              while($rc2 = mysqli_fetch_array($rs2)){
                $rate = 0 ;
                $numerator= 0 ;
                $denominator = 0 ;
                $sql3 = "SELECT * FROM attanence where studentID = '$searchStudent' AND classID = '$selectClassID'";
                $rs3 = mysqli_query($conn, $sql3)or die(mysqli_error($conn));
                while($rc3 = mysqli_fetch_array($rs3)){
                  $denominator +=1 ;
                  if($rc3['attanence_status'] == "attendance" || $rc3['attanence_status'] == "sickLeave"){
                    $numerator+=1;
                  }else if($rc3['attanence_status'] == "late"){
                    $numerator+=0.5;
                  }else{
                    $numerator+=0;
                  }

                }
                $rate = $denominator/$numerator * 100;
                if($rate<70){
                echo"<tr style='background-color:	#CD5C5C'><td>".$rc2['studentID']."</td><td>".$rc2['studentName']."</td><td>".$rate."%</td></tr>";
                }else{
                echo"<tr><td>".$rc2['studentID']."</td><td>".$rc2['studentName']."</td><td>".$rate."%</td></tr>";
                }
              }
          }
        mysqli_free_result($rs);

      ?>";

      $('#studentShowList').append(varStudentList);


      $("#backBtn").click(function(){
          window.location.replace("teacherCheckAttendanceHTML.php");
      });

      /* */

      $("#studentShowList tr").click(function(){
        var selectStuID = $(this).find('td:first').text();
        $("#searchStudentID").val(selectStuID);
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
  <center class="divStudentList"  >
    <button id="backBtn" style="height:40px;padding-bottom:3px;">Back To Class List</button>

    <table class="studebtTable" id="studentShowList" name="studentShowList">
      <tr class="firstRow"><th>Student ID</th><th>Student Name</th><th>Student Attendance Rate</th></tr>
    </table>




  </center>
  <form id="teacherSelectStudent" method="POST" action="teacherAttendanceSingleStudent.php" name="teacherSelectStudent"hidden>
    <input type="text" name="searchStudentID" id="searchStudentID"/>
  </form>

</div>
</body>
</html>
