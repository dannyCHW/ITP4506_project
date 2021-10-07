<!DOCTYPE html>
<html>

<head>

  <title>CreateAcc</title>
  <?php include 'studentCheckSession.php'; ?>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/profile.css">

  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function(){

        var stuUserName = '<%= Session["studentUsername"]%>';
        var stuID = '<%= Session["studentID"]%>';
        var stuName = '<%= Session["studentName"]%>';
        var pwd = '<%= Session["studentPassword"]%>';
        var stuInfo = '<%= Session["studentInfo"]%>';

        $("#userName").val(stuUserName);
        $("#stuName").val(stuName);
        $("#stuID").val(stuID);
        $("#stuInfo").val(stuInfo);

      /* menu open & close */
      $('.toggle').click(function(){
        if($(".toggle").attr("class") == "toggle"){
          $('.toggle').addClass("active");
          $('.navigation').addClass("active");
        }else{
          $('.toggle').removeClass("active");
          $('.navigation').removeClass("active");
        }
      });
      $('.list').hover(function(){
          $('.list').removeClass("active");
          $(this).addClass("active");
      }).mouseleave(function() {
          $('.list').removeClass("active");
      });

      $("#editBtn").click(function(){
        $('.form_input').prop('readonly', false);
        $('#userName').prop('readonly',true);
        $('#stuID').prop('readonly',true);
        $('#name').prop('readonly',true);
        $(this).hide();
        $('#saveBtn').removeAttr('hidden');
      });
      $("#saveBtn").click(function(){
        var newPassword1 = $("#newPassword1").val();
        var newPassword2 = $("#newPassword2").val();
        if(newPassword1 != newPassword2){
          alert("New password are not match");
        }
        /* 攞舊password */
        else if ($("#oldPassword").val() != pwd){
          lert("Wrong Password , Please Try Again");
        }else{

        }

      });
    });
  </script>
  </head>
  <body>
    <?php
    include 'studentMenuBar.html';
    ?>




  <div class="c1">
  <h3> Profile Management</h3>

  <div class="profileIcon">
  <img src="student_icon.jpg">
  </div>
  </div>
  <div class="canvas_body">
  <div action="studentProfileEdit.php" method="post" class="proBody">
        <p>User Name: <input type="text" name="userName" id="userName" class="form_input" autocomplete="off" readonly/></p>
        <p>Full Name: <input type="text" name="stuName" id="name" class="form_input" autocomplete="off" readonly/></p>
        <p>Student ID: <input type="text" name="stuID"id="stuID" class="form_input" autocomplete="off" readonly/></p>
        <p>Old Password: <input type="password" name="oldPassword" id="oldPassword" class="form_input" autocomplete="off" readonly/></p>
        <p>New Password: <input type="password" name="newPassword" id="newPassword1" class="form_input" autocomplete="off" readonly/></p>
        <p>Repeated Password: <input type="password" id="newPassword2" class="form_input" autocomplete="off" readonly/></p>
        <button id="editBtn" class="button">Edit</button>
        <button id="saveBtn" type="submit" name="editProfile" class="button" hidden>Save</button>
  </div>
  </center>

  </body>
  </html>
