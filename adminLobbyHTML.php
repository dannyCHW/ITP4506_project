<!DOCTYPE html>
<html>

<head>
  <style>
  p{
    font-size: 20px;
    color:#1c1c1e;
  }
  select{
    height: 30px;
    width: 600px;
    border: none;
    font-size: 25px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom:12px;
  }
  input{
    height: 30px;
    width: 600px;
    border: none;
    font-size: 25px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom:12px;
  }
  textarea{
    font-size: 25px;
  }
  #btnSubmit{
    background-color: #483cb4;
    color: white;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
    opacity: 0.9;
    border-radius: 12px;
    height:50px;
    margin-bottom: 35px;
    font-weight: bold;
    font-size:20px;
  }#btnView{
    width: 150px;
    height:30px;
    background-color: #11d6ee;
    font-weight: bold;
    color:#fff;
    font-size: 24px;
  }
  #btnDelete{
    width: 150px;
    height:30px;
    background-color: red;
    font-weight: bold;
    color:#fff;
    font-size: 24px;

  }
  h1{
    font-size: 40px;
    margin-top: 30px;
    color:#1c1c1e;
  }
  h3{
    font-size: 25px;
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
  #btnDestory{
    background-color: red;
    color: white;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
    opacity: 0.9;
    border-radius: 12px;
    height:50px;
    margin-bottom: 35px;
    font-weight: bold;
    font-size:20px;
  }
  </style>
  <?php include 'adminCheckSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $('#logOut').click(function() {
        window.location = "logoutSession.php";
      });

      var table_body = "<?php
        require_once('connectDB.php');

          $sql = "SELECT * FROM board";
          $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
          while($rc = mysqli_fetch_array($rs)){
            echo "<tr><td>".$rc['topicName']."</td><td>".$rc['day']."</td><td><button id='btnView'>View</button></td></tr>";
          };
      ?>";

      $("#mainTable").append(table_body);

      $("#btnSubmit").click(function(){
        var topic = $("#topic").val();
        var contents = $("#contends").val();
        if(topic==="" ||contents===""){
          alert("Topic Or Contents Cannot Empty.");
        }else{
                         alert("Message has been upload.");
          $.ajax({
             type: 'post',
             url: 'adminCreateContents.php',
             data: {topic:topic,
             contents:contents} ,
             success: function(data) {
             }
          });
           location.reload();
        }
      });

    });
    $(document).on('click', '#btnView', function() {
       var topic = $(this).closest("tr").find("td:eq(0)").text();
       var day = $(this).closest("tr").find("td:eq(1)").text();
       $.ajax({
          type: 'post',
          url: 'studentViewContent.php',
          data: {topic:topic,
          day:day},
          success: function(data) {
            myWindow=window.open('','','width=700,height=700');
            myWindow.document.write("<p>"+data+"</p>");
          }
       });

     });

      $(document).on('click', '#btnDestory', function() {
        var r = confirm("You really want to delete all board?");
        if (r == true) {
          $.ajax({
             type: 'post',
             url: 'adminDeleteAllContents.php',
             success: function(data) {
               alert("Delete Successful, Now Board Is Empty.")
             }
          });
        } else {
        }
          location.reload();
      });
  </script>


</head>

<body>
  <?php include 'adminMenuBar.html'; ?>
  <div>
    <center>
      <h1>Admin Lobby</h1>
      <hr>
      <h3>Bulletin board</h3>
      <br>
      <br>
      <br>
      <p>Select Class:<select id="classSelect">
          <option>All</option>
      </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <p>Topic:<input type="text" id="topic"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <br>
      <textarea id="contends" name="contends" rows="8" cols="45" placeholder="Input contents here..."></textarea>
      <br>
      <button id="btnSubmit">Upload information</button>
      <table id="mainTable">
        <tr><th width="40%">Topic</th><th width="30%">Date</th><th width="30%">View</th></tr>
      </table>
          <button id="btnDestory">Clear All Record On Board In This Year</button>
    </center>
  </div>

</body>

</html>
