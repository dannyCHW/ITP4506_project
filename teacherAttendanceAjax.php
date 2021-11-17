<?php
  require_once('connectDB.php');

  $selectClass = $_POST['id'];

    $sql = "SELECT * FROM allocation WHERE classID='$selectClass'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    $row_cnt = mysqli_num_rows($rs);
    $result = $row_cnt/2;
    if (is_float($result)){
      $result+=0.5;
    }

    $count_loop = 0 ;
    $table1 ="<tbody id='t1'>";
    $table2 ="<tbody id='t2'>";

    while($rc = mysqli_fetch_array($rs)){
      $stuID = $rc['studentID'];
      $sql2 = "SELECT * FROM student WHERE studentID=$stuID";
      $rs2 = mysqli_query($conn, $sql2)or die(mysqli_error($conn));
        while($rc2 = mysqli_fetch_array($rs2)){
            if($count_loop < $row_cnt/2){
              $table1.="<tr><td>".$rc2['studentName']."</td><td>".$rc['studentID']."</td><td>
                <select name='command' id='command'class='ai'>
                  <option value='Present'>Present</option>
                  <option value='Late'>Late</option>
                  <option value='ABS'selected >Absent</option>
                </select></td></tr>";
            }else{
              $table2.="<tr><td>".$rc2['studentName']."</td><td>".$rc['studentID']."</td><td>
                <select name='command' id='command' class='ai'>
                  <option value='Present'>Present</option>
                  <option value='Late'>Late</option>
                  <option value='ABS' selected>Absent</option>
                </select></td></tr>";
              }
            $count_loop+=1;
        }
    }
    $table1 .="</tbody>";
    $table2 .="</tbody>";

echo json_encode(array("a" => $table1, "b" => $table2));


?>
