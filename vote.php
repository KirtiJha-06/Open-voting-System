<?php
session_start();
include("connect.php");

$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect , "UPDATE vote  SET votes = '$total_votes' where id = '$gid'");
$update_user_status = mysqli_query($connect , "UPDATE vote  SET status = 1 WHERE id = '$uid'");

if($update_votes and $update_user_status){
    $group = mysqli_query($connect , "SELECT * FROM  user WHERE role = 2");
    $group_data = mysqli_fetch_all($group , MYSQLI_ASSOC);
    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupdata'] = $group_data;
    echo '
    <script>
    alert("Voting Succesful!");
    window.location = "../routes/dashboard.php";
    </script>
  ';
}else{
    echo '
    <script>
    alert("Some Error Occured!");
    window.location = "../routes/dashboard.php";
    </script>
  ';
}

?>