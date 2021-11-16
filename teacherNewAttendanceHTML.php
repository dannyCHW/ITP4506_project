<!DOCTYPE html>
<html>

<head>
    <style>
    .main{
      padding-top: 100px;
    }
    select,input[type=date]{
      width: 50%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
      border-radius: 12px;
    }
    select:focus,input[type=date]:focus{
      background-color: #ddd;
      outline: none;
      border-radius: 12px;
    }
    /* ============= */
    #table1 {
        border-collapse: collapse;
        margin-top: 50px ;
        margin-left: 100px;
        font-size: 0.9em;
        font-family: sans-serif;
        width: 44.7%;
        float: left;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    #table1  tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    #table1  th,
    #table1  td {
        padding: 12px 15px;
    }

    #table1  tr {
        border-bottom: 1px solid #dddddd;
    }

    #table1 tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    #table1 tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    #table2 {
        border-collapse: collapse;
        margin-top: 50px ;
        margin-right: 100px;
        font-size: 0.9em;
        font-family: sans-serif;
        width: 44.7%;
        float: right;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    #table2  tr {
        background-color: #483cb4;
        color: #ffffff;
        text-align: left;
    }

    #table2  th,
    #table2  td {
        padding: 12px 15px;
    }

    #table2  tr {
        border-bottom: 1px solid #dddddd;
    }

    #table2 tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    #table2 tr:last-of-type {
        border-bottom: 2px solid #483cb4;
    }
    </style>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <link rel="stylesheet" type="text/css" href="adminCss/adminCreateAccount.css">
    <?php include 'teacherCheckSession.php'; ?>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $("#classSelect").prop("selectedIndex", -1);


    });

    $(document).on('change', '#classSelect', function() {

      var classID =  $('#classSelect').val();

      $.ajax({
         type: 'post',
         url: 'teacherAttendanceAjax.php',
         data: {id:classID} ,
         datatype: 'text',
         success: function(data) {
           alert(data);
         }
      });

    });
    </script>
</head>

<body>
<?php include 'teacherMenuBar.html'; ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<center>
  <div class="main">
    <form action="xxxxx" method="post">
      <div class="container">
        <h1 class="r_text">Create Attendance</h1>
        <p class="r_text">Please Select The Class You Want To Take Attendance.</p>
        <br />
        <hr>
        <br>
        <label><b>Select Class: </b></label>

        <select name="classSelect" id="classSelect">
            <?php
            require_once('connectDB.php');
            $teacherID = $_SESSION['teacherID'];
            $sql = "SELECT * FROM class where teacherID = $teacherID";
            $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            while($rc = mysqli_fetch_array($rs)){
              ?>
            <option><?php echo$rc['classCode'] ?></option>
            <?php
            };
            ?>
        </select>
        <br>
        <label><b> &nbsp&nbspSelect Date: </b></label>
        <input type="date" id="datePicker"  value="<?php echo date('Y-m-d'); ?>"></input>
        <br />


        <hr>

        <table id="table1"><tr><th>Studnet Name</th><th>Studnet ID</th></tr><table>
        <table id="table2"><tr><th>Studnet Name</th><th>Studnet ID</th></tr><table>
        <br />
        <button type="submit" name="submit" class="registerbtn" id="submitbtn" hidden><b>Create Account</b> </button>
      </div>
    </form>
  </div>



</center>

</body>
</html>
