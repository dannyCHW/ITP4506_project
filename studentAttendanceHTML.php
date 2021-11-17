<html>

<head>

  <style>
    h3{
      color:#504a57;
      margin-top: 30px;
    }
    #searchBtn{

      background-color: #4CAF50;
      color: white;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 80%;
      opacity: 0.9;
      border-radius: 12px;
      height:50px;
      margin-bottom: 30px;
      font-weight: bold;
      font-size:20px;
    }
    #backPaeggBtn:hover {
      opacity: 1;
    }
  </style>


  <title>Check Attendance</title>
  <?php include 'studentCheckSession.php'; ?>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="viewport" content="height=device-height,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <link rel="stylesheet" type="text/css" href="adminCss/stuAttendance.css">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
  $(document).ready(function(){


      $('input[type=radio][name=timeType]').click(function() {
        if ($(this).val() === 'Year') {
          $("#pMonthSelect").hide();
        } else if ($(this).val() === 'Month') {
          $("#pMonthSelect").show()
        }
    });

    $("#searchBtn").click(function(){
      if($("#year").is(':checked')) {
        $("#attendaceForm").find("tr:gt(0)").remove();
        var attendaceList = "<?php
          require_once('connectDB.php');
          $studentID = $_SESSION['studentID'];
          $sql = "SELECT classID FROM allocation where studentID = '$studentID' ";
          $rs= mysqli_query($conn, $sql)or die(mysqli_error($conn));
          while($rc = mysqli_fetch_array($rs)){
                $classID = $rc['classID'];
                $sql2 = "SELECT * FROM class where classID = '$classID'";
                $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
                while($rc2 = mysqli_fetch_array($rs2)){
                  $currentClassID = $rc2['classID'];
                }
            }
          $sql5 = "SELECT * FROM attanence where classID = '$currentClassID' AND studentID ='$studentID'";
          $rs5= mysqli_query($conn, $sql5)or die(mysqli_error($conn));
          while($rc5 = mysqli_fetch_array($rs5)){
            if($rc5['attanence_status']=="absent"){
              echo"<tr style='background-color:red'><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
            }elseif($rc5['attanence_status']=="late"){
              echo"<tr style='background-color:#BDB76B'><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
            }else if($rc5['attanence_status']=="sickLeave"){
              echo"<tr style='background-color:blue'><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
            }
            else{
            	echo"<tr><td>".$rc5['attanence_date']."</td><td>".$rc5['attanence_status']."</td></tr>";
            }
          }
          echo "alert('$currentClassID')";
        ?>";

            $('#attendaceForm').append(attendaceList);

          }else{
              $("#attendaceForm").find("tr:gt(0)").remove();
              $.ajax({
                type: "POST",
                url: 'getMonthAttendance.php',
                data: {text:$('#monthSelect').val()},
                success: function(data) {
                  $('#attendaceForm').append(data);
                }
              });
          }

    });
      $('#searchBtn').click();
  });
  </script>
  </head>

  <body>
      <?php include 'studentMenuBar.html'; ?>
      <center class="background">
        <div class="">
          <h3>Check Attendace</h3>
        </div>
        <div class="body">
          <center class="selectDiv">
            <p id="text">Searching by : &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="year" name="timeType" value="Year" checked>&nbsp; Year &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="month" name="timeType" value="Month">&nbsp; Month
            </p>
            <p id= 'pMonthSelect'hidden>Select month : &nbsp;&nbsp;&nbsp;&nbsp;
              <select name="monthSelect" id="monthSelect">
                <option selected value='1'>Janaury</option>
                <option value='2'>February</option>
                <option value='3'>March</option>
                <option value='4'>April</option>
                <option value='5'>May</option>
                <option value='6'>June</option>
                <option value='7'>July</option>
                <option value='8'>August</option>
                <option value='9'>September</option>
                <option value='10'>October</option>
                <option value='11'>November</option>
                <option value='12'>December</option>
              </select>
            </p>
            <button type="button" id="searchBtn" >Search</button>
          <table id="attendaceForm" class="studebtTable" style="padding-right:100px;padding-left  :100px;">
            <tr class="firstRow"><th>Date</th><th>Status</th></tr>
          </table>
          </center>
        </div>
      </center>
  </body>
  </html>
