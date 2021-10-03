<!DOCTYPE html>
  <html>

  <head>
    <!-- <?php include 'checkSession.php'; ?> -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <script>
    /* menu open & close */

</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function () {

        $('#adminMenuBars').load('adminMenuBar.html');

        /* load the admin menu bar */
        $('.toggle').click(function () {
          if ($(".toggle").attr("class") == "toggle") {
            $('.toggle').addClass("active");
            $('.navigation').addClass("active");
          } else {
            $('.toggle').removeClass("active");
            $('.navigation').removeClass("active");
          }
        });
        $('.list').hover(function () {
          $('.list').removeClass("active");
          $(this).addClass("active");
        }).mouseleave(function () {
          $('.list').removeClass("active");
        });
        
      });
    </script>


  </head>

  <body>
    <?php 
      include 'adminMenuBar.html';
    ?>
    <!-- <div id="adminMenuBars"></div>

    <div class="navigation">
    <ul>
      <li class="list">
        <a href="adminLobby.php">
          <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
          </span>
          <span class="title">Home</span>
        </a>
      </li>
      <li class="list">
        <a href="adminCreateAccount.html">
          <span class="icon">
            <ion-icon name="create-outline"></ion-icon>
          </span>
          <span class="title">Create Account</span>
        </a>
      </li>
      <li class="list">
        <a href="adminSearchBanUser.html">
          <span class="icon">
            <ion-icon name="search-outline"></ion-icon>
          </span>
          <span class="title">Search & User Management</span>
        </a>
      </li>
      <li class="list">
        <a href="#">
          <span class="icon">
            <ion-icon name="hammer-outline"></ion-icon>
          </span>
          <span class="title">Class Management</span>
        </a>
      </li>
      <li class="list">
        <a href="#">
          <span class="icon">
            <ion-icon name="document-outline"></ion-icon>
          </span>
          <span class="title">Report Document</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="toggle">
    <ion-icon name="menu-outline" class="open"></ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
  </div> -->
  </body>

  </html>