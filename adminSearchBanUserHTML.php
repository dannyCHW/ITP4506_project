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

    
  </style>

  <?php include 'adminCheckSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <!-- <link rel="stylesheet" type="text/css" href="adminCss/adminSearchBanUser.css"> -->


  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {});
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
  <table class="styled-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Class</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Dom</td>
        <td>3B</td>
      </tr>
      <tr>
        <td>Melissa</td>
        <td>2A</td>
      </tr>
      <!-- and so on... -->
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