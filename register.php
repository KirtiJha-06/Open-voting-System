<?php
  include("connect.php");
  
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $CPassword = $_POST['CPassword'];
  $address = $_POST['Address'];
  $image = $_FILES['Photo']['name'];
  $tmp_name = $_FILES['Photo']['tmp_name'];
  $role = $_POST['role'];

  if($password == $CPassword){
       move_uploaded_file($tmp_name , "../uploads/$image");
       $insert = mysqli_query( $connect , "INSERT INTO vote(name , mobile , Address , password , Image , role , status , votes) values('$name' , '$mobile' , '$address' , '$password' , '$image' , '$role' , 0 , 0)");
       if($insert){
        echo '
       <script>
       alert("Registration Succesful!");
       window.location = "../";
       </script>
     ';
       }
       else{
        echo '
       <script>
       alert("Some error occured!");
       window.location = "../routes/registration.html";
       </script>
     ';
       }

  }else{
    echo '
       <script>
       alert("Password and Confirm Password does not match!");
       window.location = "../routes/registration.html";
       </script>
     ';
  }

?>