<?php
session_start();

if(!isset($_SESSION ['userdata'])){
    header("location: ../");
}

$userdata = $_SESSION ['userdata'];
$groupdata = $_SESSION['groupdata'];

if($_SESSION['userdata']['status'] == 0){
    $status = '<b style = "color : red"> Not Voted</b>';
}else{
    $status = '<b style = "color : green">Voted</b>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/stylesheet.css">

</head>
<style>
    #backbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        float: left;
        margin: 15px;
    }
    #logoutbtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        float: right;
        margin: 15px;
    }
    #Profile{
        background-color: white;
        width: 40%;
        padding: 20px;
        float: right;
}
    #Group{
        background-color: white;
        width: 40%;
        padding: 20px;
        float: left;
    }
    #votebtn{
        padding: 5px;
        font-size: 15px;
        background-color: #3498db;
        color: white;
        border-radius: 5px;
        float: left;
    }
   #mainpanel{
    padding: 10px;

   }
   #header-section{
    padding: 10px;
   }
   #voted{
    
    padding: 5px;
        font-size: 15px;
        background-color: green;
        color: white;
        border-radius: 5px;
        float: left;
   }

</style>
<body>
    <center>
    <div id="main-section">
    <div id="header-section">
    <a href="../"><button id="backbtn" >Back</button> </a>
    <a href="logout.php"><button id="logoutbtn">Logout</button> </a>
     <h1>Online Voting System</h1>
    </div>
    </center>
    <hr>
    <div id="mainpanel">
    <div id="Profile">
     <center><img src="../uploads/<?php echo $userdata ['Photo'] ?>" height="200" width="200" alt=""></center><br><br>
     <b>Name:</b><?php echo $userdata ['Photo'] ?><br><br>
     <b>Mobile:</b><?php echo $userdata ['mobile'] ?><br><br>
     <b>Address:</b><?php echo $userdata ['address'] ?><br><br>
     <b>Status:</b><?php echo $status ?><br><br>
</div>
 <div id="Group">
     <?php
     if($_SESSION['groupdata']){
        for($i =0; $i<count($groupdata); $i++){
            ?>
            <div>
                <img style="float: right;" src ="../uploads/<?php echo $groupdata[$i] ['Photo']?>" height="100" width="100" alt="">
              <b>Group Name:<?php echo $groupdata[$i] ['names']?></b><br><br>
              <b>Votes:<?php echo $groupdata[$i] ['votes']?></b><br><br>
              <form action="../API/vote.php" method="POST">
                <input type="hidden" name = "gvotes" value="<?php echo $groupdata[$i] ['votes']?>">
                <input type="hidden" name="gid" value="<?php echo $groupdata[$i] ['id']?>">
                <?php
                if($_SESSION['userdata']['status'] ==0){
                    ?>
                  <input type="submit" name="votebtn" value="Vote" id="votebtn">
                  <?php
                }else{
                    ?>
                    <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                    <?php
                }
                
                ?>
                
              </form>
            </div>
            <hr>
            <?php
        }
     }else{

     }
     
     ?>
 </div>
 </div>
 </div>

</body>
</html>