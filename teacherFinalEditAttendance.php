<?php

require_once('connectDB.php');

    session_start();

    $stuid = $_POST['stuID'];
    $day = $_POST['day'];
    $newStatus = $_POST['newStatus'];

    $sql = "UPDATE attanence set attanence_status = '$newStatus' WHERE attanence_date = '$day' AND studentID = '$stuid'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    while($rc = mysqli_fetch_array($rs)){
    }
    
?>
