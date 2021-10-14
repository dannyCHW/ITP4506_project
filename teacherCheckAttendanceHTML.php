<!<!DOCTYPE html>
<html>
<head>
  <?php include 'teacherCheckSession.php'; ?>
    <title>Attendance Class List</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminCss/teacherClass.css">

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function(){

        var teacherID =  "<?php echo $_SESSION['teacherID'] ?>";

        var varClassList = "<?php
              require_once('connectDB.php');
              $sql = "SELECT * FROM class ";
              $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              while($rc = mysqli_fetch_array($rs)){
                echo"<tr><td>".$rc['classID']."</td><td>".$rc['classCode']."</td><td>".$rc['schoolYear']."</td><td>".$rc['classInfo']."</td></tr>";
              }
            mysqli_free_result($rs);
          ?>";
          $('#classList').append(varClassList);

        $("table.classTable tr:not(:first-child)").click(function(){
          var selectClassID = $(this).find('td:first').text();
          $("#searchClass").val(selectClassID);
          $("form[name='teacherSelectClass']").submit();
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
      <h3 id="topic"> Check Attendance </h3>
    </div>
    <div class="divTable">
      <table class="classTable" id="classList">
        <tr class="firstRow"><th>Class ID</th><th>Class code</th><th>Year</th><th>Class Info</th></tr>
      </table>
    </div>
    <form id="saveData" method="POST" action="teacherSelectAttendanceClass.php" name="teacherSelectClass"hidden>
      <input type="text" name="searchClass" id="searchClass"/>
    </form>
  </div>
</body>
</html>
