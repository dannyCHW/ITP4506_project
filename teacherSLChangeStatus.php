<?php
require_once('connectDB.php');

$attID = $_POST['attID'];

$sql = "UPDATE attanence SET attanence_status='ABS' WHERE attanenceID = $attID";

mysqli_query($conn, $sql) or die(mysqli_error($conn));

echo "Status changed to ABS";

?>