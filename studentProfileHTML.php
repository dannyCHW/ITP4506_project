<!DOCTYPE html>
<html>

<head>


  <title>StudentProfile</title>
  <?php include 'studentCheckSession.php'; ?>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/profile.css">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
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
        if(newPassword1 == "" || newPassword2 == "" || $("#oldPassword").val() =="" ){
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
  <h3> Profile Management</h3>

  <div class="profileIcon">
  <img src="student_icon.jpg">
  </div>
  </div>
  <div class="canvas_body">
  <form id="idForm" action="studentEditProfile.php" name="stuEdit" method="post" style="margin-top:25px;">
    <div method="post" class="proBody">
        <p>User Name: <input type="text" name="userName" id="userName" class="form_input" autocomplete="off" readonly/></p>
        <p>Full Name: <input type="text" name="stuName" id="name" class="form_input" autocomplete="off" readonly/></p>
        <p>Student ID: <input type="text" name="stuID"id="stuID" class="form_input" autocomplete="off" readonly/></p>
        <p>Student Info: <input type="text" name="stuInfo" id="stuInfo" class="form_input" autocomplete="off" readonly/></p>
        <p>Old Password: <input type="password" name="oldPassword" id="oldPassword" class="form_input" autocomplete="off"  readonly required/></p>
        <p>New Password: <input type="password" name="newPassword" id="newPassword1" class="form_input" autocomplete="off" readonly required/></p>
        <p>Repeated Password: <input type="password" id="newPassword2" class="form_input" autocomplete="off" readonly required/></p>
        <button type="button" id="editBtn" class="button">Edit</button>
        <button id="saveBtn" type="button" name="editProfile" class="button" hidden>Save</button>
  </div>
</form>

  </div>
  </center>

  </body>
  </html>
