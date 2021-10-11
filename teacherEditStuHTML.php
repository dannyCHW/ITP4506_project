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

        $("table.classTable tr").click(function(){
          var selectClassID = $(this).find('td:first').text();
          $("#searchStu").val(selectClassID);
          $("form[name='teacherSelectClass']").submit();
          var varStuList =  "<?php echo $_SESSION['searchByClassID'] ?>";
        });
        $("#backBtn").click(function(){
          $(".divStudentList").hide();
          $(".divTable").show();
          $("#topic").text("View Class");
        });
        $("table.studebtTable tr").click(function(){
          $(".divStudentList").hide();
          $(".divEditStudent").show();
          $("#topic").text("Edit Student Profile");
        });
        $("#backStudentListBtn").click(function(){
          $(".divEditStudent").hide();
          $('.form_input').val("");
          $('.form_input').prop('readonly', true);
          $(".divStudentList").show();
        });
        $("#editBtn").click(function(){
            $('.form_input').prop('readonly', false);
            $(this).hide();
            $("#saveBtn").show();
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

    <div class="divEditStudent">
        <button id="backStudentListBtn" style="height:40px;padding:10px;">Back To Class List</button>
        <div action="" class="proBody">
          <p>Name: <input type="text" id="name" class="form_input" autocomplete="off" readonly/></p>
          <p>Email: <input type="text" id="email" class="form_input" autocomplete="off" readonly/></p>
          <p>Phone: <input type="text" id="phone" class="form_input" autocomplete="off" readonly/></p>
          <p>Old Password: <input type="password" id="oldPassword" class="form_input" autocomplete="off" readonly/></p>
          <p>New Password: <input type="password" id="newPassword1" class="form_input" autocomplete="off" readonly/></p>
          <p>Repeated: <input type="password" id="newPassword2" class="form_input" autocomplete="off" readonly/></p>
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
