
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
          				echo"<tr><td>".$rc2['studentID']."</td><td>".$rc2['studentName']."</td><td>".$rc2['studentInfo']."</td></tr>";
              	}
            }
          mysqli_free_result($rs);

        ?>";

        $('#studentShowList').append(varStudentList);

        var currentClassInfo = "<?php
          require_once('connectDB.php');
          $selectClassID = $_SESSION['searchByClassID'];
          $sql3 = "SELECT classInfo FROM class where classID = '$selectClassID' ";
          $rs3 = mysqli_query($conn, $sql3)or die(mysqli_error($conn));

          while($rc3 = mysqli_fetch_array($rs3)){
              echo $rc3['classInfo'];
          }
        mysqli_free_result($rs3);
        ?>";

        $("#textArea").text(currentClassInfo);


        $("#btnEditClassInfo").click(function(){
          $("#textArea").prop('readonly',false);
          $(this).hide();
          $("#btnConfirmEditClassInfo").show();
        });

        $("#btnConfirmEditClassInfo").click(function(){

          $("form[name='classInfoForm']").submit();

        });

        $("#backBtn").click(function(){
            window.location.replace("teacherClassManagementHTML.php");
        });

        /* */

        $("#studentShowList tr").click(function(){
          var selectStuID = $(this).find('td:first').text();
          $("#searchStudentID").val(selectStuID);
          $("form[name='teacherSelectStudent']").submit();
        });

        $("#btnAddStudent").click(function(){
          window.location.replace("addStudentClassHTML.php");
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
      <h3 id="topic"> View Class </h3>
    </div>
    <center class="divStudentList"  >
      <button id="backBtn" style="height:40px;padding-bottom:3px;">Back To Class List</button>

      <table class="studebtTable" id="studentShowList" name="studentShowList">
        <tr class="firstRow"><th>Student ID</th><th>Student Name</th><th>Student Information</th></tr>
      </table>

      <button id="btnAddStudent" style="width:300px;height:50px;background-color:green;font-weight:bold;color:#fff;margin-bottom:40px;font-size:25px;margin-top:30px;">Add Student</button>


      <form id="classInfoForm" name="classInfoForm" method="POST" action="editClassInfo.php">
        <p style="text-align:center; font-size:30px;">Class Information:</p><textarea  type="text"class="classInfoDiv" name="textArea"id="textArea" style="height:150px;width:700px;font-size:30px; margin-bottom:30px;" readonly></textarea><br/>
      </form>
        <button id="btnEditClassInfo" style="width:300px;height:50px;background-color:blue;font-weight:bold;color:#fff;margin-bottom:40px;font-size:25px;">Edit</button>
        <button id="btnConfirmEditClassInfo" style="width:300px;height:50px;background-color:red;font-weight:bold;color:#fff;margin-bottom:40px;font-size:25px;" hidden>Confirm Edit</button>


    </center>
    <form id="teacherSelectStudent" method="POST" action="teacherSelectStudent.php" name="teacherSelectStudent"hidden>
      <input type="text" name="searchStudentID" id="searchStudentID"/>
    </form>
  </div>
</body>
</html>
