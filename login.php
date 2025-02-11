<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['Password'];
$role = $_POST['role'];

$check = mysqli_query($connect , "SELECT * FROM vote WHERE mobile = '$mobile' AND Password = '$password' AND role = '$role'");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $group = mysqli_query($connect , "SELECT * FROM vote WHERE role = 2");
    $groupdata = mysqli_fetch_all($group, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupdata'] = $groupdata;
    
    echo '
    <script>
    
    window.location = "../routes/dashboard.php";
    </script>
  ';

}else{
    echo '
       <script>
       alert("Invalid Credentials or User not found!");
       window.location = "../";
       </script>
     ';
}

?>