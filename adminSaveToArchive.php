<?php
require_once('connectDB.php');
$theCheckeds = json_decode($_POST['checkBoxs']);
$out = "";
foreach ($theCheckeds as $value) {

    $sql = "SELECT * FROM class WHERE classID = '$value'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($rs) > 0) {

        while ($row = mysqli_fetch_assoc($rs)) {

            $classID_R = $row['classID'];
            $classInfo_R = $row['classInfo'];
            $classCode_R = $row['classCode'];
            $schoolYear_R = $row['schoolYear'];
            $teacherID_R = $row['teacherID'];
            $classDate_R = $row['classDate'];

            $sql = "INSERT INTO classrecord (rClassID, rClassInfo, rClassCode, rSchoolYear, rTeacherID, rClassDate)
        VALUES ('$classID_R', '$classInfo_R', '$classCode_R', '$schoolYear_R', '$teacherID_R', '$classDate_R');";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));

        }
    }


    $sql = "SELECT * FROM attanence WHERE classID = '$value'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($rs) > 0) {

        while ($row = mysqli_fetch_assoc($rs)) {

            $attanenceID_R = $row['attanenceID'];
            $attanence_status_R = $row['attanence_status'];
            $attanence_date_R = $row['attanence_date'];
            $updateTime_R = $row['updateTime'];
            $classID_R = $row['classID'];
            $studentID_R = $row['studentID'];

            $sql = "INSERT INTO attanencerecord (rAttanenceID, rAttanence_status, rAttanence_date, rUpdateTime, rClassID, rStudentID)
        VALUES ('$attanenceID_R', '$attanence_status_R', '$attanence_date_R', '$updateTime_R', '$classID_R', '$studentID_R');";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $sql = "DELETE FROM attanence WHERE attanenceID = '$attanenceID_R';";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
    }

    $sql = "SELECT * FROM allocation WHERE classID = '$value'";
    $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($rs) > 0) {

        while ($row = mysqli_fetch_assoc($rs)) {

            $classID_R = $row['classID'];
            $studentID_R = $row['studentID'];
            $allocationDate_R = $row['allocationDate'];

            $sql = "INSERT INTO allocationrecord (rClassID, rStudentID, rAllocationDate)
        VALUES ('$classID_R', '$studentID_R', '$allocationDate_R');";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $sql = "DELETE FROM allocation WHERE classID = '$classID_R' AND studentID = '$studentID_R' AND allocationDate = '$allocationDate_R';";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
    }

    $sql = "DELETE FROM class WHERE classID = '$value';";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    
}

echo "Record was saved to the archive and the current tables is empty.";
