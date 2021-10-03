<?php 
    session_start();

    if(isset($_SESSION['username'])){

    } else {
        
        echo "<script type='text/javascript'>
            alert('Login First.');
            window.location.href = 'adminLogin.php';
            </script>";
    }
?>