<?php
require_once('connectDB.php');

$attID = $_POST['attID'];
$changeTo = $_POST['changeTo'];

if ($changeTo == 'SL') {
    $sql = "UPDATE attanence SET attanence_status = 'SickLeave' WHERE attanenceID = '$attID'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    echo "The status have changed to Sick Leave and file slot is open.";

} else if ($changeTo == 'withDraw') {
    $sql = "UPDATE attanence SET attanence_status = 'ABS' WHERE attanenceID = '$attID'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    echo "The status have changed to ABS and file slot have been withDraw.";
}
?>