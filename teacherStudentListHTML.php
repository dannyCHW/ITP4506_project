
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
      var teacherID =  "<?php echo $_SESSION['teacherID'] ?>";

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

        /* */

        $("#studentShowList tr:not(:first-child)").click(function(){
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
      <h3 id="topic"> Student Lsit & Class Information </h3>
    </div>
    <center class="divStudentList"  >

      <form id="classInfoForm" name="classInfoForm" method="POST" action="editClassInfo.php">
        <p style="text-align:center; font-size:30px;">Class Information:</p><textarea  type="text"class="classInfoDiv" name="textArea"id="textArea" style="height:150px;width:700px;font-size:30px; margin-bottom:30px;background-color:lightblue;" readonly></textarea><br/>
      </form>
        <button id="btnEditClassInfo" >Edit Class Information</button>
        <button id="btnConfirmEditClassInfo"  hidden>Confirm Edit</button>


      <table class="classTable" id="studentShowList" name="studentShowList" style="padding-right:100px;padding-left:100px;">
        <tr class="firstRow"><th>Student ID</th><th>Student Name</th><th>Student Information</th></tr>
      </table>

      <button id="btnAddStudent" >Add Student</button>




    </center>
    <form id="teacherSelectStudent" method="POST" action="teacherSelectStudent.php" name="teacherSelectStudent"hidden>
      <input type="text" name="searchStudentID" id="searchStudentID"/>
    </form>
  </div>
</body>
</html>
