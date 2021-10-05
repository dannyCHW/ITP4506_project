<?php

require_once('connectDB.php');

if (isset($_POST['adminLogin'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "SELECT adminUsername, adminPassword FROM admin WHERE adminUsername='$username'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($rs) <= 0) {

        echo "<script type='text/javascript'>
        alert('Invaild! User does not exist.');
        window.location.href = 'adminLogin.html';
        </script>";
    } else {
        $rc = mysqli_fetch_assoc($rs);

        if ($rc['adminPassword'] != $pwd) {

            echo "<script type='text/javascript'>
            alert('Wrong username or password');
            window.location.href = 'adminLogin.php';
            </script>";

        } else {

            session_start();

            $_SESSION['adminUsername'] = $username;

            echo "<script type='text/javascript'>
            window.location.href = 'adminLobbyHTML.php';
            </script>";
        }
    }
    
} else {

    echo "<script type='text/javascript'>
            window.location.href = 'adminLogin.html';
            </script>";
}

echo "<script type='text/javascript'>
            alert('Something Wrong');
            </script>";


?>
