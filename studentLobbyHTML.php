<!DOCTYPE html>
<html>
<head>
  <style>
  h1{
    font-size: 40px;
    margin-top: 30px;
    color:#1c1c1e;
  }
  hr{
    margin-top: 30px;
    margin-bottom: 30px;
  }
  table{
    margin-left: 100px;
    margin-right: 100px;
    width: 80%;
    text-align: left;
  }
  tr{
    height:90px;
  }
  th{
    color:#ceff00;
    font-weight: bold;
    font-size: 24px;
    background-color: #494b4c;
  }
  td{
    font-size: 24px;
    color:#fff;
    background-color: #7c8488;
    font-weight: bold;
  }
  </style>
  <?php include 'studentCheckSession.php'; ?>
  <title>Student Lobby</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function(){

      });
    </script>
</head>
<body>
  <?php include 'studentMenuBar.html'; ?>
  <div>
    <center>
      <h1>Student Lobby</h1>
      <hr>
      <table>
        <tr><th width="50%">Topic</th><th width="25%">Date</th><th  width="25%">Writer</th></tr>
        <tr><td width="50%" style="text-decoration-line:underline; text-decoration-color: #fff;">Good Morning</th><td width="25%">2021-11-18</th><td  width="25%">Alan Po</th></tr>
      </table>
    </center>
  </div>
</body>
</html>
