<!DOCTYPE html>
  <html>

  <head>
    <?php include 'checkSession.php'; ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="adminCss/adminMenu.css">
    <script>
    /* menu open & close */

</script>

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="jslib/jquery-1.11.1.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function () {

        $('#logOut').click(function (){
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