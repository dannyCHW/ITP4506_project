<!DOCTYPE html>
<html>

<head>


  <title>StudentProfile</title>
  <?php include 'studentCheckSession.php'; ?>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/stuProfile.css">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">

    $(document).ready(function(){

      var userName = "<?php echo $_SESSION['studentUsername'] ?>";
      var stuID = "<?php echo $_SESSION['studentID'] ?>";
      var stuName = "<?php echo $_SESSION['studentName'] ?>";
      var pwd = "<?php echo $_SESSION['studentPassword'] ?>";
      var stuInfo =  "<?php echo $_SESSION['studentInfo'] ?>";

      $("#userName").val(userName);
      $("#name").val(stuName);
      $("#stuID").val(stuID);
      $("#stuInfo").val(stuInfo);

      /* menu open & close */
      $("#editBtn").click(function(){
        $('.form_input').prop('readonly', false);
        $(".form_input").css("background-color","#C8C8C8");
        $('#userName').prop('readonly',true);
        $("#userName").css("background-color","#A9A9A9");
        $('#stuID').prop('readonly',true);
        $("#stuID").css("background-color","#A9A9A9");
        $('#name').prop('readonly',true);
        $("#name").css("background-color","#A9A9A9");

        $(this).hide();
        $('#saveBtn').removeAttr('hidden');
      });
      $("#saveBtn").click(function(){

        var newPassword1 = $("#newPassword1").val();
        var newPassword2 = $("#newPassword2").val();
        if(newPassword1 == "" && newPassword2 == "" && $("#oldPassword").val() == pwd){
          alert("Changing information successful");
          $("#newPassword1").val(pwd);
          $("form[name='teacherEdit']").submit();
        }
        else if(newPassword1 == "" || newPassword2 == "" || $("#oldPassword").val() =="" ){
          alert("Please fill in all input box!");
        }
        else if(newPassword1 != newPassword2){
          alert("New password are not match");
        }
        /* 攞舊password */
        else if ($("#oldPassword").val() != pwd){
          alert("Wrong Password , Please Try Again");
        }else{
            alert("Changing successful");
            $("form[name='stuEdit']").submit();
        }
      });
    });
  </script>
  </head>
  <body>

  <?php include 'studentMenuBar.html'; ?>

  <center class="c1">
  <h3 style="color:#504a57;"> Profile Management</h3>

  <div class="profileIcon">
  <img src="student_icon.jpg">
  </div>
  </div>
  <div class="r_text">
  <form id="idForm" action="studentEditProfile.php" name="stuEdit" method="post" style="margin-top:25px;">
    <div method="post" class="proBody">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Name:<input type="text" name="userName" id="userName" class="form_input" autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Name:<input type="text" name="stuName" id="name" class="form_input" autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student ID:<input type="text" name="stuID"id="stuID" class="form_input" autocomplete="off" readonly/></p>
        <p>;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Info:<input type="text" name="stuInfo" id="stuInfo" class="form_input" autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Old Password:<input type="password" name="oldPassword" id="oldPassword" class="form_input" autocomplete="off"  readonly required/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Password:<input type="password" name="newPassword" id="newPassword1" class="form_input" autocomplete="off" readonly required/></p>
        <p>Repeat Password:<input type="password" id="newPassword2" class="form_input" autocomplete="off" readonly required/></p>
        <button type="button" id="editBtn" class="button">Edit</button>
        <button id="saveBtn" type="button" name="editProfile" class="button" hidden>Save</button>
  </div>
</form>

  </div>
  </center>

  </body>
  </html>
