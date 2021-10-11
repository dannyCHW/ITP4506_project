<?php
require_once('connectDB.php');

$classID = $_POST['classID'];

$sql = "UPDATE class SET classStatus = 'active' WHERE classID = $classID";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

echo "Verified.";

?>