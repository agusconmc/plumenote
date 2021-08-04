<?php
  session_start();

  include("connect.php");
  include("function.php");

  $user_data=check_login($link);

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $new_password = md5($_POST['new_password']);
    $cnew_password = md5($_POST['cnew_password']);
    $id = $_GET['item'];
    $state = $_GET['ticket'];
    
    if ($state=='department'){
        $sql = "SELECT password FROM department WHERE id='$id'";
    }else{
        $sql = "SELECT password FROM users WHERE id='$id'";
    }
    
    $result = mysqli_query($link,$sql);

    if ($result) {
      if ($new_password==$cnew_password){
        if ($state=='other'){
            $query = "UPDATE users SET password = '$new_password' WHERE id = $id";
            mysqli_query($link,$query);
            header("Location: admin.php");
        }else if ($state=='department'){
            $query = "UPDATE department SET password = '$new_password' WHERE id = $id";
            mysqli_query($link,$query);
            header("Location: admin.php");
        }
      }else {
        echo "<script>alert('Password not changed')</script>";
      }
    }
  }
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <title>Admin</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
      <style>
          .nav-items{
              align-items:right;
          }
      </style>
    <nav class="navbar">
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
    </nav>
    <div class="container">
      <div class="register-form">
        <h2>RESET PASSWORD</h2>
        <form method="post">
          <label for="password">New Password</label><br>
          <input id="password" type="password" name="new_password" placeholder="Enter password" value=""><br><br>
          <label for="cpassword">Confirm Password</label><br>
          <input id="cpassword" type="password" name="cnew_password" placeholder="Re-Enter password" value=""><br><br>
          <button type="submit" name="button">Reset</button>
        </form><br>
        <p><a href="admin.php">Cancel</a></p>
      </div>
    </div>

  </body>
</html>
