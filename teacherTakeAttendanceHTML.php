<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="takeAttendanceOption.css">
    <style>
    </style>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php include 'teacherCheckSession.php'; ?>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
          $("#btnNewForm").click(function(){
            window.location.replace("teacherNewAttendanceHTML.php");
          });
          $("#editForm").click(function(){
            window.location.replace("teacherEditAttendanceHTML.php");
          });
        });
    </script>
</head>

<body>
<?php include 'teacherMenuBar.html'; ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<center>
    <h1 >Action?</h1>
    <button id="btnNewForm" name="btnNewForm">
        <h3>Create New Attendance Reord</h3>
    </button>
  </br>
    <button id="editForm" name="editForm">
        <h3>Edit Attendance Record</h3>
    </button>
</center>
</body>
</html>
