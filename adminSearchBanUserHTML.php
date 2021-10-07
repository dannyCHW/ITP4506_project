<!DOCTYPE html>
<html>

<head>
  <style>
    .search {
      padding: 10px;
      font-size: 17px;
      border: 1px solid grey;
      background: #f1f1f1;
      border-radius: 10px;
      width: 30%;
    }

    /* -------------------------------- */

    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      font-family: sans-serif;
      width: 50%;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: left;
    }

    .styled-table th,
    .styled-table td {
      padding: 12px 15px;
    }

    .styled-table tbody tr {
      border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
      background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
      border-bottom: 2px solid #009879;
    }

    /* ------------------------------- */


    .btnSBUAdmin {
      border: none;
      color: #e8edf2;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      transition-duration: 0.4s;
      cursor: pointer;
      width: 150px;
      border-radius: 5px;
    }


    .btnSBUAdmin {
      color: black;
      border: 2px solid #4CAF50;
    }

    .btnSBUAdmin:hover {
      background-color: #4CAF50;
      color: #e8edf2;
    }


    /* ----------------------- */

    .btnSBUTeacher {
      border: none;
      color: #e8edf2;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      transition-duration: 0.4s;
      cursor: pointer;
      width: 150px;
      border-radius: 5px;
    }


    .btnSBUTeacher {

      color: black;
      border: 2px solid #483cb4;
    }

    .btnSBUTeacher:hover {
      background-color: #483cb4;
      color: #e8edf2;
    }

    /* --------------- */

    .btnSBUStudent {
      border: none;
      color: #e8edf2;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      transition-duration: 0.4s;
      cursor: pointer;
      width: 150px;
      border-radius: 5px;
    }


    .btnSBUStudent {

      color: black;
      border: 2px solid #e07722;
    }

    .btnSBUStudent:hover {
      background-color: #e07722;
      color: #e8edf2;
    }
  </style>

  <?php include 'adminCheckSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <!-- <link rel="stylesheet" type="text/css" href="adminCss/adminSearchBanUser.css"> -->


  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
    function goPhp(v) {

      var asd = {
        is: v
      };

      $.ajax({
        type: "POST",
        url: 'adminSearchUser.php',
        data: asd,
        datatype: 'json',
        cache: false,
        success: function(data) {


          const myJSON = data;
          //alert(myJSON);
          const myObjarr = JSON.parse(myJSON);
          //alert(myObjarr[0].adminID);

          var content = "";

          if (v == "admin") {

            $("#TBtitle").replaceWith("<thead><tr><th>adminID</th><th>adminName</th></tr></thead>");

            for (let i in myObjarr) {
              content += "<tr><td>" + myObjarr[i].adminID + "</td><td>" + myObjarr[i].adminName + "</td></tr>";
            }

            $("#replaceMent").replaceWith(content);

          }

        }
      });
    }

    $(document).ready(function() {

      $(".btnSBUAdmin").click(function() {
        goPhp("admin");
      });

    });
  </script>
</head>

<body>
  <?php include 'adminMenuBar.html'; ?>

  <br />
  <!-- <div class="sb"><input type="text" class="search" placeholder="Search.." name="search"></div> -->
  <center>

    <input type="text" class="search" placeholder="Search.." name="search">

    <br />
    <div></div>

    <br />
    <button class="btnSBUAdmin">Admin</button>
    <button class="btnSBUTeacher">Teacher</button>
    <button class="btnSBUStudent">Student</button>

    <br />
    <div></div>
    <table class="styled-table">
      <thead id="TBtitle">
        <tr>
          <th>Click the button on top to select user type.</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="TBbody">

        <tr id="replaceMent">
          <td></td>
          <td></td>
        </tr>

      </tbody>
    </table>

  </center>

  <!-- <div class="canvas">
      <div class="topic">
        <h3>Search User</h3>
        <div id="searchbox">
          <input class="search-txt" placeholder="Type to search" />
        </div>
      </div>

     <div class="search">
        <div class="search_detail">
          <table class="search_table">
            <tr>
              <th>Name:</th>
              <th>Position:</th>
              <th>Class:</th>
            </tr>
            <tr>
              <th>Wong King Chun</th>
              <th>Student</th>
              <th>2A</th>
            </tr>
          </table>
        </div>
      </div>

      <div class="information">
        <div action="" class="proBody">
          <h2>Information</h2>
          <p>Name: <input type="text" id="name" class="form_input" autocomplete="off" readonly /></p>
          <p>Email: <input type="text" id="email" class="form_input" autocomplete="off" readonly /></p>
          <p>Phone: <input type="text" id="phone" class="form_input" autocomplete="off" readonly /></p>
          <p>Old Password: <input type="password" id="oldPassword" class="form_input" autocomplete="off" readonly /></p>
          <p>New Password: <input type="password" id="newPassword1" class="form_input" autocomplete="off" readonly /></p>
          <p>Repeated: <input type="password" id="newPassword2" class="form_input" autocomplete="off" readonly /></p>
          <button id="banBtn" class="buttonForm">Ban</button>
          <button id="activeBtn" class="buttonForm" hidden>Save</button>
        </div>
      </div>

    </div> -->

</body>

</html>