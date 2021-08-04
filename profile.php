<?php
session_start();

include("connect.php");
include("function.php");

$user_data=check_login($link);
?>



	
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
  </head>

  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a class="brand" href="index.php"> <img src="logo.png" alt="logo"> </a>
      <div class="nav-items">
        <a class="links" href="index.php">Home</a>
        <a class="links" href="history.php">Suggestion History</a>
        <a class="links" href="logout.php">Log-out</a>
      </div>
    </nav>

    </nav>
    <div class="container">
      <div class="information">
        <h1>ACCOUNTS INFORMATION</h1><br>
        <h3>Given Name: <?php echo  $user_data['gname']?></h3>
        <h3>Family Name: <?php echo  $user_data['fname']?></h3>
        <h3>Username: <?php echo  $user_data['username'] ?></h3>
        <h3>Email Address: <?php echo  $user_data['email'] ?></h3>
      </div><br><br>
      <div class="btn">
        <a href="editprofile.php">Edit Profile</a>
        <a href="changepassword.php">Change Password</a>
      </div>
    </div>




  </body>
</html>


