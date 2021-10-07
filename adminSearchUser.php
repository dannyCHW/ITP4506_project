<?php 
require_once('connectDB.php');

$is = $_POST['is'];

if($is == "admin"){
    $sql = "SELECT adminID, adminName FROM admin ";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $returnBack = new stdClass();
    $arr = (array) null;

    while ($row = mysqli_fetch_assoc($rs)){
        // $returnBack .= $row["adminID"] . $row["adminName"];
        $myObj = new stdClass();
        $myObj->adminID = $row["adminID"];
        $myObj->adminName = $row["adminName"];

        array_push($arr, $myObj);
        
    }
    

    $myJson = json_encode($arr);
    echo $myJson;
} else {
    echo "NONO";
}

// $result = array("id"=>$is);

// echo json_encode($result);


?>