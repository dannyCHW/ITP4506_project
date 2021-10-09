<!DOCTYPE html>
<html>

<head>
  <?php include 'adminCheckSession.php'; ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
  <script>
    /* menu open & close */
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" language="javascript">
    $(document).ready(function() {

      $('#logOut').click(function() {
        window.location = "logoutSession.php";
      });

    });
  </script>


</head>

<body>
  <?php
  include 'adminMenuBar.html';
  ?>

</body>

</html>