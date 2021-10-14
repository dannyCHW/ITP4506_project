<!<!DOCTYPE html>
<html>
<head>
    <style>
    body{
      font-weight: bold;
    }
      form{
        margin-top:50px;
      }
      .topDiv{
        background-color: grey;
        height: 80px;
        width: 100%;
        font-size: 30px;
        padding-top: 20px;
        text-align: center;
      }
       .proBody{
        height:300px;
      }
      #className{
        margin-top: 17%;
      }

      #submitBtn{
        background-color: #d13f13;
      }
      ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: blue;
        opacity: 1; /* Firefox */
        font-weight: bold;
      }

    </style>
      <?php include 'teacherCheckSession.php'; ?>
        <title>Create Class</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminCss/profile.css">


    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function(){
        /* menu open & close */
        var teacherID = "<?php echo $_SESSION['teacherID'] ?>";
        $("#submitBtn").click(function(){
          alert("Class created.");
            $("form[name='createClassForm']").submit();
        });


      });
    </script>
</head>
<body>
  <?php include 'teacherMenuBar.html'; ?>
  <center class="canvas">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <div class="topDiv">
    <h3> Create Class </h3>
  </div>

  <div class="canvas_body">
    <form action="createClass.php" class="proBody" method="POST" name="createClassForm">
      <p>Class Name: <input type="text" id="className" name="className" class="form_input" autocomplete="off" required/></p>
      <p>Class Code: <input type="text" id="code" name="code" class="form_input" autocomplete="off" required/></p>
      <p>Year: <input type="text" id="year" name="year" class="form_input" autocomplete="off" required/></p>
      <p>Information: <input type="text" id="classInfo" name="classInfo" class="form_input" placeholder="(Can Be Blank)" autocomplete="off" /></p>

      <button type="submit" id="submitBtn" class="button" >Submit</button>
    </form>

  </center>

</body>
</html>
