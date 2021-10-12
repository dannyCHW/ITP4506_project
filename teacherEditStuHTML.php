<!<!DOCTYPE html>
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
        var studentID =  "<?php echo $_SESSION['selectStudentID'] ?>";
        var studentUserName =  "<?php echo $_SESSION['selectedStudentUserName'] ?>";
        var studentName =  "<?php echo $_SESSION['selectedStudentName'] ?>";
        var studentInfo =  "<?php echo $_SESSION['selectedStudentInfo'] ?>";
        var studentPwd =  "<?php echo $_SESSION['selectedStudentPwd'] ?>";

          $("#stuID").val(studentID);
          $("#stuUserName").val(studentUserName);
          $("#stuName").val(studentName);
          $("#stuInfo").val(studentInfo);
          $("#stuPwd").val(studentPwd);
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

    <div class="divEditStudent">
        <button id="backStudentListBtn" style="height:40px;padding-bottom:5px;">Back To Class List</button>
        <div action="" class="proBody">
          <p>Student ID: <input type="text" id="stuID" class="form_input" autocomplete="off" readonly/></p>
          <p>Student User Name: <input type="text" id="stuUserName" class="form_input" autocomplete="off" readonly/></p>
          <p>Student Name: <input type="text" id="stuName" class="form_input" autocomplete="off" readonly/></p>
          <p>Student Information: <input type="text" id="stuInfo" class="form_input" autocomplete="off" readonly/></p>
          <p>Password: <input type="text" id="stuPwd" class="form_input" autocomplete="off" readonly/></p>
          <button id="editBtn" class="buttonForm">Edit</button>
          <button id="saveBtn" class="buttonForm" hidden>Save</button>
        </div>
    </div>
    <form id="saveData" method="POST" action="teacherSelectClass.php" name="teacherSelectClass"hidden>
      <input type="text" name="searchStu" id="searchStu"/>
    </form>
  </div>
</body>
</html>
