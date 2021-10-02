<?php
require_once('connectDB.php');

if (isset($_POST['submit'])) {
    $table = $_POST['type'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $pwd = $_POST['psw'];

    if ($table == "admin") {

        //admin

        $sql = "SELECT adminUsername FROM $table WHERE adminUsername='$username'";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($rs) <= 0) {

            $sql = "INSERT INTO $table (adminUsername, adminPassword, adminName) VALUE ('$username', '$pwd', '$name');";
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "<script type='text/javascript'>
                alert('Account Created.');
                window.location.href = 'adminCreateAccount.html';
                </script>";
        } else {

            echo "<script type='text/javascript'>
                alert('Username exists.');
                window.location.href = 'adminCreateAccount.html';
                </script>";
        }

        //admin

    } else if ($table == "teacher") {

        //teacher

        $sql = "SELECT teacherUsername FROM $table WHERE teacherUsername='$username'";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($rs) <= 0) {

            $sql = "INSERT INTO $table (teacherUsername, teacherPassword, teacherName) VALUE ('$username', '$pwd', '$name');";
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "<script type='text/javascript'>
                alert('Account Created.');
                window.location.href = 'adminCreateAccount.html';
                </script>";
        } else {

            echo "<script type='text/javascript'>
                alert('Username exists.');
                window.location.href = 'adminCreateAccount.html';
                </script>";
        }

        //teacher


    } else {

        //student

        $sql = "SELECT studentUsername FROM $table WHERE studentUsername='$username'";
        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($rs) <= 0) {

            $sql = "INSERT INTO $table (studentUsername, studentPassword, studentName) VALUE ('$username', '$pwd', '$name');";
            $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "<script type='text/javascript'>
                alert('Account Created.');
                window.location.href = 'adminCreateAccount.html';
                </script>";
        } else {

            echo "<script type='text/javascript'>
                alert('Username exists.');
                window.location.href = 'adminCreateAccount.html';
                </script>";
        }

        //student

    }
} else {

    echo "<script type='text/javascript'>alert('Something wrong');
        window.location.href = 'adminCreateAccount.html';
         </script>";
}
