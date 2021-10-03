<?php 
    session_start();

    if(isset($_SESSION['username'])){

    } else {
        
        echo "<script type='text/javascript'>
            alert('Login First.');
            </script>";

            sleep(1);

        echo "<script type='text/javascript'>
            window.location.href = 'adminLogin.php';
            </script>";

            
    }
?>