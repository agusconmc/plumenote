<?php
  include("connect.php");
  include("function.php");

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $status=$_GET['status'];
    $gname = $_POST['gname'];
    $fname = $_POST['fname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);


    if(!empty($gname) &&
       !empty($fname) &&
       !empty($username) &&
       !empty($email) &&
       !empty($password) &&
       !empty($cpassword) &&
       $password==$cpassword){
         
         $query = "SELECT * FROM users WHERE email='$email' OR username='$username' limit 1";
         $result = mysqli_query($link,$query);

         if($result && mysqli_num_rows($result)){
             echo "<script>alert('Email or Username Already Exist')</script>";
           
         }else{
             $query = "INSERT INTO users (status,gname,fname,username,email,password) VALUES ('$status','$gname','$fname','$username','$email','$password')";
           mysqli_query($link,$query);
           header("Location: login.php?status=client&success=1");
           die;
           
         }
    }else{
      echo "<script>alert('Please Fill In The Correct Data')</script>";
    }
  }else {
    $gname = "";
    $fname = "";
    $username = "";
    $email = "";
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
    </nav>
    <div class="container">
      <div class="register-form">
        <h2>REGISTER ACCOUNT</h2>
        <form method="post">
          <label for="gname">Given Name</label><br>
          <input id="gname" type="text" name="gname" placeholder="Enter first name" value= <?php echo "$gname" ?>><br><br>
          <label for="fname">Family Name</label><br>
          <input id="fname" type="text" name="fname" placeholder="Enter last name" <?php echo "$fname" ?>><br><br>
          <label for="email">Email</label><br>
          <input id="email" type="email" name="email" placeholder="Enter email"  value= <?php echo "$email" ?>><br><br>
          <label for="username">Username</label><br>
          <input id="username" type="text" name="username" placeholder="Enter username"  value= <?php echo "$username" ?>><br><br>
          <label for="password">Password</label><br>
          <input id="password" type="password" name="password" placeholder="Enter password" value=""><br><br>
          <label for="cpassword">Confirm Password</label><br>
          <input id="cpassword" type="password" name="cpassword" placeholder="Re-Enter password" value=""><br><br>
          <button type="submit" name="button">Register</button>
        </form>
        <p><strong>Already Have An Account?</strong></p>
        <p>Click here to <a href="login.php?status=client">Login</a></p>
      </div>
    </div>

  </body>
</html>

