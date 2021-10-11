<?php

require_once('connectDB.php');

    session_start();

    $newInfo = $_POST['textArea'];
    $classNo = $_SESSION['searchByClassID'];

    $sql = "UPDATE class SET classInfo = '$newInfo' where classID = '$classNo'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
        echo "<script type='text/javascript'>
        alert('Update class information successful!');
        window.location.href = 'teacherStudentListHTML.php';
        </script>";



?>
