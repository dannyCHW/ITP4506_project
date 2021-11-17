<?php 
$dbh = new PDO("mysql:host=127.0.0.1;dbname=4506projectdb", "root", "");

if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
}


$name = $_FILES['file']['name'];
$data = file_get_contents($_FILES['file']['tmp_name']);

?>