
<html>
<head>
    <title>Add Student Form</title>
    <?php include 'teacherCheckSession.php'; ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminCss/teacherClass.css">

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
    $(document).ready(function(){

      var noAsignStuList = "<?php
      require_once('connectDB.php');
      $selectClassID = $_SESSION['searchByClassID'];
      $sql = "SELECT * FROM student where studentActivation=0 ";
      $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
      while($rc = mysqli_fetch_array($rs)){
          $searchStudent = $rc['studentID'];
          $sql2 = "SELECT * FROM allocation where studentID = '$searchStudent'";
          $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
          if(mysqli_num_rows($rs2)==0){
            echo"<tr><td>".$rc['studentID']."</td><td>".$rc['studentName']."</td><td>"."Click This Row To Add"."</td></tr>";
          }
          /*
          while($rc2 = mysqli_fetch_array($rs2)){
            echo"<tr><td>".$rc2['studentID']."</td><td>".$rc2['studentName']."</td><td>".$rc2['studentInfo']."</td></tr>";
          }
          */
      }
      ?>";

      $('#studentShowList').append(noAsignStuList);

      $("#backBtn").click(function(){
          window.location.replace("teacherStudentListHTML.php");
      });
      $(' #studentShowList tr ').click(function(){
          var selectStuID = $(this).find('td:first').text();
          $('#saveID').val(selectStuID);
          $("form[name='saveForm']").submit();
          alert("Add student successful!");
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
      <h3 id="topic"> Not Assigned Student List </h3>
    </div>
    <center class="divStudentList"  >
      <button id="backBtn" style="height:40px;padding-bottom:3px;">Back To Class List</button>

      <table class="studebtTable" id="studentShowList" name="studentShowList">
        <tr class="firstRow"><th>Student ID</th><th>Student Name</th><th>Add To Class</th></tr>
      </table>


    </center>
  </div>
  <form action="addStudent.php" method="POST" id="saveForm" name="saveForm" hidden>
    <input type="text" id="saveID" name="saveID"></input>
  </form>
</body>
</html>
