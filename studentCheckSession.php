<?php
    session_start();

    if(isset($_SESSION['studentUsername'])){

    } else {

        echo "<script type='text/javascript'>
            alert('Login First.');
            </script>";

            sleep(1);

        echo "<script type='text/javascript'>
            window.location.href = 'studentLogin.html';
            </script>";

    }
?>
