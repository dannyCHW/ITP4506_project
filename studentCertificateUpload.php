<?php
require_once('connectDB.php');

if (isset($_FILES['file'])) {

    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {

        $attID = $_POST['attID'];
        $name = $_FILES['file']['name'];

        if (!file_exists("F:/XAMPP/htdocs/uploads/$attID")) {
            mkdir("F:/XAMPP/htdocs/uploads/$attID", 0777, true);
        }

        move_uploaded_file($_FILES['file']['tmp_name'], "F:/XAMPP/htdocs/uploads/$attID/" . $_FILES['file']['name']);

        $sql = "UPDATE attanence SET fileName='$name' WHERE attanenceID = $attID";

        mysqli_query($conn, $sql) or die(mysqli_error($conn));

        echo "uploaded";
    }
} else {
    echo "No File wor, C Hing.";
}
?>