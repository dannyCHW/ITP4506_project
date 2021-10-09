<!DOCTYPE html>
<html>

<head>

  <?php include 'adminCheckSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminSearchBanUser.css">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" language="javascript">
    function goPHP(v) {
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
          var user = "";

          if (v == "admin") {

            user = "admin";
            content += "<table class='styled-table'><thead id='TBtitle'><tr><th>adminID</th><th>adminName</th><th></th></tr></thead><tbody id='TBbody'>";

            for (let i in myObjarr) {
              content += "<tr><td>" + myObjarr[i].adminID + "</td><td>" + myObjarr[i].adminName + "</td><td><button class='detail'>Detail</button></td></tr>";
            }

          } else if (v == "teacher") {

            user = "teacher";
            content += "<table class='styled-table'><thead id='TBtitle'><tr><th>teacherID</th><th>teacherName</th><th></th></tr></thead><tbody id='TBbody'>";

            for (let i in myObjarr) {
              content += "<tr><td>" + myObjarr[i].teacherID + "</td><td>" + myObjarr[i].teacherName + "</td><td>" + "<button class='detail'>Detail</button>" + "</td></tr>";
            }

          } else {

            user = "student";
            content += "<table class='styled-table'><thead id='TBtitle'><tr><th>studentID</th><th>studentName</th><th></th></tr></thead><tbody id='TBbody'>";

            for (let i in myObjarr) {
              content += "<tr><td>" + myObjarr[i].studentID + "</td><td>" + myObjarr[i].studentName + "</td><td>" + "<button class='detail'>Detail</button>" + "</td></tr>";
            }

          }

          content += "</tbody></table>";

          $("table").replaceWith(content);
          $("#savedUser").text(user);

          user = "";
          content = "";
        }
      });
    }

    $(document).ready(function() {

      $(".btnSBUAdmin").click(function() {
        goPHP("admin");
      });

      $(".btnSBUTeacher").click(function() {
        goPHP("teacher");
      });

      $(".btnSBUStudent").click(function() {
        goPHP("student");
      });

      $(".search").on("keyup", function() {
        var word = $(this).val();
        $("tr:gt(0)").hide().filter(':contains("' + word + '")').show();
      });

    });

    $(document).on('click', '.detail', function() {
      var detaillValID = $(this).parent().parent().children(':first-child').text();
      var detaillValUname = $(this).parent().parent().children(':nth-child(2)').text();

      var useris = $('#savedUser').text();

      //alert(detaillVal);
      //alert(useris);

      var asd2 = {
        users: useris,
        userName: detaillValUname
      };

      $.ajax({
        type: "POST",
        url: 'adminSearchUserDetail.php',
        data: asd2,
        datatype: 'json',
        cache: false,
        success: function(data) {

          const myJSON = data;
          //alert(data);  
          const myObjarr = JSON.parse(myJSON);
          //alert(myObjarr);
          alert(myObjarr.adminID);


          var w = window.open("", "popupWindow", "width=500, height=300, scrollbars=yes");
          var $w = $(w.document.body);
          $w.html("<p>adminID : " + myObjarr.adminID + "</p>" +
            "<p>adminName : " + myObjarr.adminName + "</p>" +
            "<p>adminUserName : " + myObjarr.adminUsername + "</p>" +
            "<p>adminPassWord : " + myObjarr.adminPassword + "</p>" +
            "<h3>This window will self-close in 3 seconds.</h3>");

          function sleep(time) {
            return new Promise((resolve) => setTimeout(resolve, time));
          }

          sleep(3000).then(() => {
            w.close();
          })

        }
      });


    });
  </script>
</head>

<body>
  <?php include 'adminMenuBar.html'; ?>

  <br />
  <center>

    <input type="text" class="search" placeholder="Search.." name="search">

    <br />

    <br />
    <button class="btnSBUAdmin">Admin</button>
    <button class="btnSBUTeacher">Teacher</button>
    <button class="btnSBUStudent">Student</button>

    <br />
    <div id="savedUser" hidden></div>
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


</body>

</html>