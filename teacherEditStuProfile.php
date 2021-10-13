<?php

require_once('connectDB.php');

    session_start();

    $stuID = $_POST['stuID'];
    $newUserName = $_POST['stuUserName'];
    $newName = $_POST['stuName'];
    $newInfo = $_POST['stuInfo'];
    $newPwd = $_POST['stuPwd'];


    $sql = "UPDATE student SET studentName = '$newName',studentUsername = '$newUserName', studentPassword = '$newPwd', studentInfo = 'newInfo' where studentID = '$stuID'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

    $_SESSION['selectedStudentUserName'] = $newUserName;
    $_SESSION['selectedStudentName'] = $newName;
    $_SESSION['selectedStudentInfo'] = $newInfo;
    $_SESSION['selectedStudentPwd'] = $newPwd;

        echo "<script type='text/javascript'>
        alert('Update  successful!');
        window.location.href = 'teacherEditStuHTML.php';
        </script>";



?>
