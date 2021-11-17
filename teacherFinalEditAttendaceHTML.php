
<html>
<head>
  <style>
  #backpageBtn{
    background-color: #d13f13;
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
  #backpageBtn:hover {
    opacity: 1;
  }
  h3{
    color:#504a57;
  }
  p{
    color:#504a57;
    margin-bottom: 30px;
  }

  #btnEditClassInfo{
    background-color: #483cb4;
    color: white;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
    opacity: 0.9;
    border-radius: 12px;
    height:50px;
    margin-bottom: 30px;
    font-weight: bold;
    font-size:20px;
  }
  #btnEditClassInfo:hover {
    opacity: 1;
  }
  #btnConfirmEditClassInfo{
     background-color: red;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 30%;
      opacity: 0.9;
      border-radius: 12px;
      height:50px;
      margin-bottom: 30px;
      font-weight: bold;
      font-size:20px;
    }
    #btnConfirmEditClassInfo:hover {
      opacity: 1;
    }
    #btnAddStudent{
      background-color: #4CAF50;
       color: white;
       margin: 8px 0;
       border: none;
       cursor: pointer;
       width: 30%;
       opacity: 0.9;
       border-radius: 12px;
       height:50px;
       margin-bottom: 30px;
       font-weight: bold;
       font-size:20px;
       margin-top: 30px;
     }
     #btnConfirmEditClassInfo:hover {
       opacity: 1;
     }
     #textArea{
       color: #504a57;
       font-weight: bold;
     }
  </style>
    <title>Student List</title>
    <?php include 'teacherCheckSession.php'; ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminCss/teacherClass.css">

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
    $(document).ready(function(){

      var varStudentList = "<?php
            require_once('connectDB.php');
            $selectClassID = $_SESSION['editAttendanceClassID'];
            $selectStudent = $_SESSION['selectEditAttendanceStudentID'];
            $sql = "SELECT * FROM attanence where classID = $selectClassID AND studentID = $selectStudent ";
            $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            while($rc = mysqli_fetch_array($rs)){
                $sql2 = "SELECT * FROM student where studentID = '$selectStudent'";
                $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
                while($rc2 = mysqli_fetch_array($rs2)){
          				echo"<tr><td>".$rc2['studentName']."</td><td>".$rc['attanence_date']."</td><td>".$rc['attanence_status']."</td></tr>";
              	}
            }
          mysqli_free_result($rs);

        ?>";


        $('#studentShowList').append(varStudentList);

        $("#studentShowList tr:not(:first-child)").click(function(){
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
      <h3 id="topic"> Student Lsit & Class Information </h3>
    </div>
    <center class="divStudentList"  >
      <button id="backpageBtn">Back To Select Class</button>

      <table class="classTable" id="studentShowList" name="studentShowList">
        <tr class="firstRow"><th>Student Name</th><th>Date</th><th>Current Status</th><th>Expect Status</th><th>Confirm</th></tr>
      </table>

    </center>
    <form id="teacherSelectStudent" method="POST" action="teacherUpdateAttendance.php" name="teacherSelectStudent"hidden>
      <input type="text" name="searchStudentID" id="searchStudentID"/>
    </form>
  </div>
</body>
</html>
