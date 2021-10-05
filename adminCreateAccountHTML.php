<!DOCTYPE html>
<html>

<head>
  <style>
    input[type=text],
    input[type=password] {
      width: 50%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
      border-radius: 12px;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
      border-radius: 12px;
    }



    /* Set a style for the submit/register button */
    .registerbtn {
      background-color: #d13f13;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 50%;
      opacity: 0.9;
      border-radius: 12px;
    }

    .registerbtn:hover {
      opacity: 1;
    }


    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    .r_text {
      color: #504a57;
    }



    /* -------------------------------------------------------------------- */


    input[type="radio"] {
      margin: 0 10px 0 10px;
    }

    .adminb {
      color: #4CAF50;
    }

    .teacherb {
      color: #483cb4;
    }

    .studentb {
      color: #e07722;
    }


  </style>

  
  <title>CreateAcc</title>
  <?php include 'checkSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">

  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {


      $("#adminR").click(function() {
        $("#name").attr("placeholder", "Admin's name");
        $("#submitbtn").text("Create Account for Admin");
      });

      $("#teacherR").click(function() {
        $("#name").attr("placeholder", "Teacher's name");
        $("#submitbtn").text("Create Account for Teacher");
      });

      $("#studentR").click(function() {
        $("#name").attr("placeholder", "Student's name");
        $("#submitbtn").text("Create Account for Student");
      });

    });
  </script>
</head>

<body>
  <?php
  include 'adminMenuBar.html';
  ?>

  </br></br></br>
  <center>


    <div class="main">
      <form action="adminCreateAccount.php" method="post">
        <div class="container">
          <h1 class="r_text">Create Account</h1>
          <p class="r_text">Please fill in this form to create an account.</p>
          <br />
          <hr>

          <br />
          <input type="radio" id="adminR" name="type" value="admin" required><label><b class="adminb">Admin</b></label>
          <input type="radio" id="teacherR" name="type" value="teacher"><label><b class="teacherb">Teacher</b></label>
          <input type="radio" id="studentR" name="type" value="student"><label><b class="studentb">Student</b></label>
          <br />

          <br>
          <label><b></b></label>
          <input type="text" placeholder="Name" name="name" id="name" required>

          <br>
          <label><b></b></label>
          <input type="text" placeholder="Username" name="username" id="username" required>

          <br>
          <label><b></b></label>
          <input type="password" placeholder="Password" name="psw" id="psw" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>


          <br />
          <hr>

          <br />
          <button type="submit" name="submit" class="registerbtn" id="submitbtn"><b>Create Account</b> </button>
        </div>
      </form>
    </div>



  </center>


</body>

</html>