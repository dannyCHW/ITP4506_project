<!<!DOCTYPE html>
<html>
<head>
  <style>
    h1{
      margin-top: 100px;
      margin-bottom: 100px;
    }
  </style>
    <?php include 'teacherCheckSession.php'; ?>
    <title>Create Class</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminCss/adminCreateAccount.css">


    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function(){
        /* menu open & close */
        var teacherID = "<?php echo $_SESSION['teacherID'] ?>";
        $('#submitBtn').click(function(){
          if($("#className").val() == "" ||$("#code").val() == "" ||$("#year").val() == "" ){
            alert("Please fill in class name , class code and year !");
          }else{
              $("form[name='createClassForm']").submit();
          }
        });

      });
    </script>
</head>
<body>
  <?php include 'teacherMenuBar.html'; ?>
  <center class="canvas">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <div class="main">
    <form action="createClass.php" class="proBody" method="POST" name="createClassForm" id="createClassForm">
      <div class="container">
      <h1 class="r_text">Create Class</h1>

      <div class="canvas_body">

      <p>Class Name: <input type="text" id="className" name="className" class="form_input" autocomplete="off" required/></p>
      <p>Class Code: <input type="text" id="code" name="code" class="form_input" autocomplete="off" required/></p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: <input type="text" id="year" name="year" class="form_input" autocomplete="off" required/></p>
      <p>Information: <input type="text" id="classInfo" name="classInfo" class="form_input" placeholder="(Can Be Blank)" autocomplete="off" /></p>

    </form>
          <button type="button" id="submitBtn" class="registerbtn" >Submit</button>
  </div>

  </center>

</body>
</html>
