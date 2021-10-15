<?php
require_once('connectDB.php');

$arr = (array) null;

$sql = "SELECT COUNT(*) as total from attanence";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($rs);

array_push($arr, $data);

$sql = "SELECT COUNT(*) AS onTime FROM attanence WHERE attanence_status = 'onTime'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($rs);

array_push($arr, $data);

$sql = "SELECT COUNT(*) AS Late FROM attanence WHERE attanence_status = 'Late'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($rs);

array_push($arr, $data);

$sql = "SELECT COUNT(*) AS SickLeave FROM attanence WHERE attanence_status = 'SickLeave'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($rs);

array_push($arr, $data);

$sql = "SELECT COUNT(*) AS Absent FROM attanence WHERE attanence_status = 'Absent'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($rs);

array_push($arr, $data);

$myJson = json_encode($arr);
    echo $myJson;

?>
