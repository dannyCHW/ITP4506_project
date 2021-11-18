<!DOCTYPE html>
<html>

<head>
  <title>Teacher Profile</title>
  <?php include 'teacherCheckSession.php'; ?>

  <style>
    p{
      font-weight: bold;
      color:#504a57;
    }
    button{
      font-size: 18px;
      font-weight: bold;
    }
  </style>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/stuProfile.css">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">


    $(document).ready(function(){

      var teacherUsername = "<?php echo $_SESSION['teacherUsername'] ?>";
      var teacherID = "<?php echo $_SESSION['teacherID'] ?>";
      var teacherName = "<?php echo $_SESSION['teacherName'] ?>";
      var pwd = "<?php echo $_SESSION['password'] ?>";
      var teacherInfo =  "<?php echo $_SESSION['teacherInfo'] ?>";

      $("#userName").val(teacherUsername);
      $("#teachername").val(teacherName);
      $("#teacherID").val(teacherID);
      $("#teacherInfo").val(teacherInfo);

      /* menu open & close */


      $("#editBtn").click(function(){
        $('.form_input').prop('readonly', false);
        $('#userName').prop('readonly',true);
        $('#teacherID').prop('readonly',true);
        $('#teachername').prop('readonly',true);
        $("#userName").css("background-color","#A9A9A9");
        $("#teacherID").css("background-color","#A9A9A9");
        $("#teachername").css("background-color","#A9A9A9");

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
        }
        else{
            alert("Changing successful");
            $("form[name='teacherEdit']").submit();
        }

      });
    });
  </script>
  </head>
  <body>
      <?php include 'teacherMenuBar.html'; ?>

  <center class="c1">
  <h3 style="color:#504a57;"> Profile Management</h3>

  <div class="profileIcon">
  <img src="teacherIcon.jpg">
  </div>
  </div>
  <div class="canvas_body">
  <form id="idForm" action="teacherEditProfile.php" name="teacherEdit" method="post" style="margin-top:25px;">
    <div method="post" class="proBody">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Name:<input type="text" name="userName" id="userName" class="form_input" autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Name:<input type="text" name="teacherName" id="teachername" class="form_input"  autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teacher ID:<input type="text" name="teacherID"id="teacherID" class="form_input"  autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teacher Info:<input type="text" name="teacherInfo" id="teacherInfo" class="form_input" autocomplete="off" readonly/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Old Password:<input type="password" name="oldPassword" id="oldPassword" class="form_input" autocomplete="off" readonly required/></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Password:<input type="password" name="newPassword" id="newPassword1" class="form_input" autocomplete="off"  readonly required/></p>
        <p>Repeat Password: <input type="password" id="newPassword2" class="form_input" autocomplete="off" readonly required/></p>
        <button type="button" id="editBtn" class="button">Edit</button>
        <button id="saveBtn" type="button" name="editProfile" class="button" hidden>Save</button>
  </div>
</form>

  </div>
  </center>

  </body>
  </html>
