<?php 

require_once('connectDB.php');

if(isset($_POST['teacherLogin'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    
    $sql = "SELECT teacherUsername, teacherPassword FROM teacher WHERE teacherUsername='$username'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if(mysqli_num_rows($rs) <= 0){

        echo "<script type='text/javascript'>
        alert('Invaild! User does not exist.');
        window.location.href = 'TeacherLogin.html';
        </script>";
        
    } else {
        $rc = mysqli_fetch_assoc($rs);

        if($rc['teacherPassword'] != $pwd){
            
            echo "<script type='text/javascript'>
            alert('Wrong username or password');
            window.location.href = 'TeacherLogin.php';
            </script>";
            

        } else {

            echo "<script type='text/javascript'>
            window.location.href = 'teacherLobby.html';
            </script>";

        }
        
        
    }


} else {

    echo"alert('Something wrong');";

}
?>