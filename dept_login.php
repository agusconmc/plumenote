<?php
    session_start();
    include("connect.php");
    include("check_department.php");
    
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username = $_POST['username'];
      $password = md5($_POST['password']);
    
      if(!empty($username) && !empty($password)){
          $query = "SELECT * FROM department WHERE dept_username='$username' limit 1";
          $result = mysqli_query($link,$query);
          if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_array($result);
            if($password==$user_data['password']){
              $_SESSION['id'] = $user_data['id'];
              if (isset($_SESSION['id'])){
                  header("Location: department.php");
                  die;
              }else{
                  echo "nice try";
              }
                
            }else{
              echo "Please Fill In The Correct Data";
            }
          }else{
            echo "Login Failed";
          }
      }else{
        echo "Please Fill In The Correct Data";
      }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
    </nav>
    <div class="container">
        <div class="register-form">
      <h2>Welcome</h2>
      <form method="post">
        <label for="username">Username</label><br>
        <input id="username" type="text" name="username" placeholder="Enter username" value=""><br><br>
        <label for="password">Password</label><br>
        <input id="password" type="password" name="password" placeholder="Enter password" value=""><br><br>
        <button type="submit" name="button">Login</button>
      </form><br>
    </div>
    </div>
    
  </body>
</html>

