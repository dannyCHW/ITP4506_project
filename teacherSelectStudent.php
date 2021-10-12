<?php

require_once('connectDB.php');

    session_start();

    $selectStudentID = $_POST['searchStudentID'];

    $_SESSION['selectStudentID'] = $selectStudentID;

    $sql4 = "SELECT * FROM student where studentID = '$selectStudentID' ";
    $rs4 = mysqli_query($conn, $sql4)or die(mysqli_error($conn));
    while($rc4 = mysqli_fetch_array($rs4)){

      $_SESSION['selectedStudentUserName'] = $rc4['studentUsername'];
      $_SESSION['selectedStudentName'] = $rc4['studentName'];
      $_SESSION['selectedStudentInfo'] = $rc4['studentInfo'];
      $_SESSION['selectedStudentPwd'] = $rc4['studentPassword'];

    };


    echo "<script type='text/javascript'>
    window.location.href = 'teacherEditStuHTML.php';
    </script>";

?>
