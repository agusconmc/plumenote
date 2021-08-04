<?php
  session_start();

  include("connect.php");
  include("function.php");
  include("check_department.php");

  $user_data=check_login($link);

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $cnew_password = md5($_POST['cnew_password']);
    $id = $user_data['id'];
    
    

    $sql = "SELECT password FROM users WHERE password = '$old_password' AND id='$id'";
    $result = mysqli_query($link,$sql);

    if ($result) {
      if ($new_password==$cnew_password){
        $query = "UPDATE users SET password = '$new_password' WHERE id = $id";
        mysqli_query($link,$query);
        header("Location: profile.php");
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
    <title>Profile</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
    </nav>
    <div class="container">
      <div class="register-form">
        <h2>Change Password</h2>
        <form method="post">
          <label for="old_password">Old Password</label><br>
          <input id="old_password" type="password" name="old_password" placeholder="Enter old password" value=""><br><br>
          <label for="new_password">Password</label><br>
          <input id="new_password" type="password" name="new_password" placeholder="Enter new password" value=""><br><br>
          <label for="cpassword">Confirm Password</label><br>
          <input id="cpassword" type="password" name="cnew_password" placeholder="Re-Enter password" value=""><br><br>
          <button type="submit" name="button">Apply Changes</button>
        </form>
        <p> <a href="profile.php">Cancel</a></p>
      </div>
    </div>

  </body>
</html>

