<?php

require_once('connectDB.php');

if(isset($_POST['studentLogin'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "SELECT * FROM student WHERE studentUsername='$username'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if(mysqli_num_rows($rs) <= 0){

        echo "<script type='text/javascript'>
        alert('Invaild! User does not exist.');
        window.location.href = 'studentLogin.html';
        </script>";

    } else {
        $rc = mysqli_fetch_assoc($rs);

        if($rc['studentPassword'] != $pwd){

            echo "<script type='text/javascript'>
            alert('Wrong username or password');
            window.location.href = 'studentLogin.php';
            </script>";


        } else {

            if ($rc['studentActivation'] == 0){
                
                session_start();

                $_SESSION['studentUsername'] = $username;
                $_SESSION['studentID'] = $rc['studentID'];
                $_SESSION['studentName'] = $rc['studentName'];
                $_SESSION['studentPassword'] = $pwd;
                $_SESSION['studentInfo'] = $rc['studentInfo'];

                echo "<script type='text/javascript'>
                window.location.href = 'studentLobbyHTML.php';
                </script>";
            } else {
                echo "<script type='text/javascript'>
                alert('This account have been disable');
                window.location.href = 'studentLogin.html';
                </script>";
            }
            

        }

    }

} else {

    echo "<script type='text/javascript'>
            window.location.href = 'studentLogin.html';
            </script>";

}
